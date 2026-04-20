<?php

namespace App\Http\Controllers;

use App\Enums\MediaType;
use App\Enums\UserRole;
use App\Enums\Wing;
use App\Http\Requests\StoreObservationRequest;
use App\Http\Requests\UpdateObservationRequest;
use App\Models\Media;
use App\Models\Observation;
use App\Models\User;
use App\Support\ObservationAnalytics;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        abort_unless($user, 403);

        if ($user->isFaculty()) {
            return view('dashboard.index', $this->facultyOverviewData($user));
        }

        if ($user->isSectionHead()) {
            return view('dashboard.index', $this->sectionHeadOverviewData($user));
        }

        if ($user->isAdmin() || $user->isPrincipal()) {
            return view('dashboard.index', $this->principalOverviewData());
        }

        abort(403);
    }

    private function principalOverviewData(): array
    {
        $rankStaff = ObservationAnalytics::rankedStaffCombined();
        $rankSectionHeads = ObservationAnalytics::rankedSectionHeads();
        $rankFaculty = ObservationAnalytics::rankedFaculty();

        $rankFacultyByWing = collect(Wing::cases())->mapWithKeys(function (Wing $wing) {
            return [$wing->value => ObservationAnalytics::rankedFacultyInWing($wing)];
        });

        return [
            'overviewVariant' => 'principal',
            'rankStaff' => $rankStaff,
            'rankSectionHeads' => $rankSectionHeads,
            'rankFaculty' => $rankFaculty,
            'rankFacultyByWing' => $rankFacultyByWing,
            'topStaff' => $rankStaff->first(),
            'topSectionHead' => $rankSectionHeads->first(),
            'topTeacher' => $rankFaculty->first(),
        ];
    }

    private function sectionHeadOverviewData(User $user): array
    {
        $rankStaff = ObservationAnalytics::rankedStaffCombined();
        $rankSectionHeads = ObservationAnalytics::rankedSectionHeads();
        $rankFacultyWing = $user->wing
            ? ObservationAnalytics::rankedFacultyInWing($user->wing)
            : collect();
        $allObservations = Observation::query()->orderBy('created_at')->get();
        $observerMetrics = ObservationAnalytics::averagedSessionMetrics($allObservations);
        $rubricAggregatedSessions = ObservationAnalytics::totalSessionsInObservations($allObservations);

        return [
            'overviewVariant' => 'section_head',
            'rankStaff' => $rankStaff,
            'rankSectionHeads' => $rankSectionHeads,
            'rankFacultyWing' => $rankFacultyWing,
            'topStaff' => $rankStaff->first(),
            'topSectionHead' => $rankSectionHeads->first(),
            'topWingTeacher' => $rankFacultyWing->first(),
            'observerMetrics' => $observerMetrics,
            'rubricAggregatedSessions' => $rubricAggregatedSessions,
            'kpiQuantCards' => ObservationAnalytics::kpiQuantitativeCardsFromObservations($allObservations),
            'kpiQualCards' => ObservationAnalytics::kpiQualitativeCardsFromObservations($allObservations),
            'kpiObservationCount' => $allObservations->count(),
        ];
    }

    private function facultyOverviewData(User $user): array
    {
        $received = $user->observationsReceived()->orderByDesc('created_at')->get();
        $summaries = ObservationAnalytics::summariesByObservee();
        $summaryRow = $summaries->get($user->id);

        $rankStaff = ObservationAnalytics::rankedStaffCombined();
        $rankSectionHeads = ObservationAnalytics::rankedSectionHeads();
        $staffRankRow = $rankStaff->firstWhere(fn (array $r) => $r['user']->id === $user->id);

        $wingRankRow = null;
        $wingRankedCount = 0;
        if ($user->wing !== null) {
            $wingRank = ObservationAnalytics::rankedFacultyInWing($user->wing);
            $wingRankRow = $wingRank->firstWhere(fn (array $r) => $r['user']->id === $user->id);
            $wingRankedCount = $wingRank->count();
        }

        $rankFacultyByWing = collect();
        if ($user->wing !== null) {
            $rankFacultyByWing = collect([
                $user->wing->value => ObservationAnalytics::rankedFacultyInWing($user->wing),
            ]);
        }

        $topWingTeacher = $user->wing !== null
            ? ObservationAnalytics::rankedFacultyInWing($user->wing)->first()
            : null;

        $observeeMetrics = ObservationAnalytics::averagedSessionMetrics($received);
        $rubricAggregatedSessions = ObservationAnalytics::totalSessionsInObservations($received);
        $observationOverallAveragePercent = ObservationAnalytics::averageAggregatePercent($received);

        return [
            'overviewVariant' => 'faculty',
            'avgAggregate' => $observationOverallAveragePercent ?? ($summaryRow !== null ? (float) $summaryRow->avg_score : null),
            'observeeMetrics' => $observeeMetrics,
            'rubricAggregatedSessions' => $rubricAggregatedSessions,
            'observationOverallAveragePercent' => $observationOverallAveragePercent,
            'rankStaff' => $rankStaff,
            'rankSectionHeads' => $rankSectionHeads,
            'topSectionHead' => $rankSectionHeads->first(),
            'staffRankRow' => $staffRankRow,
            'staffRankedCount' => $rankStaff->count(),
            'wingRankRow' => $wingRankRow,
            'wingRankedCount' => $wingRankedCount,
            'rankFacultyByWing' => $rankFacultyByWing,
            'topStaff' => $rankStaff->first(),
            'topWingTeacher' => $topWingTeacher,
            'observationCount' => $received->count(),
        ];
    }

    public function quantitativeObservations(Request $request): View|RedirectResponse
    {
        $user = $request->user();
        abort_unless($user, 403);

        if (! $user->canAccessQuantQualObservationPages()) {
            return redirect()->route('kpidashboard');
        }

        $observations = $this->observationsForMetricPages($user);
        $metrics = ObservationAnalytics::averagedSessionMetrics($observations);
        $quant = $metrics['quantitative'];

        $quantScores = collect(ObservationAnalytics::QUANT_METRICS)
            ->map(fn (string $name) => $quant[$name] ?? null)
            ->filter(fn ($v) => is_numeric($v));

        $avgPerfPercent = null;
        $overallQuantKpi = null;
        if ($quantScores->isNotEmpty()) {
            $avgPerfPercent = round(
                $quantScores->map(fn ($s) => ((float) $s / 5) * 100)->avg(),
                1
            );
            $overallQuantKpi = round($quantScores->avg(), 1);
        }

        return view('dashboard.quantitative-observations', [
            'quantitative' => $quant,
            'avgPerfPercent' => $avgPerfPercent,
            'overallQuantKpi' => $overallQuantKpi,
        ]);
    }

    public function academicReports()
    {
        return view('dashboard.academic-reports');
    }

    public function qualitativeObservations(Request $request): View|RedirectResponse
    {
        $user = $request->user();
        abort_unless($user, 403);

        if (! $user->canAccessQuantQualObservationPages()) {
            return redirect()->route('kpidashboard');
        }

        $observations = $this->observationsForMetricPages($user);
        $metrics = ObservationAnalytics::averagedSessionMetrics($observations);
        $qual = $metrics['qualitative'];

        $qualScores = collect(ObservationAnalytics::QUAL_METRICS)
            ->map(fn (string $name) => $qual[$name] ?? null)
            ->filter(fn ($v) => is_numeric($v));

        $aggregateQualitativePercent = null;
        if ($qualScores->isNotEmpty()) {
            $aggregateQualitativePercent = (int) round(
                $qualScores->map(fn ($s) => ((float) $s / 5) * 100)->avg(),
                0
            );
        }

        return view('dashboard.qualitative-observation', [
            'qualitative' => $qual,
            'aggregateQualitativePercent' => $aggregateQualitativePercent,
        ]);
    }

    private function observationsForMetricPages(User $user): Collection
    {
        if ($user->isFaculty()) {
            return $user->observationsReceived()->orderByDesc('created_at')->get();
        }

        return Observation::query()->orderByDesc('created_at')->get();
    }

    public function adminPanel()
    {
        abort_unless(auth()->user()?->isAdmin() || auth()->user()?->isPrincipal(), 403);

        return view('dashboard.admin-panel');
    }

    public function systemSettings(): View
    {
        $user = auth()->user();
        abort_unless($user?->canAccessSystemSettings(), 403);

        if ($user->isFaculty()) {
            return view('dashboard.system-settings', [
                'facultyProfileOnly' => true,
                'stats' => [],
                'recentUsers' => collect(),
                'facultyByWing' => collect(),
                'facultyUnassigned' => collect(),
                'directoryReadOnly' => true,
                'showOverview' => false,
            ]);
        }

        abort_if($user->isSectionHead() && ! $user->wing, 403);

        $facultyByWing = collect(Wing::cases())->mapWithKeys(function (Wing $wing) use ($user) {
            if ($user->isSectionHead() && $wing !== $user->wing) {
                return [$wing->value => collect()];
            }

            return [
                $wing->value => User::query()
                    ->where('role', UserRole::Faculty)
                    ->where('wing', $wing)
                    ->with('avatarMedia')
                    ->orderBy('name')
                    ->get(),
            ];
        });

        $facultyUnassigned = collect();
        if ($user->isAdmin() || $user->isPrincipal()) {
            $facultyUnassigned = User::query()
                ->where('role', UserRole::Faculty)
                ->whereNull('wing')
                ->with('avatarMedia')
                ->orderBy('name')
                ->get();
        }

        $stats = [];
        $recentUsers = collect();
        if ($user->canViewSystemSettingsOverview()) {
            $stats = [
                'total_users' => User::count(),
                'section_heads' => User::where('role', UserRole::SectionHead)->count(),
                'faculty' => User::where('role', UserRole::Faculty)->count(),
                'leadership' => User::query()
                    ->whereIn('role', [UserRole::Admin, UserRole::Principal])
                    ->count(),
            ];
            $recentUsers = User::query()
                ->with('avatarMedia')
                ->latest()
                ->limit(10)
                ->get();
        }

        $directoryReadOnly = $user->isSectionHead();

        return view('dashboard.system-settings', [
            'facultyProfileOnly' => false,
            'stats' => $stats,
            'recentUsers' => $recentUsers,
            'facultyByWing' => $facultyByWing,
            'facultyUnassigned' => $facultyUnassigned,
            'directoryReadOnly' => $directoryReadOnly,
            'showOverview' => $user->canViewSystemSettingsOverview(),
        ]);
    }

    public function updateOwnAvatar(Request $request): RedirectResponse
    {
        $request->validate([
            'avatar' => ['required', 'image', 'max:4096'],
        ]);

        $user = $request->user();
        abort_unless($user?->isFaculty(), 403);

        $this->syncAvatarForUser($user, $request->file('avatar'));

        return redirect()->route('systemsettings')->with('status', 'Profile photo updated.');
    }

    private function syncAvatarForUser(User $user, \Illuminate\Http\UploadedFile $file): void
    {
        $user->mediaItems()->where('collection_name', 'avatar')->get()->each(fn (Media $m) => $m->deleteWithFile());

        $path = $file->store('avatars', 'public');

        $user->mediaItems()->create([
            'collection_name' => 'avatar',
            'disk' => 'public',
            'path' => $path,
            'original_filename' => $file->getClientOriginalName(),
            'mime_type' => $file->getClientMimeType(),
            'size' => $file->getSize() ?: null,
            'type' => MediaType::Image,
        ]);
    }

    public function observations(Request $request): View
    {
        $user = $request->user();
        abort_unless($user?->canAccessObservations(), 403);

        $observees = collect();
        if ($user->isAdmin() || $user->isPrincipal()) {
            $observees = User::query()
                ->where('role', UserRole::SectionHead)
                ->with('avatarMedia')
                ->orderBy('name')
                ->get()
                ->concat(
                    User::query()
                        ->where('role', UserRole::Faculty)
                        ->with('avatarMedia')
                        ->orderBy('name')
                        ->get()
                );
        } elseif ($user->isSectionHead()) {
            $observees = User::query()
                ->where('role', UserRole::Faculty)
                ->where('wing', $user->wing)
                ->with('avatarMedia')
                ->orderBy('name')
                ->get();
        }

        $observationQuery = Observation::query()->with(['observer:id,name']);

        if ($user->isSectionHead()) {
            $observationQuery->where('observer_id', $user->id);
        }

        $allObservations = $observationQuery->orderByDesc('created_at')->get();

        $observationsByObservee = $allObservations->groupBy('observee_id');

        $summaryQuery = Observation::query()
            ->selectRaw('observee_id, ROUND(AVG(aggregate_percent)) as avg_score, COUNT(*) as observation_count')
            ->groupBy('observee_id');

        if ($user->isSectionHead()) {
            $summaryQuery->where('observer_id', $user->id);
        }

        $summaries = $summaryQuery->get()->keyBy('observee_id');

        return view('dashboard.observations', [
            'observees' => $observees,
            'summaries' => $summaries,
            'observationsByObservee' => $observationsByObservee,
            'observationDepartments' => User::departmentsForObservationContext(),
            'highlightObserveeId' => $request->filled('observee') ? (int) $request->query('observee') : null,
        ]);
    }

    public function storeObservation(StoreObservationRequest $request): RedirectResponse
    {
        Observation::query()->create([
            'observer_id' => $request->user()->id,
            'observee_id' => $request->validated('observee_id'),
            'aggregate_percent' => $request->validated('aggregate_percent'),
            'sessions_payload' => $request->validated('sessions_payload'),
            'notes' => $request->validated('notes'),
            'observation_wing' => $request->validated('observation_wing'),
            'observation_department' => $request->validated('observation_department'),
        ]);

        return redirect()->route('observations')->with('status', 'Observation recorded successfully.');
    }

    public function updateObservation(UpdateObservationRequest $request, Observation $observation): RedirectResponse
    {
        $observation->update([
            'aggregate_percent' => $request->validated('aggregate_percent'),
            'sessions_payload' => $request->validated('sessions_payload'),
            'notes' => $request->validated('notes'),
            'observation_wing' => $request->validated('observation_wing'),
            'observation_department' => $request->validated('observation_department'),
        ]);

        return redirect()->route('observations')->with('status', 'Observation updated successfully.');
    }
}

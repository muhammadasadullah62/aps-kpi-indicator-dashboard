<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APSACS Khanewal | Portal Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .aps-green { color: #064e3b; }
        .bg-aps-green { background-color: #064e3b; }
        .focus-ring:focus { outline: none; ring: 4px; --tw-ring-color: rgba(6, 78, 59, 0.1); border-color: #064e3b; }
    </style>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-[480px]">
        <div class="flex flex-col items-center mb-10 text-center">
            <div class="w-16 h-16 bg-aps-green rounded-2xl flex items-center justify-center text-white shadow-xl mb-4">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
            </div>
            <h1 class="text-3xl font-black aps-green tracking-tighter uppercase">APSACS Khanewal </h1>
            <p class="text-slate-500 font-bold text-xs uppercase tracking-[0.2em] mt-1">Teacher KPI Portal</p>
        </div>

        <div class="bg-white p-10 rounded-[2.5rem] shadow-2xl border border-slate-200">
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-black text-slate-800">Welcome Back</h2>
                <p class="text-sm text-slate-400 font-medium mt-1">Please enter your institutional credentials.</p>
            </div>

            <form action="#" class="space-y-6">
                <div>
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Employee ID / Email</label>
                    <input type="text" placeholder="e.g. APS-KHN-123" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-semibold transition-all focus:ring-4 focus:ring-emerald-500/10 focus:border-aps-green outline-none">
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block">Password</label>
                        <a href="#" class="text-[10px] font-black text-aps-green uppercase hover:underline tracking-tight">Forgot Password?</a>
                    </div>
                    <input type="password" placeholder="••••••••" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-semibold transition-all focus:ring-4 focus:ring-emerald-500/10 focus:border-aps-green outline-none">
                </div>

                <div class="flex items-center gap-3">
                    <input type="checkbox" id="remember" class="w-5 h-5 rounded-lg border-slate-300 text-aps-green focus:ring-aps-green">
                    <label for="remember" class="text-xs font-bold text-slate-500">Remember this session</label>
                </div>

                <button type="submit" class="w-full py-4 bg-aps-green text-white rounded-2xl font-black text-sm shadow-xl hover:bg-emerald-900 transition-all transform hover:-translate-y-0.5 active:scale-95">
                    Authorize Access
                </button>
            </form>
        </div>

        <p class="text-center mt-10 text-[10px] font-bold text-slate-400 uppercase tracking-[0.3em]">Institutional Grade Security &bull; TLS 1.3</p>
    </div>

</body>
</html>
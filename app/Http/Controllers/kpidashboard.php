<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kpidashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kpidashboard');
    }
    public function quantitativeobservations()
    {
        return view('quantitativeobservations');
    }
    public function academicreports()
    {
        return view('academicreports');
    }
    public function qualitativeobservations()
    {
        return view('qualitativeobservation');
    }
    public function adminpanel()
    {
        return view('adminpanel');
    }
    public function registration()
    {
        return view('registration');
    }
    public function systemsetthings()
    {
        return view('systemsettings');
    }
    public function sechead()
    {
        return view('sechead');
    }
    public function teachermanagement()
    {
        return view('teachermanagement');
    }
    public function observation()
    {
        return view('observation');
    }
    
  




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

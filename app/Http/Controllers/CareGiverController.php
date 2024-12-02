<?php

namespace App\Http\Controllers;

use App\Models\CareGiver;
use App\Http\Requests\StoreCareGiverRequest;
use App\Http\Requests\UpdateCareGiverRequest;

class CareGiverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('CareGiver/CreateCareGiver');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCareGiverRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CareGiver $careGiver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CareGiver $careGiver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCareGiverRequest $request, CareGiver $careGiver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CareGiver $careGiver)
    {
        //
    }
}

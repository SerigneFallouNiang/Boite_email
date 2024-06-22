<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeeRequest;
use App\Http\Requests\UpdateIdeeRequest;
use App\Models\Idee;

class IdeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idees = idee::all();
        return view('idees.index', compact('idees'));
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
    public function store(StoreIdeeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Idee $idee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idee $idee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdeeRequest $request, Idee $idee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idee $idee)
    {
        //
    }
}

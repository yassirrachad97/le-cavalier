<?php

namespace App\Http\Controllers;

use App\Models\Horses;
use App\Http\Requests\StoreHorsesRequest;
use App\Http\Requests\UpdateHorsesRequest;

class HorsesController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHorsesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Horses $horses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horses $horses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHorsesRequest $request, Horses $horses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horses $horses)
    {
        //
    }
}

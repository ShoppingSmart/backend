<?php

namespace Framework\Http\Controllers;

use App\Models\Model;
use App\Http\Request;

interface Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Request
     */
    public function index();

    /**
     * Show the form for creating a new resource.
     *
     * @return App\Http\Request
     */
    public function create();

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request  $request
     * @return App\Http\Request
     */
    public function store(Request $request);

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model  $model
     * @return App\Http\Request
     */
    public function show(Model $model);

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model  $model
     * @return App\Http\Request
     */
    public function edit(Model $model);

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request  $request
     * @param  \App\Models\Model  $model
     * @return App\Http\Request
     */
    public function update(Request $request, Model $model);

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model  $model
     * @return App\Http\Request
     */
    public function destroy(Model $model);
}

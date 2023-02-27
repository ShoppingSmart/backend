<?php

namespace Framework\Http\Controllers;

use App\Http\Request;

interface Index
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): array;
}

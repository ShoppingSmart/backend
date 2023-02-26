<?php

namespace App\Http\Controllers;

use App\Http\Request;
use App\Models\Category;
use Framework\Http\Controllers\Index;

class CategoryController extends Controller implements Index
{
    public function index(Request $request): array
    {
        return Category::newModelInstance()->all();
    }
}

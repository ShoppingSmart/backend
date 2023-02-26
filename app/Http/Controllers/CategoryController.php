<?php

namespace App\Http\Controllers;

use App\Http\Request;
use App\Models\Category;
use Framework\App\Http\Controllers\Index;

class CategoryController implements Index
{
    public function index(Request $request): array
    {
        return Category::newModelInstance()->all();
    }
}

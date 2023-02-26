<?php

namespace App\Http\Controllers;

use App\Http\Request;
use App\Models\Product;
use Framework\Http\Controllers\Index;

class ProductController extends Controller implements Index
{
    public function index(Request $request): array
    {
        return Product::newModelInstance()->all();
    }
}

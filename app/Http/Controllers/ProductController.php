<?php

namespace App\Http\Controllers;

use App\Http\Request;
use Framework\Http\Controllers\Index;

class ProductController extends Controller implements Index
{
    public function index(Request $request): array
    {
        return json_decode(file_get_contents(
            database_path('seeders/products.json')
        ));
    }
}

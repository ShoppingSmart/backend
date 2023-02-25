<?php

namespace App\Http\Controllers;

use App\Http\Request;

class ProductController implements Controller
{
    public function index(Request $request): array
    {
        return json_decode(file_get_contents(
            database_path('seeders/products.json')
        ));
    }
}

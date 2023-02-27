<?php

namespace App\Http\Controllers;

use App\Http\Request;
use App\Models\Product;
use Exception;
use Framework\Http\Controllers\Index;
use Throwable;

class ProductController extends Controller implements Index
{
    protected const HTTP_ERROR = 'The server cannot process the request because the client did not provide the required field "%s". Please ensure that all required fields are filled out before submitting the request again.';

    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Request
     */
    public function index(Request $request): array
    {
        return Product::newModelInstance()->all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Request
     */
    public function store(Request $request): array
    {
        $payload = $request->all();

        if (empty($payload->name)) {
            throw new Exception(
                sprintf(self::HTTP_ERROR, 'name')
            );
        }

        if (empty($payload->price)) {
            throw new Exception(
                sprintf(self::HTTP_ERROR, 'price')
            );
        }

        if (empty($payload->image)) {
            throw new Exception(
                sprintf(self::HTTP_ERROR, 'image')
            );
        }

        if (empty($payload->category_id)) {
            throw new Exception(
                sprintf(self::HTTP_ERROR, 'category')
            );
        }

        try {
            $primaryKey = Product::newModelInstance()->create([
                'name' => $payload->name,
                'price' => $payload->price * 100,
                'image' => $payload->image,
                'category_id' => $payload->category_id
            ]);

            return [
                'id' => $primaryKey
            ];
        } catch (Throwable $e) {
            throw $e;
        }
    }
}

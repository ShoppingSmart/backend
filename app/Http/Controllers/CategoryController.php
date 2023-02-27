<?php

namespace App\Http\Controllers;

use App\Http\Request;
use App\Models\Category;
use Exception;
use Framework\Http\Controllers\Index;
use Throwable;

class CategoryController extends Controller implements Index
{
    protected const HTTP_ERROR = 'The server cannot process the request because the client did not provide the required field "%s". Please ensure that all required fields are filled out before submitting the request again.';

    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Request
     */
    public function index(Request $request): array
    {
        return Category::newModelInstance()->all();
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

        if (empty($payload->tax)) {
            throw new Exception(
                sprintf(self::HTTP_ERROR, 'tax')
            );
        }

        if (empty($payload->image)) {
            throw new Exception(
                sprintf(self::HTTP_ERROR, 'image')
            );
        }

        try {
            $primaryKey = Category::newModelInstance()->create([
                'name' => $payload->name,
                'tax' => $payload->tax,
                'image' => $payload->image
            ]);

            return [
                'id' => $primaryKey
            ];
        } catch (Throwable $e) {
            throw $e;
        }
    }
}

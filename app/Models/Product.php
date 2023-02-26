<?php

namespace App\Models;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected string $table = 'products';

    public function __construct()
    {
        $this->boot();
    }
}

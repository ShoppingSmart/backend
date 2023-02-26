<?php

namespace App\Models;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected string $table = 'categories';

    public function __construct()
    {
        $this->boot();
    }
}

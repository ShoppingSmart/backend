<?php

namespace App\Models;

class Order extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected string $table = 'orders';

    public function __construct()
    {
        $this->boot();
    }
}

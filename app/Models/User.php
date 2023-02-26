<?php

namespace App\Models;

class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected string $table = 'users';

    public function __construct()
    {
        $this->boot();
    }
}

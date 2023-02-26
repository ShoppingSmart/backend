<?php

namespace Database\Seeders;

use Framework\Contracts\Seeder;

class DatabaseSeeder
{
    public static function run(): void
    {
        (new ProductSeeder())->run();
    }
}

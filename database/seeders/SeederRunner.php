<?php

namespace Database\Seeders;

class SeederRunner
{
    public static function run(): void
    {
        (new ProductSeeder())->run();
    }
}

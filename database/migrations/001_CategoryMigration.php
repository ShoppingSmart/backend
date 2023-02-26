<?php

return [
    'name' => 'categories',
    'schema' => [
        [
            'name' => 'id',
            'definition' => 'serial PRIMARY KEY',
        ],
        [
            'name' => 'name',
            'definition' => 'VARCHAR ( 255 ) UNIQUE NOT NULL',
        ],
        [
            'name' => 'image',
            'definition' => 'VARCHAR ( 255 ) UNIQUE NOT NULL',
        ],
        [
            'name' => 'tax',
            'definition' => 'INT NOT NULL'
        ],
    ]
];

<?php

return [
    'name' => 'products',
    'schema' => [
        [
            'name' => 'id',
            'definition' => 'serial PRIMARY KEY'
        ],
        [
            'name' => 'name',
            'definition' => 'VARCHAR ( 255 ) UNIQUE NOT NULL'
        ],
        [
            'name' => 'image',
            'definition' => 'VARCHAR ( 255 ) NOT NULL',
        ],
        [
            'name' => 'price',
            'definition' => 'INT NOT NULL',
        ],
        [
            'name' => 'category_id',
            'definition' => 'INT NOT NULL',
        ],
        [
            'name' => '',
            'definition' => 'FOREIGN KEY (category_id) REFERENCES categories (id)'
        ],
    ]
];

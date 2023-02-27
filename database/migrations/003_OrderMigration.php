<?php

return [
    'name' => 'orders',
    'schema' => [
        [
            'name' => 'id',
            'definition' => 'serial PRIMARY KEY'
        ],
        [
            'name' => 'created_at',
            'definition' => 'DATE NOT NULL DEFAULT CURRENT_DATE'
        ]
    ]
];

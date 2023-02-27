<?php

return [
    'name' => 'order_products',
    'schema' => [
        [
            'name' => 'id',
            'definition' => 'serial PRIMARY KEY',
        ],
        [
            'name' => 'order_id',
            'definition' => 'INT NOT NULL'
        ],
        [
            'name' => 'product_id',
            'definition' => 'INT NOT NULL',
        ],
        [
            'name' => '',
            'definition' => 'FOREIGN KEY (order_id) REFERENCES orders (id)'
        ],
        [
            'name' => '',
            'definition' => 'FOREIGN KEY (product_id) REFERENCES products (id)'
        ],
    ]
];

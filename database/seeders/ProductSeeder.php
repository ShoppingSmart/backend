<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Framework\Contracts\Seeder;

class ProductSeeder implements Seeder
{
    private array $categories = [
        [
            "name" => "Fresh produce",
            "products" => [
                "Apple",
                "Banana",
                "Carrot",
                "Lettuce",
                "Tomato"
            ]
        ],
        [
            "name" => "Meat and poultry",
            "image" => "https://img.freepik.com/free-photo/arrangement-with-raw-turkey-tray_23-2148652132.jpg",
            "products" => [
                "Chicken breast",
                "Ground beef",
                "Pork chop",
                "Salmon fillet",
            ]
        ],
        [
            "name" => "Seafood",
            "products" => [
                "Shrimp",
                "Tuna",
                "Tilapia"
            ]
        ],
        [
            "name" => "Dairy products",
            "image" => "https://img.freepik.com/free-photo/milk-products-wooden-table_144627-42470.jpg",
            "products" => [
                "Milk",
                "Cheese",
                "Yogurt"
            ]
        ],
        [
            "name" => "Bread and bakery items",
            "products" => [
                "Whole wheat bread",
                "Bagel",
                "Croissant"
            ]
        ],
        [
            "name" => "Canned and preserved goods",
            "image" => "https://img.freepik.com/free-photo/jars-with-preserved-food-assortment_23-2149239013.jpg",
            "products" => [
                "Canned beans",
                "Canned corn",
                "Tomato sauce"
            ]
        ],
        [
            "name" => "Frozen foods",
            "products" => [
                "Frozen vegetables",
                "Frozen pizza",
                "Ice cream"
            ]
        ],
        [
            "name" => "Snacks and candy",
            "products" => [
                "Chips",
                "Cookie",
                "Candy bar"
            ]
        ],
        [
            "name" => "Beverages",
            "products" => [
                "Bottled water",
                "Soft drink",
                "Fruit juice"
            ]
        ],
        [
            "name" => "Cleaning supplies",
            "products" => [
                "All-purpose cleaner",
                "Glass cleaner",
                "Dish soap"
            ]
        ],
        [
            "name" => "Personal care items",
            "products" => [
                "Toothpaste",
                "Shampoo",
                "Soap",
                "Deodorant"
            ]
        ],
        [
            "name" => "Baby products",
            "products" => [
                "Diaper",
                "Baby food",
                "Baby wipes"
            ]
        ],
        [
            "name" => "Pet food and supplies",
            "products" => [
                "Dog food",
                "Cat food",
                "Cat litter"
            ]
        ],
        [
            "name" => "Household items",
            "products" => [
                "Paper towel",
                "Toilet paper",
                "Trash bag"
            ]
        ],
        [
            "name" => "Condiments and spices",
            "products" => [
                "Ketchup",
                "Mustard",
                "Salt",
                "Pepper"
            ]
        ],
    ];

    const DEFAULT = 'https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg';

    public function run(): void
    {
        foreach ($this->categories as $category) {
            $instance = new Category();
            $id = $instance->create([
                'name' => $category['name'],
                'image' => $category['image'] ?? self::DEFAULT,
                'tax' => rand(1, 100)
            ]);

            foreach ($category["products"] as $product) {
                $instance2 = new Product();
                $instance2->create([
                    'name' => $product,
                    'category_id' => $id
                ]);
            }
        }
    }
}

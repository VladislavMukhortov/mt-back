<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($this->faker));



        return [
            'name' => $this->faker->productName,
            'category_id' => $this->faker->numberBetween(1, 2),
            'description' => $this->faker->realText(100, 2),
            'price' => $this->faker->numberBetween(100, 1000),
            'items_left' => $this->faker->numberBetween(50, 150),
            'content' => $this->faker->realText(400, 2),
        ];
    }
}

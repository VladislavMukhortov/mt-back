<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

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
            'description' => $this->faker->realText(100, 2),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            Item::FIELD_NAME => $this->faker->name,
            Item::FIELD_DESCRIPTION => $this->faker->sentence,
            Item::FIELD_COL1 => $this->faker->title,
            Item::FIELD_COL2 => $this->faker->title,
            Item::FIELD_COL3 => $this->faker->title,
            Item::FIELD_BALANCE => $this->faker->numberBetween(1000,1000000)
        ];
    }
}

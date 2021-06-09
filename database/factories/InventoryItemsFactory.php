<?php

namespace Database\Factories;

use App\Models\InventoryItems;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryItemsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InventoryItems::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            InventoryItems::FIELD_INVENTORY_ID => $this->faker->numberBetween(1,100),
            InventoryItems::FIELD_BALANCE => $this->faker->numberBetween(1000,1000000)
        ];
    }
}

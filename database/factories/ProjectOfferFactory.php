<?php

namespace Database\Factories;

use App\Models\ProjectOffer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectOfferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProjectOffer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            ProjectOffer::FIELD_PROJECT_NAME => $this->faker->catchPhrase,
            ProjectOffer::FIELD_CLIENT => $this->faker->company,
            ProjectOffer::FIELD_PO => $this->faker->name,
            ProjectOffer::FIELD_OFFER_REFERENCE_NO => $this->faker->randomDigitNotNull,
            ProjectOffer::FIELD_OFFER_DATE => $this->faker->dateTime,
        ];
    }
}

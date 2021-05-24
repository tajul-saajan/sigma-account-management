<?php

namespace Database\Factories;

use App\Models\ProjectOffer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

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
            ProjectOffer::FIELD_PROJECT_NAME => $this->faker->catchPhrase(),
            ProjectOffer::FIELD_CLIENT => $this->faker->company(),
            ProjectOffer::FIELD_PO => $this->faker->name(),
            ProjectOffer::FIELD_OFFER_REFERENCE_NO => $this->faker->randomDigitNotNull(),
            ProjectOffer::FIELD_OFFER_DATE => $this->faker->dateTime(),
            ProjectOffer::FIELD_PO_AMOUNT_WITH_VAT => $this->faker->numberBetween(10000,1000000),
            ProjectOffer::FIELD_PO_STATUS => $this->getRandomStatus(),
            ProjectOffer::FIELD_TRACKING_NO_ROBI => $this->faker->randomNumber(),
            ProjectOffer::FIELD_POC_NAME => $this->faker->name(),
            ProjectOffer::FIELD_POC_CONTACT => $this->faker->phoneNumber(),
            ProjectOffer::FIELD_AIT => $this->faker->numberBetween(1000,20000),
            ProjectOffer::FIELD_SUB_CONTRACT => $this->getYesNO(),
            ProjectOffer::FIELD_AMC_TYPE => $this->getYesNO(),


        ];
    }

    public function getRandomStatus(){
        $randomNumber = $this->faker->numberBetween(1,5);
        return $this->statuses[$randomNumber];
    }

    public function getYesNO(){
        $randomNumber = $this->faker->numberBetween(1,2);
        return $this->yesNo[$randomNumber];
    }

    private $yesNo = [
        1 => 'Yes',
        2 => 'No'
    ];

    private $statuses = [
        1 => 'PO Pending',
        2 => 'PO Received',
        3 => 'eBill Submitted',
        4 => 'Hard Copy Submitted',
        5 => 'Money received',
    ];
}

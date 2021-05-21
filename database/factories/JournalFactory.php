<?php

namespace Database\Factories;

use App\Models\Journal;
use Illuminate\Database\Eloquent\Factories\Factory;

class JournalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Journal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            Journal::FIELD_TRANSACTION_DATE => $this->faker->dateTime(),
            Journal::FIELD_DESCRIPTION => $this->faker->title,
            Journal::FIELD_DEBIT_ACCOUNT => $this->faker->title,
            Journal::FIELD_CREDIT_ACCOUNT => $this->faker->title,
            Journal::FIELD_REFERENCE => $this->faker->name,
            Journal::FIELD_ADJUSTED_ENTRY => $this->faker->creditCardNumber,
            Journal::FIELD_SUB_PROJECT => $this->faker->catchPhrase,
            Journal::FIELD_AMOUNT => $this->faker->numberBetween(1000,10000000),
            Journal::FIELD_INVOICE_NO => $this->faker->bankAccountNumber,
            Journal::FIELD_LAST_UPDATE_TIME => $this->faker->dateTime,
            Journal::FIELD_INSERTED_BY => $this->faker->firstName,
            Journal::FIELD_UPDATED_BY => $this->faker->firstName,
        ];
    }
}

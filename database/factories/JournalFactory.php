<?php

namespace Database\Factories;

use App\Models\ChartOfAccount;
use App\Models\Journal;
use App\Models\SubProject;
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
        $debitAcc = $this->getCOA();
        $creditAcc = $this->getCOA();
        $subProj = $this->getSubProject();

        return [
            Journal::FIELD_TRANSACTION_DATE => $this->faker->dateTime(),
            Journal::FIELD_DESCRIPTION => $this->faker->title(),
            Journal::FIELD_DEBIT_ACCOUNT_ID => $debitAcc[0],
            Journal::FIELD_DEBIT_ACCOUNT_NAME => $debitAcc[1],
            Journal::FIELD_CREDIT_ACCOUNT_ID => $creditAcc[0],
            Journal::FIELD_CREDIT_ACCOUNT_NAME => $creditAcc[1],
            Journal::FIELD_REFERENCE_1 => $this->faker->name(),
            Journal::FIELD_REFERENCE_2 => $this->faker->name(),
            Journal::FIELD_ADJUSTED_ENTRY => $this->faker->creditCardNumber(),
            Journal::FIELD_SUB_PROJECT_ID => $subProj[0],
            Journal::FIELD_SUB_PROJECT_NAME => $subProj[1],
            Journal::FIELD_AMOUNT => $this->faker->numberBetween(1000, 10000000),
            Journal::FIELD_INVOICE_NO => $this->faker->bankAccountNumber(),
            Journal::FIELD_LAST_UPDATE_TIME => $this->faker->dateTime(),
            Journal::FIELD_INSERTED_BY => $this->faker->firstName(),
            Journal::FIELD_UPDATED_BY => $this->faker->firstName(),
        ];
    }

    private function getCOA()
    {
        $coaCount = ChartOfAccount::all()->count();
        $random = $this->faker->numberBetween(1,$coaCount);
        $gl_name =  ChartOfAccount::find($random)->gl_name;

        return [$random,$gl_name];
    }

    private function getSubProject()
    {
        $subProjectCount = SubProject::all()->count();
        $random = $this->faker->numberBetween(1,$subProjectCount);
        $name =  SubProject::find($random)->name;

        return [$random,$name];
    }
}

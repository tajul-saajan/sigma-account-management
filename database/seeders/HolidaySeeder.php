<?php

namespace Database\Seeders;

use App\Models\PublicHoliday;
use Illuminate\Database\Seeder;

class HolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PublicHoliday::create([
            PublicHoliday::FIELD_DATE=> "2021-07-20",
            PublicHoliday::FIELD_DESCRIPTION=>"Eid-ul-Azha",
        ]);

        PublicHoliday::create([
            PublicHoliday::FIELD_DATE=> "2021-07-21",
            PublicHoliday::FIELD_DESCRIPTION=>"Eid-ul-Azha",
        ]);

        PublicHoliday::create([
            PublicHoliday::FIELD_DATE=> "2021-07-22",
            PublicHoliday::FIELD_DESCRIPTION=>"Eid-ul-Azha",
        ]);

        PublicHoliday::create([
            PublicHoliday::FIELD_DATE=> "2021-07-23",
            PublicHoliday::FIELD_DESCRIPTION=>"Eid-ul-Azha",
        ]);

        PublicHoliday::create([
            PublicHoliday::FIELD_DATE=> "2021-08-15",
            PublicHoliday::FIELD_DESCRIPTION=>"National Mourning Day",
        ]);

        PublicHoliday::create([
            PublicHoliday::FIELD_DATE=> "2021-08-19",
            PublicHoliday::FIELD_DESCRIPTION=>"Ashura",
        ]);

        PublicHoliday::create([
            PublicHoliday::FIELD_DATE=> "2021-08-30",
            PublicHoliday::FIELD_DESCRIPTION=>"Janmashtami",
        ]);

        PublicHoliday::create([
            PublicHoliday::FIELD_DATE=> "2021-10-15",
            PublicHoliday::FIELD_DESCRIPTION=>"Durga Puja",
        ]);

        PublicHoliday::create([
            PublicHoliday::FIELD_DATE=> "2021-10-19",
            PublicHoliday::FIELD_DESCRIPTION=>"Eid-e-Miladun-Nabi",
        ]);

        PublicHoliday::create([
            PublicHoliday::FIELD_DATE=> "2021-12-16",
            PublicHoliday::FIELD_DESCRIPTION=>"Victory Day",
        ]);

        PublicHoliday::create([
            PublicHoliday::FIELD_DATE=> "2021-12-25",
            PublicHoliday::FIELD_DESCRIPTION=>"Christmas Day",
        ]);
    }
}

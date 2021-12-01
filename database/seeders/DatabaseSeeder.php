<?php

namespace Database\Seeders;

use App\Models\Prefecture;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PrefectureSeeder::class,
            CitySeeder::class,
            PostCodeSeeder::class,
            StreetSeeder::class,
            CompanySeeder::class,
            StationSeeder1::class,
            StationSeeder2::class,
            StationSeeder3::class,
            StationSeeder4::class,
            StationSeeder5::class,
            StationSeeder6::class,
            StationSeeder7::class,
            StationSeeder8::class,
            StationSeeder9::class,
            StationSeeder10::class,
            StationSeeder11::class,
            StationSeeder12::class,
            StationSeeder13::class,
            StationSeeder14::class,
            StationSeeder15::class,
            StationSeeder16::class,
            StationSeeder17::class,
            StationSeeder18::class,
            StationSeeder19::class,
            StationSeeder20::class,
            StationSeeder21::class,
            StationSeeder22::class,
            StationSeeder23::class,
            StationSeeder24::class,
            StationSeeder25::class,
            StationSeeder26::class,
            StationSeeder27::class,
            StationSeeder28::class,
            StationSeeder29::class,
            StationSeeder30::class,
            StationSeeder31::class,
            StationSeeder32::class,
            StationSeeder33::class,
            StationSeeder34::class,
            StationSeeder35::class,
            StationSeeder36::class,
            StationSeeder37::class,
            StationSeeder38::class,
            StationSeeder39::class,
            StationSeeder40::class,
            StationSeeder41::class,
            StationSeeder42::class,
            StationSeeder43::class,
            StationSeeder44::class,
            StationSeeder45::class,
            StationSeeder46::class,
            StationSeeder47::class,
            LineSeeder::class,
            LineStationSeeder::class,
        ]);
    }
}

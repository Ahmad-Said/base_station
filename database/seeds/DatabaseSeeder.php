<?php

use App\AntennasProvider;
use App\AntennasBandsProvider;
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
        $this->call(UsersTableSeeder::class);
        $this->call(XgBandsTableSeeder::class);
        $this->call(SettingWebLaraSeeder::class);
        $this->call(AntennasBandsProvider::provideDataToAntennasBands());
        $this->call(AntennasProvider::provideDataToAntennas());
    }
}

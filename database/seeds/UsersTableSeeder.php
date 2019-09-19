<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create(
            [
                'name'     => 'admin',
                'email'    => 'admin@admin.com',
                'password' => Hash::make('admin@admin.com'),
                'type'     => 'admin',
                'is_activated' => '1'
            ]
        );
    }
}

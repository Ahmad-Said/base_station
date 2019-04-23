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
                'email'    => 'mohamad.naji@ahmad.said.com',
                'password' => Hash::make('123321'),
                'type'     => 'admin',
                'is_activated' => '1'
            ]
        );
    }
}

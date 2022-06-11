<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class userr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Satria Wibawa',
            'email' => 'wibawasatria68@gmail.com',
            'password' => Hash::make('satria'),
        ]);
    }
}

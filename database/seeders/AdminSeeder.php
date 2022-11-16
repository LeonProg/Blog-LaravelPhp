<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insertOrIgnore([
            'id' => 1000,
            'name' => 'Admin',
            'email' => 'admin@email.ru',
            'password' => Hash::make('passworD'),
            'is_admin' => '1',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'is_admin' => '1',
                'password' => bcrypt('admin123'),
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'is_admin' => '0',
                'password' => bcrypt('user1234'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
        // DB::table('users')->insert([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'is_admin' => '1',
        //     'password' => Hash::make('admin123'),
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'user',
        //     'email' => 'user@gmail.com',
        //     'is_admin' => '0',
        //     'password' => Hash::make('user1234'),
        // ]);
    }
}

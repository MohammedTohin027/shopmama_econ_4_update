<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            'name' => 'Admin vai',
            'role_id' => 1,
            'email' => 'xyz@gmail.com',
            'image' => 'uploads/profile/avater.jpg',
            'password' => Hash::make('00000000'),
        ];
        User::insert($users);
    }
}

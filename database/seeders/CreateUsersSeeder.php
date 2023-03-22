<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Developer Access',
               'email'=>'developer@bfarpayroll.com',
               'type'=>1,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'otherUser',
               'email'=>'other@bfarpayroll.com',
               'type'=> 2,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'HR Access',
               'email'=>'hr@bfarpayroll.com',
               'type'=>0,
               'password'=> bcrypt('123456'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}

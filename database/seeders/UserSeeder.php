<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "user_name" => "Omar Samir",
                "user_email" => "samir@editor.com",
                "user_password" => bcrypt('123456'),
                "user_status" => 1
            ],
            [
                "user_name" => "Mohamed Ashraf",
                "user_email" => "tokhy@user.com",
                "user_password" => bcrypt('123456'),
                "user_status" => 1
            ],
            [
                "user_name" => "Ahmed Yasser",
                "user_email" => "ahmed@user.com",
                "user_password" => bcrypt('123456'),
                "user_status" => 0
            ]
        ];
        foreach($users as $user)
            User::create($user);

        $user1 = User::where('user_id',1)->first();
        $user1->syncRoles('Admin','Editor');

        $user2 = User::where('user_id',2)->first();
        $user2->syncRoles('Editor');
        
        $user3 = User::where('user_id',3)->first();
        $user3->syncRoles('User');
    }
}

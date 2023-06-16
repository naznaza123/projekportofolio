<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $user = [
            [
                'name'=>'admin1',
                'username'=>'admnz',
                'password' => bcrypt('123456'),
                'level'=> 1,
                'email'=>'naza@gmail.com'
            ],
            [
                'name'=>'admin2',
                'username'=>'admasa',
                'password' => bcrypt('1234567'),
                'level'=> 1,
                'email'=>'asa@gmail.com'
            ]

            ];
            foreach($user as $key => $value) {
                User::create($value);
            }
    }

}

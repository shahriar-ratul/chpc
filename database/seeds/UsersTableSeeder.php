<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'ratul',
            'email' => 'ratul@gmail.com',
            'password' => bcrypt('525100'),
            'status'=>'1'
        ]);
         User::create([
                'name' => 'ratul',
                'email' => 'ratul794@gmail.com',
                'password' => bcrypt('525100'),
                'status'=>'1'
        ]);
         User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'status'=>'1'
            
        ]);
    }
}

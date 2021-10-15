<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'role'=>'admin',
            'password'=>bcrypt('12345678')
        ]);
        User::create([
            'name'=>'Ceo',
            'email'=>'ceo@gmail.com',
            'role'=>'ceo',
            'password'=>bcrypt('12345678')
        ]);
    }
}

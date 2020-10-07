<?php

use Illuminate\Database\Seeder;

use activofijo\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
        	'name' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('123456789')
        ]);
        $admin->assignRole('super-admin');
    }
}

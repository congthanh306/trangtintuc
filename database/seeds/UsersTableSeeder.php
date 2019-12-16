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
    	DB::table('users')->insert(
    		[
    			'name' => 'Nguyen Cong Thanh',
    			'email' => 'thanh3061997@gmail.com',
    			'password' => Hash::make('password'),
    			'remember_token' => str_random(10),
    		]
    	);

    }
}

<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		
        User::create([
            'first_name' => 'Chibueze',
            'last_name' => 'Opata',
            'user_bio' => 'Calm and Collected',
            'user_phone' => '+2348099636703',
            'email' => 'opatachibueze@gmail.com',
            'password' => Hash::make('revolution'),
			]);
            
            

	}

}
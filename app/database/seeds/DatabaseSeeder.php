<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('ApiUsersSeeder');
        $this->call('ProductOptionsSeeder');
        $this->call('ProductVariantsSeeder');
        $this->call('ProductVariantValuesSeeder');
	}

}

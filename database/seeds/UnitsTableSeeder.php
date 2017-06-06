<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	    DB::table('units')->insert([
		            ['name' => 'Goal'],
		            ['name' => 'Run'],
		            ['name' => 'Point'],
			    ['name' => 'Time'],
			    ['name' => 'Distance'],
			    ['name' => 'Height']

		    ]);
    }
}

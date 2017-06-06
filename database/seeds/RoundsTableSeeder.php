<?php

use Illuminate\Database\Seeder;

class RoundsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('rounds')->insert([
		            ['name' => 'FINAL', 'shortname' => 'F' , 'description' => 'Finalist', 'type' => '1', 'participants' => '2' ],
		            ['name' => 'SEMI-FINAL', 'shortname' => 'SF' , 'description' => 'Semi-Finalist', 'type' => '1', 'participants' => '4' ],
		            ['name' => 'QUARTER-FINAL', 'shortname' => 'QF' , 'description' => 'Quarter-Finalist', 'type' => '1', 'participants' => '8' ],
		            ['name' => 'First Round', 'shortname' => 'R1' , 'description' => 'KO', 'type' => '1', 'participants' => '' ],
		            ['name' => 'Second Round', 'shortname' => 'R2' , 'description' => 'KO', 'type' => '1', 'participants' => '' ],
		            ['name' => 'Third Round', 'shortname' => 'R3' , 'description' => 'KO', 'type' => '1', 'participants' => '' ],
		            ['name' => 'Fourth Round', 'shortname' => 'R4' , 'description' => 'KO', 'type' => '1', 'participants' => '' ],
		            ['name' => 'League', 'shortname' => 'L' , 'description' => 'League', 'type' => '0', 'participants' => '' ],
		            ['name' => 'Group Stage', 'shortname' => 'Group' , 'description' => 'Group', 'type' => '0', 'participants' => '' ]
		    ]);
        
    }
}

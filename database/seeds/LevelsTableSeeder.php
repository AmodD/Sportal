<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
	    DB::table('levels')->insert([
		            ['name' => 'Under - 18', 'shortname' => 'U-18' , 'description' => 'Under 18 years of age'],
		            ['name' => 'Under - 19', 'shortname' => 'U-19' , 'description' => 'Under 19 years of age'],
		            ['name' => 'Under - 20', 'shortname' => 'U-20' , 'description' => 'Under 20 years of age'],
		            ['name' => 'Under - 21', 'shortname' => 'U-21' , 'description' => 'Under 21 years of age'],
		            ['name' => 'Under - 5', 'shortname' => 'U-5' , 'description' => 'Under 5 years of age'],
		            ['name' => 'Under - 6', 'shortname' => 'U-6' , 'description' => 'Under 6 years of age'],
		            ['name' => 'Under - 7', 'shortname' => 'U-7' , 'description' => 'Under 7 years of age'],
		            ['name' => 'Under - 8', 'shortname' => 'U-8' , 'description' => 'Under 8 years of age'],
		            ['name' => 'Under - 9', 'shortname' => 'U-9' , 'description' => 'Under 9 years of age'],
		            ['name' => 'Under - 10', 'shortname' => 'U-10' , 'description' => 'Under 10 years of age'],
		            ['name' => 'Under - 11', 'shortname' => 'U-11' , 'description' => 'Under 11 years of age'],
		            ['name' => 'Under - 12', 'shortname' => 'U-12' , 'description' => 'Under 12 years of age'],
		            ['name' => 'Under - 13', 'shortname' => 'U-13' , 'description' => 'Under 13 years of age'],
		            ['name' => 'Under - 14', 'shortname' => 'U-14' , 'description' => 'Under 14 years of age'],
		            ['name' => 'Under - 15', 'shortname' => 'U-15' , 'description' => 'Under 15 years of age'],
		            ['name' => 'Under - 16', 'shortname' => 'U-16' , 'description' => 'Under 16 years of age'],
		            ['name' => 'Under - 17', 'shortname' => 'U-17' , 'description' => 'Under 17 years of age'],
		            ['name' => 'Seniors', 'shortname' => 'Seniors' , 'description' => ''],
		            ['name' => 'Inter-University', 'shortname' => 'Univ' , 'description' => 'University level competitions'],
		            ['name' => 'Inter-School', 'shortname' => 'School' , 'description' => 'School level competitions'],
		            ['name' => 'Inter-College', 'shortname' => 'College' , 'description' => 'College level competitions'],
		            ['name' => 'Zilla Parishad', 'shortname' => 'ZP' , 'description' => 'ZP level competitions'],
		            ['name' => 'District', 'shortname' => 'District' , 'description' => 'District level competitions'],
		            ['name' => 'State', 'shortname' => 'State' , 'description' => 'State level competitions'],
		            ['name' => 'Nationals', 'shortname' => 'Nationals' , 'description' => 'National level competitions']
		    ]);
    }
}

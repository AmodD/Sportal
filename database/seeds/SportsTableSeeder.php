<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class SportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	$athletics = collect([
		[ "name" => "100m" , "individual" => 1, "squad" => 0 ,"competitors" => 0 ],
		[ "name" => "800m" , "individual" => 1, "squad" => 0 ,"competitors" => 0 ],
		[ "name" => "High Jump" , "individual" => 1, "squad" => 0 ,"competitors" => 0 ],
		[ "name" => "Pole Vault" , "individual" => 1, "squad" => 0 ,"competitors" => 0 ],
		[ "name" => "Long Jump" , "individual" => 1, "squad" => 0 ,"competitors" => 0 ],
		[ "name" => "10K" , "individual" => 1, "squad" => 0 ,"competitors" => 0 ],
		[ "name" => "4x400m" , "individual" => 0, "squad" => 0 ,"competitors" => 0 ]
	]);
	$hockey = collect([
		[ "name" => "" , "individual" => 0, "squad" => 1 ,"competitors" => 1 ],
		[ "name" => "5-a-side" , "individual" => 0, "squad" => 1 ,"competitors" => 1 ]
	]);
	$tennis = collect([
		[ "name" => "singles" , "individual" => 1, "squad" => 0 , "competitors" => 1 ],
		[ "name" => "doubles" , "individual" => 0, "squad" => 0 ,"competitors" => 1 ]
	]);
	$cricket = collect([
		[ "name" => "T20" , "individual" => 0, "squad" => 1 ,"competitors" => 1 ],
		[ "name" => "Test" , "individual" => 0, "squad" => 1 ,"competitors" => 1 ],
		[ "name" => "ODI" , "individual" => 0, "squad" => 1 ,"competitors" => 1 ]
	]);
	$badminton = collect([
		[ "name" => "singles" , "individual" => 1, "squad" => 0 ,"competitors" => 1 ],
		[ "name" => "doubles" , "individual" => 0, "squad" => 0 ,"competitors" => 1 ]
	]);
	$football = collect([
		[ "name" => "" , "individual" => 0, "squad" => 1 ,"competitors" => 1 ],
		[ "name" => "Beach Soccer" , "individual" => 0, "squad" => 1 ,"competitors" => 1 ],
		[ "name" => "Hotfut" , "individual" => 0, "squad" => 1 ,"competitors" => 1 ]
	]);

	$sports = collect([
		[ "name" => "Athletics", "formats" =>  $athletics],
		[ "name" => "Hockey", "formats" =>  $hockey],
		[ "name" => "Tennis", "formats" =>  $tennis],
		[ "name" => "Cricket", "formats" =>  $cricket],
		[ "name" => "Badminton", "formats" =>  $badminton],
		[ "name" => "Football", "formats" =>  $football]
	]);

//	    DB::table('sports')->insert([
//		            ['name' => 'Athletics'],
//		            ['name' => 'Hockey'],
//		            ['name' => 'Tennis'],
//		            ['name' => 'Cricket']
//		    ]);

	    foreach($sports as $sport)
	    {

		$formats = $sport["formats"];
		$sportid = factory(App\Sport::class)->create(["name" => $sport["name"] ])->id;

		foreach($formats as $format)
		{
			factory(App\Format::class)->create([
				"name" => $format['name'],
				"sport_id" => $sportid,
				"individual" => $format['individual'],
				"squad" => $format['squad'],
				"competitors" => $format['competitors']	
			]);
		}
	    }


        //factory(App\Sport::class)->firstOrCreate([ 'name' => 'Athletics' ]);
        //factory(App\Sport::class)->firstOrCreate([ 'name' => 'Football' ]);
        //factory(App\Sport::class)->firstOrCreate([ 'name' => 'Table Tennis' ]);
        //factory(App\Sport::class)->firstOrCreate([ 'name' => 'Volleyball' ]);
        //factory(App\Sport::class)->firstOrCreate([ 'name' => 'Cricket' ]);
        //factory(App\Sport::class)->firstOrCreate([ 'name' => 'Hockey' ]);
	//factory(App\Sport::class)->firstOrCreate([ 'name' => 'Badminton' ]);
        //factory(App\Sport::class)->firstOrCreate([ 'name' => 'Tennis' ]);
    }
}

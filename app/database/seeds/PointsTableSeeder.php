<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PointsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Point::create([
                'latitude'   => $faker->latitude,
                'longitude'  => $faker->longitude,
                'geom'  => DB::raw("ST_SetSRID(ST_MakePoint(longitude, latitude), 4326)")
			]);
		}
	}

}
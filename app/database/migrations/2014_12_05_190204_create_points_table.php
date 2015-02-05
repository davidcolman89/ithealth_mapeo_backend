<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointsTable extends Migration {

    protected $table = "points";

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (!Schema::hasTable($this->table))
        {
            Schema::create($this->table, function($table)
            {
                $table->increments('id');
                $table->float('longitude');
                $table->float('latitude');
                $table->timestamps();
                DB::raw("ALTER TABLE points ADD COLUMN geom GEOMETRY(POINT, 4326)");
            });



        }
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        if (Schema::hasTable($this->table))
        {
            Schema::drop($this->table);
        }
	}

}

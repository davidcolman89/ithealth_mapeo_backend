<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrailsTable extends Migration {

	protected $table = "trails";


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
                $table->timestamps();
            });

            DB::raw("ALTER TABLE trails ADD COLUMN trail GEOMETRY(POINT, 4326)");

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

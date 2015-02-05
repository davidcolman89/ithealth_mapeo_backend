<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHighlightsTable extends Migration {

	protected $table = 'highlights';


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
                $table->integer('trail_id');
                $table->string('type');
                $table->timestamps();
            });

            DB::raw("ALTER TABLE highlights ADD COLUMN location GEOMETRY(POINT, 4326)");

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

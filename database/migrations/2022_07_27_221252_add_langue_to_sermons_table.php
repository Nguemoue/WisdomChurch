<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLangueToSermonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sermons', function (Blueprint $table) {
            //
			$table->enum("langue",["francais","anglais","billingue"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sermons', function (Blueprint $table) {
            //
			$table->dropColumn("langue");
        });
    }
}

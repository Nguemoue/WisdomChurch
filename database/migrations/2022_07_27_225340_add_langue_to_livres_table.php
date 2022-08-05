<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLangueToLivresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('livres', function (Blueprint $table) {
            //
			$table->set("langue",["francais","anglais","billingue"])->nullable(true)->default("francais");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('livres', function (Blueprint $table) {
            //remove the langue attribute
			$table->removeColumn("langue");
        });
    }
}

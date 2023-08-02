<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('testimonies', function (Blueprint $table) {
            $table->id();
            $table->string("content");
            $table->string("author");
            $table->string("photo_url")->nullable()->default(defaultPoster("testimonies"));
            $table->string("profession")->default("Pastor");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonies');
    }
};

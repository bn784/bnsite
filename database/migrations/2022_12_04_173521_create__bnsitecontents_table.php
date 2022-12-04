<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBnsitecontentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bnsitecontents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable()->unique();
			$table->string('content_en')->nullable();
			$table->string('content_ru')->nullable();
			$table->string('content_ua')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bnsitecontents');
    }
}

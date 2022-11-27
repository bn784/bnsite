<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBnsiteContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BnsiteContents', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('title')->nullable()->unique();
			$table->string('content_en')->nullable();
			$table->string('content_ru');
			$table->string('content_ua');
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
        Schema::dropIfExists('BnsiteContents');
    }
}

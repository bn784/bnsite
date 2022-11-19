<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGatesColumnsToRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->integer('management_access')->nullable()->default(0);
            $table->integer('user_access')->nullable()->default(0);
            $table->integer('user_create')->nullable()->default(0);
            $table->integer('user_edit')->nullable()->default(0);
            $table->integer('user_view')->nullable()->default(0);
            $table->integer('user_delete')->nullable()->default(0);
            $table->integer('role_access')->nullable()->default(0);
            $table->integer('role_create')->nullable()->default(0);
            $table->integer('role_edit')->nullable()->default(0);
            $table->integer('role_view')->nullable()->default(0);
            $table->integer('role_delete')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('management_access');
			$table->dropColumn('user_access');
			$table->dropColumn('user_edit');
			$table->dropColumn('user_view');
			$table->dropColumn('user_delete');
			$table->dropColumn('role_access');
			$table->dropColumn('role_create');
			$table->dropColumn('role_edit');
			$table->dropColumn('role_view');
			$table->dropColumn('role_delete');
        });
    }
}

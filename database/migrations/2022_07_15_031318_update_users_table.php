<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->increments('id')->change();
            $table->string('user_name');
            $table->integer('role')->nullable();
            $table->datetime('d_o_b')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->dropColumn('user_name');
            $table->dropColumn('role');
            $table->dropColumn('d_o_b');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('deleted_at');
        });
    }
}

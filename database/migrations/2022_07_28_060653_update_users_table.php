<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('position')->after('email')->nullable();;
            $table->string('address')->after('position')->nullable();;
            $table->string('city')->after('address')->nullable();;
            $table->string('ZIPcode')->after('city')->nullable();;
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
            $table->dropColumn('position');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('ZIPcode');
        });
    }
};

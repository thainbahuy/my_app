<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('PRODUCT', function (Blueprint $table) {
            //$table->string('test')->nullable();
            //Schema::dropColumn('test');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('PRODUCT', function (Blueprint $table) {
            $table->dropColumn('test');
        });
    }
}

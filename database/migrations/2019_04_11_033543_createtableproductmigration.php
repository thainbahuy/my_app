<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Createtableproductmigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PRODUCT', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string('Name')->nullable();
            $table->string('Title')->nullable();
            $table->bigInteger('Price')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
         // Insert some stuff
        DB::table('PRODUCT')->insert(
            array(
                'Name' => 'iphone 7',
                'Title' => 'phone',
                'Price' => 899999,
                'created_at' => '2019-4-11',
                'updated_at' => '2019-4-11'
        ));

        DB::table('PRODUCT')->insert(
            array(
                'Name' => 'iphone 8',
                'Title' => 'phone',
                'Price' => 9000000,
                'created_at' => '2019-4-11',
                'updated_at' => '2019-4-11'
            )
        );
        DB::table('PRODUCT')->insert(
            array(
                'Name' => 'iphone xs',
                'Title' => 'phone',
                'Price' => 1000000,
                'created_at' => '2019-4-11',
                'updated_at' => '2019-4-11'
            )
        );


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PRODUCT');
    }
}

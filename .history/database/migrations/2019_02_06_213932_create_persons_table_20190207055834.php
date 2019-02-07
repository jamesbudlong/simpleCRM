<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        down();
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_number', 50)->nullable(false);
            $table->string('first_name', 50)->nullable(false);
            $table->string('last_name', 50)->nullable(false);
            $table->integer('customer_category')->unsigned();;
            $table->foreign('customer_category')->references('id')->on('customer_categories');
            $table->integer('responsible_seller')->unsigned();;
            $table->foreign('responsible_seller')->references('id')->on('users');
            $table->text('general_comment');
            $table->string('mailing_address', 150);
            $table->string('ma_zip_code', 50);
            $table->string('ma_place', 100);
            $table->string('ma_country', 100);
            $table->string('visiting_address', 150);
            $table->string('va_zip_code', 50);
            $table->string('va_place', 100);
            $table->string('va_country', 100);
            $table->string('email', 50);
            $table->string('website', 50);
            $table->string('telephone', 30);
            $table->string('mobile', 50);
            $table->string('fax', 50);
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
        Schema::dropIfExists('persons');
    }
}

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
        Schema::dropIfExists('persons');
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_number', 50)->nullable(false);
            $table->string('first_name', 50)->nullable(false);
            $table->string('last_name', 50)->nullable(false);
            $table->integer('customer_category')->unsigned();
            $table->foreign('customer_category')->references('id')->on('customer_categories');
            $table->integer('responsible_seller')->unsigned();
            $table->foreign('responsible_seller')->references('id')->on('users');
            $table->text('general_comment')->nullable(true);
            $table->string('mailing_address', 150)->nullable(true);
            $table->string('ma_zip_code', 50)->nullable(true);
            $table->string('ma_place', 100)->nullable(true);
            $table->string('ma_country', 100)->nullable(true);
            $table->string('visiting_address', 150)->nullable(true);
            $table->string('va_zip_code', 50)->nullable(true);
            $table->string('va_place', 100)->nullable(true);
            $table->string('va_country', 100)->nullable(true);
            $table->string('email', 50)->nullable(true);
            $table->string('website', 50)->nullable(true);
            $table->string('telephone', 30)->nullable(true);
            $table->string('mobile', 50)->nullable(true);
            $table->string('fax', 50)->nullable(true);
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

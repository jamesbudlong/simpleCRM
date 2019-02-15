<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('customers');
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_number', 50);
            $table->string('customer_type', 30);
            //for persons
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            //for company
            $table->string('company_name', 100);
            $table->string('company_number', 50);
            $table->string('industry', 100);
            $table->string('company_type', 100);
            //same fields for both
            $table->integer('customer_category');
            $table->integer('responsible_seller');
            $table->text('general_comment')->nullable();
            $table->string('mailing_address', 150)->nullable();
            $table->string('ma_zip_code', 50)->nullable();
            $table->string('ma_place', 100)->nullable();
            $table->string('ma_country', 100)->nullable();
            $table->string('visiting_address', 150)->nullable();
            $table->string('va_zip_code', 50)->nullable();
            $table->string('va_place', 100)->nullable();
            $table->string('va_country', 100)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('website', 50)->nullable();
            $table->string('telephone', 30)->nullable();
            $table->string('mobile', 50)->nullable();
            $table->string('fax', 50)->nullable();
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
        Schema::dropIfExists('customers');
    }
}

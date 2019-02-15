<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_number',
        'customer_type',
        //for persons
        'first_name',
        'last_name',
        //for company
        'company_name',
        'company_number',
        'industry',
        'company_type',
        //for both
        'customer_category',
        'responsible_seller',
        'general_comment',
        'mailing_address',
        'ma_zip_code',
        'ma_place',
        'ma_country',
        'visiting_address',
        'va_zip_code',
        'va_place',
        'va_country',
        'email',
        'website',
        'telephone',
        'mobile',
        'fax'
    ];

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
            $table->string('customer_number', 50)->nullable();
            $table->string('customer_type', 30);
            //for persons
            $table->string('first_name', 50)->nullable();
            $table->string('last_name', 50)->nullable();
            //for company
            $table->string('company_name', 100)->nullable();
            $table->string('company_number', 50)->nullable();
            $table->string('industry', 100)->nullable();
            $table->string('company_type', 100)->nullable();
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

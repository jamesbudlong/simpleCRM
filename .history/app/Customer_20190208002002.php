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
        'customer_details_id',
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
            $table->string('customer_number', 50);
            $table->string('customer_type', 30);
            $table->integer('customer_details_id');
            $table->integer('customer_category')->unsigned();
            $table->foreign('customer_category')->references('id')->on('customer_categories');
            $table->integer('responsible_user')->unsigned();
            $table->foreign('responsible_user')->references('id')->on('users');
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
        Schema::dropIfExists('customers');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CustomerCategory;

class CustomerCategory extends Model
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_categories', function (Blueprint $table) {
            $table->increments('category');
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
        Schema::drop('customer_categories');
    }
}

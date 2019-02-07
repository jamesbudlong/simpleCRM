<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
        'organization_number',
        'industry',
        'company_type'
    ];

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
            $table->string('company_name', 100);
            $table->string('organization_number', 50);
            $table->string('industry', 100);
            $table->string('company_type', 100);
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

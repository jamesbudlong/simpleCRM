<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pipeline extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'name',
        'status',
        'expected',
        'probability',
        'responsible_seller',
        'value',
        'description',
        'created_by',
        'updated_by'
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('pipelines');
        Schema::create('pipelines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->string('name')->nullable();
            $table->string('status')->nullable();
            $table->string('expected')->nullable();
            $table->string('probability')->nullable();
            $table->integer('responsible_seller');
            $table->integer('value')->nullable();
            $table->text('description')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('pipelines');
    }
}

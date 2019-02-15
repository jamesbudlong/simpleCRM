<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'responsible_seller',
        'status',
        'priority',
        'decay',
        'comment',
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
        Schema::dropIfExists('tasks');
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->string('responsible_seller', 50)->nullable();
            $table->string('status', 50)->nullable();
            $table->string('priority', 50)->nullable();
            $table->string('decay', 50)->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}

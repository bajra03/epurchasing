<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{

    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pr_id')->unsigned();
            $table->foreign('pr_id')->references('id')->on('purchase_requests')->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('price');
            $table->integer('top');
            $table->string('payment_method');
            $table->integer('garantee');
            
            $table->double('k1', 15, 8)->nullable();
            $table->double('k2', 15, 8)->nullable();
            $table->double('k3', 15, 8)->nullable();
            $table->double('k4', 15, 8)->nullable();
            $table->double('k5', 15, 7)->nullable();
            $table->double('score', 15, 8)->nullable();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('quotations');
    }
}

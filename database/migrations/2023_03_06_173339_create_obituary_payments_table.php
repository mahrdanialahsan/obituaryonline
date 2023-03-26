<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObituaryPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obituary_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('payment_id');
            $table->integer('user_id');
            $table->string('obituary_id');
            $table->enum('status',['in','out'])->default('in');
            $table->double('donar_amount')->default(0);
            $table->double('service_charges')->default(0);
            $table->double('service_charges_amount')->default(0);
            $table->double('amount')->default(0);
            $table->string('currency');
            $table->string('payment_recipt')->nullable();
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
        Schema::dropIfExists('obituary_payments');
    }
}

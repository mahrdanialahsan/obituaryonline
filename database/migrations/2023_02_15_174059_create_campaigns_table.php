<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->string('deceased_name');
            $table->date('date_of_birth');
            $table->timestamp('date_of_death');
            $table->string('wake_location')->nullable();
            $table->integer('wake_period')->nullable();
            $table->timestamp('funeral_date')->nullable();
            $table->string('funeral_location')->nullable();
            $table->string('surviving_family')->nullable();
            $table->string('deceased_picture')->nullable();
            $table->string('death_certificate')->nullable();
            $table->longText('message')->nullable();
            $table->tinyInteger('status')->nullable()->comment("0: Pending, 1:Approved,2:Deactivated");
            $table->integer('created_by');
            $table->integer('approved_by')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('campaigns');
    }
}

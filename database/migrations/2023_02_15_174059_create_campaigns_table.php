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
            $table->string('deceased_first_name');
            $table->string('deceased_last_name');
            $table->string('nric');
            $table->date('date_of_birth');
            $table->timestamp('date_of_death');
            $table->string('wake_location')->nullable();
            $table->text('wake_location_json')->nullable();
            $table->integer('wake_period')->nullable();
            $table->timestamp('funeral_date')->nullable();
            $table->string('funeral_location')->nullable();
            $table->text('funeral_location_json')->nullable();
            $table->longText('surviving_family')->nullable();
            $table->string('deceased_picture')->nullable();
            $table->string('death_certificate')->nullable();
            $table->longText('message')->nullable();
            $table->longText('poa_wills')->nullable();
            $table->tinyInteger('public_donation')->default(1)->comment("0: No, 1:Yes");
            $table->tinyInteger('status')->nullable()->comment("null:draft, 0: Pending, 1:Approved,2:Deactivated");
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

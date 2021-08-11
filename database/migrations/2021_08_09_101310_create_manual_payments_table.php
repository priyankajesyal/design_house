<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManualPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manual_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('proposal_id')->unsigned();
            $table->bigInteger('milestone_id')->unsigned();
            $table->string('amount')->nullable();
            $table->enum('status',['Accept','Decline','Pending']);
            $table->enum('type', ['Manual', 'Stripe']);
            $table->string('receipt');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('proposal_id')->references('id')->on('proposals')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('milestone_id')->references('id')->on('milestones')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('manual_payments');
    }
}
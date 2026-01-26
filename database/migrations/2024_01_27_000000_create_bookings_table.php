<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('inspiration_websites')->nullable();
            $table->text('notes')->nullable();
            $table->string('budget');
            $table->string('currency')->default('USD');
            $table->string('consultation_method');
            $table->date('preferred_date');
            $table->string('preferred_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};

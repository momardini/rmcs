<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('nurse_id')->nullable()->constrained('users','id')->nullOnDelete()->cascadeOnUpdate();
            $table->unsignedDouble('systolic_blood_pressure')->nullable();
            $table->unsignedDouble('diastolic_blood_pressure')->nullable();
            $table->unsignedDouble('heartbeat')->nullable();
            $table->unsignedDouble('temperature')->nullable();
            $table->unsignedDouble('weight')->nullable();
            $table->unsignedDouble('length')->nullable();
            $table->unsignedDouble('waistline')->nullable();
            $table->unsignedDouble('breathing')->nullable();
            $table->unsignedDouble('oxygen')->nullable();
            $table->unsignedDouble('peak_expiratory_flow')->nullable();
            $table->unsignedDouble('sugar')->nullable();
            $table->json('female_status')->nullable();
            $table->json('skins')->nullable();
            $table->json('ecg')->nullable();
            $table->json('docs')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('signs');
    }
};

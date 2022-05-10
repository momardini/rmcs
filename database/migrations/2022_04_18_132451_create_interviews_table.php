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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->longText('clinical_examination')->nullable();
            $table->longText('impression')->nullable();
            $table->longText('action_request')->nullable();
            $table->longText('xray_request')->nullable();
            $table->longText('note')->nullable();
            $table->longText('discovered')->nullable();
            $table->json('docs')->nullable();
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
        Schema::dropIfExists('interviews');
    }
};

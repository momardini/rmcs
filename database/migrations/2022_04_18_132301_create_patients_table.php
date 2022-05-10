<?php

use App\Enums\City;
use App\Enums\GenderType;
use App\Enums\MaritalType;
use App\Enums\PatientStatus;
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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->text('full_name');
            $table->date('birth');
            $table->integer('status')->default(PatientStatus::READY);
            $table->integer('city')->default(City::IDLIB);
            $table->text('address')->nullable();
            $table->integer('gender')->default(GenderType::MALE);
            $table->integer('marital')->default(MaritalType::SINGLE);
            $table->integer('children')->nullable();
            $table->string('phone')->nullable();
            $table->integer('blood_group')->nullable();
            $table->string('birth_place')->nullable();
            $table->text('work')->nullable();
            $table->json('previous_diseases')->nullable();
            $table->json('family_diseases')->nullable();
            $table->text('previous_surgery')->nullable();
            $table->text('previous_accidents')->nullable();
            $table->text('allergies')->nullable();
            $table->text('disabilities')->nullable();
            $table->foreignId('station_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
};

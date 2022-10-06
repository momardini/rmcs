<?php

use App\Enums\AppointmentStatus;
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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('doctor_id')->nullable()->constrained('users','id')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('reception_id')->nullable()->constrained('users','id')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('station_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('status')->default(AppointmentStatus::NEW_APPOINTMENT);
            $table->foreignId('clinic_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->timestamp('login_time')->nullable();
            $table->text('complaint')->nullable();
            $table->json('docs')->nullable();
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
        Schema::dropIfExists('appointments');
    }
};

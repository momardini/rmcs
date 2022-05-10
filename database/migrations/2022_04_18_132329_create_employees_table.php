<?php

use App\Enums\ScheduleType;
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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('mobile')->nullable();
            $table->text('address')->nullable();
            $table->text('specialist')->nullable();
            $table->text('education')->nullable();
            $table->text('work')->nullable();
            $table->text('photo')->nullable();
            $table->unsignedDouble('salary')->default(1);
            $table->integer('schedule_type')->default(ScheduleType::DAILY);
            $table->json('docs')->nullable();
            $table->integer('vacation')->default(0);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('employees');
    }
};

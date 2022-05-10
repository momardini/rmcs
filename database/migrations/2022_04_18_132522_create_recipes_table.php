<?php

use App\Enums\PharmaceuticalForm;
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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('interview_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->longText('medicine_title');
            $table->integer('repeats')->default(\App\Enums\RepeatType::ONE_ONCE);
            $table->integer('pharmaceutical_form')->default(PharmaceuticalForm::PILLS);
            $table->integer('count');
            $table->longText('note')->nullable();
            $table->integer('consume')->nullable();
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
        Schema::dropIfExists('recipes');
    }
};

<?php

use App\Enums\FemaleStatus;
use App\Enums\GenderType;
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
        Schema::create('analytic_references', function (Blueprint $table) {
            $table->id();
            $table->foreignId('analytic_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('gender')->default(GenderType::NOT_DEFINED);
            $table->integer('female_status')->default(FemaleStatus::NOT_DEFINED);
            $table->double('min')->nullable();
            $table->double('max')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('analytic_references');
    }
};

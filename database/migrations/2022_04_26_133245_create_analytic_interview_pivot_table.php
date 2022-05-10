<?php

use App\Models\Analytic;
use App\Models\Interview;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analytic_interview', function (Blueprint $table) {
            $table->foreignIdFor(Analytic::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Interview::class)->constrained()->onDelete('cascade');
            $table->primary(['analytic_id', 'interview_id']);

            $table->index('analytic_id');
            $table->index('interview_id');
            $table->longText('result')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analytic_interview');
    }
};

<?php

use App\Models\Employee;
use App\Models\WeekDay;
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
        Schema::create('employee_week_day', function (Blueprint $table) {
            $table->foreignIdFor(Employee::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(WeekDay::class)->constrained()->onDelete('cascade');
            $table->primary(['employee_id', 'week_day_id']);

            $table->index('employee_id');
            $table->index('week_day_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_week_day');
    }
};

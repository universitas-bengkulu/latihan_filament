<?php

use App\Models\Job;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('first_name',255);
            $table->string('last_name',255);
            $table->string('email',255);
            $table->date('hire_date');
            $table->bigInteger('salary')->default(0);
            $table->double('commission_pct')->nullable();
            $table->foreignIdFor(Job::class)->constrained();
            $table->foreignIdFor(Department::class)->constrained();
            $table->foreignIdFor(Employee::class)->nullable();
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

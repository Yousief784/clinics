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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('certificate');
            $table->string('clinic_license');
            $table->string('clinic_address');
            $table->integer('governorate_id');
            $table->foreign('governorate_id')->references('governorate_id')->on('governorates')->cascadeOnDelete();
            $table->integer('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnDelete();
            $table->foreignId('major_id')->nullable()->constrained('majors')->nullOnDelete();
            $table->float('pay_to_doctor');
            $table->float('sum_pay_to_doctor')->default(0);
            $table->string('holidays')->nullable();
            $table->time('start_at');
            $table->time('end_at');
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
        Schema::dropIfExists('doctors');
    }
};

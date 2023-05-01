<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('institution_name');
            $table->string('field_of_study');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('education_logo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('educations');
    }
};

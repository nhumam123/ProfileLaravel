<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('profile_image_path');
            $table->text('summary');
            $table->text('expertise');
            $table->string('email')->unique();
            $table->date('birthday');
            $table->string('contact_number', 20)->nullable();
        });

        DB::table('profiles')->insert([
            'name' => 'Naufal Humam Risqullah Pujianputra',
            'profile_image_path' => '',
            'summary' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'expertise' => 'Computer Science Student',
            'email' => 'naufal.pujianputra@example.com',
            'birthday' => '1990-01-01',
            'contact_number' => '1234567890'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};

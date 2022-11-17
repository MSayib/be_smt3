<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status_id')->constrained(); //Untuk join ke table status
            $table->string('name');
            $table->string('phone');
            $table->text('address');
            // $table->string('status'); //Saya menghilangkan ini untuk normalisasi dengan table Status
            $table->date('in_date_at');
            $table->date('out_date_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
};

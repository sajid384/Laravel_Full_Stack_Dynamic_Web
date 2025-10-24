<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->json('fields'); // Yeh fields JSON format mein store hongi
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('feedbacks');
    }
};

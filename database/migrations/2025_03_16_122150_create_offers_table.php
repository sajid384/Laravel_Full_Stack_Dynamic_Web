<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Offer title (e.g. Tasty Thursdays)
            $table->integer('discount'); // Discount percentage
            $table->string('image'); // Image path
            $table->boolean('deleted')->default(0); // 0 = Not Deleted, 1 = Deleted
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('offers');
    }
};


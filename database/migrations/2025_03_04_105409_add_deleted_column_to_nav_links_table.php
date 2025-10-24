<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('nav_links', function (Blueprint $table) {
            $table->boolean('deleted')->default(0); // Default 0 (not deleted)
        });
    }

    public function down()
    {
        Schema::table('nav_links', function (Blueprint $table) {
            $table->dropColumn('deleted');
        });
    }
};


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->boolean('deleted')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropColumn('deleted');
        });
    }
    
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seo_properties', function (Blueprint $table) {
            $table->id();
            $table->enum('pageName',['home','resume','projects','contact']);
            $table->string('title',50);
            $table->string('keywords',500);
            $table->text('description');
            $table->string('ogSiteName',100);
            $table->string('ogUrl');
            $table->string('ogTitle');
            $table->string('ogDescription');
            $table->string('ogImage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_properties');
    }
};

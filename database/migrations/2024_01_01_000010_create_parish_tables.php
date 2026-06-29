<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('event_date')->nullable();
            $table->string('time')->nullable();
            $table->string('venue')->nullable();
            $table->timestamps();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body')->nullable();
            $table->string('icon')->nullable();
            $table->string('date_label')->nullable();
            $table->timestamps();
        });

        Schema::create('mass_schedule', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // weekly, holyday, office
            $table->string('col1');
            $table->string('col2')->nullable();
            $table->string('col3')->nullable();
            $table->timestamps();
        });

        Schema::create('sacraments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('label')->nullable();
            $table->text('description')->nullable();
            $table->string('img')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('gallery', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('caption')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // document, faith, devotion
            $table->string('title');
            $table->string('url')->nullable();
            $table->string('icon')->nullable();
            $table->string('col2')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resources');
        Schema::dropIfExists('gallery');
        Schema::dropIfExists('sacraments');
        Schema::dropIfExists('mass_schedule');
        Schema::dropIfExists('news');
        Schema::dropIfExists('events');
    }
};

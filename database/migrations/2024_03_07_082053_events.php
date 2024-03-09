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
        Schema::create(
            'events',
            function (Blueprint $table)
            {
                $table->id();
                $table->string('title');
                $table->text('description');
                $table->string('city_name');
                $table->integer('price');
                $table->integer('places_available');
                $table->date('date');
                $table->foreignId('category_id')->constrained()->onDelete('cascade');
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->boolean('validated');
                $table->enum('acceptation_method', ['auto', 'manual']);
                $table->boolean('deleted')->default(false);
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

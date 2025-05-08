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
        // Eliminar las tablas no utilizadas
        Schema::dropIfExists('restaurants');
        Schema::dropIfExists('menu_items');
        Schema::dropIfExists('health_goals');
        Schema::dropIfExists('fitness_integrations');
        Schema::dropIfExists('dietary_preferences');
        Schema::dropIfExists('allergies');
        Schema::dropIfExists('recommendations');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Recrear las tablas en caso de rollback
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id('restaurantId');
            $table->string('name');
            $table->string('location');
            $table->float('rating');
            $table->timestamps();
        });

        Schema::create('menu_items', function (Blueprint $table) {
            $table->id('itemID');
            $table->string('name');
            $table->float('price');
            $table->text('ingredients');
            $table->json('dietaryTags');
            $table->timestamps();
        });

        Schema::create('health_goals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('goal_type');
            $table->float('target_weight');
            $table->date('target_date');
            $table->timestamps();
        });

        Schema::create('fitness_integrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('integration_type');
            $table->string('api_key');
            $table->timestamps();
        });

        Schema::create('dietary_preferences', function (Blueprint $table) {
            $table->id('restrictionID');
            $table->string('type');
            $table->text('description');
            $table->string('preference');
            $table->json('excludedingredients');
            $table->timestamps();
        });

        Schema::create('allergies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('allergy_type');
            $table->string('severity');
            $table->timestamps();
        });

        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('actiontype');
            $table->unsignedBigInteger('reference_id');
            $table->timestamp('recommended_at')->useCurrent();
            $table->timestamps();
        });
    }
}; 
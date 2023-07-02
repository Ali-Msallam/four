<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToFavRecipesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('fav_recipes', function (Blueprint $table) {
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('recipes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('recipe_id')
                ->references('id')
                ->on('recipes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fav_recipes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['recipe_id']);
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateNotesTable
 */
class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table): void {
            $table->increments('id');
            $table->unsignedInteger('postal_id')->nullable()->index();
            $table->unsignedInteger('author_id')->nullable()->index();
            $table->string('slug')->unique();
            $table->string('titel'); 
            $table->string('beschrijving');
            $table->timestamps();

            // Foreign keys 
            $table->foreign('author_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('postal_id')->references('id')->on('postals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
}

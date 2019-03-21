<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * CreateArticlesTable
 */
class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table): void {
            $table->increments('id');
            $table->unsignedInteger('author_id')->nullable();
            $table->string('titel');
            $table->boolean('status');
            $table->text('content');
            $table->timestamps();

            // Foreign keys
            $table->foreign('author_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
}

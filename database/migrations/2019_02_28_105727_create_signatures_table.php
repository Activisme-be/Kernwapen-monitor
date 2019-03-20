<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSignaturesTable
 */
class CreateSignaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('signatures', function (Blueprint $table): void {
            $table->increments('id');
            $table->unsignedInteger('postal_id')->index();
            $table->timestamps();

            // Foreign keys 
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
        Schema::dropIfExists('signatures');
    }
}

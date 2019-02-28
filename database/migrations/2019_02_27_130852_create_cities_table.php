<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCitiesTable 
 */
class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table): void {
            $table->increments('id');
            $table->unsignedInteger('postal_id')->nullable()->index();
            $table->unsignedInteger('province_id')->nullable()->index();
            $table->string('naam'); 
            $table->string('lat'); 
            $table->string('lng'); 
            $table->timestamps();

            // Foreign keys 
            $table->foreign('postal_id')->references('id')->on('postals')->onDelete('set null');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
}

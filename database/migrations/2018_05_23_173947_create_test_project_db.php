<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestProjectDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CarsBrands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('brand', 50);
        });

        Schema::create('CarsModels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('brandID');
            $table->string('model', 50);

            $table->foreign('brandID')->references('id')->on('CarsBrands')->onDelete('cascade');
        });

        Schema::create('ModelGeneration', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('modelID');
            $table->string('generation', 255);

            $table->foreign('modelID')->references('id')->on('CarsModels')->onDelete('cascade');
        });

        Schema::create('SparePartCategory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category', 100);
        });

        Schema::create('SpareParts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categoryID');
            $table->string('description', 255)->nullable();

            $table->foreign('categoryID')->references('id')->on('SparePartCategory')->onDelete('cascade');
        });

        Schema::create('ModelSpareParts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('generationID');
            $table->unsignedBigInteger('sparePartID');

            $table->foreign('generationID')->references('id')->on('ModelGeneration')->onDelete('cascade');
            $table->foreign('sparePartID')->references('id')->on('SpareParts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

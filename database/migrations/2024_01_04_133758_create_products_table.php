<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
         //   $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->unsignedBigInteger('price');
            $table->string('slug');
            $table->text('description');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->integer('quantity');
            $table->string('image')->nullable();
            $table->unsignedInteger('disprice')->nullable();
            $table->timestamps();

           // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('major_category_id')
                ->index();
            $table->foreign('major_category_id')
                ->references('id')
                ->on('major_categories')
                ->onDelete('cascade');

            $table->unsignedInteger('category_id')
                ->nullable()
                ->index();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->string('name');
            $table->string('description');
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->string('image')->nullable();
            $table->text('image_group')->nullable();
            $table->integer('sort')->default(0);
            $table->longText('content');
            $table->unsignedInteger('clicks')->default(0);
            $table->timestamps();
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
}

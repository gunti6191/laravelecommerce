<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onUpdate('restrict')->onDelete('restrict');
            $table->foreignId('brand_id')->constrained('brands')->onUpdate('restrict')->onDelete('restrict');
            $table->string('name');
            $table->string('slug');
            $table->text('short_description');
            $table->integer('rating');
            $table->enum('status', ['active', 'inactive']);
            $table->decimal('price', $precision = 10, $scale = 2);
            $table->decimal('cost_price', $precision = 10, $scale = 2);
            $table->string('is_discount_available');
            $table->decimal('discount_price', $precision = 10, $scale = 2);
            $table->softDeletes();
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

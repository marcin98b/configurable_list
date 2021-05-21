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
            $table->string('name');
            //$table->text('description')->nullable();
            //$table->string('img_filepath')->nullable();
            //$table->boolean('is_public')->default(FALSE);
            $table->foreignId('list_id')->nullable()->constrained()->onDelete('cascade');
            //$table->foreignId('user_id')->constrained();
            $table->boolean('ticked')->default(FALSE);
            $table->foreignId('shop_category_id')->nullable()->constrained()->onDelete('SET NULL');
            //$table->foreignId('list_category_id')->nullable()->constrained()->onDelete('SET NULL');
            $table->foreignId('custom_product_id')->nullable()->constrained()->onDelete('SET NULL');
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

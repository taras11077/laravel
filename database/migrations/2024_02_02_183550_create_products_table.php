<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->float('price');
			$table->string('image')->nullable();
			$table->text('description')->nullable();

			//// создание поля внешнего ключа и связивание таблиц
			//$table->unsignedBigInteger('category_id')->nullable();
			//// связивание таблиц по внешнему ключу
			//$table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
			//// или
			//$table->foreignIdFor(Category::class);

			//// или

			$table->foreignId('category_id')
			->nullable()
            ->constrained()
            ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

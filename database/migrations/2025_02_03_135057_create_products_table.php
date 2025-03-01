<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title',200);
            $table->string('slug',400);
            $table->integer('quantity');
            $table->longText('description')->nullable();
            $table->boolean('published')->default(0);
            $table->boolean('inStock')->default(0);
            $table->decimal('price',10,2);

            $table->foreignIdFor(User::class, 'created_by')->nullable();
            $table->foreignIdFor(User::class, 'updated_by')->nullable();

            $table->foreignIdFor(Brand::class, 'brand_id')->nullable();
            $table->foreignIdFor(Category::class, 'category_id')->nullable();
            $table->softDeletes();
            $table->foreignIdFor(User::class,'deleted_by')->nullable();
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('products');
    }
};

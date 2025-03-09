<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductListController extends Controller
{
    public function index()
    {
        // Build the base query with related models
        $productsQuery = Product::with('category', 'brand', 'product_images');

        // Apply filters (including search by title) and paginate results
        $filterProducts = $productsQuery->filtered()->paginate(9);

        // Get all categories and brands for filter options
        $categories = Category::all();
        $brands = Brand::all();
        
        return Inertia::render('User/ProductList', [
            'categories' => $categories,
            'brands'     => $brands,
            'products'   => ProductResource::collection($filterProducts)
        ]);
    }
}

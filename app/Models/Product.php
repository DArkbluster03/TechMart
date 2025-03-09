<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Define the relationship with Category
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    // Define the relationship with Brand
    public function brand()
    {
        return $this->belongsTo(\App\Models\Brand::class);
    }

    // Define the relationship with ProductImage (if applicable)
    public function product_images()
    {
        return $this->hasMany(\App\Models\ProductImage::class);
    }

    /**
     * Scope a query to apply filters.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFiltered($query)
    {
        // Search by product title if provided
        if (request()->filled('title')) {
            $query->where('title', 'like', '%' . request()->get('title') . '%');
        }

        // Filter by brands (expects an array of brand IDs)
        if (request()->has('brands') && is_array(request()->get('brands')) && count(request()->get('brands')) > 0) {
            $query->whereIn('brand_id', request()->get('brands'));
        }

        // Filter by categories (expects an array of category IDs)
        if (request()->has('categories') && is_array(request()->get('categories')) && count(request()->get('categories')) > 0) {
            $query->whereIn('category_id', request()->get('categories'));
        }

        // Filter by prices (expects an array with 'from' and 'to' keys)
        if (request()->has('prices')) {
            $prices = request()->get('prices');
            if (isset($prices['from']) && isset($prices['to'])) {
                $query->whereBetween('price', [$prices['from'], $prices['to']]);
            }
        }

        return $query;
    }
}

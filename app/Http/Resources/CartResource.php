<?php

namespace App\Http\Resources;

use App\Helper\Cart;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    public function toArray( $request): array
    {
        [$products, $cartItems] = $this->resource;
        return [
            'count' => Cart::getCount(),
            'total' => $products->reduce(fn (?float $carry, Product $product) => $carry + $product->price * $cartItems[$product->id]['quantity']),
            'items' => $cartItems,
            'products' => ProductResource::collection($products),
        ];

    }
}

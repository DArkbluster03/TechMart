<?php

namespace App\Http\Middleware;

use App\Helper\Cart;
use App\Http\Resources\CartResource;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
  
    protected $rootView = 'app';

   
     
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    
    public function share(Request $request): array
{
    return array_merge(parent::share($request), [
        'auth' => [
            'user' => $request->user(),
        ],
        'ziggy' => fn () => array_merge((new Ziggy)->toArray(), [
            'location' => $request->url(),
        ]),
        'cart' => new CartResource(Cart::getProductsAndCartItems()),
        'flash' => [
            'success' => fn () => $request->session()->get('success'),
            'error' => fn () => $request->session()->get('error'),
            'warning' => fn () => $request->session()->get('warning'),
            'info' => fn () => $request->session()->get('info'),
        ],
        'canLogin' => app('router')->has('login'),
        'canRegister' => app('router')->has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
}

}
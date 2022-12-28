<?php

namespace App\Http\Livewire\User;

use App\Models\Product;
use App\Models\User;

use Illuminate\Http\Request;
use Livewire\Component;

class Cart extends Component
{

    protected $listeners = ['cart_changed' => 'render'];


    public function render()
    {
        $cart = auth()->user()->product;

        return view('livewire.user.cart', [
            'cart' => $cart,
            
        ]);
    }
}

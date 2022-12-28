<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class CartCounter extends Component
{

    protected $listeners = ['cart_updated' => 'render'];


    public function render()
    {
        $cartCounter =   auth()->user()  ?
            auth()->user()->product->count()
            : null;


        return view('livewire.user.cart-counter', [
            'cartCounter' => $cartCounter

        ]);
    }
}

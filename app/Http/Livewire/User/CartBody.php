<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;

class CartBody extends Component
{
    public $cart ;
    public array $amount= [];
    public array $cartProducts =[];
    public $cartProduct;
   
    public function mount($cartProduct)
    {
          $user = auth()->user();

            $this->cartProducts[$cartProduct->id] =$cartProduct;
            $this->amount[$cartProduct->id] =$user->product->find($cartProduct->id)->pivot->amount;
    }

    public function render()
    {

        return view('livewire.user.cart-body');
    }

    
    public function delete($productID)
    {
             
        if (auth()->user()) {
            $user = User::find(auth()->user()->id);

            if ($user->product()->find($productID)){
                $user->product()->detach($productID);
              unset( $this->cartProducts[$productID] );
        
            }

            $this->emit('cart_updated');
            $this->emit('cart_changed');
        }
       
    }

    public function edit($productId)
    {
        $product=   $this->cartProduct=Product::find($productId);

           if($this->amount[$product->id] >$product->amount ||$this->amount[$product->id] <1 || $this->amount[$product->id] == null)
           $this->addError('amount', 'the number must be greater than 0. Any number higher than the available amount will be ignored and set to the available amount');
           else{
            $user = User::find(auth()->user()->id);
            $user->product->find($product->id)->pivot->amount = $this->amount[$product->id] ;
            $user->product->find($product->id)->pivot->save();
         
           }    
    }
}

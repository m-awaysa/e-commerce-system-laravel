<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class CartProduct extends Component
{
  public  $product;
  public $classes;
  public $buttonName;

  public function mount($product)
  {

    $this->product = $product;
  }

  public function render()
  {
    return view('livewire.cart-product');
  }

  public function add($productId)
  {

    if (auth()->user()) {
      $user = User::find(auth()->user()->id);

      if (!$user->product()->find($productId)) {
        $user->product()->attach([$productId => ['amount' => 1]]);

        $product = Product::find($productId);
        // this user added this product to cart 
        $user =   User::find(auth()->user()->id); // to use the model method

        if (!$user->productActivity->find($product->id))
          $user->productActivity()->attach([$product->id => ['click' => 1, 'added_to_cart' => 1, 'request' => 0, 'bought' => 0]]);
        else {

          $user->productActivity->find($product->id)->userActivity->added_to_cart += 1;
          $user->productActivity->find($product->id)->userActivity->save();
        }
        $this->buttonName="Already in cart";
      }
    } else {
      $product = Product::find($productId);
      return $this->dispatchBrowserEvent('guestOrderEvent', ['id' => $productId, 'amount' => $product->amount]);
    }

    $this->emit('cart_updated');
    $this->emit('cart_changed');
  }
}

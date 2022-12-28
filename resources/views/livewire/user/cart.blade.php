<div>
@forelse($cart as $cartProduct)




@livewire('user.cart-body',['cartProduct' => $cartProduct])




@empty
<div>
  <a href="{{route('public.products')}}" class="text-success">Go add product to your list!!</a>
</div>
@endforelse
</div>
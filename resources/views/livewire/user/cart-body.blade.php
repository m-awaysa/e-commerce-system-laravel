@if(array_key_exists($this->cartProduct->id, $cartProducts))
<?php $cartProduct = $this->cartProduct; ?>

<div>
  <div class="card mb-3">
    <div class="card-body">
      @error('amount') <span class="error text-danger">{{ $message }}</span> @enderror
      <div class="d-flex justify-content-between">

        <div class="d-flex flex-row align-items-center">
          <div>
            <img src="{{asset('images/productImages/'.$cartProduct->image)}}" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
          </div>
          <div class="ms-3">
            <h5>{{$cartProduct->name}}</h5>
            <p class="small mb-0">{{$cartProduct->color}}</p>
          </div>
        </div>

        <div class="d-flex flex-row align-items-center">
          <div style="width: 55px;">
            <input wire:change="edit({{$cartProduct->id}})" wire:model="amount.{{$cartProduct->id}}" id="amount.{{$cartProduct->id}}" type="number" class="fw-normal  col-10" value="<?php echo $this->amount[$cartProduct->id] ?>" min="1" max="{{$cartProduct->amount}}">
          </div>

          <div style="width: 80px;">
           
              @if($cartProduct->discount && ($cartProduct->discount > auth()->user()->discount))
              <h5 class="mb-0"><span class="old-price">{{$cartProduct->price}}-></span>
              <?php echo (int) ($cartProduct->price - ((($cartProduct->discount) / 100) * $cartProduct->price)) ?>
              @elseif(auth()->user()->discount)
              <h5 class="mb-0"><span class="old-price">{{$cartProduct->price}}-></span>
              <?php echo (int) ($cartProduct->price - (((auth()->user()->discount) / 100) * $cartProduct->price)) ?>
              @else
              <h5 class="mb-0"><span class="text-warning">{{$cartProduct->price}}₪</span>
              @endif

            </h5>
          </div>
          <!-- <form wire:submit.prevent="delete({{$cartProduct->id}})" >  -->
          <button wire:click="delete({{$cartProduct->id}})" type="submit" class="btn border-0">
            <i class="fas fa-trash-alt text-danger"></i>
          </button>
          <!-- </form>   -->

        </div>
      </div>
    </div>
  </div>
</div>
@else
<div></div>
@endif
@if($product->amount > 0)
<form wire:submit.prevent="add({{$product->id}}) " class="{{$classes}}">
        @csrf
        <button class="w-100 rounded-0 text-warning border-0 btn ">
        {{$buttonName}}
        @if($buttonName == '')
            <i class="fa-solid fa-cart-shopping  text-dark"></i>
        @endif
        </button>
    </form>
    @else
    <div class="{{$classes}}">
    <button class="w-100 rounded-0 text-warning border-0 btn ">
        Available Soon
        </button>

    </div>
@endif

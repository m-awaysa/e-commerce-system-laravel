@include('layouts.publicHeader')


<div class="category-container border-top">


    <div class="product-container  border-top">

        @forelse( $products as $product)

        @if($product->category->visibility)


        <div class="card card-product rounded-0">
            <a class="text-dark" href="{{route('public.products.product',$product)}}">
                <img src="{{asset('images/productImages/'.$product->image)}}" onerror="this.src='  <?php echo asset('images/default.png') ?>  ' " class="ms-4 card-img-top" alt="...">
                <div class="card-body">
                    <div class="card-text">{{$product->name}}</div>

                </div>

                
            </a>
            <div class="card-body ">
                <div class="row position-absolute bottom-0 col-12">
                    <livewire:cart-product :product="$product" :buttonName="''" classes="col-6">


                        @auth
                        <div class=" text-warning col-6">
                            @if($product->discount && ($product->discount > auth()->user()->discount))
                            <span class="old-price ">{{$product->price}}-></span>
                            <?php echo (int)($product->price - ((($product->discount) / 100) * $product->price)) ?>
                            @elseif(auth()->user()->discount)
                            <span class="old-price ">{{$product->price}}-></span>
                            <?php echo (int)($product->price - (((auth()->user()->discount) / 100) * $product->price)) ?>
                            @else
                            <p class="">{{$product->price}}</p>
                            @endif
                        </div>
                        @endauth

                </div>
            </div>

        </div>
        @endif

        @empty
        <p class="text-danger justify-content-md-end">There is no Discounts!! </p>

        @endforelse
    </div>


</div>
@include('layouts.publicFooter')
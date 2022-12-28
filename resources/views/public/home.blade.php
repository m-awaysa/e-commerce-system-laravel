@include('layouts.publicHeader')



<div id="carousel" class="carousel slide " data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active carousel-btn"
      aria-current="true" aria-label="Slide 1"></button>
    @for($x=1;$x < $carouselPart->count(); $x++) <button type="button" data-bs-target="#carousel"
        data-bs-slide-to="{{$x}}" class=" carousel-btn" aria-label="Slide 2"></button>
      @endfor
  </div>
  <div class="home-carousel-inner ">



    @forelse($carouselPart as $homeImage)
    <div class="bg-dark carousel-item <?php if (!$thereIsAnActive) {
                                        $thereIsAnActive = true;
                                        echo 'active';
                                      } ?>">
      <img class="home-d-block " src="{{asset('images/productImages/'.$homeImage->image)}}"
        onerror="this.src='  <?php echo asset('images/default.png') ?>  ' " alt="No Image">

    </div>

    @empty
    <div class="carousel-item active text-danger">
      No new deals at the moment
    </div>
    @endforelse




  </div>



  <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>



@forelse($homeParts as $homePart)
</div>
<div class="mt-5">
</div>
<div class="new-arrival text-danger">
  <h3>{{$homePart->name}}</h3>
</div>
<div class="home-product-container border-top">


  @forelse($homePart->product as $product)

  <div class="bg-light  single-product border-end-1 border  " id="me">
    <a class="text-dark" href="{{route('public.products.product',$product->id)}}">
      <div class="card-body-item">

        <div class="home-image-content">
          <img class="home-product-image" src="{{asset('images/productImages/'.$product->image)}}"
            onerror="this.src='  <?php echo asset('images/default.png') ?>  ' " alt="">
        </div>
        <div class="body-image">
          <div class="card-text-group">
            <div class="card-name">
              <p>{{$product->name}}</p>
            </div>


          </div>
          <livewire:cart-product :product="$product" :buttonName="''" classes="card-cart btn  btn-light rounded-0 ">

            @auth
            <div class="product-price bg-light text-warning">
              @if($product->discount && ($product->discount > auth()->user()->discount))
              <span class="old-price ">{{$product->price}}-></span>
              <?php echo (int)($product->price - ((($product->discount) / 100) * $product->price)) ?>
              @elseif(auth()->user()->discount)
              <span class="old-price ">{{$product->price}}-></span>
              <?php echo (int)($product->price - (((auth()->user()->discount) / 100) * $product->price)) ?>
              @else
              <p class="text-center price-no-discount">{{$product->price}}</p>
              @endif
            </div>
            @endauth
        </div>
      </div>
    </a>
  </div>

  @empty
  <p class="text-danger justify-content-md-end">There is no products!! </p>
  @endforelse

</div>
</div>
<div class="pb-5">
</div>
@empty
<p class="text-danger justify-content-md-end">There is no deals!! </p>
@endforelse


<!-- Modal -->
<div class="modal fade" id="guestmodal" tabindex="-1" aria-labelledby="guestmodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-danger">commercial sale only</p>
      </div>
      <div class="modal-footer">
        <form action="{{route('guest.order')}}" method="post">
          @csrf
          <input type="hidden" name="product" id="pid">
          @error('product')
          <div class="text-danger">{{$message}}</div>
          @enderror
          <!--company Name -->
          <div class="w-100 row ">
            <div class="mt-2">
              <label for="company_name">Company Name: </label>
            </div>
            <div>
              <input type="text" name="company_name" value="{{old('company_name')}}" required min="2" max="255">
              @error('company_name')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>


            <!--company_number-->

            <div>
              <label for="company_number">Company Number: </label>
            </div>
            <div>
              <input type="number" name="company_number" value="{{old('company_number')}}" required min="2"
                max="999999999">
              @error('company_number')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>
            <!--phone_number-->

            <div>
              <label for="phone_number">Phone Number: </label>
            </div>
            <div>
              <input type="number" name="phone_number" value="{{old('phone_number')}}" required max="999999999999">
              @error('phone_number')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>

            <!--email-->
            <div>
              <label for="email">Email: </label>
            </div>
            <div>
              <input type="email" name="email" value="{{old('email')}}" required min="4" max="255">
              @error('email')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>
            <!--amount-->

            <div>
              <label for="amount">Amount: </label>
            </div>
            <div>
              <input type="number" id="modalAmount" name="amount" value="{{old('amount')}}" required min="1"
                max="{{$product->amount}}">
              @error('amount')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>
            <div>
              <label for="city">City: </label>
            </div>
            <div>
              <input type="text" name="city" value="{{old('city')}}" required min="2" max="255">
              @error('city')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>

            <div>
              <label for="street">Street: </label>
            </div>
            <div>
              <input type="text" name="street" value="{{old('street')}}" required min="2" max="100">
              @error('street')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>

            <div>
              <label for="note">Note: </label>
            </div>
            <div>
              <input type="text" name="note" value="{{old('note')}}" required min="2" max="255">
              @error('note')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>


          </div>
          <button type="submit" class="btn btn-primary mt-2">Confirm</button>
          <button id="exitbutton" type="button" class="btn btn-warning mt-2" data-bs-dismiss="modal">Cancel</button>


        </form>
      </div>
    </div>
  </div>
</div>
</section>
</div>


</div>
</div>

@include('layouts.publicFooter')
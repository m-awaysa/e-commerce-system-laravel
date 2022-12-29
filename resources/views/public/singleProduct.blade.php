@include('layouts.publicHeader')




<div id="carouselIndicators" class="carousel slide " data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active carousel-btn"
      aria-current="true"></button>
    @for($x=1;$x < $product->photo->count(); $x++)
      <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="{{$x}}"
        class=" carousel-btn"></button>
      @endfor
  </div>
  <div class="carousel-inner">

    @forelse($product->photo as $photo)
    <div class="carousel-item <?php if (!$thereIsAnActive) {
                                $thereIsAnActive = true;
                                echo 'active';
                              } ?>">
      <img class="d-block w-100 single-image " src="{{asset('images/productImages/'.$photo->image)}}"
        onerror="this.src='  <?php echo asset('images/default.png') ?>  ' " alt="No Image">
    </div>

    @empty
    <div class="carousel-item active">
      <img class="d-block w-100 single-image " src="{{asset('images/productImages/'.$product->image)}}"
        onerror="this.src='  <?php echo asset('images/default.png') ?>  ' " alt="No Image">
    </div>
    @endforelse

  </div>



  <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>





<div class="div-info ">
  <div class="pb-4 product-name fs-2 fw-bold">{{$product->name}}</div>
  <table class="table-info">
    @auth
    <tr>

      <th>Price :</th>
      <td>

        @if($product->discount)
        <span id="price">:{{$product->price}}-></span>
        <?php echo (int)($product->price - ((($product->discount) / 100) * $product->price)) ?>
        @else
        <p class="price-no-discount">:{{$product->price}}</p>
        @endif

      </td>
    </tr>

    @endauth
    <tr>
      <th>
        <div class="th">Company :</div>
      </th>
      <td>: {{$product->company}}</td>
    </tr>
    <tr>
      <th>Amount :</th>
      <td>:{{$product->amount}}</td>
    </tr>
    <tr>
      <th>
        <div class="th">Category :</div>
      </th>
      <td>: {{$product->Category->name}}</td>
    </tr>
    <tr>
      <th>
        <div class="th">Color :</div>
      </th>
      <td>: {{$product->color}}</td>
    </tr>

  </table>
  <div class="single-cart">
    <livewire:cart-product :product="$product" :buttonName="'Add to cart'"
      classes="single-cart-btn btn btn-dark text-warning">
  </div>
</div>


<div>
  <div class="single-product-features w-100  text-dark border-bottom border-dark ">
    <span class="fw-bold fs-1">Feature:</span>
    <div class="feature mt-4 pb-5 w-100">

      @if($product->feature->count())
      @foreach($product->feature as $feature)
      <table>
        <tr>
          <th>{{$feature->feature_name}}:</th>
          <td>&nbsp;{{$feature->pivot->feature_value}}</td>
        </tr>
      </table>
      @endforeach
      @endif
      <table class="mt-3">
        <tr>
          <th>Example Speed: </th>
          <td>&nbsp;1600 DPS</td>
        </tr>
      </table>
      <table class="mt-3">
        <tr>
          <th>Long Example: </th>
          <td>&nbsp;PSU ANTEC EAG650 PRO EC 650W 80+ GOLD</td>
        </tr>
      </table>
      <table class="mt-3">
        <tr>
          <th>Long Example: </th>
          <td>&nbsp;PSU ANTEC EAG650 PRO EC 650W 80+ GOLD PSU ANTEC EAG650 PRO EC 650W 80+ GOLD</td>
        </tr>
      </table>
      <table class="mt-3">
        <tr>
          <th>Long example example example : </th>
          <td>&nbsp;PSU 80+ GOLD</td>
        </tr>
      </table>

    </div>
  </div>
</div>
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
              <input type="number" name="phone_number" value="{{old('phone_number')}}" required  min="111111111" max="999999999999">
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
             >
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
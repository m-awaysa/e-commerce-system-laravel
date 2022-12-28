@include('layouts.publicHeader')
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">
              @if(session('message'))
              <div class="text-success">
                {{session('message')}}
              </div>
              @endif
              <div class="col-lg-7">
                <h5 class="mb-3"><a href="{{route('public.products')}}" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping cart</p>
                    <p class="mb-0">You have {{$cart->count()}} items in your cart</p>
                  </div>
                  <div>

                  </div>
                </div>

                @livewire('user.cart')


              </div>

              <form action="{{route('order.request')}}" method="post" class="col-lg-5">
                @csrf
                <div>

                  <div class="card payment-part  text-dark rounded-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Details</h5>

                      </div>


                      <form class="mt-4">
                        <div class="form-outline form-white mb-4">
                          <label class="form-label" for="invoice_name">invoice's Name:</label>
                          <input type="text" name="invoice_name" id="typeName" class="form-control form-control-lg" placeholder="invoice's Name" value="{{old('invoice_name')}}" />
                          @error('invoice_name')
                          <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>

                        <div class="form-outline form-white mb-4">
                          <label class="form-label" for="city">City:</label>
                          <input type="text" name="city" id="typeText" class="form-control form-control-lg" placeholder="City" value="{{old('city')}}" />
                          @error('city')
                          <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>

                        <div class="form-outline form-white mb-4">
                          <label class="form-label" for="street">House/floor/room Number/Street (optional):</label>
                          <input type="text" name="street" id="typeText" class="form-control form-control-lg" placeholder="House/floor/room Number/Street " value="{{old('street')}}" />
                          @error('street')
                          <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>

                        <div class="form-outline form-white mb-4">
                          <label class="form-label" for="phone_number">Phone number:</label>
                          <input type="number" name="phone_number" id="typeText" class="form-control form-control-lg" placeholder="Phone Number" value="{{old('phone_number')}}" />
                          @error('phone_number')
                          <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>



                        <div class="form-outline form-white mb-4">
                          <label class="form-label" for="note">Notes:</label>
                          <input type="text" name="note" id="typeText" class="form-control form-control-lg" placeholder="Note" value="{{old('note')}}" />
                          @error('note')
                          <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>




                      </form>

                      <hr class="my-4">

                      <div class="d-flex justify-content-between">
                        <p class="mb-2">Subtotal</p>
                        <p class="mb-2">{{$sum}}₪</p>
                      </div>

                      <div class="d-flex justify-content-between">
                        <p class="mb-2">Shipping</p>
                        <p class="mb-2">20.00₪</p>
                      </div>

                      <div class="d-flex justify-content-between mb-4">
                        <p class="mb-2">Total(Incl. taxes)</p>
                        <p class="mb-2">{{$sum + 20}}₪</p>
                      </div>

                      <button type="submit" class="btn btn-info btn-block btn-lg">
                        <div class="d-flex justify-content-between">
                          <span>{{$sum + 20}}₪ </span>
                          <span>-Request <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                        </div>
                      </button>

                    </div>
                  </div>
                </div>
              </form>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</section>
@include('layouts.publicFooter')
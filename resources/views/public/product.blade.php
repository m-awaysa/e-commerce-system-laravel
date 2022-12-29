@include('layouts.publicHeader')

<!-- <div class="brand-water">


</div> -->

<div class="content-border">


    <div class="all-content">

        <div class="  side-product-filter border border-1">

            <form action="{{route('public.products')}}">
                <button class="btn-lg btn bg-dark filter-btn border-0 rounded-0 text-light w-100 " type="submit">Press
                    To Filter</button>
                <div class="product-filter-body">

                    <div class="select-label-filter  mb-5">
                        <label for="company[]" class="">Company Name:</label>
                        @if($companies->count())
                        @foreach($companies as $company)
                        <div>
                            <input type="checkbox" name="company[{{$company->company}}]" value="{{$company->company}}">
                            <label for="company[{{$company->company}}]" class="">{{$company->company}}.</label>
                        </div>
                        @endforeach
                        @endif
                    </div>

                    <div class="select-label-filter  mb-5">


                        <label for="company[]" class="">Color:</label>
                        @if($colors->count())
                        @foreach($colors as $color)
                        <div>
                            <input type="checkbox" name="color[{{$color->color}}]" value="{{$color->color}}">
                            <label for="color[{{$color->color}}]" class="">{{$color->color}}.</label>

                        </div>
                        @endforeach
                        @endif

                    </div>


                    <div class="select-label-filter  mb-5">
                        <label for="company[]" class="">Category Name:</label>

                        @if($categories->count())
                        @foreach($categories as $category)
                        <div>
                            <input type="checkbox" name="category[{{$category->id}}]" value="{{$category->id}}">
                            <label for="category[{{$category->id}}]" class="">{{$category->name}}.</label>
                        </div>

                        @endforeach
                        @endif

                    </div>

                </div>
            </form>
        </div>





        <div class="product-container  border-top">


            @forelse($products as $product)


            @if($product->category)


            <div class="card card-product rounded-0">
                <a class="text-dark" href="{{route('public.products.product',$product)}}">
                    <img src="{{asset('images/productImages/'.$product->image)}}"
                        onerror="this.src='  <?php echo asset('images/default.png') ?>  ' " class="ms-4 card-img-top"
                        alt="...">
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
            <p class="text-danger justify-content-md-end">There is no Product!! </p>
            @endforelse
            <br>
          
        </div>
       
    </div>
    <div class="paginate-content" >
    {{$products-> links()}}
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
                            <input type="text" name="company_name" value="{{old('company_name')}}" required min="2"
                                max="255">
                            @error('company_name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <!--company_number-->

                        <div>
                            <label for="company_number">Company Number: </label>
                        </div>
                        <div>
                            <input type="number" name="company_number" value="{{old('company_number')}}" required
                                min="2" max="999999999">
                            @error('company_number')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <!--phone_number-->

                        <div>
                            <label for="phone_number">Phone Number: </label>
                        </div>
                        <div>
                            <input type="number" name="phone_number" value="{{old('phone_number')}}" required
                                max="999999999999">
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
                            <input type="number" id="modalAmount" name="amount" value="{{old('amount')}}" required
                                min="1">
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
                    <button id="exitbutton" type="button" class="btn btn-warning mt-2"
                        data-bs-dismiss="modal">Cancel</button>


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
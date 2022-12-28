@include('layouts.adminHeader')



<div class="text-dark">
    <label class="mb-1 text-lg">Adding {{$category->name}}</label>
</div>
<form action="{{route('product.add',$category)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="">
        <div>


            <div>
                <!--Product photo -->
                <label class="text-dark " for="image">Banner Image</label>
                <input type="file" name="image">
                @error('image')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>


        </div>


        <div class="input text-dark">
            <!--Product Name -->
            <div>
                <label for="product_name">Product Name: </label>
                <input type="text" name="product_name" value="{{old('product_name')}}">
                @error('product_name')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <!--Product code -->
            <div>
                <label for="product_code">Product Code: </label>
                <input type="text" name="product_code" value="{{old('product_code')}}">
                @error('product_code')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <!--Product company -->
            <div>
                <label for="product_company">Company Name: </label>
                <input type="text" name="product_company" value="{{old('product_company')}}">
                @error('product_company')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <!--Product color -->
            <div>
                <label for="product_color">Color: </label>
                <input type="text" name="product_color" value="{{old('product_color')}}">
                @error('product_color')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>


            <!--Description-->
            <div>
                <label for="description">Description: </label>
                <textarea type="text" name="description" value="{{old('image')}}">{{old('description')}}</textarea>
                @error('description')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <!--Product discount -->
            <div>
                <label for="product_discount">discount Ratio: %</label>
                <input type="number" name="product_discount" value="{{old('product_discount')}}">
                @error('product_discount')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <!--visibility -->
            <div>
                <label for="visibility">Visibility</label>
                <input type="checkbox" name="visibility" value="true" checked>
            </div>
            <!--purchased_price -->
            <div>
                <label for="purchased_price">Purchased price: </label>
                <input type="number" name="purchased_price" value="{{old('purchased_price')}}">
                @error('purchased_price')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <!--price -->
            <div>
                <label for="product_price">Price for sale: </label>
                <input type="number" name="product_price" value="{{old('product_price')}}">
                @error('product_price')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <!--price -->
            <div>
                <label for="amount">Amount: </label>
                <input type="number" name="amount" value="{{old('amount')}}">
                @error('amount')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>


        </div>

    </div>

    <div class="mt-4 text-dark">
        <h4>Features:</h1>

            <div>
                @if(session('error'))
                <div class="text-danger">
                    {{session('error')}}
                </div>
                @endif
                @forelse($features as $feature)
                <div>
                    <label for="features" class="text-dark">{{$feature->feature_name}}: </label>
                    <input type="text" name="features[{{$feature->id}}]">
                    @error('features*')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                @empty
                <div class="text-danger">There is no features for this category, you can go edit this category and add
                    features</div>
                @endforelse
            </div>
    </div>


    <div>
        <h4>Product Photos:</h4>

        <!------------------------------------------------------------------------------------------------------------>
        <div>
            <div>
                <div class="col-lg-12">
                    <div id="newinput"></div>
                    @error('photos*')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <button id="imageAdder" type="button" class="btn btn-dark">
                        <span class="bi bi-plus-square-dotted">
                        </span> ADD Image
                    </button>
                </div>
            </div>

        </div>
        <!------------------------------------------------------------------------------------------------------------>


    </div>


    <button class=" btn-primary btn-lg mt-2 " type="submit">
        Add product
    </button>

</form>

@section('script')

<script type="text/javascript">
    $("#imageAdder").click(function () {
       newImageAdd =
         '<div id="row"> <div class="input-group m-3">' +
         '<div class="input-group-prepend">' +
         ' <label class="text-dark">New Image: </label>'+
         '<button class="btn btn-danger btn-sm" id="DeleteImage" type="button">' +
         '<i class="bi bi-trash"></i> Delete</button> </div>' +
         '<input type="file" name="photos[]"></div> </div> ';
         $('#newinput').append(newImageAdd);   
     });
     
     $("body").on("click", "#DeleteImage", function () {
          $(this).parents("#row").remove();
      })
     
</script>
@endsection

@include('layouts.adminFooter')
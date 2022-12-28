@include('layouts.adminHeader')



<div class="text-dark">
    <label class="mb-1 text-lg">Editing {{$product->name}}</label>
</div>
<form action="{{route('product.edit',$product)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div>
            <div>

                <img width="300" src="{{asset('images/productImages/'.$product->image)}}"
                    onerror="this.src='  <?php echo asset('images/default.png') ?>  ' " alt="no img">

            </div>

            <div>
                <!--Product photo -->
                <label for="image">New Image</label>
                <input type="file" name="image">
                @if(session('imageStatus'))
                <div class="text-danger">
                    {{session('imageStatus')}}
                </div>
                @endif
                @error('image')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

        </div>


        <div class="input text-dark">
            <!--Product Name -->
            <div>
                <label for="">Product Name: </label>
                <input type="text" name="product_name" value="{{$product->name}}">
                @error('product_name')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <!--Product code -->
            <div>
                <label for="">Product code: </label>
                <input type="text" name="product_code" value="{{$product->product_code}}">
                @error('product_code')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <!--Product color -->
            <div>
                <label for="">Product color: </label>
                <input type="text" name="product_color" value="{{$product->color}}">
                @error('product_color')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <!--Product company -->
            <div>
                <label for="product_company">Company Name: </label>
                <input type="text" name="product_company" value="{{$product->company}}">
                @error('product_company')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <!--Description-->
            <div>
                <label for="description">Description: </label>
                <textarea type="text" name="description">{{$product->description}}</textarea>
                @error('description')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <!--Product discount -->
            <div>
                <label for="product_discount">discount Ratio: %</label>
                <input type="text" name="product_discount" value="{{$product->discount}}">
                @error('product_discount')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <!--visibility -->
            <div>
                <label for="visibility">Visibility</label>
                <input type="checkbox" name="visibility" <?php if($product->visibility) {echo "checked";} else echo
                "unchecked" ?>>
            </div>
            <!--price -->
            <div>
                <label for="purchased_price">Purchased price: </label>
                <input type="number" name="purchased_price" value="{{$product->purchased_price}}">
                @error('purchased_price')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <!--price -->
            <div>
                <label for="product_price">Price for sale: </label>
                <input type="number" name="product_price" value="{{$product->price}}">
                @error('product_price')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <!--Amount -->
            <div>
                <label for="amount">Amount: </label>
                <input type="number" name="amount" value="{{$product->amount}}">
                @error('amount')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>


        </div>

    </div>

    <div class="mt-4 text-dark">
        <h4>Features:</h1>
            @if(session('error'))
            <div class="text-danger">
                {{session('error')}}
            </div>
            @endif
            @foreach($productFeatures as $feature)
            <div>
                <label for="features[{{$feature->id}}]" class="text-dark">{{$feature->feature_name}}: </label>
                <input type="text" name="features[{{$feature->id}}]"
                    value="{{$feature->pivot->feature_value}}">
            </div>

            @endforeach
            @foreach($notProductFeatures as $feature)
            <div class="hi">
                <label for="features[{{$feature->id}}]" class="text-dark">{{$feature->feature_name}}: </label>
                <input type="text" name="features[{{$feature->id}}]" value="{{old('features[$feature->id]')}}" >
            </div>

            @endforeach
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Edit Product</button>
    </div>
</form>



@include('layouts.adminFooter')
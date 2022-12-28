@include('layouts.publicHeader')


<div class="category-container border-top">
@if ($categories->count())

@foreach($categories as $category)

<div class="bg-light  single-product border-end-1 border  " id="me">
    <a class="text-dark" href="{{route('public.category.products',$category)}}">
        <div class="card-body-item">

            <div class="home-image-content">
                <img class="home-product-image" src="{{asset('images/productImages/'.$category->image)}}" onerror="this.src='  <?php echo asset('images/default.png') ?>  ' " alt="">
            </div>
            <div class="body-image">
                <div class="card-text-group">
                    <div class="card-name">
                        <p>{{$category->name}}</p>
                    </div>


                </div>
        </div>
        </div>
        </a>
        </div>



@endforeach


@else
<p class="text-danger justify-content-md-end">There is no Categories!! </p>
@endif
</div>
@include('layouts.publicFooter')
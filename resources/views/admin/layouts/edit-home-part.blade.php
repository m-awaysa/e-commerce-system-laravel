@include('layouts.adminHeader')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Home Part</h1>
</div>

 <!-- Card Body -->
 <div class="card-body">
            <div class="  bg-light ">
                <table class=" table" >
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>remove</th>
                        </tr>
                    </thead>



                    @forelse($homePartProducts as $product)
                    <tr>
                        <td class="col-12 col-sm-4  col-lg-4">
                            <div class="card mb-3 ">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center ">
                                            <div>
                                                <img src="{{asset('images/productImages/'.$product->image)}}" class="img-fluid rounded-3" alt="Shopping item" style="width: 100px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{$product->name}}
                        </td>
            
                        <td class="col-2">
                            <!-- delete button form -->
                            
                                <a class="btn btn-danger btn-sm" href="{{route('layout.home.part.product.remove',['homePart'=>$homePart,'product'=>$product])}}">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                           


                        </td>
                    </tr>
                    @empty
                    <p class="text-danger justify-content-md-end">There is no product!! </p>

                    @endforelse
                  
                    {{$homePartProducts-> links()}}


  
</div>
        
   
        <!-- Card Body -->
        <div class="card-body">
            <div class="  bg-light ">
                <table class=" table" >
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Add to part</th>
                        
                        </tr>
                    </thead>



                    @forelse($products as $product)
                    @if( $product->home_part_count ==0)
                    <tr>
                        <td class="col-12 col-sm-4  col-lg-4">
                            <div class="card mb-3 ">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center ">
                                            <div>
                                                <img src="{{asset('images/productImages/'.$product->image)}}" class="img-fluid rounded-3" alt="Shopping item" style="width: 100px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{$product->name}}
                        </td>
                        <td class="col-2">
                            <!-- delete button form -->
                           <form action="{{route('layout.home.part.product.add',['homePart'=>$homePart,'product'=>$product])}}" method="post">
                            @csrf
                                <button type="submit" class="btn btn-primary btn-sm" >
                                select
                                </button>
                                </form>
                           
                        </td>
                    </tr>
                    @endif
                    @empty
                    <p class="text-danger justify-content-md-end">There is no product!! </p>

                    @endforelse
                  
                    {{$products-> links()}}


  
</div>




@include('layouts.adminFooter')
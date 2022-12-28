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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>

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
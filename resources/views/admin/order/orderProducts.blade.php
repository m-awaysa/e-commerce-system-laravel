@include('layouts.adminHeader')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sales</h1>
</div>
<!---------------------------------------------------------------------------------------------------->


    <div class="col-xl-10 col-lg-9">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Products</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">


              <form action="{{route('order.edit',$order)}}" method="post">
            @csrf

       <button type="submit" class="btn btn-primary mb-1">Save</button>

                <div class="  bg-light ">
                    <table class=" table container " id="category">
                        <thead>
                            <tr>
                                <th>Sales ID</th>
                                <th>Amount</th> 
                                <th>product Name</th>
                                <th>Total price</th>
                                <th>sold Price</th>  
                                <th>Purchased Price</th>  
                               
                                <th>Color</th> 
                            </tr>
                        </thead>
                      
                       

                        @forelse($sales as $sale)
                        <tr>
                        <td>{{$sale->id}}</td>
                        <td class="col col-1"><input class="col" type="number" name="amounts[{{$sale->id}}]" value="{{$sale->amount}}"></td>
                        <td>{{$sale->product->name}}</td>
                        <td>{{(int)($sale->sold_price* $sale->amount )}}</td>

                        <td><input class="col  col-7" type="number" name="sold_prices[{{$sale->id}}]" value="{{$sale->sold_price }}" min="1"></td>
                        <td><input class="col col-7" type="number" name="purchased_prices[{{$sale->id}}]" value="{{$sale->purchased_price }}" min="1"></td>
                        <td><input class="col" type="text" name="colors[{{$sale->id}}]" value="{{$sale->color }}" min="2"></td>

                        </tr>

                        @empty
                     
                        <p class="text-danger justify-content-md-end">There is no sales!! </p>
                   
                        @endforelse

                        {{$sales-> links()}}


                    


                      
                    
                    </table>
                </div>
                
                </form>

            </div>
        </div>
    </div>
 



@include('layouts.adminFooter')
@include('layouts.adminHeader')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sales</h1>
</div>
<!---------------------------------------------------------------------------------------------------->


    <div >
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Products</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">


            
            

  

                <div class="  bg-light ">
                    <table class=" table" >
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
                        <tr class="mb-5">
                        <td class="mb-5 border-0" data-label="Id">{{$sale->id}}</td>
                        <td class="mb-5 border-0" data-label="Amount" class=" col-md-1">{{$sale->amount}}</td>
                        @if($sale->product != null)
                        <td class="mb-5 border-0" data-label="">{{$sale->product->name}}</td>
                        @else
                        <td class="mb-5 border-0" data-label="">deleted</td>
                        @endif
                        <td class="mb-5 border-0" data-label="Total Price">{{(int)($sale->sold_price* $sale->amount )}}</td>

                        <td class="mb-5 border-0" data-label="Price">{{$sale->sold_price }}</td>
                        <td class="mb-5 border-0" data-label="Purchased Price">{{$sale->purchased_price }}</td>
                        <td class="mb-5 border-0" data-label="color">{{$sale->color }}</td>

                        </tr>

                        @empty
                     
                        <p class="text-danger justify-content-md-end">There is no sales!! </p>
                   
                        @endforelse

                        {{$sales-> links()}}
                    
                    </table>
                </div>
                
             

            </div>
        </div>
    </div>
 



@include('layouts.adminFooter')
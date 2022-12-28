@include('layouts.adminHeader')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">USers Activity</h1>
</div>
<!---------------------------------------------------------------------------------------------------->


<div>
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Products</h6>

        </div>
        <!-- Card Body -->
        <div class="card-body">







            <div class="  bg-light ">
                <table class=" table container " id="category">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>bought</th>
                            <th>Request</th>
                            <th>Added To Cart</th>
                            <th>Views</th>

                        </tr>
                    </thead>

 
               

                    @forelse($userProducts as $userProduct)
                    
                    <tr>
                        <td class="mb-5 border-0" data-label="">{{$userProduct->name}}</td>
                        <td class="mb-5 border-0"data-label="bought">{{$userProduct->userActivity->bought}}</td>
                        <td class="mb-5 border-0" data-label="Request">{{$userProduct->userActivity->request}}</td>
                        <td class="mb-5 border-0" data-label="Add To Cart">{{$userProduct->userActivity->added_to_cart}}</td>
                        <td class="mb-5 border-0" data-label="Views">{{$userProduct->userActivity->click}}</td>

                    </tr>

                    @empty

                    <p class="text-danger justify-content-md-end">There is no products!! </p>

                    @endforelse

                    {{$userProducts-> links()}}







                </table>
            </div>



        </div>
    </div>
</div>




@include('layouts.adminFooter')
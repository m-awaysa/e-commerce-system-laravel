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
                            <th>Product ID</th>
                            <th>Product</th>
                            <th>Purchased</th>
                            <th>Request</th>
                            <th>Added To Cart</th>
                            <th>views</th>
                          

                        </tr>
                    </thead>



                    @forelse($productsActivities as $productActivities)
                    <tr>
                        <td data-label="Product Id">{{$productActivities->product_id}}</td>
                        <td >{{$productActivities->product_name}}</td>
                        <td data-label="Purchased">{{$productActivities->bought}}</td>
                        <td data-label="Request">{{$productActivities->request}}</td>

                        <td data-label="Add To Cart">{{$productActivities->added_to_cart}}</td>
                        <td data-label="views">{{$productActivities->number_views}}</td>
                      


                    </tr>

                    @empty

                    <p class="text-danger justify-content-md-end">There is no products!! </p>

                    @endforelse

                    {{$productsActivities-> links()}}







                </table>
            </div>



        </div>
    </div>
</div>




@include('layouts.adminFooter')
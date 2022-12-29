@include('layouts.adminHeader')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Products</h1>

    <div class="">

        <a class=" btn  btn-md btn-primary shadow-sm " href="{{route('order.pending')}}">
            Order Requests
            <span class="badge badge-danger badge-counter">+{{$userRequestCount}}</span>
        </a>
        <a class=" btn  btn-md btn-primary shadow-sm " href="{{route('guest.order.pending')}}">
            Guest Requests
            <span class="badge badge-danger badge-counter">+{{$guestRequestCount}}</span>
        </a>


    </div>

</div>
<!---------------------------------------------------------------------------------------------------->


<div>
    @if(session('deleteSuccess'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{session('deleteSuccess')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Products</h6>

        </div>
        <!-- Card Body -->
        <div class="card-body">





            <div class="  bg-light ">
                <table class=" table order-table ">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Salesman</th>
                            <th>sold Price</th>
                            <th>Phone Number</th>
                            <th>Note</th>
                            <th>City</th>
                            <th>Street</th>
                            <th>time</th>
                            <th>status</th>
                            <th>Show</th>
                            <th>Cancel</th>
                            <th>Completed</th>

                        </tr>
                    </thead>
                    @foreach( $arrayOrders as $orders)
                    @if ($orders->count())

                    @foreach($orders as $order)
                    <tr>
                        <td data-label="Id">{{$order->id}}</td>
                        <td data-label="name">{{$order->name }}</td>
                        <td data-label="price">{{$order->sold_price }}</td>
                        <td data-label="phone">{{$order->phone_number }}</td>
                        <td data-label="note">{{$order->note}}</td>
                        <td data-label="city">{{$order->city}}</td>
                        <td data-label="street">{{$order->street}}</td>
                        <td data-label="date">{{date('d-m-y',strtotime($order->created_at))}}</td>
                        <td data-label="status" class="text-success">{{$order->status }}</td>
                        <td data-label="show">
                            <!--  show button form  -->
                            <form action="{{route('order.show',$order)}}">
                                @csrf
                                <button class="btn btn-primary btn-sm" type="submit">

                                    Show
                                </button>
                            </form>

                        </td>
                        @if($order->status == 'shipping')
                        <td>
                            <!--  delete button form  -->
                            <a class="btn btn-danger btn-sm" href="#"
                                onclick="confirmDelete( '<?php echo route('order.delete', $order) ?>' )">
                                <i class="fa-solid fa-trash"></i>
                            </a>

                        </td>
                        <td data-label="sold">
                            <!--  sold button form  -->
                            <form action="{{route('order.sold',$order)}}" method="post">
                                @csrf
                                <button class="btn btn-primary btn-sm" type="submit">
                                    Sold
                                </button>
                            </form>

                        </td>
                        @elseif($order->status == 'sold')
                        <td>
                            <!--  delete button form  -->
                            <a class="btn btn-danger btn-sm" href="#"
                                onclick="confirmDelete( '<?php echo route('order.delete', $order) ?>' )">
                                <i class="fa-solid fa-trash"></i>

                            </a>

                        </td>
                        @endif
                    </tr>
                    @endforeach

                    {{$orders-> links()}}

                    <!-- Modal -->
                    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deletemodal"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">shopping got canceled?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p> Deleting an order here means that the salesman didn't bought it,
                                        it will be removed from the profit calculation and the the products will
                                        automatically back to the stock!!</p>
                                </div>
                                <div class="modal-footer">

                                    <button id="cancelbutton" type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>

                                    <button type="submit" id="confirmdelete" class="btn btn-primary">Sure</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    @else
                    <p class="text-danger justify-content-md-end">There is no sales!! </p>
                    @endif
                    @endforeach
                </table>
            </div>

        </div>
    </div>
</div>
<!-- Pie Chart -->




@include('layouts.adminFooter')
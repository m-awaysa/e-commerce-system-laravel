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
                            <a class="btn btn-danger btn-sm" href="#" onclick="confirmDelete( '<?php echo route('order.delete', $order) ?>' )">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>

                            </a>

                        </td>
                        <td data-label="sold">
                            <!--  sold button form  -->
                            <form action="{{route('order.sold',$order)}}" method="post">
                                @csrf
                                <button class="btn btn-primary btn-sm" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                    </svg>
                                    Sold
                                </button>
                            </form>

                        </td>
                        @elseif($order->status == 'sold')
                        <td>
                            <!--  delete button form  -->
                            <a class="btn btn-danger btn-sm" href="#" onclick="confirmDelete( '<?php echo route('order.delete', $order) ?>' )">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>

                            </a>

                        </td>
                        @endif
                    </tr>
                    @endforeach

                    {{$orders-> links()}}

                    <!-- Modal -->
                    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deletemodal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">shopping got canceled?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p> Deleting an order here means that the salesman didn't bought it,
                                        it will be removed from the profit calculation and the the products will automatically back to the stock!!</p>
                                </div>
                                <div class="modal-footer">

                                    <button id="cancelbutton" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

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
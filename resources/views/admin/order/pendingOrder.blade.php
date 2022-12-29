@include('layouts.adminHeader')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pending Request</h1>

</div>
<!--- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- -- -->

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
            <h6 class="m-0 font-weight-bold text-primary">Requested Orders</h6>

        </div>
        <!-- Card Body -->
        <div class="card-body">

            <div class="  bg-light ">
                <table class=" table big-table container " id="category">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Salesman</th>
                            <th>sold Price</th>
                            <th>Phone Number</th>
                            <th>Note</th>
                            <th>City</th>
                            <th>Street</th>
                            <th>Time</th>
                            <th>status</th>
                            <th>Show/Edit</th>
                            <th>Cancel</th>
                            <th>Ship</th>
                        </tr>
                    </thead>


                    @if ($orders->count())

                    @foreach($orders as $order)
                    <tr>
                        <td data-label="ID">{{$order->id}}</td>
                        <td data-label="Salesman">{{$order->name }}</td>
                        <td data-label="Price">{{$order->sold_price }}</td>
                        <td data-label="Phone">{{$order->phone_number }}</td>
                        <td data-label="Note">{{$order->note}}</td>
                        <td data-label="City">{{$order->city}}</td>
                        <td data-label="Street">{{$order->street}}</td>
                        <td data-label="Date">{{date('d-m-y',strtotime($order->created_at))}}</td>
                        <td data-label="Status">{{$order->status }}</td>
                        <td>
                            <!--  edit button form  -->
                            <form action="{{route('order.edit',$order)}}" method="get">
                                @csrf
                                <button class="btn btn-primary btn-sm" type="submit">
                                    Show/Edit
                                </button>
                            </form>

                        </td>

                        <td>
                            <!--  delete button form  -->
                            <a class="btn btn-danger btn-sm" href="#" onclick="confirmDelete( '<?php echo route('order.delete', $order) ?>' )">
                                <i class="fa-solid fa-trash"></i>
                            </a>

                        </td>
                        <td>
                            <!--  edit button form  -->
                            <form action="{{route('order.ship',$order)}}" method="post">
                                @csrf
                                <button class="btn btn-primary btn-sm" type="submit">
                                    Ship
                                </button>
                            </form>

                        </td>
                    </tr>





                    @endforeach

                    {{$orders-> links()}}



                    <!-- Modal -->
                    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deletemodal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p> Deleting an Order here means an actual delete from database,are you sure?</p>
                                </div>
                                <div class="modal-footer">
                                    <button id="cancelbutton" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>


                                    @csrf

                                    <button type="submit" id="confirmdelete" class="btn btn-primary">Sure</button>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>


                    @else
                    <p class="text-danger justify-content-md-end">There is no orders!! </p>
                    @endif

                </table>
            </div>

        </div>
    </div>
</div>




@include('layouts.adminFooter')
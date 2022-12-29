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
    @if(session('error'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{session('error')}}</strong>
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
                <table class=" table big-table  container " id="category">
                    <thead>
                        <tr>
                            <th>Amount</th>
                            <th>sold Price</th>
                            <th>Save</th>
                            <th>Product</th>
                            <th>Company</th>
                            <th>Company Number</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>status</th>
                            <th>Cancel</th>
                            <th>Ship</th>
                        </tr>
                    </thead>


                    @if ($orders->count())

                    @foreach($orders as $order)
                    <tr>
                        <form action="{{route('guest.order.editAmount')}}" method="post">
                            @csrf
                            <td data-label="Amount" class="col-1">
                                <input class="col" type="number" name="amounts[{{$order->id}}]" value="{{$order->amount}}">
                            </td>
                            <td data-label="Price" class="col-1">
                                <input class="col" type="number" name="sold_prices[{{$order->id}}]" value="{{$order->sold_price}}">
                            </td>

                            <td data-label="Save">
                                <!--  save button form  -->
                                <button class="btn btn-primary btn-sm" type="submit">

                                    save
                                </button>
                            </td>
                        </form>

                        <td data-label="Product">{{$order->product->name }}</td>
                        <td data-label="Company">{{$order->company_name }}</td>
                        <td data-label="Company Number">{{$order->company_number }}</td>
                        <td data-label="Phone Number">{{$order->phone_number }}</td>

                        <td data-label="Email">{{$order->email}}</td>
                        <td data-label="Date">{{date('d-m-y',strtotime($order->created_at))}}</td>
                        <td data-label="Status">{{$order->status }}</td>







                        <td>
                            <!-- delete button form  -->
                            <a class="btn btn-danger btn-sm" href="#" onclick="confirmDelete( '<?php echo route('guest.order.delete', $order) ?>' )">
                                <i class="fa-solid fa-trash"></i>
                            </a>

                        </td>

                        <td>
                            <!-- sold button  -->
                            <form action="{{route('guest.order.accept',$order)}}" method="post">
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


                                  

                                    <button type="submit" id="confirmdelete" class="btn btn-primary">Sure</button>


                                   

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
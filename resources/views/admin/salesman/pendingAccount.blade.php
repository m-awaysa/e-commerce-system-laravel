@include('layouts.adminHeader')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pending Request</h1>

</div>
<!--- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- -- -->

<div>
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Requested Account</h6>

        </div>
        <!-- Card Body -->
        <div class="card-body">

            <div class="  bg-light ">
                <table class=" table container " id="category">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Company Number</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Accept</th>
                            <th>Remove</th>
                        </tr>
                    </thead>

                    @if ($salesmen->count())

                    @foreach($salesmen as $salesman)
                    <tr>
                        <td data-label="name">{{$salesman->first_name}} {{$salesman->last_name}}</td>
                        <td data-label="company">{{$salesman->company_name}}</td>
                        <td data-label="company number">{{$salesman->company_number}}</td>
                        <td data-label="address">{{$salesman->address}}</td>
                        <td data-label="email">{{$salesman->email}}</td>
                        <td data-label="phone">{{$salesman->phone_number}}</td>

                        <td>
                            <!--  accept button form  -->
                            <form action="{{route('salesman.accept',$salesman)}}" method="post">
                                @csrf
                                <button class="btn btn-primary btn-sm" type="submit">
                                    Accept
                                </button>
                            </form>
                        </td>

                        <td>
                            <!--  delete button form  -->
                            <a class="btn btn-danger btn-sm" href="#"
                                onclick="confirmDelete( '<?php echo route('salesman.remove',$salesman) ?>' )">
                                <i class="fa-solid fa-trash"></i>

                            </a>

                        </td>
                    </tr>




                    @endforeach

                    {{$salesmen-> links()}}



                    <!-- Modal -->
                    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deletemodal"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p> Deleting a salesman here means an actual delete from database,are you sure?</p>
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
                    <p class="text-danger justify-content-md-end">There is no salesman!! </p>
                    @endif

                </table>
            </div>

        </div>
    </div>
</div>




@include('layouts.adminFooter')
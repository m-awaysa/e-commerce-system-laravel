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
                            <th>User ID</th>
                            <th>Salesman</th>
                            <th>Purchased</th>
                            <th>Request</th>
                            <th>Added To Cart</th>
                            <th>Views</th>
                            <th>Show</th>

                        </tr>
                    </thead>



                    @forelse($usersActivities as $userActivities)
                    <tr>
                        <td data-label="User ID">{{$userActivities->user_id}}</td>
                        <td data-label="Salesman">{{$userActivities->user_name}}</td>
                        <td data-label="Purchased">{{$userActivities->bought}}</td>
                        <td data-label="Request">{{$userActivities->request}}</td>
                        <td data-label="Add To Cart">{{$userActivities->added_to_cart}}</td>
                        <td data-label="Views">{{$userActivities->views}}</td>

                        <td data-label="Show">
                            <!--  show button form  -->
                            <form action="{{route('dashboard.user.show',$userActivities->user_id)}}">
                                @csrf
                                <button class="btn btn-primary btn-sm" type="submit">

                                    Show
                                </button>
                            </form>
                        </td>

                    </tr>

                    @empty

                    <p class="text-danger justify-content-md-end">There is no user!! </p>

                    @endforelse

                    {{$usersActivities-> links()}}







                </table>
            </div>



        </div>
    </div>
</div>




@include('layouts.adminFooter')
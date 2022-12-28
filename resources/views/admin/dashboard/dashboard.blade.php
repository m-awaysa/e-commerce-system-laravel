@include('layouts.adminHeader')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">Dashboard <a class="btn btn-primary" href="{{route('dashboard.fresh')}}">Refresh All Website</a></h1>


</div>
<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="text-decoration-none" href="#">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Earnings (This Month)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$monthlyEarning}}</div>
                        </div>
                        <div class="col-auto">

                            <i class="fas fa-calendar fa-2x text-gray-300 "></i>

                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="text-decoration-none" href="#">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earnings (This Year)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$yearlyEarning}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="text-decoration-none" href="{{route('dashboard.user')}}">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Most Active Customer</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$mostActiveUser}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-md text-success">more</i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="text-decoration-none" href="{{route('dashboard.product')}}">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Most Bought Product</div>
                          
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$mostBoughtProduct}}</div>
                       
                        </div>
                        <div class="col-auto">
                            <i class="text-md text-success">more</i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- product count -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="text-decoration-none" href="#">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Number of Product</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$ProductCount}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- salesman count -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="text-decoration-none" href="#">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Number of Salesman</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$SalesmanCount}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!--  invisible product count -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="text-decoration-none" href="#">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Number of invisible product </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$invisibleProductCount}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!--  sold order this month -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="text-decoration-none" href="#">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Number of sold order this month</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$soldOrderThisMonthCount}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>


<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-10 container">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Earnings Overview(this Month)</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">





                <canvas id="myChart" width="400" height="200"></canvas>


            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <!-- <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
           Card Header - Dropdown 
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                
            </div> 
            Card Body 
            <div class="card-body">
        
            </div>
        </div>
    </div> -->
</div>




<!-- chart script -->
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    var xValue = {!!json_encode($chartX) !!};
    var yValue = {!!json_encode($chartY) !!};

    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: xValue,
            datasets: [{
                label: 'earn',
                data: yValue,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@include('layouts.adminFooter')
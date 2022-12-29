<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Sale;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use App\Services\Admin\DashboardService;

class DashBoardController extends Controller
{
    private $service;

    public function __construct(DashboardService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $monthlyEarning = Sale::monthlyEarnings();


        $yearlyEarning = Sale::yearlyEarnings();

        $SalesmanCount = User::where('active', 1)
            ->where('role', 0)
            ->count();
         
        $mostBoughtProduct =  $this->service->mostBoughtProduct();
        //most active user (purchased the most)
        $userActivity =  $this->service->userActivityCollection();
        $mostActiveUser =  $userActivity->where('bought', $userActivity->max('bought'))->first();

        $chartXLabel = [];
        $chartYLabel = [];
        $this->service->chartLabel($chartXLabel, $chartYLabel);

        return view('admin.dashboard.dashboard', [
            'monthlyEarning' => $monthlyEarning,
            'yearlyEarning' => $yearlyEarning,
            'mostBoughtProduct' => $mostBoughtProduct,
            'mostActiveUser' => $mostActiveUser->user_name,
            'chartX' =>  $chartXLabel,
            'chartY' => $chartYLabel,
            'ProductCount' => Product::count(),
            'invisibleProductCount' => Product::where('visibility', 0)->count(),
            'soldOrderThisMonthCount' => Order::where('status', 'sold')->count(),
            'SalesmanCount' => $SalesmanCount
        ]);
    }


    public function usersActivity()
    {
        $usersActivities = $this->service->userActivityCollection();
        $usersActivities =  $usersActivities->sortBy('bought')->paginate(30);
        
        return view('admin.dashboard.user.usersActivities', [
            'usersActivities' => $usersActivities
        ]);
    }


    public function userActivityShow($userID)
    {
        $userProducts = User::find($userID)->productActivity->sortBy('bought')->paginate(30);

        return view('admin.dashboard.user.userActivities', [
            'userProducts' => $userProducts
        ]);
    }


    public function productActivity()
    {
        $productsActivities = $this->service->productActivityCollection()
            ->sortByDesc('bought')
            ->paginate(30);

        return view('admin.dashboard.product.productsActivities', [
            'productsActivities' => $productsActivities

        ]);
    }



    public function fresh()
    {
        Artisan::call('migrate:fresh', [
            '--force' => true
         ]);
        Artisan::call('db:seed', [
            '--force' => true
         ]);
        File::copyDirectory(
            base_path('./') . '/' . 'public/images/spare',
            base_path('./') . '/' . 'public/images/productImages'
        );

        return redirect()->route('dashboard');
    }
}

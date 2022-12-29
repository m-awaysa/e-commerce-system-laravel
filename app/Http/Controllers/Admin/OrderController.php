<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\User;
use App\Models\Order;
use App\Models\GuestOrder;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Services\Admin\OrderService;


class OrderController extends Controller
{
   private $service;
   public function __construct(OrderService $service)
   {
    $this->service=$service;
   }
    public function index(Request $request)
    {
        $arrayOrder = [];

        $order = Order::where('status', '!=', 'requested')->orderBy('status', 'asc')->orderBy('created_at', 'desc')->paginate(20);
        array_push($arrayOrder,  $order);

        $userRequestCount = Order::where('status', 'requested')->count();
        $guestRequestCount = GuestOrder::where('status', 'requested')->count();
        return view('admin.order.list', [

            'arrayOrders' => $arrayOrder,
            'userRequestCount' => $userRequestCount,
            'guestRequestCount' => $guestRequestCount,
        ]);
    }


    public function request(StoreOrderRequest $request)
    {

        $user = auth()->user();
        //if the salesman try to request 0 amount product using html
        if(!$this->service->is_all_product_available($user->product))
          return  redirect()->route('cart')
            ->with('message', 'product is not available in the stock');

        if (!$user->product->isEmpty()) {
            $lastOrder = Order::create([
                'sold_price' =>  $this->service->order_total_price($user),
                'name' =>  $request->invoice_name,
                'user_id' =>   $user->id,
                'phone_number' => $request->phone_number,
                'city' => $request->city,
                'street' => $request->street,
                'note' => $request->note,
                'status' => 'requested',
            ]);
            foreach ($user->product as $cartProduct) {
                Sale::create([
                    'sold_price' => $this->service->product_price($user, $cartProduct),
                    'company' => $cartProduct->company,
                    'discount' => $this->service->discount($user, $cartProduct),
                    'category_id' => $cartProduct->category->id,
                    'amount' => $cartProduct->pivot->amount,
                    'color' => $cartProduct->color,
                    'product_code' => $cartProduct->product_code,
                    'purchased_price' => $cartProduct->purchased_price,
                    'product_id' => $cartProduct->id,
                    'order_id' =>   $lastOrder->id,
                ]);

                $this->service->this_user_request_this_product(User::find(auth()->user()->id), $cartProduct);
            }

            User::find($user->id)->product()->detach();
        } else {
            return redirect()->route('cart')->with('message', 'You have no product to request!!');
        }

        return redirect()->route('cart')->with('message', 'we receive your request successfully!!');
    }


    public function viewPendingOrder()
    {
        $orders =  Order::where('status', 'requested')->paginate(20);

        return view('admin.order.pendingOrder', [
            'orders' => $orders
        ]);
    }


    public function ship(Order $order)
    {
        $order->status = 'shipping';
        $order->save();

        return redirect()->route('order.pending');
    }


    public function sold(Order $order)
    {
        $order->status = 'sold';
        $order->save();

        foreach ($order->sale as $product) {
            $this->service->this_user_bought_this_product(User::find($order->user_id), $product);
        }

        return redirect()->route('order');
    }


    public function viewEdit(Order $order)
    {
        $sales = $order->sale->paginate(30);

        return view('admin.order.orderProducts', [
            'sales' => $sales,
            'order' => $order
        ]);
    }


    public function edit(UpdateOrderRequest $request, Order $order)
    {
        foreach ($request->sold_prices as  $id => $value) {
            $order->sale->find($id)->update([
                'color' => $request->colors[$id],
                'amount' => $request->amounts[$id],
                'purchased_price' => $request->purchased_prices[$id],
                'sold_price' => $value,
            ]);
        }
        return redirect()->route('order.edit', $order);
    }


    public function delete(Order $order)
    {
        foreach ($order->sale as $sale) {

            if ($sale->product != null) {
                $this->service->cancel_the_order($order, $sale);
            }
        }

        //deleting an order leads to delete its sales (mysql constraint)
        $order->delete();
        return redirect()->back()->with('deleteSuccess', 'deleted successfully');
    }


    public function show(Order $order)
    {
        $sales = $order->sale->paginate(30);

        return view('admin.order.show', [
            'sales' => $sales
        ]);
    }


    public static function  getOrderRequestCount()
    {
        $userRequestCount = Order::where('status', 'requested')->count();
        $guestRequestCount = GuestOrder::where('status', 'requested')->count();
        return   $guestRequestCount +  $userRequestCount;
    }
}

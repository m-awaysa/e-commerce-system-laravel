<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Salesman\UpdateSalesmanInfoRequest;
use App\Http\Requests\Salesman\UpdateSalesmanRequest;

class SalesmanController extends Controller
{
    public function index(Request $request)
    {
        //id=1 is reserved for guest
        $salesmen =   User::where('active', 1)->where('role', 0)->where('id','!=','1')->paginate(30);
        $pendingCount = User::where('active', 0)->count();

        return view('admin.salesman.list', [
            'salesmen' => $salesmen,
            'pendingCount' => $pendingCount
        ]);
    }


    public function viewPendingAccount()
    {
        $salesmen =  User::where('active', 0)->paginate(20);

        return view('admin.salesman.pendingAccount', [
            'salesmen' => $salesmen
        ]);
    }


    public function viewEdit(User $user)
    {
        return view('admin.salesman.edit', [
            'user' => $user
        ]);
    }


    public function edit(User $user, UpdateSalesmanRequest $request)
    {
        $newUser = $request->validated();

        if ($user->email != $request->email) {
            $request->validate([
                'email' => ['required', 'email', 'min:3', 'max:255', 'unique:users,email'],
            ]);
        }

        $newUser['email'] = $request->email;
        $user->update($newUser);

        return redirect()->route('salesman')->with('message', 'Account updated');
    }


    public function accept(User $user)
    {
        $user->active = 1;
        $user->save();

        return redirect()->route('salesman.pendingAccount')->with('message', 'Account accepted');
    }


    public function removeAccountRequest(User $user)
    {
        $user->delete();
        return redirect()->route('salesman.pendingAccount')->with('deleteSuccess', 'Account removed');
    }
    public function delete(User $salesman)
    {
        $salesman->delete();
        return redirect()->route('salesman')->with('deleteSuccess', 'Account removed');
    }

    public static function getRequestCount()
    {
        return User::where('active', 0)->count();
    }


    public function salesmanInfo()
    {
        $salesman = auth()->user();

        return view('salesman.index', ['salesman' => $salesman]);
    }


    public function salesmanEditInfo(UpdateSalesmanInfoRequest $request)
    {
        $newUser =  $request->validated();
       
        if (auth()->user()->email != $request->email) {
            $request->validate(['email' => ['required', 'email', 'min:3', 'max:255', 'unique:users,email'],]);
            $newUser['email'] = $request->email;
        }
        User::find(auth()->user()->id)->update($newUser);

        return redirect()->route('salesman.info')->with('success', 'edited successfully');;
    }
}

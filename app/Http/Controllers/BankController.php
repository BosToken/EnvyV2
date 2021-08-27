<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Address;
use App\Models\BankName;
use App\Models\BankAccount;
use App\Models\Setting;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index(){
        
        $user = Session::get('user');
        // $main = User::find($user->id)->bankmain()->get();
        $setting = Setting::get();
        $bank = User::find($user->id)->bank_accounts()->get();
        $nameBank = BankName::get();
        if ($user) {
            $quantity = User::find($user->id)->carts()->count();
            return view('User.bankAccount', compact('user', 'nameBank', 'bank', 'setting', 'quantity'));
        } else {
            return view('User.bankAccount', compact('user', 'nameBank', 'bank', 'setting'));
        }
    }

    public function store(Request $request)
    {
        $user_id = Session::get('user')->id;
        $bank_name_id = $request->bank_name_id;
        $account_name = $request->account_name;
        $account_number = $request->account_number;

        $data = new BankAccount();
        $data->user_id = $user_id;
        $data->bank_name_id = $bank_name_id;
        $data->account_name= $account_name;
        $data->account_number = $account_number;
        $data->save();

        return redirect()->action([BankController::class, 'index']);
    }

    public function destroy($id)
    {
        BankAccount::where('id', $id)->delete();
        return redirect()->action([BankController::class, 'index']);
    }

    // public function changeMainYes($id)
    // {
    //     $Yes = "Yes";
    //     BankAccount::where('id', $id)->update([
    //         'main' => $Yes

    //     ]);
    //     return redirect()->action([BankController::class, 'index']);
    // }

    // public function changeMainNo($id)
    // {
    //     $No = "No";
    //     BankAccount::where('id', $id)->update([
    //         'main' => $No
    //     ]);
    //     return redirect()->action([BankController::class, 'index']);
    // }

    // public function storeBankMain(Request $request)
    // {
    //         $No = "No";
    //         User::where('id', $id)->update([
    //             'main' => $No
    //         ]);
    //         return redirect()->action([BankController::class, 'index']);

    // }

    public function changeMain(Request $request, $id)
    {
        $user = Session::get('user');
        User::find($user->id)->update([
            'bank_main_id' => $id
        ]);
        $data = User::where('id', $user->id)->first();
        $request->session()->put('user', $data);
        return redirect()->action([BankController::class, 'index']);
    }

    public function changeMainBuy(Request $request, $id)
    {
        $user = Session::get('user');
        User::find($user->id)->update([
            'bank_main_id' => $id
        ]);
        $data = User::where('id', $user->id)->first();
        $request->session()->put('user', $data);
        return redirect()->action([BankController::class, 'index']);
    }
    
}

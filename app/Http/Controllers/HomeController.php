<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $lastTransId = Transaction::select('transactionId')->latest()->first();

        return view('home', compact('lastTransId'));
    }

    public function adminHome()
    {

        return view('/admin/home');
    }

    public function saveTransaction(Request $request)
    {
        $date = Carbon::now();

        $transid = $request->transactionId;
        $price = $request->price;
        $qty = $request->qty;
        $subtotal = $request->subtotal;

        // $collection = collect([
        //     'transactionId' => $transid,
        //         'price' => $price,
        //         'qty' => $qty,
        //         'subTotal' => $subtotal,
        //         'created_at' => $date
        // ]);
        // DB::table('transactions')->insert($collection);

        for($i=0; $i< count($qty); $i++){
            $datasave = [
                'transactionId' => $transid,
                'price' => $price[$i],
                'qty' => $qty[$i],
                'subTotal' => $subtotal[$i],
                'created_at' => $date
            ];
         DB::table('transactions')->insert($datasave);
        }
        return response()->json(['success'=>'Transaction saved successfully.']);
    }
}

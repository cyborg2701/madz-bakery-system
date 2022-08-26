<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;
use App\Models\Cashout;
use App\Models\Transaction;
use App\Models\Sale;
use App\Models\Cashes;
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
        // current date
        $currentDate = Carbon::now()->toDateString();

        //current week
        

        // current month
        $currentMonth = Carbon::now()->format('n');

        //total cashout
        $totalCashout = DB::table('cashouts')
                            ->sum('amount');

        // daily cashout
        $cashoutDaily = DB::table('cashouts')
                    ->whereDate('created_at', $currentDate)
                    ->sum('amount');

        // weekly cashout
        $cashoutWeekly = DB::Table('cashouts')
                    ->whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek(Carbon::SATURDAY)])
                    ->sum('amount');

          // monhtly cashout
        $cashoutMonthly = DB::table('cashouts')
                    ->whereMonth('created_at', $currentMonth)
                    ->sum('amount');

        // total expenditures
        $totalExpenditure = DB::table('expenses')
                            ->sum('expensesTotal');


        //expenditures daily
        $expendturesDaily = DB::table('expenditures')
                                    ->whereDate('created_at', $currentDate)
                                    ->sum('expenditureAmount');           
        // expenditures weeekly
        $expendturesWeekly = DB::table('expenditures')
                                    ->whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek(Carbon::SATURDAY)])
                                    ->sum('expenditureAmount');
                                

        // expenditures monthly
        $expendturesMonthly = DB::table('expenditures')
                                    ->whereMonth('created', $currentMonth)
                                    ->sum('expenditureAmount');

                    
        // gross total sales
        $grossTotalSales = DB::table('transactions')
                    ->sum('subTotal');

        // daily sales
        $grossDailySales = DB::table('transactions')
                    ->whereDate('created_at', $currentDate)
                    ->sum('subTotal');

        // weekly sales
        $grossWeeklySales = DB::Table('transactions')
                    ->whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek(Carbon::SATURDAY)])
                    ->sum('subTotal');

                    
        // monthly sales
        $grossMonthlySales = DB::table('transactions')
                    ->whereMonth('created_at', $currentMonth)
                    ->sum('subTotal');

        // cash daily 
        $cashDaily = DB::table('cashes')
                    ->whereDate('created_at', $currentDate)
                    ->sum('cashToday');
        
        // cash daily 
        $cashWeekly = DB::table('cashes')
                    ->whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek(Carbon::SATURDAY)])
                    ->sum('cashToday');

         // cash mothly 
        $cashMonthly = DB::table('cashes')
                    ->whereMonth('created_at', $currentMonth)
                    ->sum('cashToday');

        //total cash
        $cashTotal = DB::table('cashes')
                    ->sum('cashToday');



        // daily sales less daily cashout
        $netIncomeDaily = ($cashDaily + $grossDailySales) - $cashoutDaily;

        // weekly sales less weekly cashout
        $netIncomeWeekly = ($cashWeekly + $grossWeeklySales) - $cashoutWeekly;

        // monthly income sales
        $netMonthlySales = ($cashMonthly +$grossMonthlySales) - ($cashoutMonthly + $expendturesMonthly);

        // total sales less total cashout
        $netIncomeTotal = ($cashTotal) + $grossTotalSales - ($totalCashout + $totalExpenditure);
        

        return view('/admin/home', compact('netIncomeTotal', 'netIncomeDaily', 'netMonthlySales', 'netIncomeWeekly'));
    }

    public function saveTransaction(Request $request)
    {
        $date = Carbon::now()->toDateString();

        $transid = $request->transactionId;
        $price = $request->price;
        $qty = $request->qty;
        $subtotal = $request->subtotal;

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

        $getLastTotal = DB::table('transactions')
                    ->whereDate('created_at', $date)
                    ->sum('subTotal');

        Sale::updateOrCreate([
            'created_at' => $date
        ],
        [
            'total' => $request->total + $getLastTotal - $request->total
        ]);
        return response()->json(['success'=>'Transaction saved successfully.']);
    }
}

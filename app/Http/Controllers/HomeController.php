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
        return view('home');
    }

    public function index2()
    {
        return view('home2');
    }


    public function adminHome()
    {
        // current date
        $date = Carbon::now()->toDateString();

         // current month
         $month = Carbon::now()->format('n');


        // DAILY GROSS SALES
        $dailyGross = DB::table('sales')
                        ->whereDate('created_at', $date)
                        ->sum('total');

        // DAILY EXPENSES
        $dailyExpenses = DB::table('cashouts')
                        ->whereDate('created_at', $date)
                        ->sum('expenseAmount');
        //DAILY NET SALES
        $dailyNet = $dailyGross - $dailyExpenses;

        
        // GROSS WEEKLY SALES
        $weeklyGross = DB::table('sales')
                        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                        ->sum('total');
        // WEEKLY EXPENSES
        $weeklyExpenses = DB::table('cashouts')
                        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                        ->sum('expenseAmount');

        //DAILY NET SALES
        $weeklyNet = $weeklyGross - $weeklyExpenses;


        // MONTHLY GROSS SALES
        $monthlyGross = DB::table('sales')
                        ->whereMonth('created_at', $month)
                        ->sum('total');

        // MONTHLY EXPENSES
        $monthlyExpenses = DB::table('cashouts')
                        ->whereMonth('created_at', $month)
                        ->sum('expenseAmount');

        // EXPENDITURE MONTHLY EXPENSES
        $monthlyExpenditures = DB::table('expenditures')
                        ->whereMonth('created', $month)
                        ->sum('expenditureAmount');

        //MONTHLY NET SALES
        $monthlyNet = $monthlyGross - ($monthlyExpenses + $monthlyExpenditures);

        //TOTAL SALES

        $totalSales = DB::table('sales')
                    ->sum('total');
        $totalExpenses = DB::table('expenses')
                    ->sum('expensesTotal');
        $totalExpenditures = DB::table('expenditures')
                    ->sum('expenditureAmount');

        $overAllSales = $totalSales - ($totalExpenses + $totalExpenditures);


        

        return view('/admin/home', compact('dailyNet', 'weeklyNet', 'monthlyNet', 'overAllSales'));
    }

    public function saveTransaction(Request $request)
    {
        $date = Carbon::now()->toDateString();

        $getLastTotal = DB::table('sales')
                    ->whereDate('created_at', $date)
                    ->sum('total');

        Sale::updateOrCreate([
            'created_at' => $date
        ],
        [
            'total' => $getLastTotal + $request->total
        ]);
        return response()->json(['success'=>'Transaction saved successfully.']);
    }
}

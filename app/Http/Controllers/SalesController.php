<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cashout;
use App\Models\Expenditure;
use App\Models\Sale;
use DataTables;
use Carbon\Carbon;


class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $sales = [];
        if($request->ajax()) {
           $sales = DB::table('sales as s')
                        ->leftJoin('cashouts as c', 's.created_at', 'c.created_at')
                        ->select(
                            DB::raw('s.total as dailySales'),
                            DB::raw('sum(c.expenseAmount) as dailyExpenses'),
                            DB::raw('DATE_FORMAT(s.created_at, \'%M %d, %Y\') as created_at'),
                        )
                        ->groupByRaw('day(s.created_at)')
                        ->latest()
                        ->get();
            return DataTables::of($sales)
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin/sales', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function transaction(Request $request)
    {
        $transactions = [];
        if($request->ajax()) {
           $transactions = DB::table('sales as s')
                        ->select(
                            DB::raw('DATE_FORMAT(s. created_at, \'%M %d, %Y\') as created_at'),
                            'total'
                        )
                        ->latest()
                        ->get();
            return DataTables::of($transactions)
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin/transactions', compact('transactions'));
    }

    //weekly sales
    public function weeklySales(Request $request)
    {
        $weeklysales = [];
        if($request->ajax()) {
           $weeklysales = DB::table('sales as s')
                            ->leftJoin('expenses as e', 's.created_at', 'e.created')
                            ->select(
                                DB::raw('DATE_FORMAT(s.created_at, \'%M %d, %Y\') as created_at'),
                                DB::raw('sum(total) as dailySales'),
                                DB::raw('sum(e.expensesTotal) as dailyExpenses')
                                // DB::raw('e.expensesTotal as dailyExpenses')
                                )
                            // ->whereBetween('s.created_at', [Carbon::parse()->startOfWeek(), Carbon::parse()->endOfWeek()])
                            ->groupByRaw('week(s.created_at)')
                            ->orderBy('s.created_at', 'desc')
                            ->get();

            return DataTables::of($weeklysales)
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin/weeklysales', compact('weeklysales'));

     
    }

     //monthly sales
     public function monthlySales(Request $request)
     {
        $monthlyexpenditures = DB::table('expenditures')
                                ->whereMonth('created', Carbon::now()->format('n'))
                                ->sum('expenditureAmount');
                                
        $monthlysales = [];
        if($request->ajax()) {
           $monthlysales = DB::table('sales as s')
                            ->leftJoin('expenses as e', 's.created_at', 'e.created')
                            ->leftJoin('expenditures as x', 's.created_at', 'x.created')
                            ->select(
                                DB::raw('DATE_FORMAT(s.created_at, \'%M\') as created_at'),
                                DB::raw('sum(s.total) as monthlySales'),
                                DB::raw('sum(e.expensesTotal) as monthlyExpenses'),
                                DB::raw('sum(x.expenditureAmount) as monthlyExpenditures')
                                )
                            ->groupByRaw('month(s.created_at)')
                            ->orderBy('s.created_at', 'desc')
                            ->get();

            return DataTables::of($monthlysales)
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin/monthlysales', compact('monthlysales'));
     }
}

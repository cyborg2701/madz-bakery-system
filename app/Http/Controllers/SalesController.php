<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cashout;
use App\Models\Transaction;
use App\Models\Expenditure;
use App\Models\Sale;
use App\Models\Cash;
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
        // current date
        $sales = [];
        if($request->ajax()) {
           $sales = DB::table('sales as s')
                        ->leftJoin('cashouts as c', 's.created_at', '=', 'c.created_at')
                        ->leftJoin('expenses as e', 's.created_at', 'e.created')
                        ->leftJoin('cashes as h', 's.created_at', 'h.created_at')
                        ->select(
                            DB::raw('s.total as salesDaily'),
                            DB::raw('sum(c.amount) as cashoutDaily'),
                            's.created_at as created_at',
                            DB::raw('e.expensesTotal as expenseTotal'),
                            DB::raw('h.cashToday as cash'),
                            DB::raw('(h.cashToday + s.total) - sum(c.amount) as incomeToday')
                        )

                        ->groupBy('s.created_at')
                        ->get();
                        // dd($lastDayOfMonth);
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
}

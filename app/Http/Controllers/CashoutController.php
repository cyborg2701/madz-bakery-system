<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cashout;
use App\Models\Expense;
use DataTables;
use Carbon\Carbon;


class CashoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cashout = [];
        if($request->ajax()) {
            $cashout = DB::table('cashouts')
                            ->latest()->get();  
            return DataTables::of($cashout)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0);" data-id="'.$row->id.'" class="btn btn-success btn-sm editCashout"><i class="fas fa-fw fa-pencil-alt"></i> Edit</a> ';
                    $btn .= '<a href="javascript:void(0);" data-id="'.$row->id.'" class="btn btn-danger btn-sm deleteCashout"><i class="fas fa-fw fa-trash-alt"></i> Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin/cashout', compact('cashout'));
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
        $date = Carbon::now()->toDateString();
        // validate
        $request->validate([
            'expenseType' => 'required',
            'expenseName' => 'required',
            'expenseAmount' => 'required|numeric'
        ]);
        // insert
        $expenses = Cashout::updateOrCreate([
            'id' => $request->id
        ],[
            'expenseType' => $request->expenseType,
            'expenseName' => $request->expenseName,
            'expenseAmount' => $request->expenseAmount,
            'expenseRemarks' => $request->expenseRemarks,
            'created' => $date
        ]);

        $getLastExpense= DB::table('cashouts')
            ->whereDate('created', $date)
            ->sum('expenseAmount');
        
        Expense::updateOrCreate(
            [
                'created' => $date
            ],
            [
                'expensesTotal' =>  $request->expenseAmount + $getLastExpense - $request->expenseAmount
            ]
        );
        return response()->json(['success'=>'Expense saved successfully.']);
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
    public function edit(Request $request)
    {
        $expense  = Cashout::where('id', $request->id)
                            ->first();
        return response()->json($expense,);
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
    public function destroy(Request $request)
    {
        $date = Carbon::now()->toDateString();
        $expenses = Cashout::where('id', $request->id)->delete();

        $getLastExpense= DB::table('cashouts')
        ->whereDate('created', $date)
        ->sum('expenseAmount');
    
        Expense::updateOrCreate(
            [
                'created' => $date
            ],
            [
                'expensesTotal' => $getLastExpense - $request->expenseAmount
            ]
        );
        return response()->json([
            'success'=>'Expense deleted successfully.'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Expenditure;
use App\Models\Expense;
use DataTables;
use Carbon\Carbon;


class ExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $expenditures = [];
        if($request->ajax()) {
            $expenditures = Expenditure::where('expenditureAmount', '>', 0)
                                ->latest()->get();
            return DataTables::of($expenditures)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0);" data-id="'.$row->id.'" class="btn btn-success btn-sm editExpenditure "><i class="fas fa-fw fa-pencil-alt"></i> Edit</a> ';
                    $btn .= '<a href="javascript:void(0);" data-id="'.$row->id.'" class="btn btn-danger btn-sm deleteExpenditure "><i class="fas fa-fw fa-trash-alt"></i> Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin/expenditures', compact('expenditures'));
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

        $request->validate([
            'expenditureType' => 'required',
            'expenditureDescription' => 'required',
            'expenditureAmount' => 'required',
            'expenditureDate' => 'required',
        ]);

        $expenditure = Expenditure::updateOrCreate([
            'id' => $request->id    
        ],
        [
            'expenditureType' => $request->expenditureType,
            'expenditureDescription' => $request->expenditureDescription,
            'expenditureAmount' => $request->expenditureAmount,
            'expenditureRemarks' => $request->expenditureRemarks,
            'created' =>  $request->expenditureDate,

        ]);
        
        // $getLastExpenditure = DB::table('expenditures')
        //     ->whereDate('created', $request->expenditureDate)
        //     ->sum('expenditureAmount');
        
        // Expense::updateOrCreate([
        //     'created_at' => $request->expenditureDate],
        // [
        //     'expensesTotal' => $getLastExpenditure,
        //     'created' =>  $request->expenditureDate,
        // ]);
        return response()->json(['success'=>'Expenditure saved successfully.']);
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
        $where = [
            'id' => $request->id
        ];
        $expenditures  = Expenditure::where($where)->first();
        return response()->json($expenditures);
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
        $expenditures = Expenditure::where('id', $request->id)->delete();
        return response()->json([
            'success'=>'Expenditure deleted successfully.'
        ]);
        // $expenditure = Expenditure::updateOrCreate([
        //     'id' => $request->id    
        // ],
        // [
        //     'expenditureName' => $request->expenditureName,
        //     'expenditureAmount' => $request->expenditureAmount,
        // ]);


        // $getLastExpenditure = DB::table('expenditures')
        //     ->whereDate('created_at', $date)
        //     ->sum('expenditureAmount');
        
        // Expense::updateOrCreate([
        //     'created_at' => $date],
        // [
        //     'expensesTotal' => $getLastExpenditure
        // ]);
    }
}

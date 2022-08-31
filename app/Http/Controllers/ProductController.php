<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = [];
        if($request->ajax()) {
            $products = Product::all();
            return DataTables::of($products)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0);" data-id="'.$row->id.'" class="btn btn-success btn-sm editProduct"><i class="fas fa-fw fa-pencil-alt"></i> Edit</a> ';
                    $btn .= '<a href="javascript:void(0);" data-id="'.$row->id.'" class="btn btn-danger btn-sm deleteProduct"><i class="fas fa-fw fa-trash-alt"></i> Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin/products', compact('products', 'categories'));
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
        $request->validate([
            'prodName' => 'required',
            'prodPrice' => 'required',
            'prodCategory' => 'required',
        ]);

        $products = Product::updateOrCreate([
            'id' => $request->id],
            [
            'prodName' => $request->prodName,
            'prodPrice' => $request->prodPrice,
            'prodCategory' => $request->prodCategory
        ]);
        return response()->json(['success'=>'Employee saved successfully.']);
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
        $products  = Product::where($where)->first();
        return response()->json($products,);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $products = Product::where('id', '=' ,$request->id)->first();

        $products->prodName = $request->prodName;
        $products->prodPrice = $request->prodPrice;
        $products->prodCategory = $request->prodCategory;
        $products->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $products = Product::where('id', $request->id)->delete();
        return response()->json([
            'success'=>'Product deleted successfully.'
        ]);
    }

    public function optimize(Transaction $transaction)
    {
        $transactions = Transaction::where('qty', 0)->delete();
        return response()->json([
            'success'=>'Product deleted successfully.'
        ]);
    }
}

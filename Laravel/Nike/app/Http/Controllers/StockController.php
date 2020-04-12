<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
use App\Stock;
use App\Tags;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::paginate(5);
        return view ('stock.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tags::all();
        $category = Category::all();

        return view ('stock.insert', compact('tags', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock = new Stock();
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'total' => 'required',
            'price' => 'required',
            'tag_id' => 'required',
            'describe' => 'required',
        ]);

        $stock->name = $request->name;
        $stock->category_id = $request->category_id;
        $stock->total = $request->total;
        $stock->price = $request->price;
        $stock->tag_id = $request->tag_id;
        $stock->describe = $request->describe;

        $stock->save(); 

        return redirect('/stock');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock=Stock::find($id);
        
        return view('Stock.view', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock=Stock::find($id);
        $tags = Tags::all();
        $category = Category::all();
        
        return view('Stock.edit', compact('stock','tags','category'));
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
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'total' => 'required',
            'price' => 'required',
            'tag_id' => 'required',
            'describe' => 'required',
        ]);

        $stock = Stock::find($id);
        
        $stock->name = $request->name;
        $stock->category_id = $request->category_id;
        $stock->total = $request->total;
        $stock->price = $request->price;
        $stock->tag_id = $request->tag_id;
        $stock->describe = $request->describe;

        $stock->save();
        return redirect('/stock');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::find($id);
        $stock->delete();

        return redirect('/stock');
    }
}

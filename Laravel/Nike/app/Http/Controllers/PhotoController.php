<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Photo;
use App\Stock;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $photos = DB::table('photos')
        ->join('stocks', 'photos.stock_id', '=', 'stocks.id')
        ->select(DB::raw('count(file) as total'), 'photos.id', 'photos.stock_id', 'photos.file', 
                'stocks.name as stock_name', 'stocks.tag_id as stock_tag', 
                'stocks.describe as stock_desc')
        ->groupBy('photos.stock_id')
        ->paginate(9);

        return view ('photo.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stock = Stock::all();
        return view ('photo.insert_01', compact('stock'));
    }

    public function add_photo(Request $request)
    {
        $stock_id = $request->stock_id;
        $stock = Stock::find($stock_id);
        return view ('photo.insert_02', compact('stock'));
        
    }

    public function fileStore(Request $request)
    {
        //bagian save ke blob
        $photo = new Photo();

        $file = $request->file('file');
        // Get the contents of the file
        $contents = $file->openFile()->fread($file->getSize());
        
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();

        // Store the contents to the database
        $photo->file = $contents;
        $photo->stock_id = $request->stock_id;
        $photo->filename = $imageName;
        $photo->save();

        //pindahin ke public folder        
        $image->move(public_path('nike/photos'),$imageName);

        if(!$photo){
            App::abort(500, 'Error');
        }else{
            return response()->json(['success'=>$imageName]);
        }

    }

    public function fileDestroy(Request $request)
    {
        $name =  $request->get('filename');
        $photo=Photo::where('filename',$name)->delete();

        $path=public_path().'/nike/photos/'.$name;
        if (file_exists($path)) {
            unlink($path);
        }

        if(!$photo){
            App::abort(500, 'Error');
        }else{
            return $name;  
        }
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
    public function detail($id)
    {
        $photos = DB::table('photos')
        ->where('stock_id',$id)
        ->get();

        $detail = DB::table('photos')
        ->join('stocks', 'photos.stock_id', '=', 'stocks.id')
        ->join('categories', 'stocks.category_id', '=', 'categories.id')
        ->join('tags', 'stocks.tag_id', '=', 'tags.id')
        ->select(DB::raw('count(file) as total'), 'photos.id', 'photos.stock_id', 
                'stocks.name as stock_name', 'tags.name as stock_tag', 
                'categories.name as stock_cat', 
                'stocks.price', 'stocks.total',
                'stocks.describe as stock_desc')
        ->where('stock_id',$id)
        ->groupBy('photos.stock_id')
        ->first();

        return view ('photo.detail', compact('photos','detail'));

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

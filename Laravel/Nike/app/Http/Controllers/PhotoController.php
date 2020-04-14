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
        ->select('photos.id', 'photos.stock_id', 'photos.file', 
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
        $filename =  $request->get('filename');
        Photo::where('filename',$filename)->delete();
        $path=public_path().'/nike/photos/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
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

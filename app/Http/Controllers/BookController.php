<?php

 namespace App\Http\Controllers;
 use Illuminate\Support\Facades\DB;

 use Illuminate\Http\Request;
use App\book;
use App\Category;
use App\subcategory;
use App\stock;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookdata=book::all();
        return view('book.list',['data'=>$bookdata,
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catdata=DB::table('categories')->select('id','name')->get();
        //dd($catdata);
        $subcatdata=DB::table('subcategories')->select('id','subc_name')->get();
            return view('book.create',[
                'catdata'=>$catdata,
                'subcatdata'=>$subcatdata,
            ]);
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=book::create([
            'book_name'=>request('name'),
            'author_name'=>request('auth'),
            'publisher_name'=>request('pub'),
            'price'=>request('price'),
            'category_id'=>request('category'),
            'subcategory_id'=>request('subcategory'),
        ]);
        
        return redirect('/book')->with('success','data submited successfully');
    }
    
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=book::find($id);
        $catdata=DB::table('categories')->select('id','name')->get();
        $subcatdata=DB::table('subcategories')->select('id','subc_name')->get();
    
       // dd($data);
    
        return view('book.edit',[
            'data'=>$data,
            'catdata'=>$catdata,
            'subcatdata'=>$subcatdata,

        ]);
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
        $data=book::find($id);
        $data->book_name=request('name');
        $data->author_name=request('auth');
        $data->publisher_name=request('pub');
        $data->price=request('price');

       $data->category_id=request('category_id');
       $data->subcategory_id=request('subcategory_id');
       
        $data->save();
    if($data->wasChanged())
        return  redirect('/book');
    return redirect('/book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Book::find($id);
        $data->delete();
        return redirect('book/');

    }
    public function getSubCategory(Category $category)
    {
        $subcatdata = subcategory::where('category_id',$category->id)->get();
        //dd($category->id);
        return $subcatdata;
    }





//stock curd operation

    public function show($id)
    {
        $data=book::find($id);

        return view('stock.create',[
            'data'=>$data,
        ]);
        
    }
    public function stock(Request $request)
    {
        $data=stock::create([
            'book_name'=>request('name'),
            'qty'=>request('qty'),
        ]);
        return redirect('/stock/list')->with('success','data submited successfully');
    }

    public function stocklist()
    {
        $stockdata=stock::all();
        return view('stock.list',['data'=>$stockdata,
       ]);
    }

    public function stockedit($id)
    {
        $data=stock::find($id);

        return view('stock.edit',[
            'data'=>$data,
        ]);
    }

    public function stockupdate(Request $request, $id)
    {
        $data=stock::find($id);
        $data->book_name=request('name');
        $data->qty=request('qty');
        
        $data->save();
    if($data->wasChanged())
        return  redirect('/stock/list');
    return redirect('/stock/list');
    }

    public function stockdestroy($id)
    {
        $data=stock::find($id);
        $data->delete();
        return redirect('stock/list');

    }

}
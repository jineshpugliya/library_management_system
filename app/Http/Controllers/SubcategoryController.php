<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\subcategory;
class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catdata=subcategory::all();
        return view('subcategory.list',['data'=>$catdata,
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
            return view('subcategory.create',[
                'catdata'=>$catdata,
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
        $data=subcategory::create([
            'subc_name'=>request('name'),
            'sub_des'=>request('des'),
            'category_id'=>request('category_id'),

        ]);
        return redirect('/subcategory')->with('success','data submited successfully');

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
        $data=subcategory::find($id);
        $catdata=DB::table('categories')->select('id','name')->get();
    
        //dd($data);
    
        return view('subcategory.edit',[
            'data'=>$data,
            'catdata'=>$catdata,
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
        $data=SubCategory::find($id);
        $data->subc_name=request('name');

        $data->sub_des=request('des');


       $data->category_id=request('category_id');

        $data->save();
    if($data->wasChanged())
        return  redirect('/subcategory');
    return redirect('/subcategory');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catdata=SubCategory::find($id);
        $catdata->delete();
        return redirect('subcategory/');
    }
}

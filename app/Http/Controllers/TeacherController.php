<?php

namespace App\Http\Controllers;

use App\teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catdata=teacher::all();
        return view('teacher.list',['data'=>$catdata,
       ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=teacher::create([
            'techer_id'=>request('tid'),
            'name'=>request('tname'),
            'm_number'=>request('mobile'),

        ]);
        return redirect('/teacher')->with('success','data submited successfully');    }

    /**
     * Display the specified resource.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=teacher::find($id);
       
        return view('teacher.edit',[
            'data'=>$data,
        ]);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=teacher::find($id);
        $data->techer_id=request('tid');
        $data->name=request('tname');
        $data->m_number=request('mobile');
        $data->save();
    if($data->wasChanged())
        return  redirect('/teacher');
    return redirect('/teacher');      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=teacher::find($id);
        $data->delete();
        return redirect('teacher/'); 
    }
}

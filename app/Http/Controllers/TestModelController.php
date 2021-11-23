<?php

namespace App\Http\Controllers;

use App\Models\testModel;
use Illuminate\Http\Request;

class TestModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return testModel::all();
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
            'name'=>'required',
            'password'=>'required',
            'email'=>'required',
            //'password'=>'unique',
        ]);
        return response()->json(testModel::query()->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param  \App\Models\testModel  $testModel
     * @return \Illuminate\Http\Response
     */
    public function show(testModel $testModel,$id)
    {
        return $testModel->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\testModel  $testModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $user = testModel::find($id);
        $user->update($request->all());
        return $user;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param  \App\Models\testModel  $testModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(testModel $testModel,$id)
    {
        return testModel::destroy($id);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param str $name
     * @param  \App\Models\testModel  $testModel
     * @return \Illuminate\Http\Response
     */
    public function search(testModel $testModel,$name)
    {
        return testModel::where('name','like','%'.$name.'%')->get();
    }
}

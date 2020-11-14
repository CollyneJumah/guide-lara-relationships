<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrandFather;
use Auth;

class GrandFatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //validate
        $request->validate([
            'name' => ['required'],
            'phone' => ['required','starts_with:+2547'],
            'email' => ['required','email']
        ]);
        //logged in user name
        $request['created_by'] = Auth::user()->name;
        //submit data by linking with the model 
        $submitDate = GrandFather::create( $request->all() );
        //return back with a message        NB: Ensure you create session on the home page to display the message
        return back()->with('message','GrabdFather data saved');
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
        $updateGrandFather = GrandFather::find($id);

        $request['created_by'] = Auth::user()->name;
        $updateGrandFather->update( $request->all() );

        return back()->with('message','changes updated successfully');


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
        $deleteGrandFather = GrandFather::find($id);
        $deleteGrandFather->delete();
        return back()->with('message','GrabdFather deleted from database');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fathers;
use Auth;

class FathersController extends Controller
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
        //
        $request->validate([
            'name' => ['required'],
            'phone' => ['required','starts_with:+2547'],
            'email' => ['required','email']
        ]);
        //logged in user name
        $request['created_by'] = Auth::user()->name;
        //submit data by linking with the model 
        $submitDate = Fathers::create( $request->all() );
        //return back with a message        NB: Ensure you create session on the home page to display the message
        return back()->with('message','Father\'s data saved');
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
        $updateFather = Fathers::find($id);

        $request['created_by'] = Auth::user()->name;
        $updateFather->update( $request->all() );

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
        $deleteFather =Fathers::find($id);
        $deleteFather->delete();
        return back()->with('message','Father deleted from database');
    }
}

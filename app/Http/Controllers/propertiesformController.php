<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\property;
use App\applicant;
use App\payment;

class propertiesformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $properties = property::orderBy('created_at','desc')->paginate(8);
        $applicanties = applicant::orderBy('created_at','desc')->paginate(8);
        $payments = payment::orderBy('created_at','desc')->paginate(8);
       
        
        // echo sizeof($applicanties);
        // echo $applicanties[0]['name'];
        // exit();
        // $properties = array($properties);
        // $applicanties = array($applicanties);
        // var_dump(json_decode(json_encode($applicanties)),true);

        // exit();
        // for($i=0; sizeof($applicanties)>$i; $i++){
        //     var_dump( $applicanties[$i]->name); 
        // }
        // exit();
        // $applicanties = array($applicanties);
        // foreach($applicanties as $ap){
        //     echo $ap[0]->name;
        //     exit();
        // }
        // var_dump($app);
        // exit();
        return view('displayrecord.properties',compact('properties','applicanties','payments'));
        // return view('displayrecord.properties')->with('properties', $properties);
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

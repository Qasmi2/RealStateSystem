<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\installment;
use App\payment;
use App\property;
use App\witness;
use App\review;
use Validator;
use DB;

class editingControll extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $property  = DB::table('properties')->where('id',$id)->first();
        $payment = DB::table('payments')->where('propertyId',$id)->first();
        $applicant = DB::table('applicants')->where('propertyId',$id)->first();
        $installment = DB::table('installments')->where('propertyId',$id)->first();
        $review = DB::table('reviews')->where('propertyId',$id)->first();
        $witness = DB::table('witnesses')->where('propertyId',$id)->first();

         $isEmpty = json_encode($installment);
        
        if($isEmpty == "null")
        { 
            
            return view('editingfrom/editfroms',compact('property','applicant','payment','witness','review'));    
        }
        else{
            
            return view('editingfrom/editfromsinstallment',compact('property','applicant','payment','witness','review','installment')); 
        }
        
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
        var_dump("testing updating controller" .$id);
        exit();
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\installment;
use App\payment;
use App\property;
use App\witness;
use App\review;
use App\applicant;
use DB;

class formController extends Controller
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
        $property  = DB::table('properties')->where('id',$id)->first();
        $payment = DB::table('payments')->where('propertyId',$id)->first();
        $applicant = DB::table('applicants')->where('propertyId',$id)->first();
        return view('displayrecord.registrationform',compact('property','payment','applicant'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showform2($id)
    {
        $property  = DB::table('properties')->where('id',$id)->first();
        $payment = DB::table('payments')->where('propertyId',$id)->first();
        $applicant = DB::table('applicants')->where('propertyId',$id)->first();
        $installment = DB::table('installments')->where('propertyId',$id)->first();
       

         $isEmpty = json_encode($installment);
        
        if($isEmpty == "null")
        { 
            
            return view('displayrecord.declarationform2',compact('property','applicant','payment'));    
        }
        else{
            
            return view('displayrecord.declarationform21',compact('property','applicant','payment','installment')); 
        }
   
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showform3($id)
    {
      
        $applicant = DB::table('applicants')->where('propertyId',$id)->first();
        $payment = DB::table('payments')->where('propertyId',$id)->first();

        return view('displayrecord.declarationform3',compact('applicant','payment')); 
   
    }
      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showReceptform($id)
    {
        $property = DB::table('properties')->where('id',$id)->first();
        $installments = DB::table('installments')->where('propertyId',$id)->first();
        $payment = DB::table('payments')->where('propertyId',$id)->first();
        $witness =DB::table('witnesses')->where('propertyId',$id)->first();
        
        $isEmpty = json_encode($installments);
        
        if($isEmpty == "null")
        { 
           
            return view('displayrecord.receipttotalamount',compact('property','payment','witness')); 
            
        }
        else{
           
            return view('displayrecord.receiptinstallment',compact('property','payment','installments','witness')); 
            // return view('displayrecord/singlerecordinstallment',compact('property','applicant','payment','witness','review','installment')); 
        }
        
   
    }
    public function showcontractform($id)
    {
        $property = DB::table('properties')->where('id',$id)->first();
        $installments = DB::table('installments')->where('propertyId',$id)->first();
        $payment = DB::table('payments')->where('propertyId',$id)->first();
        $witness =DB::table('witnesses')->where('propertyId',$id)->first();
        $review = DB::table('reviews')->where('propertyId',$id)->first();
        $applicant = DB::table('applicants')->where('propertyId',$id)->first();
        
        $isEmpty = json_encode($installments);
        
        if($isEmpty == "null")
        { 
           
            return view('displayrecord.contractform',compact('property','payment','witness','applicant','review')); 
            
        }
        else{
           
            return view('displayrecord.contractforminstallment',compact('property','payment','installments','witness','applicant','review')); 
            // return view('displayrecord/singlerecordinstallment',compact('property','applicant','payment','witness','review','installment')); 
        }
        
   
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
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
Use Redirect;
use App\installment;
use App\payment;
use App\property;
use App\witness;
use App\review;
use App\applicant;
use App\token;
use App\tokenHistory;
use App\paymentHistory;
use App\installmentHistory;
use Validator;
use App\seller;
use App\Http\Controllers\DataTime;
use DateTime;
use DateInterval;
use DB;
use Storage;
use App\User;
use Auth;
class paymentHistoryController extends Controller
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if(Gate::allows('user-actions',Auth::user())){

            try{

                $property  = DB::table('properties')->where('id',$id)->first();
                $payment = DB::table('payments')->where('propertyId',$id)->first();
                $applicant = DB::table('applicants')->where('propertyId',$id)->first();
                $installment = DB::table('installments')->where('propertyId',$id)->first();
                $review = DB::table('reviews')->where('propertyId',$id)->first();
                $token = DB::table('tokens')->where('propertyId',$id)->first();
                $tokenhisory = DB::table('token_histories')->where('propertyId',$id)->first();
                //$seller = seller::orderBy('created_at','desc')->get();
                $installmentHistory = DB::table('installment_histories')->where('propertyId', $id)->get();
                $paymenthistory = DB::table('payment_histories')->where('propertyId', $id)->first();

            
                $isEmptyinstallment = json_encode($installment);
                $isEmptytoken = json_encode($token);
            


                if($isEmptytoken == "null" && $isEmptyinstallment == "null")
                { 
                    // total payment
                    return view('paymenthistory/totalpaymenthistory',compact('property','applicant','payment','review','paymenthistory','tokenhisory'));    
                }
                elseif($isEmptytoken != "null" && $isEmptyinstallment == "null"){
                    // token
                    return view('paymenthistory/tokenhistory',compact('property','applicant','payment','review','token','paymenthistory','tokenhisory')); 
                }
                elseif($isEmptyinstallment != "null"){
                    // installment
                    return view('paymenthistory/installmenthistory',compact('property','applicant','payment','review','installment','paymenthistory','tokenhisory','installmentHistory'));    
                }
            
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' Show single record section something wrong .');
            }  
        // }
        // else{
        //     return redirect()->back()->with('error',' You are not Allow view Payment Section .');
        // }  
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment;
use App\property;
use App\applicant;
use App\witness;
use App\review;
use Validator;
use DB;

class paymentController extends Controller
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
       // validation
        $validator = Validator::make($request->all(), [
            'propertyPrice' => 'required',
            'propertyId'=>'required', 
            'transferTo' => 'required',
            'propertyPurchingDate' => 'required',
            'propertyPaymentProcedure' =>'required',
            'paymentType'=>'required',
            'witnessName' => 'required',
            'witnessCnicNo' => 'required',
            
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }
           // get all user data
        //initilization the property object 

        $payment = new payment;
        $payment->paymentType = $request->input('paymentType');
        $payment->transferTo = $request->input('transferTo');
        $payment->bankName = $request->input('bankName');
        $payment->propertyPurchingDate = $request->input('propertyPurchingDate');
        $payment->propertyPaymentProcedure = $request->input('propertyPaymentProcedure');
        $payment->propertyPrice = $request->input('propertyPrice');
        $payment->propertyId = $request->input('propertyId');
        $installment = $payment->propertyPaymentProcedure;
        //get property ID 
        $propertyID = $request->input('propertyId');

        // initilization the witness table object
        $witness = new witness;
        $witness->witnessName = $request->input('witnessName');
        $witness->witnessCnicNo = $request->input('witnessCnicNo');
        $witness->propertyId = $request->input('propertyId');

        // initilization the review table object
        $review = new review;
        $review->comment=$request->input('comment');
        $review->propertyId = $request->input('propertyId');


        if($payment->save()){
            // insert the witness info
            $witness->save();
            // insert the review 
            $review->save();
            if($installment == "Installment")
            {
                $lastId = payment::orderBy('updated_at','desc')->first();
                // save all the property info and return propertyId;
                return view('registrationfrom/installment')->with('lastId',$lastId);
            }
            else{
                // save all the property info and return property, applicant, payment, rows of the property Id
                $property = DB::table('properties')->where('id',$propertyID)->first();
                $applicant = DB::table('applicants')->where('propertyId',$propertyID)->first();
                $payment = DB::table('payments')->where('propertyId',$propertyID)->first();
                $witness = DB::table('witnesses')->where('propertyId',$propertyID)->first();
                $review = DB::table('reviews')->where('propertyId',$propertyID)->first();
                 

                //  $test = array($applicant);
                // foreach($test as $te)
                // {
                //     echo $te->name;
                //     echo"<br>";
                //     echo $te->fatherName;
                //     exit();
                // }
                // exit();     
                return view('registrationfrom/submitform',compact('property','applicant','payment','witness','review'));   
                
            }
            
        }
        else{
            return redirect()->back()->with('error',' Payment section data is not Insert .');
        }
            // end of user data 
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

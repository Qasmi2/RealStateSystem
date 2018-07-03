<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\installment;
use App\payment;
use Validator;
use DB;
class installmentsController extends Controller
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
            'noOfInstallments' => 'required',
            'propertyId'=>'required',
            'paymentId'=>'required',
        
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $propertyId =  $lastId = $request->input('propertyId');
        $noOfinstallments = $request->input('noOfInstallments');
        
        // calculation the installments 
        $propertyprice  = DB::table('payments')->where('propertyId',$propertyId)->value('propertyPrice');
        // total Amount divided into Number of installment to get the one installments
        $AmountOfOneInstallment = $propertyprice/$noOfinstallments;
       
        // get all user data
        //initilization the property object 

        $installment = new installment;
        $installment->noOfInstallments = $request->input('noOfInstallments'); 
        $installment->installmentAmount = $AmountOfOneInstallment;
        // $installment->propertyId = $propertyId;
        $installment->paymentId = $request->input('paymentId');
        $paymentId = $request->input('paymentId');
        if($installment->save()){
           
                $property = DB::table('properties')->where('id',$propertyId)->first();
                $applicant = DB::table('applicants')->where('propertyId',$propertyId)->first();
                $payment = DB::table('payments')->where('propertyId',$propertyId)->first();
                $installment = DB::table('installments')->where('paymentId',$paymentId)->first();
                
            return view('registrationfrom/submitforminstallment ',compact('property','applicant','payment','installment')); 
        }
        else{
            return redirect()->back()->with('error',' installment section data is not Insert there are some problem within database .');
        }
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

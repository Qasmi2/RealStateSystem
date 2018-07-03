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
            'downpayment' => 'required',
            'propertyId'=>'required',
            
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        // property Id , down payment , No of installment require for calculation so get all the variables 
        $propertyId = $request->input('propertyId');
        $downpayment = $request->input('downpayment');
        $noOfinstallments = $request->input('noOfInstallments');
        //get the total amount
        $propertyprice  = DB::table('payments')->where('propertyId',$propertyId)->value('propertyPrice');
        // Total amount , down payment , No of installment (calculation of installment throught these three variables)
        $remaningAmount = $propertyprice - $downpayment ;
        // total Amount divided into Number of installment to get the one installments
        $AmountOfOneInstallment = $remaningAmount/$noOfinstallments;
        // get today data and add 3 months ( 90 days ) to calculat the next installment date
        //$todayDate = date("Y-m-d");
        //date_add($todayDate,date_interval_create_from_date_string("90 days"));
        //$nextInstallmentPayment = $todayDate;
        

        // get all user data
        //initilization the property object 

        $installment = new installment;
        $installment->noOfInstallments = $noOfinstallments; 
        $installment->downpayment = $downpayment;
        $installment->propertyId = $propertyId;
    
        if($installment->save()){
                
                $property = DB::table('properties')->where('id',$propertyId)->first();
                $applicant = DB::table('applicants')->where('propertyId',$propertyId)->first();
                $payment = DB::table('payments')->where('propertyId',$propertyId)->first();
                $installment = DB::table('installments')->where('propertyId',$propertyId)->first();

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

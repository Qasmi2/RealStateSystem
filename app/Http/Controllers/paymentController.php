<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment;
use Validator;

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
            'bankName' => 'required',
            // 'paymentMethod'=>'required',
            // 'propertyPaymentType' => 'required',
            // 'chequeNo'=>'required',
            // 'totalAmount'=>'required',
            // 'initialDeposite'=>'required',  
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }
           // get all user data
        //initilization the property object 

        $payment = new payment;
        $payment->propertyPrice = $request->input('propertyPrice');
        $payment->propertyPaymentType = $request->input('propertyPaymentType');
        $payment->transferTo = $request->input('transferTo');
        $payment->bankName = $request->input('bankName');
        $payment->propertyPaymentProcedure = $request->input('propertyPaymentProcedure');
        $payment->propertyPurchingDate = $request->input('propertyPurchingDate');
        $payment->paymentType = $request->input('paymentType');
        $payment->paymentMethod = $request->input('paymentMethod');
        // booking data should be '9999-12-31 23:59:59'. like this 
        $payment->bookingDate = $request->input('bookingDate');
        $payment->chequeNo = $request->input('chequeNo');
        $payment->totalAmount = $request->input('totalAmount');
        $payment->initialDeposite = $request->input('initialDeposite');
        $payment->propertyId = $request->input('propertyId');
        $installment = $payment->propertyPaymentProcedure;
        // var_dump($installment);
        // exit();
        if($payment->save()){
            if($installment == "Installment")
            {
                $lastId = payment::orderBy('updated_at','desc')->first();
                
                return view('registrationfrom/installment')->with('lastId',$lastId);
            }
            else{
                return view('registrationfrom/submitform')->with('success',"added form.");   
            }
            // save all the property info and return successuflly message;
            return response()->json(['success'=>'added successfully'], 201);
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

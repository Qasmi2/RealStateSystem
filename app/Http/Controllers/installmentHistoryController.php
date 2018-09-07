<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class installmentHistoryController extends Controller
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
    public function create($id,$no)
    {
        try{
            $installment = DB::table('installments')->where('propertyId',$id)->first();
            $installment = array($installment);
            foreach($installment as $te){
                $amountOfOneInstallment = $te->amountOfOneInstallment;
            }

            // to find the installment ( $no ) is already paied 
            $installmentPaymentHistory  = DB::table('installment_histories')->where('propertyId',$id)->get();
            foreach($installmentPaymentHistory as $te){
                    $installments [] =  $te->installmentNo;
                    
            }
            $installmentspaied = sizeof($installments);
            if (in_array($no, $installments)) {
                return redirect()->back()->with('error','Installment is already Paid .');
            }
            else{

                    // installment history
                $installmentH = new installmentHistory;
                $installmentH->installmentNo = $no;
                $installmentH->installmentAmount = $amountOfOneInstallment;
                $installmentH->status = "paid";
                // get today date
                $todayDate = date('Y-m-d');
                $installmentH->installmentPaymentDate = $todayDate;
                $installmentH->propertyId = $id;
                $installmentH->save();            
                
                // payment history 
                $paymentHId  = DB::table('payment_histories')->where('propertyId',$id)->value('id');
                $isEmptypaymentH = json_encode($paymentHId);
                if($isEmptypaymentH == "null")
                {
                    $paymentHistory = new paymentHistory;
                }
                else{

                    $paymentHistory = paymentHistory::find($paymentHId);
                }
                // payment history 
            
                $getpaymentHistory  = DB::table('payment_histories')->where('propertyId',$id)->first();
                $paymentH = array($getpaymentHistory);
                foreach($paymentH as $te){
                    $paidAmount = $te->paidAmount;
                    $remeaningAmount = $te->remeaningAmount;
                }
                $totalPaidAmount = $paidAmount + $amountOfOneInstallment;
                $totalRemeaningAmount = $remeaningAmount - $amountOfOneInstallment;

                $paymentHistory->paidAmount = $totalPaidAmount;
                $paymentHistory->remeaningAmount = $totalRemeaningAmount;
                $paymentHistory->save();
                
                
                $property  = DB::table('properties')->where('id',$id)->first();
                $payment = DB::table('payments')->where('propertyId',$id)->first();
                $applicant = DB::table('applicants')->where('propertyId',$id)->first();
                $installment = DB::table('installments')->where('propertyId',$id)->first();
                $paymenthistory = DB::table('payment_histories')->where('propertyId',$id)->first();

                $installmentHistory  = DB::table('installment_histories')->where('propertyId',$id)->get();
                foreach($installmentHistory as $te){
                        $installmentsNos [] =  $te->installmentNo;
                        $status[]= $te->status;
                        
                }
              
                

                
                
                return view('paymenthistory/installmenthistory',compact('property','applicant','payment','installment','paymenthistory','installmentHistory','installmentsNos','status'));    
            }
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' Show single record section something wrong .');
        }   
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

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
use App\approval;
use App\tokenHistory;
use App\paymentHistory;
use App\installmentHistory;
use Validator;
use App\seller;
use App\paidinstallment;
use App\Http\Controllers\DataTime;
use DateTime;
use DateInterval;
use DB;
use Storage;
use Auth;

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
        $approval = approval::where('propertyId',$id)->first();
        if(Gate::allows('installmentpaid',$approval,Auth::user())){
            try{
                // to find the installment ( $no ) is already paied 
                $installmentPaymentHistory  = DB::table('installment_histories')->where('propertyId',$id)->get();
                $installmentRow = json_encode($installmentPaymentHistory);
            
                if($installmentRow != "[]"){
                
                    foreach($installmentPaymentHistory as $te){
                        $installments [] =  $te->installmentNo;  
                    }
                
                    if (in_array($no, $installments)) {
                    return redirect()->back()->with('error','Installment is already Paid .');
                        //return view('paymenthistory/installmenthistory')->with('error','Installment is already Paid .');    
                    }
                    
                    else{
                        // call to the istory function
                        $this->history($id,$no);
                    
                
                        $installmentHistory  = DB::table('installment_histories')->where('propertyId',$id)->get();     
                        $property  = DB::table('properties')->where('id',$id)->first();
                        $payment = DB::table('payments')->where('propertyId',$id)->first();
                        $applicant = DB::table('applicants')->where('propertyId',$id)->first();
                        $installment = DB::table('installments')->where('propertyId',$id)->first();
                        $paymenthistory = DB::table('payment_histories')->where('propertyId',$id)->first();

                    // foreach($installmentHistory as $te){
                    //     echo $te->status."<br>";
                    // }
                    // exit();
                    // var_dump($installmentHistory);
                    // exit();
                //$installmentHistory = json_decode(json_encode($installmentHistory), True);
                //  var_dump($installmentHistory);
                //    exit();
                    // // // following code will be change into next version 
                
                    // foreach($installmentHistory as $te){
                    //      echo  $te->status;
                    // }
                    // exit();
                    // $paid_installment_row = sizeof($test);
                
                
                
                    // $installment = array($installment);
                    // foreach($installment as $te){
                    //     $totalInstallment = $te->noOfInstallments;
                    // }
                    // $remaingInstallment = $totalInstallment - $paid_installment_row;
                

                    // $installmentRecord = DB::table('paidinstallments')->where('propertyId',$id)->first();
                    // $installmentR = json_encode($installmentRecord);
                
                    // if($installmentR == "null")
                    // {
                    //     $installmentAdd = new paidinstallment;
                    // }
                    // else{
                    
                    //     $installmentAdd = paidinstallment::find($installmentRecord);
                    // }
                    
                    // $installmentAdd->paidinstallment = $paid_installment_row;
                    // $installmentAdd->remeaninginstallment = $remaingInstallment;
                    // $installmentAdd->propertyId = $id;
                    // $installmentAdd->save();
                
                    // //-------------------------------------------------End code 
                    // $installmentshow = DB::table('paidinstallments')->where('propertyId',$id)->first();
                    // var_dump(json_encode($installmentshow));
                    // exit();
                // return redirect()->back()->with(compact('property','applicant','payment','installment','paymenthistory','installmentHistory'));
                    return view('paymenthistory/installmenthistory',compact('property','applicant','payment','installment','paymenthistory','installmentHistory'));    
                    // return view('paymenthistory/installmenthistory',compact('property','applicant','payment','installment','paymenthistory','installmentHistory'));    
                //return view('paymenthistory/installmenthistory')->with($property,$applicant,$payment,$installment,$paymenthistory,$installmentHistory);    
                }
                    
                }
                else{

                    //call to the history function 
                    $this->history($id,$no);

                    $installmentHistory  = DB::table('installment_histories')->where('propertyId',$id)->get(); 
                    $property  = DB::table('properties')->where('id',$id)->first();
                    $payment = DB::table('payments')->where('propertyId',$id)->first();
                    $applicant = DB::table('applicants')->where('propertyId',$id)->first();
                    $installment = DB::table('installments')->where('propertyId',$id)->first();
                    $paymenthistory = DB::table('payment_histories')->where('propertyId',$id)->first();

                    
                // $installmentHistory  = DB::table('installment_histories')->where('propertyId',$id)->get();
                    //$installmentHistory = json_decode(json_encode($installmentHistory), True);
                
                //     var_dump(json_encode($installmentHistory));
                //    exit();
                    // // flowing code in the dublicate code will be eliminate into next version
                    
                
                    // foreach($installmentHistory as $te){
                    //     echo $te->status."<br>";
                    // }
                    // exit();
                    // $paid_installment_row = sizeof($test);
                
                
                    // $installment = array($installment);
                    // foreach($installment as $te){
                    //     $totalInstallment = $te->noOfInstallments;
                    // }
                    // $remaingInstallment = $totalInstallment - $paid_installment_row;
                


                    // $installmentRecord = DB::table('paidinstallments')->where('propertyId',$id)->first();
                    // $installmentR = json_encode($installmentRecord);
                
                    // if($installmentR == "null")
                    // {
                    
                    //     $installmentAdd = new paidinstallment;
                    // }
                    // else{
                    
                    //     $installmentAdd = paidinstallment::find($installmentRecord);
                    // }
                    
                    //  $installmentAdd->paidinstallment = $paid_installment_row;
                    
                    // $installmentAdd->remeaninginstallment = $remaingInstallment;
                    // $installmentAdd->propertyId = $id;
                    // $installmentAdd->save();
                    
                    // // ------------------------------------------------End code
                    // $installmentshow = DB::table('paidinstallments')->where('propertyId',$id)->first();
                    // var_dump(json_encode($installmentshow));
                    // exit();
                    //return redirect()->back()->with(compact('property','applicant','payment','installment','paymenthistory','installmentHistory')); 
                    return view('paymenthistory/installmenthistory',compact('property','applicant','payment','installment','paymenthistory','installmentHistory'));    
                // return view('paymenthistory/installmenthistory',compact('property','applicant','payment','installment','paymenthistory','installmentHistory'));    
                //return view('paymenthistory/installmenthistory')->with($property,$applicant,$payment,$installment,$paymenthistory,$installmentHistory);    
                }
                    
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' Show single record section something wrong .');
            }   
        }
        else{
            return redirect()->back()->with('error',' Not Yet Approved, First Approved then you able to paid Installment  .');
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


    // function for history
    function history($id,$no){
                
        $installment = DB::table('installments')->where('propertyId',$id)->first();
        $installment = array($installment);
        foreach($installment as $te){
            $amountOfOneInstallment = $te->amountOfOneInstallment;
        }
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


        // $property  = DB::table('properties')->where('id',$id)->first();
        // $payment = DB::table('payments')->where('propertyId',$id)->first();
        // $applicant = DB::table('applicants')->where('propertyId',$id)->first();
        // $installment = DB::table('installments')->where('propertyId',$id)->first();
        // $paymenthistory = DB::table('payment_histories')->where('propertyId',$id)->first();

        // $installmentHistory  = DB::table('installment_histories')->where('propertyId',$id)->get();
        // flowing code in the dublicate code will be eliminate into next version
        
       
        // foreach($installmentHistory as $te){
        //      $test [] = $te->status;
        // }
        // $paid_installment_row = sizeof($test);
    
       
        // $installment = array($installment);
        // foreach($installment as $te){
        //     $totalInstallment = $te->noOfInstallments;
        // }
        // $remaingInstallment = $totalInstallment - $paid_installment_row;
       


        // $installmentRecord = DB::table('paidinstallments')->where('propertyId',$id)->first();
        // $installmentR = json_encode($installmentRecord);
       
        // if($installmentR == "null")
        // {
           
        //     $installmentAdd = new paidinstallment;
        // }
        // else{
          
        //     $installmentAdd = paidinstallment::find($installmentRecord);
        // }
        
        //  $installmentAdd->paidinstallment = $paid_installment_row;
        
        // $installmentAdd->remeaninginstallment = $remaingInstallment;
        // $installmentAdd->propertyId = $id;
        // $installmentAdd->save();
        
        // // ------------------------------------------------End code
        // $installmentshow = DB::table('paidinstallments')->where('propertyId',$id)->first();
        // var_dump(json_encode($installmentshow));
        // exit();
        
        //return view('paymenthistory/installmenthistory',compact('property','applicant','payment','installment','paymenthistory','installmentshow'));
        
       

       }

}

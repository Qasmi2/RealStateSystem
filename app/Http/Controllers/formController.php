<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\installment;
use App\payment;
use App\property;
use App\witness;
use App\review;
use App\applicant;
use App\seller;
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
    public function showinstallmentforms($id,$no,$amount)
    {
        try{
            $property = DB::table('properties')->where('id',$id)->first();
            $installments = DB::table('installments')->where('propertyId',$id)->first();
            $payment = DB::table('payments')->where('propertyId',$id)->first();
            $applicant = DB::table('applicants')->where('propertyId',$id)->first();
            $paymentHistory = DB::table('payment_histories')->where('propertyId',$id)->first();
            $installmentHistory = DB::table('installment_histories')->where('propertyId',$id)->get();
            $number = $no;
            $amount = $amount;
          

            $property1 = array($property);       
            foreach($property1 as $te){
                $id = $te->propertySellerId;
            }  
            $seller = DB::table('sellers')->where('id',$id)->first();
            
            return view('displayrecord.receiptinstallmentno',compact('property','payment','installments','applicant','seller','paymentHistory','installmentHistory','number','amount')); 
            
            // if($isEmpty == "null")
            // { 
               
            //     return view('displayrecord.receipttotalamount',compact('property','payment','applicant','seller')); 
                
            // }
            // else{
               
            //     return view('displayrecord.receiptinstallment',compact('property','payment','installments','applicant','seller')); 
            //     // return view('displayrecord/singlerecordinstallment',compact('property','applicant','payment','witness','review','installment')); 
           // }
    
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' Recept From section  something wrong .');
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
        try{
        $property  = DB::table('properties')->where('id',$id)->first();
        $payment = DB::table('payments')->where('propertyId',$id)->first();
        $applicant = DB::table('applicants')->where('propertyId',$id)->first();
        return view('displayrecord.registrationform',compact('property','payment','applicant'));

        }
        catch(Exception $e){
            return redirect()->back()->with('error',' show registerion form 1  section something wrong .');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showform2($id)
    {
        try{
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
        catch(Exception $e){
            return redirect()->back()->with('error',' show Form 2 section  something wrong .');
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
      try{
        $applicant = DB::table('applicants')->where('propertyId',$id)->first();
        $payment = DB::table('payments')->where('propertyId',$id)->first();
        $property = DB::table('properties')->where('id',$id)->first();

        $property = array($property);       
        foreach($property as $te){
            $id = $te->propertySellerId;
        }  
        $seller = DB::table('sellers')->where('id',$id)->first();
        
        return view('displayrecord.declarationform3',compact('applicant','payment','seller')); 
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' from 3 section input something wrong .');
        }
    }
      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showReceptform($id)
    {
        try{
        $property = DB::table('properties')->where('id',$id)->first();
        $installments = DB::table('installments')->where('propertyId',$id)->first();
        $payment = DB::table('payments')->where('propertyId',$id)->first();
        $applicant = DB::table('applicants')->where('propertyId',$id)->first();
        
        $property1 = array($property);       
        foreach($property1 as $te){
            $id = $te->propertySellerId;
        }  
        $seller = DB::table('sellers')->where('id',$id)->first();
        
        $isEmpty = json_encode($installments);
        
        if($isEmpty == "null")
        { 
           
            return view('displayrecord.receipttotalamount',compact('property','payment','applicant','seller')); 
            
        }
        else{
           
            return view('displayrecord.receiptinstallment',compact('property','payment','installments','applicant','seller')); 
            // return view('displayrecord/singlerecordinstallment',compact('property','applicant','payment','witness','review','installment')); 
        }

        }
        catch(Exception $e){
            return redirect()->back()->with('error',' Recept From section  something wrong .');
        }
   
    }
    
      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showReceptformtoken($id)
    {
       
        try{

        $property = DB::table('properties')->where('id',$id)->first();
        $installments = DB::table('installments')->where('propertyId',$id)->first();
        $payment = DB::table('payments')->where('propertyId',$id)->first();
        $witness =DB::table('witnesses')->where('propertyId',$id)->first();
        $token = DB::table('tokens')->where('propertyId',$id)->first();
        $applicant = DB::table('applicants')->where('propertyId',$id)->first();

        $property1 = array($property);       
        foreach($property1 as $te){
            $id = $te->propertySellerId;
        }  
        $seller = DB::table('sellers')->where('id',$id)->first();
        
        $isEmpty = json_encode($installments);
           
        return view('displayrecord.receipttoken',compact('property','payment','token','applicant','seller')); 
        
    }
        catch(Exception $e){
            return redirect()->back()->with('error',' Recept From section  something wrong .');
        }
   
    }
    public function showcontractform($id)
    {
        try{
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
        catch(Exception $e){
            return redirect()->back()->with('error',' contract from  section something wrong .');
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

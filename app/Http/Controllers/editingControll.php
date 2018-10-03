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
use App\approval;
use App\Http\Controllers\DataTime;
use DateTime;
use DateInterval;
use DB;
use Storage;
use Auth;
use App\User;

class editingControll extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::allows('create',Auth::user())){
            // get all seller information 
            try{
                $seller = seller::orderBy('created_at','desc')->get();
                return view('registrationfrom.registrationform',compact('seller'));
                
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' something wrong with the seller info.');
            }
        }
        else{
            return redirect()->back()->with('error',' You are not Allow to Register Form .');
        }    
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
        if(Gate::allows('create',Auth::user())){
            // validation 
            $validator = $this->editValidation($request);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator); 
                // return response()->json(['error'=>$validator->errors()], 401);   
                //return redirect()->back()->with('error',$validator->errors()); 
                //  return Redirect::back()->withErrors($validator);         
            }   
            $user_id = Auth::user();
            //initilization of payment  property object
            try{
                $property = new property;
                $property = $this->property($property,$request);
                if($property->save()){
                    // save all the property info and return successuflly message;
                    // return redirect()->back()->with('success','Insert Record successfully.');
                    $lastId = property::orderBy('updated_at','desc')->first();
                    // get the id of the last enter property record
                    $lastpropertyId = array($lastId);
                    foreach($lastpropertyId as $te){
                        $propertyId = $te->id;
                    }
                
                }
                else{
                    return redirect()->back()->with('error',' Property section data is not Insert .');
                }

            }catch(Exception $e){
                return redirect()->back()->with('error',' Property section data is not Insert .');
            }
            // initilization of payment Applicant object
            try{
                $applicant = new applicant;
                $applicant = $this->applicant($applicant,$request,$propertyId);
                if(!$applicant->save()){
                    return redirect()->back()->with('error',' Applicant record is not save, Something wrong .');
                }  
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' applicant section input something wrong! .');
            }
            // initilization of payment object
            try{

                $payment = new payment;
                $payment = $this->payment($payment,$request,$propertyId);
                if(!$payment->save()){
                    return redirect()->back()->with('error','payment record is not save, Something wrong .');
                } 
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' Payment section input something wrong .');
            }
            //initilization of the review object 
            try{
                $review = new review;
                $review = $this->review($review,$request,$propertyId);
                if(!$review->save()){
                    return redirect()->back()->with('error','review record is not save, Something wrong .');
                } 
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' review section input something wrong .');
            }    
            // initilization of the aproval object
            try{
                $approval = new approval;
                $approval = $this->Unapproval($approval,$propertyId);
                if(!$approval->save()){
                    return redirect()->back()->with('error','approval table have some issue, Something wrong .');
                } 
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' approval section input something wrong .');
            } 
            // installment total amount token
            try{
                $paymentProcedure = $payment->propertyPaymentProcedure;
     
                if($paymentProcedure == "Installment"){
                    $validator =$this->validationInstallment($request);
                    if ($validator->fails()) {
                        return Redirect::back()->withErrors($validator); 
                        //return response()->json(['error'=>$validator->errors()], 401);            
                    }
                    $installment = new installment;
                    $installment = $this->installment($request,$propertyId,$installment);
                    if($installment != "0"){
                        if($installment->save()){
                            $paymentHistory = new paymentHistory;
                            $paymentHistory = $this->paymentHistoryInstallment($paymentHistory,$propertyId);
                            if(!$paymentHistory->save()){
                                return redirect()->back()->with('error','installment record is not save, Something wrong .');
                            }
                        }   
                        else{
                            return redirect()->back()->with('error','installment record is not save, Something wrong .');
                        }

                        $property = DB::table('properties')->where('id',$propertyId)->first();
                        $applicant = DB::table('applicants')->where('propertyId',$propertyId)->first();
                        $payment = DB::table('payments')->where('propertyId',$propertyId)->first();
                        $installment = DB::table('installments')->where('propertyId',$propertyId)->first();
                        $review = DB::table('reviews')->where('propertyId',$propertyId)->first();
                        $sellerId = DB::table('properties')->where('id',$propertyId)->value('propertySellerId');
                        $seller = DB::table('sellers')->where('id',$sellerId)->first();
                      

                        return view('registrationfrom/submitforminstallment ',compact('property','applicant','payment','installment','review','seller'));    
                    }
                    else{
                        return redirect()->back()->with('error','Downpayment is less then 20% .');
                    }
                }
                elseif($paymentProcedure == "Total Amount"){
                
    
                    $this->paymentHistoryTotalAmount($propertyId);
                    
                    $property = DB::table('properties')->where('id',$propertyId)->first();
                    $applicant = DB::table('applicants')->where('propertyId',$propertyId)->first();
                    $payment = DB::table('payments')->where('propertyId',$propertyId)->first();
                    $review = DB::table('reviews')->where('propertyId',$propertyId)->first();
                    // get seller Id from property table 
                    $sellerId = DB::table('properties')->where('id',$propertyId)->value('propertySellerId');
                    $seller = DB::table('sellers')->where('id',$sellerId)->first();
                   

                    return view('registrationfrom/submitform',compact('property','applicant','payment','review','seller'));   
                }
                elseif($paymentProcedure == "Token"){
                    $validator = $this->validationToken($request);
                    if ($validator->fails()) {
                        return Redirect::back()->withErrors($validator);     
                    }
                    $token = new token;
                    $token = $this->token($token,$request, $propertyId);
                    if($token->save()){
                        $tokenHistory = new tokenHistory;
                        $tokenHistory = $this->tokenHistory($tokenHistory,$request,$propertyId);
                        if(!$tokenHistory->save()){
                            return redirect()->back()->with('error','Token History is not save, Something wrong .');
                        }
                        $paymentHistory = new paymentHistory;
                        $paymentHistory = $this->paymentHistoryToken($paymentHistory,$request, $propertyId);
                        $paymentHistory->save();

                        /* End update history maintaince */
                        $property = DB::table('properties')->where('id',$propertyId)->first();
                        $applicant = DB::table('applicants')->where('propertyId',$propertyId)->first();
                        $payment = DB::table('payments')->where('propertyId',$propertyId)->first();
                        $review = DB::table('reviews')->where('propertyId',$propertyId)->first();
                        $token = DB::table('tokens')->where('propertyId',$propertyId)->first();
                        // get seller Id from property table 
                        $sellerId = DB::table('properties')->where('id',$propertyId)->value('propertySellerId');
                        $seller = DB::table('sellers')->where('id',$sellerId)->first();
                       
                        return view('registrationfrom/submitformtoken',compact('property','applicant','payment','review','seller','token'));
                    }
                    else{
                        return redirect()->back()->with('error','token record is not save, Something wrong .');
                    }

                }
                else{
                    return redirect()->back()->with('error','Section Payment Procedure  input something wrong .');
                }
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' insert input ,installment calculation , something wrong .');
            }
        }
        else{
            return redirect()->back()->with('error',' You are not Allow to Register Form .');
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
       
        $property = property::find($id);
        $approval = DB::table('approvals')->where('propertyId',$id)->first();
        $applicant = DB::table('applicants')->where('propertyId',$id)->first();
         if(Gate::allows('view',$property,Auth::user())){
           
            try{

                $property  = DB::table('properties')->where('id',$id)->first();
                $payment = DB::table('payments')->where('propertyId',$id)->first();
             
                $installment = DB::table('installments')->where('propertyId',$id)->first();
                $review = DB::table('reviews')->where('propertyId',$id)->first();
                $token = DB::table('tokens')->where('propertyId',$id)->first();
                $sellerId = DB::table('properties')->where('id',$id)->value('propertySellerId');
                $seller = DB::table('sellers')->where('id',$sellerId)->first();
               // $seller = seller::orderBy('created_at','desc')->get();
             
             
                $isEmptyinstallment = json_encode($installment);
                $isEmptytoken = json_encode($token);
            
                if($isEmptytoken == "null" && $isEmptyinstallment == "null")
                { 
                    // total payment
                    return view('displayrecord/singlerecord',compact('property','applicant','payment','review','seller','approval'));    
                }
                elseif($isEmptytoken != "null" && $isEmptyinstallment == "null"){
                    // token
                    return view('displayrecord/singlerecordtoken',compact('property','applicant','payment','review','token','seller','approval')); 
                }
                elseif($isEmptyinstallment != "null"){
                    // installment
                    return view('displayrecord/singlerecordinstallment',compact('property','applicant','payment','review','installment','seller','approval')); 
                }
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' Show single record section something wrong .');
            }   
        }
        else{
            return redirect()->back()->with('error',' You are not Allow to user Information .');
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
        $property = property::find($id);   
        if(Gate::allows('view',$property,Auth::user())){
            try{    
                $property  = DB::table('properties')->where('id',$id)->first();
                $payment = DB::table('payments')->where('propertyId',$id)->first();
                $applicant = DB::table('applicants')->where('propertyId',$id)->first();
                $installment = DB::table('installments')->where('propertyId',$id)->first();
                $review = DB::table('reviews')->where('propertyId',$id)->first();
                $token = DB::table('tokens')->where('propertyId',$id)->first();
                $approval = DB::table('approvals')->where('propertyId',$id)->first();

                $sellerId = DB::table('properties')->where('id',$id)->value('propertySellerId');
                $selectedseller = DB::table('sellers')->where('id',$sellerId)->first();
                $seller = seller::orderBy('created_at','desc')->get();

                // return view('edit/editfrom',compact('property','applicant','payment','review','token','installment','seller','approval')); 

                $isEmptyinstallment = json_encode($installment);
                $isEmptytoken = json_encode($token);
                if($isEmptytoken == "null" && $isEmptyinstallment == "null")
                { 
                    // total payment
                    return view('editingfrom/editfroms',compact('property','applicant','payment','review','seller','selectedseller','approval'));    
                }
                elseif($isEmptytoken != "null" && $isEmptyinstallment == "null"){
                    // token
                    return view('editingfrom/editfromstoken',compact('property','applicant','payment','review','token','seller','selectedseller','approval')); 
                }
                elseif($isEmptyinstallment != "null"){
                    // installment
                    return view('editingfrom/editfromsinstallment',compact('property','applicant','payment','review','installment','seller','selectedseller','approval')); 
                }
            
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' Editing record section , something wrong .');
            }
        }
        else{
            return redirect()->back()->with('error',' You are not Allow to editing user Information .');
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
       
        $property = property::find($id);   
        if(Gate::allows('view',$property,Auth::user())){

           $approval = approval::where('propertyId',$id)->value('status');
           if($approval == "approved"){
               $paymentmethod = DB::table('payments')->where('propertyId',$id)->value('propertyPaymentProcedure');
                $paymentprocedure = $request->input('propertyPaymentProcedure');
                if($paymentmethod == $paymentprocedure){
                    return redirect()->back()->with('error','You can not update same payment Method (Token, Total Amount, Installment), becuase this Record have been Approved by ADMIN / financial officer ');
                }
                else{
                    if($paymentprocedure == "Token"){
                        $validator = $this->validationToken($request);
                        if ($validator->fails()) {
                            return Redirect::back()->withErrors($validator);       
                        }
                        echo "toke with two paramters ";
                        exit();
                        // if require this funality later will be written code on Token payment procedure 
                        //...
                    }
                    elseif($paymentprocedure =="Installment"){
                        try{
                            $this->updateInstallment($request,$id);
                            return redirect()->back()->with('success','Updated Record successfully.');
                        }
                        catch(Exception $e){
                            return redirect()->back()->with('error','Updating property section , something wrong .');
                        }
                       
                    }
                    elseif($paymentprocedure == "Total Amount"){
                        try{
                            $this->updateTotalAmount($request,$id);
                            return redirect()->back()->with('success','Updated Record successfully.');
                        }
                        catch(Exception $e){
                            return redirect()->back()->with('error','Updating property section , something wrong .');
                        }
                    }
                }
                
           } 
           else{
             
                $validator = $this->editValidation($request);
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator); 
                    //return response()->json(['error'=>$validator->errors()], 401);            
                }   
                $user_id = Auth::user();
                //property info update 
                try{ 
                    $property = property::find($id);
                    $property = $this->property($property,$request);
                    if(!$property->save()){
                        return redirect()->back()->with('error','Updating property section , something wrong .');
                    }
                }
                catch(Exception $e){
                    return redirect()->back()->with('error','Updating property section , something wrong .');
                }
                // applicant info update
                try{
                    $applicantId = DB::table('applicants')->where('propertyId',$id)->value('id');
                    $applicant = applicant::find($applicantId);
                    $applicant = $this->applicant($applicant,$request,$id);
                    if(!$applicant->save()){
                        return redirect()->back()->with('error','Updating Applicant section , something wrong .');
                    }
                }
                catch(Exception $e){
                    return redirect()->back()->with('error',' applicant section input something wrong .');
                }
                try{
                //  initilization of payment object
                    $paymentId = DB::table('payments')->where('propertyId',$id)->value('id');
                    $payment = payment::find($paymentId);
                    $payment = $this->payment($payment,$request,$id);
                    $totalAmount = $request->input('propertyPrice');
                    if(!$payment->save()){
                        return redirect()->back()->with('error','Updating Payment section , something wrong .');
                    }
                
                }
                catch(Exception $e){
                    return redirect()->back()->with('error',' Payment section input something wrong .');
                }
                // initilization of the review object
                try{
                    $reviewId = DB::table('reviews')->where('propertyId',$id)->value('id');
                    $review = review::find($reviewId);
                    $review = $this->review($review,$request,$id);
                    if(!$review->save()){
                        return redirect()->back()->with('error','Updating Review section , something wrong .');
                    }
                    
                }
                catch(Exception $e){
                    return redirect()->back()->with('error',' review section input something wrong .');
                }
                // initilization of the approval object
                try{
                    $approvalTableId = DB::table('approvals')->where('propertyId', $id)->value('id');
                    $approval = approval::find($approvalTableId);
                    $approval = $this->Unapproval($approval,$id);
                
                if(!$approval->save()){
                    return redirect()->back()->with('error',' approval section input something wrong .');
                }
                }
                catch(Exception $e){
                    return redirect()->back()->with('error',' approval section input something wrong .');
                } 
                // installment , total amount, token
                try{
                $paymentProcedure = $payment->propertyPaymentProcedure;
                
                    if($paymentProcedure == "Installment"){
                        $validator =$this->validationInstallment($request);
                        if ($validator->fails()) {
                            return Redirect::back()->withErrors($validator);      
                        }
                    $downpayment =  $this->installmentUpdateSimple($request,$id);
                        if($downpayment == 0){
                                return redirect()->back()->with('error',' downpayment is less then 20% .');
                        }
                    }
                    elseif($paymentProcedure == "Total Amount"){
                    
                        $this->installmentDelete($id);
                        $this->tokenDelete($id);
                        $this->paymentHistoryTotalAmount($id);
                        
                    }
                    elseif($paymentProcedure == "Token"){
                        $validator = $this->validationToken($request);
                        if ($validator->fails()) {
                            return Redirect::back()->withErrors($validator);       
                        }
                        $installmentrow = DB::table('installments')->where('propertyId',$id)->first();
                        $isEptyinstallmentRow = json_encode($installmentrow);
                        if($isEptyinstallmentRow != "null"){
                            $this->installmentDelete($id);
                        }
                        $tokeId  = DB::table('tokens')->where('propertyId',$id)->value('id');
                        $isEmptyTokenH = json_encode($tokeId);
                        if($isEmptyTokenH == "null"){
                            $token = new token;
                        }
                        else{
                            $token = token::find($tokeId);
                        }
                        $token = $this->token($token,$request, $id);
                        if($token->save()){
                            $tokenHistoryId = DB::table('token_histories')->where('propertyId',$id)->value('id');
                            $isE = json_encode($tokenHistoryId);
                            if($isE == "null"){
                                $tokenHistory = new tokenHistory;
                            }
                            else{
                                $tokenHistory = tokenHistory::find($tokenHistoryId);
                            }
                            $tokenHistory = $this->tokenHistory($tokenHistory,$request,$id);
                            if(!$tokenHistory->save()){
                                return redirect()->back()->with('error','Token History is not save, Something wrong .');
                            }
                            $paymentHistoryId = DB::table('payment_histories')->where('propertyId',$id)->value('id');
                            $isEmptypaymentHId = json_encode($paymentHistoryId);
                            if($isEmptypaymentHId == "null"){
                                $paymentHistory = new paymentHistory;
                            }
                            else{
                                $paymentHistory = paymentHistory::find($paymentHistoryId);
                            }
                            $paymentHistory = $this->paymentHistoryToken($paymentHistory,$request, $id);
                            if(!$paymentHistory->save()){
                                return redirect()->back()->with('error','Token Payment Hisotry Not updated.');
                            }
                        }
                        else{
                            return redirect()->back()->with('error','token record is not save, Something wrong .');
                        }

                    }
                
                    // save all the property info and return successuflly message;
                    return redirect()->back()->with('success','Updated Record successfully.');
                }
                catch(Exception $e){
                    return redirect()->back()->with('error',' updating , installment section , something wrong .');
                }
            }
        }
        else{
            return redirect()->back()->with('error',' You are not Allow to update user Information .');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        
        $approval = approval::where('propertyId',$id)->first();
        if(Gate::allows('delete',$approval,Auth::user())){
            try{
            $installmentrow = DB::table('installments')->where('propertyId',$id)->first();
            // get installment table id to delete that have property Id same 
            // $deleteInstallmentId = DB::table('installments')->where('propertyId',$id)->value('id');
            // get payment table id to delete that  HAVE property Id same 
            $deletePaymentId = DB::table('payments')->where('propertyId',$id)->value('id');
            // get applicant table id to delete that  HAVE property Id same 
            $deleteApplicantId = DB::table('applicants')->where('propertyId',$id)->value('id');
            // get witness table id to delete that  HAVE property Id same 
            // $deleteWitnessId = DB::table('witnesses')->where('propertyId',$id)->value('id');
            // get review table id to delete that  HAVE property Id same 
            $deleteReviewsId = DB::table('reviews')->where('propertyId',$id)->value('id');
            // get property table id to delete that  HAVE property Id same 
            $deletepropertyId = DB::table('properties')->where('id',$id)->value('id');
            // get the token table id to delete the have property Id same
            $deletetoken = DB::table('tokens')->where('propertyId',$id)->first();
            // get the installment id to delete the have peoperty Id same
            $deleteInstallmentHistroy = DB::table('installment_histories')->where('propertyId',$id)->first();
            // get the installment id to delete the have peoperty Id same
            $deletepaymenttHistroy = DB::table('payment_histories')->where('propertyId',$id)->first();
            // get the approval id to delete the have peoperty Id same
            $deleteapproval = DB::table('approvals')->where('propertyId',$id)->first();


            if($deleteapproval){
                $deleteapprovelId = DB::table('approvals')->where('propertyId',$id)->value('id');
            
                $deleteapprovalRow = approval::find($deleteapprovelId);
                if(!$deleteapprovalRow->delete()){
                    return view('displayrecord.deleterecordMessage')->with('error', 'NOT Record Removed,  Approval row have something worng  !!!');
                }
        }  


            if($deletepaymenttHistroy){
                $deletepaymentHistoryId = DB::table('payment_histories')->where('propertyId',$id)->value('id');
            
                $deletepaymentHistoryRow = paymentHistory::find($deletepaymentHistoryId);
                if(!$deletepaymentHistoryRow->delete()){
                    return view('displayrecord.deleterecordMessage')->with('error', 'NOT Record Removed,  payment history row have something worng  !!!');
                }
        }  


            if($deleteInstallmentHistroy){
                $deleteinstallmentHistoryId = DB::table('installment_histories')->where('propertyId',$id)->value('id');
            
                $deleteInstallmentHistoryRow = installmentHistory::find($deleteinstallmentHistoryId);
                if(!$deleteInstallmentHistoryRow->delete()){
                    return view('displayrecord.deleterecordMessage')->with('error', 'NOT Record Removed,  installment History row have something worng  !!!');
                }
        }


        if($deletetoken){
                $deleteTokenId = DB::table('tokens')->where('propertyId',$id)->value('id');
                $deleteTokenRow = token::find($deleteTokenId);
                if(!$deleteTokenRow->delete()){
                    return view('displayrecord.deleterecordMessage')->with('error', 'NOT Record Removed,  token row have something worng  !!!');
                }
        }
            // check that installment is exist or not 
            if($installmentrow){
                        
                $deleteInstallmentId = DB::table('installments')->where('propertyId',$id)->value('id');
                $deleteInstallmentRow = installment::find($deleteInstallmentId);
                if(!$deleteInstallmentRow->delete()){
                    return view('displayrecord.deleterecordMessage')->with('error', 'NOT Record Removed,  installment row have something worng  !!!');
                }
            }
            $payment = payment::find($deletePaymentId);
            if($payment){
                // if apyment is not delete then error massage will be shown 
                if(!$payment->delete()){
                    //return redirect()->back()->with('error', 'NOT Record Removed Id is worng !!!');
                    return view('displayrecord.deleterecordMessage')->with('error', 'NOT Record Removed,  Id is worng  !!!');
                }
            }
            $applicant = applicant::find($deleteApplicantId);
            if($applicant){
                if(!$applicant->delete()){
                    //return redirect()->back()->with('error', 'NOT Record Removed Id is worng !!!');
                    return view('displayrecord.deleterecordMessage')->with('error', 'NOT Record Removed,  Id is worng  !!!');
                }
            }
            // $witness = witness::find($deleteWitnessId);
            // if($witness){
            //     if(!$witness->delete()){
            //         // return redirect()->back()->with('error', 'NOT Record Removed Id is worng !!!');
            //         return view('displayrecord.deleterecordMessage')->with('error', 'NOT Record Removed,  Id is worng  !!!');
            //     }
            // }
            $review = review::find($deleteReviewsId);
            if($review){
                if(!$review->delete()){
                    //return redirect()->back()->with('error', 'NOT Record Removed Id is worng !!!');
                    return view('displayrecord.deleterecordMessage')->with('error', 'NOT Record Removed,  Id is worng  !!!');
                }
            }
            $property = property::find($deletepropertyId);
        
            if($property){
            
                if(!$property->delete()){
                    
                    //return redirect()->back()->with('error','NOT Removed, Id is wrong  !!!');
                    return view('displayrecord.deleterecordMessage')->with('error', 'NOT Record Removed,  Id is worng  !!!');
                }
                else{
                    //return redirect()->back()->with('success','Delted Record  !!!');
                    return view('displayrecord.deleterecordMessage')->with('status', 'Delted Record  !!!');  
                
                }

            }
            else{

                //return redirect()->back()->with('error','Record NOT Found or Something Wrong !!!');
                return view('displayrecord.deleterecordMessage')->with('error', 'Record NOT Found or Something Wrong !!!');  
            }
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' Deletion section, something wrong .');
            }
        }
        else{
            return redirect()->back()->with('error',' You are not Allow to Delete user Information .');
        }
    }

    //---------------------------Functions ----------------------------------
    /**
     * Randam Function 
     * @param $length
     * return Random Number
     */
    // function to Generate the random number
    function random_string($length) {
                $key = '';
                $keys = array_merge(range(0, 9), range('a', 'z'));
            
                for ($i = 0; $i < $length; $i++) {
                    $key .= $keys[array_rand($keys)];
                }
            
                return $key;
    }
    /**
     * Validation function 
     * @param $request
     * @return validation variable 
    */

     public function editValidation($request){

        $validator = Validator::make($request->all(), [
            // property Info validation 
            'propertyType' => 'required',
            'registrationStatus' => 'required',
            'propertySection' => 'required',
            // 'propertyAddress' => 'required',
            'propertyLocation' => 'required',
            'propertySize' =>'required',
            'propertySellerId'=>'required',
            // 'jointProperty'=>'required',
            // 'noOfJointproperty'=>'required',
            // applicant info validation 
            'name'=> 'required',
            'fatherName'=> 'required',
            'cnicNo'=> 'required',
            // 'passportNo'=> 'required',
            'mailingAddress' => 'required',
            'permanentAddress'=> 'required',
            // 'email'=> 'required',
            // 'phoneNO'=> 'required',
            'mobileNo1'=> 'required',
            // 'mobileNo2'=> 'required',
            // 'cover_image'=> 'required',
            'nomineeName'=> 'required',
            'nomineeFatherName'=> 'required',
            'relationWithApplicant'=> 'required',
            'nomineeCnicNo'=> 'required',
            // 'nomineePassportNo' => 'required',
            // 'nomineeMailingAddress'=> 'required',
            // 'nomineePermanentAddress'=> 'required',
            // 'nomineeMail'=> 'required',
            // 'nomineePhoneNo'=> 'required',
            // 'nomineeMobileNo1'=> 'required',
            // 'nomineeMobileNo2'=> 'required',
            
            // payment info validation 
            'propertyPrice' => 'required',
            
            'transferTo' => 'required',
            'propertyPurchingDate' => 'required',
            'propertyPaymentProcedure' =>'required',
            'paymentType'=>'required',
            // witness info validation 
            // 'witnessName' => 'required',
            // 'witnessCnicNo' => 'required',
            // 

        ]);
        return $validator;
     }

   
    /**
     * property input function 
     * @ param $property , $request 
     * return property array 
     */
    public function property($property,$request){

        $user_id = Auth::user();
        try{
    
            $property->propertyType = $request->input('propertyType');
            $property->registrationStatus = $request->input('registrationStatus');
            $property->propertySection = $request->input('propertySection');
            $property->propertyAddress = $request->input('propertyAddress');
            $property->propertyLocation = $request->input('propertyLocation');
            $property->propertySize = $request->input('propertySize');
            $property->tokenNo = $this->random_string(20);
            $property->jointProperty = $request->input('jointProperty');
            $property->propertySellerId = $request->input('propertySellerId');
            $property->noOfJointApplicant = $request->input('noOfJointApplicant');
            $property->userId = $user_id->id;

            if($property->jointProperty == "No")
            {
                $property->jointProperty = 0;
            }
            else
            {
                $property->jointProperty = 1;
            }
            
            return $property;

        }catch(Exception $e){
            return redirect()->back()->with('error',' Property section data is not Insert .');
        }

    }

    /**
     * image  input function 
     * @ param , $request 
     * return image url 
     */
    public function image($request){

        try{
            
            $file_name = time();
            $file_name .= rand();
            $file_name = sha1($file_name);
            if ($request->file('cover_image')) {
                $ext = $request->file('cover_image')->getClientOriginalExtension();
                $request->file('cover_image')->move(public_path() . "/uploads", $file_name . "." . $ext);
                $local_url = $file_name . "." . $ext;
                $s3_url = url('/').'/uploads/'.$local_url;
                $applicant->cover_image = $s3_url;
            }
        
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' picture section input something wrong .');
        }
    }
    
    /**
     * applicant input function 
     * @ param $property , $request 
     * return property array 
     */
    public function applicant($applicant,$request,$propertyId){

        $user_id = Auth::user();
        try{
            $applicant->name = $request->input('name');
            // $applicant->cover_image = $this->image($request);
            try{
            
                $file_name = time();
                $file_name .= rand();
                $file_name = sha1($file_name);
                if ($request->file('cover_image')) {
                    $ext = $request->file('cover_image')->getClientOriginalExtension();
                    $request->file('cover_image')->move(public_path() . "/uploads", $file_name . "." . $ext);
                    $local_url = $file_name . "." . $ext;
                    $s3_url = url('/').'/uploads/'.$local_url;
                    $applicant->cover_image = $s3_url;
                }
            
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' picture section input something wrong .');
            }
        
            $applicant->fatherName = $request->input('fatherName');
            $applicant->cnicNo = $request->input('cnicNo');
            $applicant->passportNo = $request->input('passportNo');
            $applicant->mailingAddress = $request->input('mailingAddress');
            $applicant->permanentAddress = $request->input('permanentAddress');
            $applicant->email = $request->input('email');
            $applicant->phoneNO = $request->input('phoneNO');
            $applicant->mobileNo1 = $request->input('mobileNo1');
            $applicant->mobileNo2 = $request->input('mobileNo2');
            $applicant->nomineeName = $request->input('nomineeName');
            $applicant->nomineeFatherName = $request->input('nomineeFatherName');
            $applicant->relationWithApplicant = $request->input('relationWithApplicant');
            $applicant->nomineeCnicNo = $request->input('nomineeCnicNo');
            $applicant->nomineePassportNo = $request->input('nomineePassportNo');
            $applicant->nomineeMailingAddress = $request->input('nomineeMailingAddress');
            $applicant->nomineePermanentAddress = $request->input('nomineePermanentAddress');
            $applicant->nomineeMail = $request->input('nomineeMail');
            $applicant->nomineePhoneNo = $request->input('nomineePhoneNo');
            $applicant->nomineeMobileNo1 = $request->input('nomineeMobileNo1');
            $applicant->nomineeMobileNo2 = $request->input('nomineeMobileNo2');
            $applicant->propertyId = $propertyId;
            $applicant->userId = $user_id->id;
        
            return $applicant;
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' applicant section input something wrong! .');
        }
       
    }
    /**
     * payment input fuction 
     * @$ request 
     * return payment
     */
    public function payment($payment,$request,$propertyId){
        $user_id = Auth::user();
        try{

            $payment->paymentType = $request->input('paymentType');
            $payment->transferTo = $request->input('transferTo');
            $payment->bankName = $request->input('bankName');
            $payment->chequeno = $request->input('chequeno');
            $originalDate = $request->input('propertyPurchingDate');
            $newDate = date("d-M-Y", strtotime($originalDate));
            $payment->propertyPurchingDate = $newDate;
            $payment->propertyPaymentProcedure = $request->input('propertyPaymentProcedure');
            $payment->propertyPrice = $request->input('propertyPrice');
            $payment->propertyId = $propertyId;
            $payment->userId = $user_id->id;

            return $payment;
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' Payment section input something wrong .');
        }
    }

    /**
     * review input function
     * get review object and request and properid parameters 
     *  return review objecet 
     */
    public function review($review,$request,$propertyId){

        $user_id = Auth::user();
        try{

            $review->comment=$request->input('comment');
            $review->propertyId = $propertyId;
            $review->userId = $user_id->id;
            return $review;
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' review section input something wrong .');
        }     
        
    } 

    /**
     * Approval function 
     * @param $request
     * @return validation variable 
    */
    public function Unapproval($approval,$propertyId){

        $user_id = Auth::user();
        try{
          
            $approval->userId = $user_id->id;
            $approval->status= "unapproval";
            $approval->propertyId = $propertyId;
        
            return $approval;
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' approval section input something wrong .');
        } 

    }
    /**
     * validation installment fields
     * @pramam $request, properyId 
     * return validator
    */
    public function validationInstallment($request){
         $validator = Validator::make($request->all(), [
            'noOfInstallments' => 'required',
            'downpayment' => 'required',
        ]);
        return $validator;
    }
    /**
     * validation Token fields
     * @pramam $request, properyId 
     * return Validator
    */
    public function validationToken($request){
        $validator = Validator::make($request->all(), [
            'tokenPayment' => 'required',
            'remaningPaymentDate' => 'required',
        ]);
       return $validator;
   }
    /**
     * DATE Addition function 
     * @param $request, propertyId
     * return installmentDate ( array )
     */
    public function DateAdd($request){
        // get numbers of installments 
        $noOfinstallments = $request->input('noOfInstallments');
        $todayDate = date("Y-M-d");
        $data1 = $todayDate;
        for($i=0; $i < $noOfinstallments; $i++)
        {
            $date2 = new DateTime($data1);
            $date2->add(new DateInterval('P3M')); // P90D means a period of 90 day
            $installmentDates[$i] = $date2->format('d-M-Y');
            $date = $installmentDates[$i];         
        }
        return $installmentDates;
    }
    /**
     * Installment function 
     * @param $request, propertyId
     * return 
     */
    public function installment($request,$propertyId,$installment){

        $user_id = Auth::user();
        $downpayment = $request->input('downpayment');
        $noOfinstallments = $request->input('noOfInstallments');
        $propertyprice  = DB::table('payments')->where('propertyId',$propertyId)->value('propertyPrice');
        $atleastDownpayment = ($propertyprice * 0.2) ;
        if($downpayment >=$atleastDownpayment){
            $remaningAmount = $propertyprice - $downpayment;
            $amountOfOneInstallment = $remaningAmount/$noOfinstallments;
            $installmentDates = $this->DateAdd($request);
    
            $installment->noOfInstallments = $noOfinstallments; 
            $installment->downpayment = $downpayment;
            $installment->propertyId = $propertyId;
            $installment->amountOfOneInstallment = $amountOfOneInstallment; 
            $installment->installmentDates = json_encode($installmentDates);
            $installment->userId = $user_id->id;

            return $installment;
        }
        else{
            return 0;
        }
      
    }
      /**
     * Update Installment function 
     * @param $request, propertyId
     * return 
     */
    public function updateInstallment($request,$id){
        
        try{
       
            $downpayment = $request->input('downpayment');
            $noOfinstallments = $request->input('noOfInstallments');
            $token = DB::table('tokens')->where('propertyId',$id)->first();
            $isEmptyToken = json_encode($token);
            if($isEmptyToken != "null"){
                $token = array($token);
                foreach($token as $te){
                    $tokenPayment = $te->tokenPayment;
                }
                $downpayment = $downpayment + $tokenPayment;
                if($token){
                    $deleteTokenId = DB::table('tokens')->where('propertyId',$id)->value('id');
                    $deleteTokenRow = token::find($deleteTokenId);
                    $deleteTokenRow->delete();
                }
            }
            $propertyprice  = DB::table('payments')->where('propertyId',$id)->value('propertyPrice');
            $atleastDownpayment = ($propertyprice * 0.2) ;
            if( $downpayment >=$atleastDownpayment ){
                $remaningAmount = $propertyprice - $downpayment ;
                $amountOfOneInstallment = $remaningAmount/$noOfinstallments;
                $installmentDates = $this->DateAdd($request);
                $installmentId  = DB::table('installments')->where('propertyId',$id)->value('id');
                $isEmpty = json_encode($installmentId);
                if($isEmpty == "null")
                {
                    $installment = new installment;
                }
                else{
                    $installment = installment::find($installmentId);
                }
                $installment->noOfInstallments = $noOfinstallments; 
                $installment->downpayment = $downpayment;
                $installment->propertyId = $id;
                $installment->amountOfOneInstallment = $amountOfOneInstallment; 
                $installment->installmentDates = json_encode($installmentDates);
               
                $installment->save();

                $payment = payment::find($id);
                $payment->propertyPaymentProcedure = $request->input('propertyPaymentProcedure');
                $payment->save();    
            
                $paymentHId  = DB::table('payment_histories')->where('propertyId',$id)->value('id');
                $isEmptypaymentH = json_encode($paymentHId);
                if($isEmptypaymentH == "null")
                {
                    $paymentHistory = new paymentHistory;
                }
                else{
                    $paymentHistory = paymentHistory::find($paymentHId);
                }
                $propertyprice  = DB::table('payments')->where('propertyId',$id)->value('propertyPrice');
                $paymentHistory->paidAmount = $downpayment;
                $remaingAmount = $propertyprice - $downpayment;
                $paymentHistory->remeaningAmount = $remaingAmount;
                $paymentHistory->propertyId = $id;
                $paymentHistory->save();
            }    
            else{
                return 0;
            }          

        } catch(Exception $e){
            return redirect()->back()->with('error',' something wrong with the token payment or token payment.');
        } 
    }
    /**
     * update total Amount 
     */
    public function updateTotalAmount($request,$id){
        try{
            $token = DB::table('tokens')->where('propertyId',$id)->first();
            $isEmptyToken = json_encode($token);
                                
            if($isEmptyToken != "null"){     
                    $deleteTokenId = DB::table('tokens')->where('propertyId',$id)->value('id');
                    $deleteTokenRow = token::find($deleteTokenId);
                    $deleteTokenRow->delete();
            }
            //payment table update
            $propertyprice  = DB::table('payments')->where('propertyId',$id)->value('propertyPrice');
            $paymentId = DB::table('payments')->where('propertyId',$id)->value('id');
            $payment = payment::find($paymentId);
            $payment->propertyPrice = $propertyprice;
            $payment->propertyPaymentProcedure = $request->input('propertyPaymentProcedure');
            $payment->save();
            //delte installment 
            $installmentrow = DB::table('installments')->where('propertyId',$id)->first();
            $isEmptyInstallment = json_encode($installmentrow);
            if($isEmptyInstallment != "null"){
                        
                $deleteInstallmentId = DB::table('installments')->where('propertyId',$id)->value('id');
                $deleteInstallmentRow = installment::find($deleteInstallmentId);
                if(!$deleteInstallmentRow->delete()){
                    return view('displayrecord.deleterecordMessage')->with('error', 'NOT installment table Removed,  installment row have something worng  !!!');
                }
            }
            //delete installment history
            $deleteInstallmentHistroy = DB::table('installment_histories')->where('propertyId',$id)->first();
            $isEmptyInstallmentH = json_encode($deleteInstallmentHistroy);
            if($isEmptyInstallmentH != "null"){
                $deleteinstallmentHistoryId = DB::table('installment_histories')->where('propertyId',$id)->value('id');

                $deleteInstallmentHistoryRow = installmentHistory::find($deleteinstallmentHistoryId);
                if(!$deleteInstallmentHistoryRow->delete()){
                    return view('displayrecord.deleterecordMessage')->with('error', 'NOT installment Hisotry table Removed,  installment History row have something worng  !!!');
                }
            }
           
            $this->paymentHistoryTotalAmount($id);
        }
        catch(Exception $e){
            return redirect()->back()->with('error','Updating property section , something wrong .');
        }
    }

    /**
     * simple update
     * @param $request 
     */
    public function installmentUpdateSimple($request,$id){
        try{
           
            $downpayment = $request->input('downpayment');
            $noOfinstallments = $request->input('noOfInstallments');

        
            $this->tokenDelete($id);

            $propertyprice  = DB::table('payments')->where('propertyId',$id)->value('propertyPrice');
            $atleastDownpayment = ($propertyprice * 0.2) ;
            if( $downpayment >=$atleastDownpayment ){
                $remaningAmount = $propertyprice - $downpayment ;
                $amountOfOneInstallment = $remaningAmount/$noOfinstallments;
                $installmentDates = $this->DateAdd($request);
                $installmentId  = DB::table('installments')->where('propertyId',$id)->value('id');
                $isEmpty = json_encode($installmentId);
                if($isEmpty == "null")
                {
                    $installment = new installment;
                }
                else{
                    $installment = installment::find($installmentId);
                }
                $installment->noOfInstallments = $noOfinstallments; 
                $installment->downpayment = $downpayment;
                $installment->propertyId = $id;
                $installment->amountOfOneInstallment = $amountOfOneInstallment; 
                $installment->installmentDates = json_encode($installmentDates);
              
                $installment->save();
            
                $paymentHId  = DB::table('payment_histories')->where('propertyId',$id)->value('id');
                $isEmptypaymentH = json_encode($paymentHId);
                if($isEmptypaymentH == "null")
                {
                    $paymentHistory = new paymentHistory;
                }
                else{
                    $paymentHistory = paymentHistory::find($paymentHId);
                }
                $propertyprice  = DB::table('payments')->where('propertyId',$id)->value('propertyPrice');
                $paymentHistory->paidAmount = $downpayment;
                $remaingAmount = $propertyprice - $downpayment;
                $paymentHistory->remeaningAmount = $remaingAmount;
                $paymentHistory->propertyId = $id;
                $paymentHistory->save();
                return 1;
            }    
            else{
                return 0;
            }          

        } catch(Exception $e){
            return redirect()->back()->with('error',' something wrong with the token payment or token payment.');
        } 

    }

    /**
     * Total payment function 
     * @param $request, PropertyId
     * return 
     */
    public function TotalPayment($request,$propertyId){

    }
    /**
     * token function \
     * @param $request, PropertyId
     * return 
     */
    public function token($token,$request, $propertyId){

        $token->tokenPayment = $request->input('tokenPayment');
        $token->remaningPaymentDate = $request->input('remaningPaymentDate');
        $token->propertyId = $propertyId;
        return $token;
    }
    /**
     * Payment History Installment function
     * History parameter
     * return 
     */
    public function paymentHistoryInstallment($paymentHistory, $propertyId){

        $propertyprice  = DB::table('payments')->where('propertyId',$propertyId)->value('propertyPrice');
        $downpayment  = DB::table('installments')->where('propertyId',$propertyId)->value('downpayment');
        $paymentHistory->paidAmount = $downpayment;
        $remaingAmount = $propertyprice - $downpayment;
        $paymentHistory->remeaningAmount = $remaingAmount;
        $paymentHistory->propertyId = $propertyId;
      
        return $paymentHistory;
      
    }
    /**
     * Payment History Token function
     * History parameter
     * return 
     */
    public function paymentHistoryToken($paymentHistory,$request, $propertyId){

        $paymentHistory->paidAmount = $request->input('tokenPayment');
        $tokenAmount = $request->input('tokenPayment');
        $propertyprice  = DB::table('payments')->where('propertyId',$propertyId)->value('propertyPrice');
        $remaingAmount = $propertyprice - $tokenAmount;
        $paymentHistory->remeaningAmount = $remaingAmount;
        $paymentHistory->propertyId = $propertyId;

        return $paymentHistory;
      
    }
    /**
     * payment History of total amount
    */
    public function paymentHistoryTotalAmount($id){
        try{
            $paymentHId  = DB::table('payment_histories')->where('propertyId',$id)->value('id');
            $isEmptypaymentH = json_encode($paymentHId);
            if($isEmptypaymentH == "null")
            {
                $paymentHistory = new paymentHistory;
            }
            else{
                $paymentHistory = paymentHistory::find($paymentHId);
            }
            $propertyprice  = DB::table('payments')->where('propertyId',$id)->value('propertyPrice');
            $paymentHistory->paidAmount = $propertyprice;
            $remaingAmount = 0;
            $paymentHistory->remeaningAmount = $remaingAmount;
            $paymentHistory->propertyId = $id;
            $paymentHistory->save();
        }
        catch(Exception $e){
            return redirect()->back()->with('error','Updating property section , something wrong .');
        }
    }


     /**
     * Token History function
     * History parameter
     * return 
     */
    public function tokenHistory($tokenHistory,$request,$propertyId){

        $tokenHistory->tokenPayment = $request->input('tokenPayment');
        $tokenHistory->propertyId = $propertyId;
        return $tokenHistory;
      
    }
   
    /**
     * token delete updted total amount or installment 
    */
    public function tokenDelete($id){

        try{
            $token = DB::table('tokens')->where('propertyId',$id)->first();
            $isEmptyToken = json_encode($token);
            if($isEmptyToken != "null"){
                if($token){
                    $deleteTokenId = DB::table('tokens')->where('propertyId',$id)->value('id');
                    $deleteTokenRow = token::find($deleteTokenId);
                    $deleteTokenRow->delete();
                }
            }
            $tokenHistory = DB::table('token_histories')->where('propertyId',$id)->first();
            $isEmptyTokenH = json_encode($tokenHistory);
            if($isEmptyTokenH != "null"){
                if($tokenHistory){
                    $deleteTokenId = DB::table('token_histories')->where('propertyId',$id)->value('id');
                    $deleteTokenRow = tokenHistory::find($deleteTokenId);
                    $deleteTokenRow->delete();
                }
            }
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' updating , installment section , something wrong .');
        }
        
    }
    /**
     * Installment Delete for updated total amount or token
     */
    public function installmentDelete($id){

        $installmentrow = DB::table('installments')->where('propertyId',$id)->first();
        $installmentHrow = DB::table('installment_histories')->where('propertyId',$id)->first();
        if($installmentrow){
            $deleteInstallmentId = DB::table('installments')->where('propertyId',$id)->value('id');
            $deleteInstallmentRow = installment::find($deleteInstallmentId);
            $deleteInstallmentRow->delete();
            if($installmentHrow){
                $installmentHId  = DB::table('installment_histories')->where('propertyId',$id)->value('id');
                $deleteInstallmentHRow = installmentHistory::find($installmentHId);
                $deleteInstallmentHRow->delete();
            }
        }
    }

    //---------------------class End delimation--------------------------//
}


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
                'cover_image'=> 'required',
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

            if ($validator->fails()) {
                // return response()->json(['error'=>$validator->errors()], 401);   
                return redirect()->back()->with('error',$validator->errors());  
            //  return Redirect::back()->withErrors($validator);         
            }   

            // function to Generate the random number
            function random_string($length) {
                $key = '';
                $keys = array_merge(range(0, 9), range('a', 'z'));
            
                for ($i = 0; $i < $length; $i++) {
                    $key .= $keys[array_rand($keys)];
                }
            
                return $key;
            }
            // get user Id 
            $user_id = Auth::user();
            // get user data
            //initilization the property object 
        try{
    
            $property = new property;
            $property->propertyType = $request->input('propertyType');
            $property->registrationStatus = $request->input('registrationStatus');
            $property->propertySection = $request->input('propertySection');
            $property->propertyAddress = $request->input('propertyAddress');
            $property->propertyLocation = $request->input('propertyLocation');
            $property->propertySize = $request->input('propertySize');
            $property->tokenNo = random_string(20);
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

        try{
            // Handle File Upload
            if($request->hasFile('cover_image')){
                // Get filename with the extension
                // $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                // // Get just filename
                // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // // Get just ext
                // $extension = $request->file('cover_image')->getClientOriginalExtension();
                // // Filename to store
                // $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // // Upload Image
                // $s3_url = url('/').'/public/uploads/'.$local_url;
                // $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);


                $file_name = time();
                $file_name .= rand();
                $file_name = sha1($file_name);
                if ($request->file('cover_image')) {
                    $ext = $request->file('cover_image')->getClientOriginalExtension();
                    $request->file('cover_image')->move(public_path() . "/uploads", $file_name . "." . $ext);
                    $local_url = $file_name . "." . $ext;
        
                    $s3_url = url('/').'/uploads/'.$local_url;
                }
            
            } else {
                $s3_url = 'noimage.jpg';
            }
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' Picture uploading something wrong! .');
        }    

    // initilization the applicant object 
        
        try{
            $applicant = new applicant;
            $applicant->name = $request->input('name');
            $applicant->cover_image = $s3_url;
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
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' applicant section input something wrong! .');
        }
        // initilization of payment object
        try{

            $payment = new payment;
            $payment->paymentType = $request->input('paymentType');
            $payment->transferTo = $request->input('transferTo');
            $payment->bankName = $request->input('bankName');
            $payment->chequeno = $request->input('chequeno');

            $originalDate = $request->input('propertyPurchingDate');
            $newDate = date("d-M-Y", strtotime($originalDate));
        // $payment->propertyPurchingDate = $request->input('propertyPurchingDate');
            $payment->propertyPurchingDate = $newDate;
            $payment->propertyPaymentProcedure = $request->input('propertyPaymentProcedure');
            $payment->propertyPrice = $request->input('propertyPrice');
            $payment->propertyId = $propertyId;
            $payment->userId = $user_id->id;
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' Payment section input something wrong .');
        }
        
        try{
            $review = new review;
            $review->comment=$request->input('comment');
            $review->propertyId = $propertyId;
            $review->userId = $user_id->id;
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' review section input something wrong .');
        }    
        // For approval table 
        try{
            $approval = new approval;
            $approval->userId = $user_id->id;
            $approval->status= "unapproval";
            $approval->propertyId = $propertyId;
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' review section input something wrong .');
        } 
            // installment will be changed into next version 
        try{
            $paymentProcedure = $payment->propertyPaymentProcedure;
            
            // save the applicant 
            if(!$applicant->save()){
                return redirect()->back()->with('error',' Applicant record is not save, Something wrong .');
            }   
            // save the payment 
            if(!$payment->save()){
                return redirect()->back()->with('error','payment record is not save, Something wrong .');
            } 
            // save the approval table
            if(!$approval->save()){
                return redirect()->back()->with('error','approval table have some issue, Something wrong .');
            } 
            // save the review
            if(!$review->save()){
                return redirect()->back()->with('error','review record is not save, Something wrong .');
            } 
            // payment procedure installment headling  
            if($paymentProcedure == "Installment"){
                
                    // validation
                    $validator = Validator::make($request->all(), [
                        'noOfInstallments' => 'required',
                        'downpayment' => 'required',
                    ]);
                    if ($validator->fails()) {
                        return Redirect::back()->withErrors($validator); 
                        //return response()->json(['error'=>$validator->errors()], 401);            
                    }
                    
                    // property Id , down payment , No of installment require for calculation so get all the variables 
                    $propertyId = $propertyId;
                    $downpayment = $request->input('downpayment');
                    $noOfinstallments = $request->input('noOfInstallments');

                    //get the total amount
                    $propertyprice  = DB::table('payments')->where('propertyId',$propertyId)->value('propertyPrice');
                    // Total amount , down payment , No of installment (calculation of installment throught these three variables)
                    $remaningAmount = $propertyprice - $downpayment ;
                    // total Amount divided into Number of installment to get the one installments
                    $amountOfOneInstallment = $remaningAmount/$noOfinstallments;
                    
                    // get lunching (project) data and add 3 months or ( 90 days ) to calculat the next installment date
                    $todayDate = date("Y-M-d");
                    $data1 = $todayDate;
                    //  var_dump(json_encode($data1));
                    //  exit();
                    // jogarr to show data in month name
                    // $installmentDates[0] = $todayDate; 
                
                    for($i=0; $i < $noOfinstallments; $i++)
                    {
                        
                        $date2 = new DateTime($data1);
                        $date2->add(new DateInterval('P3M')); // P90D means a period of 90 day
                        $installmentDates[$i] = $date2->format('d-M-Y');
                        $data1 = $installmentDates[$i];         
                        
                    }
                    // get all user data
                    //initilization the property object 
                
                    $installment = new installment;
                    
                    $installment->noOfInstallments = $noOfinstallments; 
                    $installment->downpayment = $downpayment;
                    $installment->propertyId = $propertyId;
                    $installment->amountOfOneInstallment = $amountOfOneInstallment; 
                    $installment->installmentDates = json_encode($installmentDates);
                    $installment->userId = $user_id->id;
                    // save the installment info
                    if($installment->save()){

                        // installment history
                        // $installmentH = new installmentHistory;
                        // $installmentH->installmentNo = 1;
                        // $installmentH->installmentAmount = $amountOfOneInstallment;
                        // $installmentH->status = "unpaid";

                        // $installmentH->installmentPaymentDate = "2018-09-10";
                        // $installmentH->propertyId = $propertyId;
                        // $installmentH->save();

                        

                        // payment history 
                        $paymentHistory = new paymentHistory;
                        $propertyprice  = DB::table('payments')->where('propertyId',$propertyId)->value('propertyPrice');
                        $paymentHistory->paidAmount = $downpayment;
                        //Remaing amount = total amount - total amount payment;
                        $remaingAmount = $propertyprice - $downpayment;
                        $paymentHistory->remeaningAmount = $remaingAmount;
                        $paymentHistory->propertyId = $propertyId;
                        $paymentHistory->save();
                    

                        $property = DB::table('properties')->where('id',$propertyId)->first();
                        $applicant = DB::table('applicants')->where('propertyId',$propertyId)->first();
                        $payment = DB::table('payments')->where('propertyId',$propertyId)->first();
                        $installment = DB::table('installments')->where('propertyId',$propertyId)->first();
                        $review = DB::table('reviews')->where('propertyId',$propertyId)->first();
                        // get seller Id from property table 
                        $sellerId = DB::table('properties')->where('id',$propertyId)->value('propertySellerId');
                        $seller = DB::table('sellers')->where('id',$sellerId)->first();
                    
                        return view('registrationfrom/submitforminstallment ',compact('property','applicant','payment','installment','installmentDates','review','seller')); 
                        
                    } 
                    else{
                        return redirect()->back()->with('error','installment record is not save, Something wrong .');
                    }

            }
            elseif($paymentProcedure == "Total Amount"){
                
                    // payment history 
                    $paymentHistory = new paymentHistory;
                    $propertyprice  = DB::table('payments')->where('propertyId',$propertyId)->value('propertyPrice');
                    $paymentHistory->paidAmount = $propertyprice;
                //Remaing amount = total amount - total amount payment;
                    $remaingAmount = 0;
                    $paymentHistory->remeaningAmount = $remaingAmount;
                    $paymentHistory->propertyId = $propertyId;
                    $paymentHistory->save();
                
                    // 
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
            
                // validation
                $validator = Validator::make($request->all(), [
                    'tokenPayment' => 'required',
                    'remaningPaymentDate' => 'required',
                ]);
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator); 
                    //return response()->json(['error'=>$validator->errors()], 401);            
                }
                // initilization token table object
                $token = new token;
                $token->tokenPayment = $request->input('tokenPayment');
                $token->remaningPaymentDate = $request->input('remaningPaymentDate');
                $token->propertyId = $propertyId;
            
                if($token->save()){
                    /* update history maintaince */
                    
                    // save history 
                    $tokenHistory = new tokenHistory;
                    $tokenHistory->tokenPayment = $request->input('tokenPayment');
                    $tokenHistory->propertyId = $propertyId;
                    $tokenHistory->save();
                    // payment history 
                    $paymentHistory = new paymentHistory;
                    $paymentHistory->paidAmount = $request->input('tokenPayment');
                    
                    // total property amount and token amount get
                    $tokenAmount = $request->input('tokenPayment');
                    $propertyprice  = DB::table('payments')->where('propertyId',$propertyId)->value('propertyPrice');
                //Remaing amount = total amount - token payment
                    $remaingAmount = $propertyprice - $tokenAmount;

                    $paymentHistory->remeaningAmount = $remaingAmount;
                    $paymentHistory->propertyId = $propertyId;
                    $paymentHistory->save();

                    /* End update history maintaince */
                    // 
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
    
            // save all the property info and return successuflly message;
            // return redirect()->back()->with('success','Record successfully Added.');   
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
             
                $seller = seller::orderBy('created_at','desc')->get();
             
             
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
                $seller = seller::orderBy('created_at','desc')->get();

                $isEmptyinstallment = json_encode($installment);
                $isEmptytoken = json_encode($token);
                if($isEmptytoken == "null" && $isEmptyinstallment == "null")
                { 
                    // total payment
                    return view('editingfrom/editfroms',compact('property','applicant','payment','review','seller','approval'));    
                }
                elseif($isEmptytoken != "null" && $isEmptyinstallment == "null"){
                    // token
                    return view('editingfrom/editfromstoken',compact('property','applicant','payment','review','token','seller','approval')); 
                }
                elseif($isEmptyinstallment != "null"){
                    // installment
                    return view('editingfrom/editfromsinstallment',compact('property','applicant','payment','review','installment','seller','approval')); 
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
            // validation 

            //  $approval = approval::where('propertyId',$id)->value('status');
            //   echo $request->propertyPaymentProcedure;
            
             
            //  var_dump($approval);
            //  exit();

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

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator); 
                //return response()->json(['error'=>$validator->errors()], 401);            
            }   

            // get user id 
            $user_id = Auth::user();
            // get user data
            //initilization the property object 
            try{ 
            $property = property::find($id);
            $property->propertyType = $request->input('propertyType');
            $property->registrationStatus = $request->input('registrationStatus');
            $property->propertySection = $request->input('propertySection');
            $property->propertyAddress = $request->input('propertyAddress');
            $property->propertyLocation = $request->input('propertyLocation');
            $property->propertySize = $request->input('propertySize');
            $property->propertySellerId = $request->input('propertySellerId');
            $property->jointProperty = $request->input('jointProperty');
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
            }
            catch(Exception $e){
                return redirect()->back()->with('error','Updating property section , something wrong .');
            }
        
            try{
            $applicantId = DB::table('applicants')->where('propertyId',$id)->value('id');
            $applicant = applicant::find($applicantId);
            $applicant->name = $request->input('name');
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
            $applicant->propertyId = $id;
            $applicant->userId = $user_id->id;
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' applicant section input something wrong .');
            }
            try{
            // initilization of payment object
            $paymentId = DB::table('payments')->where('propertyId',$id)->value('id');
            $payment = payment::find($paymentId);
            $payment->paymentType = $request->input('paymentType');
            $payment->transferTo = $request->input('transferTo');
            $payment->bankName = $request->input('bankName');
            $payment->chequeno = $request->input('chequeno');
        //   $payment->propertyPurchingDate = $request->input('propertyPurchingDate');

            $originalDate = $request->input('propertyPurchingDate');
            $newDate = date("d-M-Y", strtotime($originalDate));
            $payment->propertyPurchingDate = $newDate;

            $payment->propertyPaymentProcedure = $request->input('propertyPaymentProcedure');
            $payment->propertyPrice = $request->input('propertyPrice');
            // property total amount 
            $totalAmount = $request->input('propertyPrice');
            $payment->propertyId = $id;
            $payment->userId = $user_id->id;

            }
            catch(Exception $e){
                return redirect()->back()->with('error',' Payment section input something wrong .');
            }
        
            try{
            $reviewId = DB::table('reviews')->where('propertyId',$id)->value('id');
            $review = review::find($reviewId);
            $review->comment=$request->input('comment');
            $review->propertyId = $id;
            $review->userId = $user_id->id;
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' review section input something wrong .');
            }
            // installment will be changed into 2nd version 
            try{
            $paymentProcedure = $payment->propertyPaymentProcedure;

            // check and get the token payment 
        //     try{
        //     $token = DB::table('tokens')->where('propertyId',$id)->first();
        //     $isEmptyToken = json_encode($token);
        //     if($isEmptyToken != "null"){
        //         $token = array($token);
        //         foreach($token as $te){
        //            $tokenPayment = $te->tokenPayment;
        //         }
        //     }
        // } catch(Exception $e){
        //     return redirect()->back()->with('error',' something wrong with the token payment or token payment.');
        // }
            try{
                $approvalTableId = DB::table('approvals')->where('propertyId', $id)->value('id');
                $approved = approval::find($approvalTableId);
                $approved->status= "unapproval";
            
               if(!$approved->save()){
                return redirect()->back()->with('error',' approval section input something wrong .');
               }
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' approval section input something wrong .');
            } 
            if($property->save()){
                $applicant->save();
                $payment->save();
                $review->save();
            
                if($paymentProcedure == "Installment"){
                    
                    // validation
                    $validator = Validator::make($request->all(), [
                        'noOfInstallments' => 'required',
                        'downpayment' => 'required',
                        
                    ]);
                    if ($validator->fails()) {
                        return Redirect::back()->withErrors($validator);      
                        // return response()->json(['error'=>$validator->errors()], 401);            
                    }

                    // property Id , down payment , No of installment require for calculation so get all the variables 
                    $propertyId = $id;
                    $downpayment = $request->input('downpayment');
                    $noOfinstallments = $request->input('noOfInstallments');

                    //get the total amount
                    try{
                        $token = DB::table('tokens')->where('propertyId',$id)->first();
                        $isEmptyToken = json_encode($token);
                        if($isEmptyToken != "null"){
                            $token = array($token);
                            foreach($token as $te){
                            $tokenPayment = $te->tokenPayment;
                            $downpayment = $downpayment + $tokenPayment;
                            }
                            if($token){
                        
                                $deleteTokenId = DB::table('tokens')->where('propertyId',$id)->value('id');
                                $deleteTokenRow = token::find($deleteTokenId);
                                $deleteTokenRow->delete();
                            }

                        }
                    } catch(Exception $e){
                        return redirect()->back()->with('error',' something wrong with the token payment or token payment.');
                    }
                    
                    $propertyprice  = DB::table('payments')->where('propertyId',$id)->value('propertyPrice');
                    // to calculat the 20 % of the total amount 
                    $atleastDownpayment = ($propertyprice * 0.2) ;
                    if( $downpayment >=$atleastDownpayment ){

                        // Total amount , down payment , No of installment (calculation of installment throught these three variables)
                        $remaningAmount = $propertyprice - $downpayment ;
                        // total Amount divided into Number of installment to get the one installments
                        $amountOfOneInstallment = $remaningAmount/$noOfinstallments;
                        
                        // get lunching (project) data and add 3 months or ( 90 days ) to calculat the next installment date
                        $todayDate = date("Y-M-d");
                        $data1 = $todayDate;
                        //  var_dump(json_encode($data1));
                        //  exit();
                        // jogarr to show data in month name
                    

                        //$installmentDates[0] = $todayDate; 
                        for($i=0; $i < $noOfinstallments; $i++)
                        {
                            
                            $date2 = new DateTime($data1);
                            $date2->add(new DateInterval('P3M')); // P3M means a 3 month and  P90D means a period of 90 day
                            $installmentDates[$i] = $date2->format('d-M-Y');
                            $data1 = $installmentDates[$i];         
                            
                        }
                        // get all user data
                        //initilization the property object 
                        $installmentId  = DB::table('installments')->where('propertyId',$id)->value('id');
                    
                        $isEmpty = json_encode($installmentId);
                        
                        if($isEmpty == "null")
                        {
                            // var_dump("No",$isEmpty);
                            // exit();
                            $installment = new installment;
                        }
                        else{
                            // var_dump("yes ",$installmentId);
                            // exit();
                            $installment = installment::find($installmentId);
                        }

                        $installment->noOfInstallments = $noOfinstallments; 
                        $installment->downpayment = $downpayment;
                        $installment->propertyId = $propertyId;
                        $installment->amountOfOneInstallment = $amountOfOneInstallment; 
                        $installment->installmentDates = json_encode($installmentDates);
                        $installment->userId = $user_id->id;
                        // save the installment info
                        $installment->save();
                        

                        // installment history
                        // $installmentHId  = DB::table('installment_histories')->where('propertyId',$id)->value('id');
                        // $isEmptyinstallmentH = json_encode($installmentHId);
                        // if($isEmptyinstallmentH == "null")
                        // {
                        //     // var_dump("No",$isEmpty);
                        //     // exit();
                        //     $installmentH = new installmentHistory;
                        // }
                        // else{
                        //     // var_dump("yes ",$installmentId);
                        //     // exit();
                        //     $installmentH = installmentHistory::find($installmentHId);
                        // }
                        
                        // $installmentH->installmentNo = 1;
                        // $installmentH->installmentAmount = $amountOfOneInstallment;
                        // $installmentH->status = "unpaid";

                        // $installmentH->installmentPaymentDate = "2018-09-10";
                        // $installmentH->propertyId = $id;
                        // $installmentH->save();

                        // payment history
                        $paymentHId  = DB::table('payment_histories')->where('propertyId',$id)->value('id');
                        $isEmptypaymentH = json_encode($paymentHId);
                        if($isEmptypaymentH == "null")
                        {
                            // var_dump("No",$isEmpty);
                            // exit();
                            $paymentHistory = new paymentHistory;
                        }
                        else{
                            // var_dump("yes ",$installmentId);
                            // exit();
                            $paymentHistory = paymentHistory::find($paymentHId);
                        }
                        // payment history 
                    
                        $propertyprice  = DB::table('payments')->where('propertyId',$id)->value('propertyPrice');
                        $paymentHistory->paidAmount = $downpayment;
                        //Remaing amount = total amount - total amount payment;
                        $remaingAmount = $propertyprice - $downpayment;
                        $paymentHistory->remeaningAmount = $remaingAmount;
                        $paymentHistory->propertyId = $id;
                        $paymentHistory->save();


                    }    
                    else{
                        return redirect()->back()->with('error','Down Payment is less then 20% .');
                    }
                }
                elseif($paymentProcedure == "Total Amount"){
                
                    $installmentrow = DB::table('installments')->where('propertyId',$id)->first();
                    $installmentHrow = DB::table('installment_histories')->where('propertyId',$id)->first();
                    // if(!$installmentrow){
                    //     var_dump("tesing installment row not exit ");
                    //     exit();
                    // }
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
                    //get the total amount
                    // $propertyprice  = DB::table('payments')->where('propertyId',$id)->value('propertyPrice');
                    
                        $token = DB::table('tokens')->where('propertyId',$id)->first();
                        $isEmptyToken = json_encode($token);
                        
                        if($isEmptyToken != "null"){
                            $token = array($token);
                            foreach($token as $te){
                            $tokenPayment = $te->tokenPayment;
                            $propertyprice  = DB::table('payments')->where('propertyId',$id)->value('propertyPrice');
                            $propertyprice = $propertyprice - $tokenPayment;
                                // initilization the payment table's object to update the total price 
                                $paymentId = DB::table('payments')->where('propertyId',$id)->value('id');
                                $payment = payment::find($paymentId);
                                $payment->propertyPrice = $propertyprice;
                                $payment->save();
                            }
                            if($token){
                        
                                $deleteTokenId = DB::table('tokens')->where('propertyId',$id)->value('id');
                                $deleteTokenRow = token::find($deleteTokenId);
                                $deleteTokenRow->delete();
                            }
                             
                        }
                        else{
                            $tokenPayment = 0;
                        }
                    
                    // payment history
                    $paymentHId  = DB::table('payment_histories')->where('propertyId',$id)->value('id');
                    $isEmptypaymentH = json_encode($paymentHId);
                    if($isEmptypaymentH == "null")
                    {
                        // var_dump("No",$isEmpty);
                        // exit();
                        $paymentHistory = new paymentHistory;
                    }
                    else{
                        // var_dump("yes ",$installmentId);
                        // exit();
                        $paymentHistory = paymentHistory::find($paymentHId);
                    }

                    
                    $propertyprice  = DB::table('payments')->where('propertyId',$id)->value('propertyPrice');
                    $paymentHistory->paidAmount = $propertyprice + $tokenPayment;
                    //Remaing amount = total amount - total amount payment;
                    $remaingAmount = 0;
                    $paymentHistory->remeaningAmount = $remaingAmount;
                    $paymentHistory->propertyId = $id;
                    $paymentHistory->save();
                    
                }
            
                // save all the property info and return successuflly message;
                return redirect()->back()->with('success','Updated Record successfully.');
            }
            else{
                return redirect()->back()->with('error',' Record is not updated Something wrong .');
            }
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' updating , installment section , something wrong .');
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
}

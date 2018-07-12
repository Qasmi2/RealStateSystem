<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\installment;
use App\payment;
use App\property;
use App\witness;
use App\review;
use App\applicant;
use Validator;
use App\Http\Controllers\DataTime;
use DateTime;
use DateInterval;
use DB;

class editingControll extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
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
        $property  = DB::table('properties')->where('id',$id)->first();
        $payment = DB::table('payments')->where('propertyId',$id)->first();
        $applicant = DB::table('applicants')->where('propertyId',$id)->first();
        $installment = DB::table('installments')->where('propertyId',$id)->first();
        $review = DB::table('reviews')->where('propertyId',$id)->first();
        $witness = DB::table('witnesses')->where('propertyId',$id)->first();

         $isEmpty = json_encode($installment);
        
        if($isEmpty == "null")
        { 
            
            return view('displayrecord/singlerecord',compact('property','applicant','payment','witness','review'));    
        }
        else{
            
            return view('displayrecord/singlerecordinstallment',compact('property','applicant','payment','witness','review','installment')); 
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
        
        $property  = DB::table('properties')->where('id',$id)->first();
        $payment = DB::table('payments')->where('propertyId',$id)->first();
        $applicant = DB::table('applicants')->where('propertyId',$id)->first();
        $installment = DB::table('installments')->where('propertyId',$id)->first();
        $review = DB::table('reviews')->where('propertyId',$id)->first();
        $witness = DB::table('witnesses')->where('propertyId',$id)->first();

         $isEmpty = json_encode($installment);
        
        if($isEmpty == "null")
        { 
            
            return view('editingfrom/editfroms',compact('property','applicant','payment','witness','review'));    
        }
        else{
            
            return view('editingfrom/editfromsinstallment',compact('property','applicant','payment','witness','review','installment')); 
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
        
        // validation 
        $validator = Validator::make($request->all(), [
            // property Info validation 
            'propertyType' => 'required',
            'registrationStatus' => 'required',
            'propertySection' => 'required',
            'propertyAddress' => 'required',
            'propertyLocation' => 'required',
            'propertySize' =>'required',
            // 'jointProperty'=>'required',
            // 'noOfJointproperty'=>'required',
            // applicant info validation 
            'name'=> 'required',
            'fatherName'=> 'required',
            'cnicNo'=> 'required',
            'passportNo'=> 'required',
            'mailingAddress' => 'required',
            'permanentAddress'=> 'required',
            'email'=> 'required',
            'phoneNO'=> 'required',
            'mobileNo1'=> 'required',
            'mobileNo2'=> 'required',
            // 'cover_image'=> 'required',
            'nomineeName'=> 'required',
            'nomineeFatherName'=> 'required',
            'relationWithApplicant'=> 'required',
            'nomineeCnicNo'=> 'required',
            'nomineePassportNo' => 'required',
            'nomineeMailingAddress'=> 'required',
            'nomineePermanentAddress'=> 'required',
            'nomineeMail'=> 'required',
            'nomineePhoneNo'=> 'required',
            'nomineeMobileNo1'=> 'required',
            'nomineeMobileNo2'=> 'required',
            
            // payment info validation 
            'propertyPrice' => 'required',
            
            'transferTo' => 'required',
            'propertyPurchingDate' => 'required',
            'propertyPaymentProcedure' =>'required',
            'paymentType'=>'required',
            // witness info validation 
            'witnessName' => 'required',
            'witnessCnicNo' => 'required',
            // 

        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }   

        
          // get user data
        //initilization the property object 

        $property = property::find($id);
        $property->propertyType = $request->input('propertyType');
        $property->registrationStatus = $request->input('registrationStatus');
        $property->propertySection = $request->input('propertySection');
        $property->propertyAddress = $request->input('propertyAddress');
        $property->propertyLocation = $request->input('propertyLocation');
        $property->propertySize = $request->input('propertySize');
        $property->jointProperty = $request->input('jointProperty');
        $property->noOfJointApplicant = $request->input('noOfJointApplicant');

        
    
       
        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // initilization the applicant object 
        
        $applicantId = DB::table('applicants')->where('propertyId',$id)->value('id');
        $applicant = applicant::find($applicantId);
        $applicant->name = $request->input('name');
        $applicant->cover_image = $fileNameToStore;
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

        // initilization of payment object
        $paymentId = DB::table('payments')->where('propertyId',$id)->value('id');
        $payment = payment::find($paymentId);
        $payment->paymentType = $request->input('paymentType');
        $payment->transferTo = $request->input('transferTo');
        $payment->bankName = $request->input('bankName');
        $payment->propertyPurchingDate = $request->input('propertyPurchingDate');
        $payment->propertyPaymentProcedure = $request->input('propertyPaymentProcedure');
        $payment->propertyPrice = $request->input('propertyPrice');
        $payment->propertyId = $id;

        // initilization the witness table object

        $witnessId = DB::table('witnesses')->where('propertyId',$id)->value('id');
        $witness = witness::find($witnessId);
        $witness->witnessName = $request->input('witnessName');
        $witness->witnessCnicNo = $request->input('witnessCnicNo');
        $witness->propertyId = $id;

        // initilization the review table object
        $reviewId = DB::table('reviews')->where('propertyId',$id)->value('id');
        $review = review::find($reviewId);
        $review->comment=$request->input('comment');
        $review->propertyId = $id;

        // installment will be changed into 2nd version 

        $paymentProcedure = $payment->propertyPaymentProcedure;
        

        if($property->save()){
            // save the applicant 
            $applicant->save();
            // save the payment 
            $payment->save();
            // save the witness
            $witness->save();
            // save the review
            $review->save(); 
            if($paymentProcedure == "Installment"){
                
                 // validation
                $validator = Validator::make($request->all(), [
                    'noOfInstallments' => 'required',
                    'downpayment' => 'required',
                    
                    
                ]);
                if ($validator->fails()) {
                    return response()->json(['error'=>$validator->errors()], 401);            
                }

                // property Id , down payment , No of installment require for calculation so get all the variables 
                $propertyId = $id;
                $downpayment = $request->input('downpayment');
                $noOfinstallments = $request->input('noOfInstallments');

                //get the total amount
                $propertyprice  = DB::table('payments')->where('propertyId',$propertyId)->value('propertyPrice');
                // Total amount , down payment , No of installment (calculation of installment throught these three variables)
                $remaningAmount = $propertyprice - $downpayment ;
                // total Amount divided into Number of installment to get the one installments
                $amountOfOneInstallment = $remaningAmount/$noOfinstallments;
                
                // get today data and add 3 months ( 90 days ) to calculat the next installment date
                $todayDate = date("Y-m-d");
                $data1 = $todayDate;
                // var_dump($data1);
                $installmentDates = []; 
                for($i=0; $i < $noOfinstallments; $i++)
                {
                    
                    $date2 = new DateTime($data1);
                    $date2->add(new DateInterval('P90D')); // P90D means a period of 90 day
                    $installmentDates[$i] = $date2->format('Y-m-d');
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
                // save the installment info
                $installment->save();

            }
            elseif($paymentProcedure == "Total Amount"){
               
                $installmentrow = DB::table('installments')->where('propertyId',$id)->first();
                // if(!$installmentrow){
                //     var_dump("tesing installment row not exit ");
                //     exit();
                // }
                if($installmentrow){
                    
                    $deleteInstallmentId = DB::table('installments')->where('propertyId',$id)->value('id');
                    $deleteInstallmentRow = installment::find($deleteInstallmentId);
                    $deleteInstallmentRow->delete();
                }
            }
           
            // save all the property info and return successuflly message;
            return redirect()->back()->with('success','Updated Record successfully.');
        }
        else{
            return redirect()->back()->with('error',' Record is not updated Something wrong .');
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
        
        $installmentrow = DB::table('installments')->where('propertyId',$id)->first();
        // get installment table id to delete that have property Id same 
        // $deleteInstallmentId = DB::table('installments')->where('propertyId',$id)->value('id');
        // get payment table id to delete that  HAVE property Id same 
        $deletePaymentId = DB::table('payments')->where('propertyId',$id)->value('id');
        // get applicant table id to delete that  HAVE property Id same 
        $deleteApplicantId = DB::table('applicants')->where('propertyId',$id)->value('id');
        // get witness table id to delete that  HAVE property Id same 
        $deleteWitnessId = DB::table('witnesses')->where('propertyId',$id)->value('id');
        // get review table id to delete that  HAVE property Id same 
        $deleteReviewsId = DB::table('reviews')->where('propertyId',$id)->value('id');
        // get property table id to delete that  HAVE property Id same 
        $deletepropertyId = DB::table('properties')->where('id',$id)->value('id');
       
       
        // check that installment is exist or not 
        if($installmentrow){
                    
            $deleteInstallmentId = DB::table('installments')->where('propertyId',$id)->value('id');
            $deleteInstallmentRow = installment::find($deleteInstallmentId);
            $deleteInstallmentRow->delete();
        }
        $payment = payment::find($deletePaymentId);
        if($payment){
            // if apyment is not delete then error massage will be shown 
            if(!$payment->delete()){
                // return redirect()->back()->with('error', 'NOT Record Removed Id is worng !!!');
                return view('displayrecord.deleterecordMessage')->with('error', 'NOT Record Removed,  Id is worng  !!!');
            }
        }
        $applicant = applicant::find($deleteApplicantId);
        if($applicant){
            if(!$applicant->delete()){
                // return redirect()->back()->with('error', 'NOT Record Removed Id is worng !!!');
                return view('displayrecord.deleterecordMessage')->with('error', 'NOT Record Removed,  Id is worng  !!!');
            }
        }
        $witness = witness::find($deleteWitnessId);
        if($witness){
            if(!$witness->delete()){
                // return redirect()->back()->with('error', 'NOT Record Removed Id is worng !!!');
                return view('displayrecord.deleterecordMessage')->with('error', 'NOT Record Removed,  Id is worng  !!!');
            }
        }
        $review = review::find($deleteReviewsId);
        if($review){
            if(!$review->delete()){
                // return redirect()->back()->with('error', 'NOT Record Removed Id is worng !!!');
                return view('displayrecord.deleterecordMessage')->with('error', 'NOT Record Removed,  Id is worng  !!!');
            }
        }
        $property = property::find($deletepropertyId);
       
        if($property){
           
            if(!$property->delete()){

                return view('displayrecord.deleterecordMessage')->with('error', 'NOT Record Removed,  Id is worng  !!!');
            }
            else{
                return view('displayrecord.deleterecordMessage')->with('success', 'Delted Record  !!!');  
               
            }

        }
        else{

            return view('displayrecord.deleterecordMessage')->with('error', 'Record NOT Found or Something Wrong !!!');  
        }
		
    }
}

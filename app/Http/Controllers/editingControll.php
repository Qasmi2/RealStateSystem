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

        if($property->save()){
            // save the applicant 
            $applicant->save();
            // save the payment 
            $payment->save();
            // save the witness
            $witness->save();
            // save the review
            $review->save(); 

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
        //
    }
}

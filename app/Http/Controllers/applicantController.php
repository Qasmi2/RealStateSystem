<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\applicant;

class applicantController extends Controller
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
            'propertyId'=> 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }   

        // get all user data
        //initilization the property object 
        
        $applicant = new applicant;
        $applicant->name = $request->input('name');
        $applicant->pic = $request->input('cover_image');
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
        $applicant->propertyId = $request->input('propertyId');

        if($applicant->save()){
            
            $lastId = applicant::orderBy('updated_at','desc')->first();
            return view('registrationfrom/paymentform')->with('lastId',$lastId);
        }
        else{
            return redirect()->back()->with('error',' Property section data is not Insert .');
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

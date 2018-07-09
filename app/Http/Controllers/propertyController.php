<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\property;
class propertyController extends Controller
{
     /**
     * show insert from template.
     *
     * @return \Illuminate\Http\Response
     */
    // public function applicantform()
    // {
    //     $lastId = property::orderBy('updated_at','desc')->first();
    //     return view('registrationfrom/applicantform')->with('lastId',$lastId);
    // }
     /**
     * show insert from template.
     *
     * @return \Illuminate\Http\Response
     */
    public function propertyform()
    {
        return view('registrationfrom/propertyform');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // need to change the pagination after front end integartion,
        $properties = property::orderBy('created_at','desc')->get();
        // if($properties){
        //     return view('')->with('properties',$properties);
        // }
        // else{
        //     return redirect()->back()->with('error',' Record is not Added Something Wrong! .');
        // }

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
            'propertyType' => 'required',
            'registrationStatus' => 'required',
            'propertySection' => 'required',
            'propertySize' =>'required',
            // 'propertyAddress' => 'required',
            // 'propertyLocation' => 'required',
            
            // 'jointProperty'=>'required',
            // 'noOfJointproperty'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
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

          // get all user data
        //initilization the property object 


        $property = new property;
        $property->propertyType = $request->input('propertyType');
        $property->registrationStatus = $request->input('registrationStatus');
        $property->propertySection = $request->input('propertySection');
        $property->propertyAddress = $request->input('propertyAddress');
        $property->propertyLocation = $request->input('propertyLocation');
        $property->propertySize = $request->input('propertySize');
        $property->tokenNo = random_string(20);
        $property->jointProperty = $request->input('jointProperty');
        $property->noOfJointApplicant = $request->input('noOfJointApplicant');
       
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
            return view('registrationfrom/applicantform')->with('lastId',$lastId);
        }
        else{
            return redirect()->back()->with('error',' Property section data is not Insert .');
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
        // if($property = property::findorFail($id)){
          
        //     return view('')->with('property',$property);
        // }
        // else{
            
        //     return redirect()->back()->with('error',' not find your applicant, there are some Errors.');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        // if($property = property::findorFail($id)){
            
        //     return view('')->with('property',$property);
        // }
        // else{
        //     return redirect()->back()->with('error',' not find your applicant, there are some Errors');  
        // }
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
            'propertyType' => 'required',
            'registrationStatus' => 'required',
            'propertySection' => 'required',
            'propertyAddress' => 'required',
            'propertyLocation' => 'required',
            'propertySize' =>'required',
            // 'jointProperty'=>'required',
            // 'noOfJointproperty'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }   

          // get all user data
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
        if($property->save()){
            // save all the property info and return successuflly message;
            return redirect()->back()->with('success','Updated Record successfully.');
        }
        else{
            return redirect()->back()->with('error',' Record is not Insert .');
        }
            // end of user data 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $property = property::find($id);
		// if($property){
			
		// 	if($property->delete()){
        //         return redirect()->back()->with('success', 'Record Removed');
		// 	}
		// 	else{
                
        //         return redirect()->back()->with('error', 'NOT Record Removed !!!');
        //     }
            
		// }
		// else{
        //     return redirect()->back()->with('error', 'Record NOT Found !!!');  
        // }
        
    }
}

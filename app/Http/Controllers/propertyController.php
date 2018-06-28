<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\property;
class propertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // need to change the pagination after front end integartion,
        $properties = property::orderBy('created_at','desc')->get();
        if($properties){
            return response()->json(['properties'=> $properties], 201);
        }
        else{
            return response()->json(['error'=> 'No Record found'], 201);
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

          // get all user data
        //initilization the property object 

        $property = new property;
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
            return response()->json(['success'=>'added successfully'], 201);
        }
        else{
            return response()->json(['error'=>'All the field are required (Enter all the field ).Something wrong Not Save into database '], 401);
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
        if($property = property::findorFail($id)){
          
            return response()->json($property, 201);
        }
        else{
            return response()->json(['error'=>'not find your applicant, there are some Errors'], 401);   
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
        
        if($property = property::findorFail($id)){
          
            return response()->json($property, 201);
        }
        else{
            return response()->json(['error'=>'not find your applicant, there are some Errors'], 401);   
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
            return response()->json(['success'=>'added successfully'], 201);
        }
        else{
            return response()->json(['error'=>'All the field are required (Enter all the field ).Something wrong Not Save into database '], 401);
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
		if($property){
			
			if($property->delete()){
                return response()->json(['success'=>'Record Remove'], 201);  
			}
			else{
                return response()->json(['error'=>'NOT Record Remove !!!'], 401);  
            }
            
		}
		else{
            return response()->json(['error'=>'NO Record Found'], 401);  
        }
        
    }
}

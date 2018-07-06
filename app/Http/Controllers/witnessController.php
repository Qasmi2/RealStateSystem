<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use witness;
use DB;

class witnessController extends Controller
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
            'witnessName' => 'required',
            'cnicNo' => 'required',
            'propertyId' => 'required',
          
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }   
        

          // get all user data
        //initilization the property object 


        $witness = new witness;
        $witness->witnessName = $request->input('witnessName');
        $witness->cnicNo = $request->input('cnicNo');
        $witness->propertyId = $request->input('propertyId');
        $propertyID = $request->input('propertyId');
        if($witness->save()){
           
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

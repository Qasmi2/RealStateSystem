<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\seller;
use App\installment;
use App\payment;
use App\property;
use App\witness;
use App\review;
use App\applicant;
use Validator;
use DB;

class sellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // get all seller information 
        try{
            $seller = seller::orderBy('created_at','desc')->get();
            return view('registrationfrom.registrationform',compact('seller'));
            
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' something wrong with the seller info.');
        }
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Display()
    {
        
        // get all seller information 
        try{
            $seller = seller::orderBy('created_at','desc')->get();
            // var_dump($seller);
            // echo "<br> testing ";
            // echo $seller[1]['id'];
            // exit();
            return view('sellerforms.show',compact('seller'));
            
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' something wrong with the seller info.');
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
            'sallerName' => 'required',
            'sallerCnicNo' => 'required',
            'sallerFatherName' => 'required',
            // 'propertyId'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }  
        try{
            $seller = new seller;
            $seller->sallerName = $request->input('sallerName');
            $seller->sallerCnicNo = $request->input('sallerCnicNo');
            $seller->sallerFatherName = $request->input('sallerFatherName');
            $seller->sallerDesignation = $request->input('sallerDesignation');
            $seller->sallerAddress = $request->input('sallerAddress');

            if($seller->save()){
                return redirect()->back()->with('success','Successfully Added Seller info!');
            }
            else{
                return redirect()->back()->with('error',' Seller info is not inserted , Something wrong.');
            }
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' something wrong with the seller insertion added info.');
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
        try{

            if($seller = seller::findorFail($id)){
                
                return view('')->with('seller',$seller);
            }
            else{
                return redirect()->back()->with('error',' not find your seller info, there are some Errors');  
            }
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' something wrong with the seller show info .');
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
    
        try{
            if($seller = seller::findorFail($id)){
                
                return view('sellerforms.edit')->with('seller',$seller);
            }
            else{
                return redirect()->back()->with('error',' not find your seller info, there are some Errors');  
            }
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' something wrong with the geting seller info editing.');
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
            'sallerName' => 'required',
            'sallerCnicNo' => 'required',
            'sallerFatherName' => 'required',
           
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }  
        try{

            $seller = seller::find($id);
            $seller->sallerName = $request->input('sallerName');
            $seller->sallerCnicNo = $request->input('sallerCnicNo');
            $seller->sallerFatherName = $request->input('sallerFatherName');
            $seller->sallerDesignation = $request->input('sallerDesignation');
            $seller->sallerAddress = $request->input('sallerAddress');

            if($seller->save()){
                return redirect()->back()->with('success','Successfully Added Seller info!');
            }
            else{
                return redirect()->back()->with('error',' Seller info is not inserted , Something wrong.');
            }
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' something wrong with the seller updating info.');
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
       
        try{
            $seller = seller::find($id);
            if($seller){
                
                if($seller->delete()){
                    return redirect()->back()->with('success', 'Record Removed');
                }
                else{
                    
                    return redirect()->back()->with('error', 'NOT Record Removed !!!');
                }
            }
            else{
                return redirect()->back()->with('error', 'Record NOT Found !!!');  
            }
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' something wrong with the deleting seller info.');
        }
    }
}

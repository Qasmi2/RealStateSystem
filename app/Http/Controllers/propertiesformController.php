<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\property;
use App\applicant;
use App\payment;
use App\installment;
use DB;
use Auth;

class propertiesformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  

        try{

            $user = Auth::user();
            
            if(Gate::allows('user-actions',Auth::user())){

                $properties = property::orderBy('created_at','desc')->paginate(8);
                $applicanties = applicant::orderBy('created_at','desc')->paginate(8);
                $payments = payment::orderBy('created_at','desc')->paginate(8);
                $installment = installment::orderBy('created_at','desc')->paginate(8);

                return view('displayrecord.properties',compact('properties','applicanties','payments'));

            }
            else{

                $properties = property::where('userId', $user->id)->paginate(8);
                $applicanties = applicant::where('userId', $user->id)->paginate(8);
                $payments = payment::where('userId', $user->id)->paginate(8);
                return view('displayrecord.properties',compact('properties','applicanties','payments'));
                
            }
   
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' Payment section input something wrong .');
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
        $applicant = DB::table('applicants')->where('propertyId',$id)->first();
        $payment = DB::table('payments')->where('propertyId',$id)->first();
        $installment = DB::table('installments')->where('propertyId',$id)->first();

        var_dump(json_encode($property));
        echo "<br>";
        var_dump(json_encode($applicant));
        echo "<br>";
        var_dump(json_encode($payment));
        echo "<br>";
        var_dump(json_encode($installment));
        exit();
        return view('displayrecord.singleproperty',compact('property','applicant','payment','installment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property= DB::table('properties')->where('id',$id)->first();
        $applicant = DB::table('applicants')->where("propertyId",$id)->first();
        $payment = DB::table('payments')->where('propertyId',$id)->first();
        $installment = DB::table('isntallments')->where('propertyId',$id)->first();
        $review = DB:: table('reviews')->where('propertyId',$id)->first();
        $witness = DB:: table('witness')->where('propertyId',$id)->first();

        var_dump(json_encode($property));
        exit();
        var_dump(json_encode($applicant));
        exiX();
        var_dump(json_encode($payments));
        exit();
        var_dump(json_encode($review));
        exit();
        var_dump(json_encode($witness));
        exit();

        

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

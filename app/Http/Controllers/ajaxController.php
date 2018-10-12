<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\applicant;
use DB;
use Auth;

class ajaxController extends Controller
{
      /**
     * Ajax call to find exising reocrd
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
            try{
                $cnicNo = $request->cnicNo;
               
               $applicant = DB::table('applicants')->where('cnicNo',$cnicNo)->first();
               $isEmpty = json_encode($applicant);
               if($isEmpty != "null")
               {
                  //  $applicant = array($applicant);
                    $applicant = json_encode($applicant);  
                  return $applicant;
                }
                return response()->json(['success'=>'Not Found']);
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' something wrong with the seller info.');
            }
       
    }


}

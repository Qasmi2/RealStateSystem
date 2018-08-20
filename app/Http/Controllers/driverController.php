<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class driverController extends Controller
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
        
        $this->validate($request,[
                's_latitude' => 'required|numeric',
                's_longitude' => 'required|numeric',
                'd_latitude' => 'required|numeric',
                'd_longitude' => 'required|numeric',
                'service_type' => 'required|numeric|exists:service_types,id',
            ]);

        try{

            $details = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$request->s_latitude.",".$request->s_longitude."&destinations=".$request->d_latitude.",".$request->d_longitude."&mode=driving&sensor=false&key=".env('GOOGLE_MAP_KEY');

            $json = curl($details);

            $details = json_decode($json, TRUE);

            $meter = $details['rows'][0]['elements'][0]['distance']['value'];
            $time = $details['rows'][0]['elements'][0]['duration']['text'];
            $seconds = $details['rows'][0]['elements'][0]['duration']['value'];

            $kilometer = round($meter/1000);
            $minutes = round($seconds/60);

            $tax_percentage = Setting::get('tax_percentage');
            $commission_percentage = Setting::get('commission_percentage');
            $service_type = ServiceType::findOrFail($request->service_type);
            
            $price = $service_type->fixed;

            if($service_type->calculator == 'MIN') {
                $price += $service_type->minute * $minutes;
            } else if($service_type->calculator == 'HOUR') {
                $price += $service_type->minute * 60;
            } else if($service_type->calculator == 'DISTANCE') {
                $price += ($kilometer * $service_type->price);
            } else if($service_type->calculator == 'DISTANCEMIN') {
                $price += ($kilometer * $service_type->price) + ($service_type->minute * $minutes);
            } else if($service_type->calculator == 'DISTANCEHOUR') {
                $price += ($kilometer * $service_type->price) + ($service_type->minute * $minutes * 60);
            } else {
                $price += ($kilometer * $service_type->price);
            }

            $tax_price = ( $tax_percentage/100 ) * $price;
            $total = $price + $tax_price;

            $ActiveProviders = ProviderService::AvailableServiceProvider($request->service_type)->get()->pluck('provider_id');

            $distance = Setting::get('provider_search_radius', '10');
            $latitude = $request->s_latitude;
            $longitude = $request->s_longitude;

            $Providers = Provider::whereIn('id', $ActiveProviders)
                ->where('status', 'approved')
                ->whereRaw("(1.609344 * 3956 * acos( cos( radians('$latitude') ) * cos( radians(latitude) ) * cos( radians(longitude) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians(latitude) ) ) ) <= $distance")
                ->get();

            $surge = 0;
            
            if($Providers->count() <= Setting::get('surge_trigger') && $Providers->count() > 0){
                $surge_price = (Setting::get('surge_percentage')/100) * $total;
                $total += $surge_price;
                $surge = 1;
            }

            return response()->json([
                    'estimated_fare' => round($total,2), 
                    'distance' => $kilometer,
                    'time' => $time,
                    'surge' => $surge,
                    'surge_value' => '1.4X',
                    'tax_price' => $tax_price,
                    'base_price' => $service_type->fixed,
                    'wallet_balance' => Auth::user()->wallet_balance
                ]);

        } catch(Exception $e) {
            return response()->json(['error' => trans('api.something_went_wrong')], 500);
        }
        // var_dump("testing estiii");
        // exit();
        
        // $validator = Validator::make($request->all(), [
            
        //     's_latitude' => 'required|numeric',
        //     'd_latitude' => 'required|numeric',
        //     's_longitude' => 'required|numeric',
        //     'd_longitude' => 'required|numeric',
        // ]);

        // if ($validator->fails()) {
            
        //     return response()->json(['error'=>$validator->errors()], 401);        
        // }   

       
        // try{
        //     $lat1 = $request->s_latitude;
        //     $lon1 = $request->s_longitude;
        //     $lat2  = $request->d_latitude;
        //     $lon2 = $request->d_longitude;
        //     $unit = $request->unit;
            
        //     // distance($lat1, $lon1, $lat2, $lon2, $unit);

        //     // function distance($lat1, $lon1, $lat2, $lon2, $unit) {

        //         $theta = $lon1 - $lon2;
        //         $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        //         $dist = acos($dist);
        //         $dist = rad2deg($dist);
        //         $miles = $dist * 60 * 1.1515;
        //         $unit = strtoupper($unit);
              
        //         if ($unit == "K") {
        //             echo ($miles * 1.609344);
        //             echo "<br>";
        //         } else if ($unit == "N") {
        //             echo ($miles * 0.8684);
        //             echo "<br>";
        //         } else {
        //             echo $miles;
        //             echo "<br>";
        //         }
        //     //   }

        //     exit();

        // }
        // catch (Exception $e) {
        //     return response()->json(['error' => trans('api.something_went_wrong')], 500);
        // }


        

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

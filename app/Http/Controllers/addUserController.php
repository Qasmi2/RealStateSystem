<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Auth;

class addUserController extends Controller
{

     /**
     * Display a add use form.
     *
     * @return \Illuminate\Http\Response
     */

    public function showform(){

        if(Gate::allows('admin-only',Auth::user())){

            return view('selleragentform.adduser');
        }
        else{
            return redirect()->back()->with('error',' You are not Allow to Add New User .');
        }
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::allows('admin-only',Auth::user())){
            // get all seller information 
            try{
                $users = User::orderBy('created_at','desc')->get();
                return view('selleragentform.displayuser',compact('users'));
                
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' something wrong with the seller info.');
            }
        }
        else{
            return redirect()->back()->with('error',' You are not Allow to View Seller Information .');
        }
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
        ]);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorUpdate(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::allows('admin-only',Auth::user())){

            $this->validator($request->all())->validate();
            $this->create($request->all());
            return redirect()->back()->with('success', 'Registered successfully,');
        }
        else{
            return redirect()->back()->with('error',' You are not Allow to Add New User .');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::allows('admin-only',Auth::user())){
    
            try{
                if($users = User::findorFail($id)){
                    
                    return view('selleragentform.edit')->with('users',$users);
                }
                else{
                    return redirect()->back()->with('error',' not find your user info, there are some Errors');  
                }
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' something wrong with the geting user info editing.');
            }

        }
        else{
            return redirect()->back()->with('error',' You are not Allow to View Seller Information .');
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
        if(Gate::allows('admin-only',Auth::user())){
            try{

                $this->validatorUpdate($request->all())->validate();
                $user = User::find($id);
                $user->name = $request->input('name');
                $user->password = Hash::make($request->input('password'));
                $user->role = $request->input('role');
            
                if($user->update()){
                    return redirect()->back()->with('success','Successfully Updated info!');
                }
            }
            catch(Exception $e){
                return redirect()->back()->with('error',' something wrong with the User updating info.');
            }
        }
        else{
            return redirect()->back()->with('error',' You are not Allow to Add New User .');
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
        
        if(Gate::allows('admin-only',Auth::user())){

            try{
                $user = User::find($id);
                if($user){
                    
                    if($user->delete()){
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
                return redirect()->back()->with('error',' something wrong with the deleting user info.');
            }
        }
        else{
            return redirect()->back()->with('error',' You are not Allow to Delete user Information .');
        }

    }




}

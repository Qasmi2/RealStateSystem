@extends('layouts.app')
@include('flash')
@section('content')

<div class="container" style="margin-top:60px;">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
            <div class="card">
                <div class="card-header" style="background-color: #f44336;color:white;">Property Registion Form</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST"  action="{{route('insertproperty')}}" enctype="multipart/form-data" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="propertyType" >{{ __('Registion Project') }}</label>
                                <!-- <input id="propertyType" type="propertyType" placeholder="Enter REGISTERED PROJECT " class="form-control{{ $errors->has('propertyType') ? ' is-invalid' : '' }}" name="propertyType" value="{{ old('propertyType') }}" required> -->
                                  <select class="form-control" name="propertyType" id="propertyType" >
                                    <option value="">Select Title</option>
                                    <option value="Montviro Hotal">Montviro Hotal</option>
                                    <option value="Montviro Mall">Montviro Mall</option>
                                    <option value="Montviro Theme Park">Montviro Theme Park</option>
                                </select>
                                @if ($errors->has('propertyType'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertyType') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="registrationStatus">{{ __('Registration Status') }}</label>
                                <!-- <input id="registrationStatus" type="text" placeholder="Select Registration Status " class="form-control{{ $errors->has('fatherName') ? ' is-invalid' : '' }}" name="fatherName" value="{{ old('fatherName') }}" required> -->
                                <select class="form-control" name="registrationStatus" id="registrationStatus" >
                                    <option value="">Choice Registration Status</option>
                                    <option value="First Alottee">First Alottee</option>
                                    <option value="Transfer Certificate">Transfer Certificate</option>
                                    <option value="Open Certificate">Open Certificate</option>
                                </select>
                                @if ($errors->has('registrationStatus'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('registrationStatus') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="propertySection">{{ __('Property Section') }}</label>
                                <!-- <input id="propertySection" type="text" placeholder="Enter CNIC Number " class="form-control{{ $errors->has('cnicNo') ? ' is-invalid' : '' }}" name="cnicNo" value="{{ old('cnicNo') }}"  required> -->
                                <select class="form-control" name="propertySection" id="propertySection" >
                                    <option value="">Choice Property Section</option>
                                    <option value="Office">Office</option>
                                    <option value="Shop">Shop</option>
                                    <option value="Suite">Suite</option>
                                    <option value="Food Court">Food Court</option>
                                    <option value="Kiosk">Kiosk</option>
                                    <option value="Theme Park">Theme Park</option>
                                </select>
                                @if ($errors->has('propertySection'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertySection') }}</strong>
                                    </span>
                                @endif
                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="propertyAddress">{{ __('Property Address') }}</label>
                                <input id="Property Address" type="text" placeholder="Enter Property Address " class="form-control{{ $errors->has('propertyAddress') ? ' is-invalid' : '' }}" name="propertyAddress" value="{{ old('propertyAddress') }}" >
                                @if ($errors->has('propertyAddress'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertyAddress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="propertyLocation">{{ __('Property Location') }}</label>
                                <input id="propertyLocation" type="text" placeholder="Enter Property Location " class="form-control{{ $errors->has('propertyLocation') ? ' is-invalid' : '' }}" name="propertyLocation" value="{{ old('propertyLocation') }}" >
                                @if ($errors->has('propertyLocation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertyLocation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="propertySize">{{ __('Property Size') }}</label>
                                <!-- <input id="propertySize" type="text" placeholder="Enter Property Size  (Sqr ft)" class="form-control{{ $errors->has('propertySize') ? ' is-invalid' : '' }}" name="propertySize" value="{{ old('propertySize') }}"  required> -->
                                <select class="form-control" name="propertySize" id="propertySize" >

                                    <option value="315">315 sqr ft</option>
                                    <option value="630">630 sqr ft</option>
                                    <option value="945">945 sqr ft</option>
                                    <option value="1260">1260 sqr ft</option>
                                    <option value="1575">1575 sqr ft</option>
                                    <option value="1890">1890 sqr ft</option>
                                </select>
                                @if ($errors->has('propertySize'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertySize') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="jointProperty">{{ __('Joint Property') }}</label>
                                <!-- <input id="jointProperty" type="text" placeholder="Enter Joint Property" class="form-control{{ $errors->has('jointProperty') ? ' is-invalid' : '' }}" name="jointProperty" value="{{ old('jointProperty') }}"  required> -->
                                <select class="form-control" name="jointProperty" id="jointProperty" >
                                    <option value="No">No</option>
                                    <option value="Yes" disabled>Yes</option>
                                </select>
                                @if ($errors->has('jointProperty'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('jointProperty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="noOfJointApplicant">{{ __('Number Of Joint Applicant') }}</label>
                                <input id="noOfJointApplicant" type="number" min="0" placeholder="Enter no Of Joint Applicant" class="form-control{{ $errors->has('noOfJointApplicant') ? ' is-invalid' : '' }}" name="noOfJointApplicant" value="{{ old('noOfJointApplicant') }}" >
                                @if ($errors->has('noOfJointApplicant'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('noOfJointApplicant') }}</strong>
                                    </span>
                                @endif
                            </div>
                           
                        </div> -->
                        <div class="col-md-12 col-lg-12 col-sm-12" style="margin-top:30px;">
                            <div class="form-group row mb-0">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-primary btn-lg " style="float:right; background-color:#f44336 !important; color:white;" >
                                        {{ __('Next ') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </from>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

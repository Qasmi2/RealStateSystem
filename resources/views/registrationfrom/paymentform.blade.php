@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment Registion Form</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST"  action="{{route('insertpayment')}}" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="paymentType" >{{ __('Cash / Pay Order / Cheque / Adjustment') }}</label>
                                <input id="paymentType" type="text" placeholder="Enter Property Payment Type " class="form-control{{ $errors->has('paymentType') ? ' is-invalid' : '' }}" name="paymentType" value="{{ old('paymentType') }}" required>
                                 
                                @if ($errors->has('paymentType'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('paymentType') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="transferTo">{{ __('In Favor of') }}</label>
                                <input id="transferTo" type="text" placeholder="transferTo " class="form-control{{ $errors->has('transferTo') ? ' is-invalid' : '' }}" name="transferTo" value=" Montviro (Pvt) Ltd." required>
                              
                                @if ($errors->has('transferTo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('transferTo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="bankName">{{ __('Bank Name') }}</label>
                                <input id="bankName" type="text" placeholder="Enter bankName " class="form-control{{ $errors->has('bankName') ? ' is-invalid' : '' }}" name="bankName" value="{{ old('bankName') }}"  required>
                               
                                @if ($errors->has('bankName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('bankName') }}</strong>
                                    </span>
                                @endif
                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="propertyPurchingDate">{{ __('Date') }}</label>
                                <input id="propertyPurchingDate" type="text" placeholder="Enter Date (yyyy-mm-dd) " class="form-control{{ $errors->has('propertyPurchingDate') ? ' is-invalid' : '' }}" name="propertyPurchingDate" value="{{ old('propertyPurchingDate') }}" >
                                @if ($errors->has('propertyPurchingDate'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertyPurchingDate') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="propertyPrice">{{ __('Total Amount') }}</label>
                                <input id="propertyPrice" type="text" placeholder="Enter Total Amount " class="form-control{{ $errors->has('propertyPrice') ? ' is-invalid' : '' }}" name="propertyPrice" value="{{ old('propertyPrice') }}" >
                                @if ($errors->has('propertyPrice'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertyPrice') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="propertyPaymentProcedure">{{ __('property Payment Procedure') }}</label>
                                
                                <select class="form-control" name="propertyPaymentProcedure" id="propertyPaymentProcedure" >
                                    <option value="">Choice Payment Procedure</option>
                                    <option value="Installment">Installment</option>
                                    <option value="Total Amount">Total Amount</option>
                                    
                                </select>
                                @if ($errors->has('propertyLocation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertyLocation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="propertySize">{{ __('Property Size') }}</label>
                                <input id="propertySize" type="text" placeholder="Enter Property Size" class="form-control{{ $errors->has('propertySize') ? ' is-invalid' : '' }}" name="propertySize" value="{{ old('propertySize') }}"  required>
                                @if ($errors->has('propertySize'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertySize') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="jointProperty">{{ __('Joint Property') }}</label>
                                <!-- <input id="jointProperty" type="text" placeholder="Enter Joint Property" class="form-control{{ $errors->has('jointProperty') ? ' is-invalid' : '' }}" name="jointProperty" value="{{ old('jointProperty') }}"  required> -->
                                <!-- <select class="form-control" name="jointProperty" id="jointProperty" >
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select>
                                @if ($errors->has('jointProperty'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('jointProperty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->
                        <!-- <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="noOfJointApplicant">{{ __('Number Of Joint Applicant') }}</label>
                                <input id="noOfJointApplicant" type="number" placeholder="Enter no Of Joint Applicant" class="form-control{{ $errors->has('noOfJointApplicant') ? ' is-invalid' : '' }}" name="noOfJointApplicant" value="{{ old('noOfJointApplicant') }}" >
                                @if ($errors->has('noOfJointApplicant'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('noOfJointApplicant') }}</strong>
                                    </span>
                                @endif
                            </div>
                           
                        </div> -->
                        <input type="hidden" name="propertyId" value="{{$lastId['propertyId']}}">
                        <div class="col-md-12 col-lg-12 col-sm-12" style="margin-top:30px;">
                            <div class="form-group row mb-0">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-lg " style="float:right; background-color: rgb(166, 70, 140) !important; color:white;" >
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



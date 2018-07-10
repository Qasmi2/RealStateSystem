@extends('layouts.app')
@include('flash')
@section('content')
<div class="container" style="margin-top:60px;">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
            <div class="card">
                <div class="card-header" style="background-color: #f44336;color:white;">Payment Form</div>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Payment Registion Form</div> -->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST"  action="{{route('insertpayment')}}" enctype="multipart/form-data" value="PATCH">
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
                                <input id="bankName" type="text" placeholder="Enter bankName " class="form-control{{ $errors->has('bankName') ? ' is-invalid' : '' }}" name="bankName" value="{{ old('bankName') }}" >
                               
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
                                <input id="propertyPrice" type="text" placeholder="Enter Total Amount " class="form-control{{ $errors->has('propertyPrice') ? ' is-invalid' : '' }}" name="propertyPrice" value="{{ old('propertyPrice') }}" required>
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
                        
                        <div class="card-header" style="background:#f44336;color:white;margin:10px;">Witness Form</div>
                        <div class="form-group row">    
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                    <label for="witnessName">{{ __('Witness Name') }}</label>
                                    <input id="witnessName" type="text" placeholder="Enter Witess Name " class="form-control{{ $errors->has('witnessName') ? ' is-invalid' : '' }}" name="witnessName" value="{{ old('witnessName') }}" required>
                                    @if ($errors->has('witnessName'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('witnessName') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                    <label for="witnessCnicNo">{{ __('Witness CNIC NO') }}</label>
                                    <input id="witnessCnicNo" type="text" placeholder="Enter Witness CNIC NO " class="form-control{{ $errors->has('witnessCnicNo') ? ' is-invalid' : '' }}" name="witnessCnicNo" value="{{ old('witnessCnicNo') }}" required>
                                    @if ($errors->has('witnessCnicNo'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('witnessCnicNo') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div class="card-header" style="background:#f44336;color:white;margin:10px;">Review Form</div>
                        <div class="form-group row">   
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="comment">{{ __('Write your Comments') }}</label>
                                <!-- <input  type="text"  placeholder="Enter comment" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" value="{{ old('comment') }}" > -->
                                <textarea rows="4" cols="100" id="comment" name="comment" placeholder="Enter your comment" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" value="{{ old('comment') }}" ></textarea>
                                @if ($errors->has('comment'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div> 
                        </div>

                        <input type="hidden" name="propertyId" value="{{$lastId['propertyId']}}">
                        <div class="col-md-12 col-lg-12 col-sm-12" style="margin-top:30px;">
                            <div class="form-group row mb-0">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-lg " style="float:right; background-color:#f44336 !important; color:white;" >
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



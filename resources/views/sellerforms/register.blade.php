@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container" style="margin-top:60px;">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
        <div>
            <button class="btn btn-lg btn-default" onclick="window.history.go(-1)">Back</button>
            <a href="{{ url('sellerinfos') }}" class="btn btn-lg btn-primary " style="float: right; background-color:#f44336 !important; color:white;">View All Seller</a>
        </div> 
        <br>
        <hr>    

            <div class="card">
                <div class="card-header" style="background-color: #f44336;color:white;"> Seller Registion Form </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div><h3>Seller Information</h3></div>
                    <hr>
                    &nbsp;&nbsp;
                    &nbsp;
                    
                    <form method="POST"  action="{{ url('sellercreate')}}" enctype="multipart/form-data" value="PATCH">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="propertyAddress">{{ __('Seller Name') }}</label>
                                <input id="sallerName" type="text" placeholder="Enter Seller Name " class="form-control{{ $errors->has('sellerName') ? ' is-invalid' : '' }}" name="sallerName" value="" required>
                                @if ($errors->has('sallerName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sallerName') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="sellerFatherName">{{ __('Seller Father Name') }}</label>
                                <input id="sellerFatherName" type="text" placeholder="Enter Seller's Father Name" class="form-control{{ $errors->has('sellerFatherName') ? ' is-invalid' : '' }}" name="sallerFatherName" value="" required>
                                @if ($errors->has('sellerFatherName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sellerFatherName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="sallerDesignation">{{ __('Saller Designation') }}</label>
                                <input id="sallerDesignation" type="text" placeholder="Enter Saller Designation" class="form-control{{ $errors->has('sallerDesignation') ? ' is-invalid' : '' }}" name="sallerDesignation" value="" required>
                                @if ($errors->has('sallerDesignation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sallerDesignation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="sallerCnicNo">{{ __('Saller CNIC NO') }}</label>
                                <input id="sallerCnicNo" type="text" placeholder="Enter saller CNIC NO" class="form-control{{ $errors->has('sallerCnicNo') ? ' is-invalid' : '' }}" name="sallerCnicNo" value=""  required>
                               
                                @if ($errors->has('sallerCnicNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sallerCnicNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="sallerAddress">{{ __('Saller Address') }}</label>
                                <input id="sallerAddress" type="text" placeholder="Enter saller Address" class="form-control{{ $errors->has('sallerAddress') ? ' is-invalid' : '' }}" name="sallerAddress" value=""  >
                               
                                @if ($errors->has('jointProperty'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('jointProperty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12" style="margin-top:30px;">
                            <div class="form-group row mb-0">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-lg " style="float:right; background-color:#f44336 !important; color:white;" >
                                        {{ __('Submit') }}
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
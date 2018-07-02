@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Property Registion Form</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST"  action="{{route('installments')}}" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="noOfInstallments" >{{ __('Number of Installments') }}</label>
                              
                                  <select class="form-control" name="noOfInstallments" id="noOfInstallments" >
                                    <option value="">Select No of Installments</option>
                                    <option value="5">5</option>
                                    <option value="8">8</option>
                                    <option value="10">10</option>
                                    
                                </select>
                                @if ($errors->has('noOfInstallments'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('noOfInstallments') }}</strong>
                                    </span>
                                @endif
                            </div>                           
                        </div>
                        <input type="hidden" name="propertyId" value="{{$lastId['propertyId']}}">
                        <input type="hidden" name="paymentId" value="{{$lastId['id']}}">
                        <div class="col-md-12 col-lg-12 col-sm-12" style="margin-top:30px;">
                            <div class="form-group row mb-0">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-lg " style="float:right; background-color: rgb(166, 70, 140) !important; color:white;" >
                                        {{ __('Next') }}
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

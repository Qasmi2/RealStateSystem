@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Review Form</div>

                <div class="card-body">
                  
                    <form method="POST"  action="{{route('review')}}" enctype="multipart/form-data" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="witnessName">{{ __('Witness Name') }}</label>
                                <input id="witnessName" type="text"  placeholder="Enter comment" class="form-control{{ $errors->has('witnessName') ? ' is-invalid' : '' }}" name="witnessName" value="{{ old('witnessName') }}" >
                                @if ($errors->has('witnessName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('witnessName') }}</strong>
                                    </span>
                                @endif
                            </div>                    
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="witnessCnicNo">{{ __('Witness CNIC No') }}</label>
                                <input id="witnessCnicNo" type="text"  placeholder="Enter witness CNIC NO" class="form-control{{ $errors->has('witnessCnicNo') ? ' is-invalid' : '' }}" name="witnessName" value="{{ old('witnessCnicNo') }}" >
                                @if ($errors->has('witnessCnicNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('witnessCnicNo') }}</strong>
                                    </span>
                                @endif
                            </div>                    
                        </div>
                        <input type="hidden" name="propertyId" value="{{$lastId['propertyId']}}">
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
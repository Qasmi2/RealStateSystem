@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:80px;">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 offset-md-2 offset-lg-2">
        @include('flash-message')
            <div class="card">
                <div class="card-header" style="background-color: #f44336;color:white;">{{ Auth::user()->role }} Dashboard</div>
              
                <div class="card-body">
                   
                   
                    <p style="font-family:Roboto sans-serif;font-size:30px;">{{ Auth::user()->name }} <br>Welcome to Montrivo Booking Portal </p>
                    <br>
                    <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            @can('create', Auth::user())
                                <button class="btn btn-info btn-lg" style="background-color: #a6468c !important;"><a  style="color:white !important;" href="{{ route('formall') }}">Registration Form </a></button>
                            @endcan
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <button class="btn btn-info btn-lg" style="background-color: #a6468c !important;"><a  style="color:white !important;" href="{{ route('properties') }}">Display Properties </a></button>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            @can('admin-only', Auth::user())
                                <button class="btn btn-info btn-lg" style="background-color: #a6468c !important;"><a  style="color:white !important;" href="{{ route('sellerform') }}">Seller Registration </a></button>
                            @endcan
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 
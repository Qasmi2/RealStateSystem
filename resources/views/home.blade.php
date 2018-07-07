@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:60px;">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 offset-md-2 offset-lg-2">
            <div class="card">
                <div class="card-header" style="background-color: #f44336;color:white;">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h3>{{ Auth::user()->name }} <br>WellCome to Montrivo Booking Portal </h3>
                    <br>
                    <button class="btn btn-info btn-lg" style="background-color: #f44336 !important;"><a  style="color:white !important;" href="{{ route('propertyform') }}">Registration Property </a></button>
                    <button class="btn btn-info btn-lg" style="background-color: #f44336 !important;"><a  style="color:white !important;" href="{{ route('properties') }}">Display Properties </a></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

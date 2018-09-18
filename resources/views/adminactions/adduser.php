@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:60px;">
    <div class="row justify-content-center">

        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
        @include('flash-message')
        <div>
            <button class="btn btn-lg btn-default" onclick="window.history.go(-1)">Back</button>
            <a href="{{ url('sellerinfos') }}" class="btn btn-lg btn-primary " style="float: right; background-color:#f44336 !important; color:white;">View All Seller</a>
        </div> 
        <hr>    
        
            <div class="card">
                <div class="card-header" style="background-color: #f44336;color:white;"> Seller Registion Form </div>

                <div class="card-body">
               
                  
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
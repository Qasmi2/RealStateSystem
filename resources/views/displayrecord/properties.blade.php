@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Property Registion Form Display</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <?php 
                        $applicants = array($applicanties);
                        $property = array($properties);
                        // foreach($applicanties as $ap){
                        //     echo $ap[0]->name;
                        //     exit();
                        // }
                   ?>
                    <!--------   start showing the properties info --------------------- --> 
                    @foreach($property as $applicant)
                        <div>
                            <ul>
                                <li>Property Type : {{$applicant[0]->propertyType}}</li>
                                <li>Registration Status: {{$applicant[0]->propertyStatus}}</li>
                                <li>Registration Section: {{$applicant[0]->propertySection}}</li>
                                <li>Registration Address: {{$applicant[0]->propertyAddress}}</li>
                            </ul>
                        </div>
                    @endforeach        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:60px;">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
            <div class="card">
                <div class="card-header" style="background-color: #f44336;color:white;">Display Properties</div>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Property Registion Form Display</div> -->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                 
                    <?php $appSize = sizeof($applicanties);
                          $proSize = sizeof($properties);
                          $proSize = sizeof($payments);

                    ?>
                    
                    <table class="table table-bordered table-striped table-hover table-responsive">
                        <thead bgcolor="#a6468c" style="color:white;">
                            <tr>
                               <a href="#"> <th>Property Type</th></a>
                               <th>Address</th>
                               <th>Location</th>
                               <th>Size</th>
                               <th>Owner</th>
                               <th>Owner CNIC NO</th>
                               <th>Total Amount</th>
                               <th>Actions</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0; $appSize >$i; $i++)
                                <tr>
                                    <td><a href="#">{{$properties[$i]['propertyType']}}</a></td>
                                    <td>{{$properties[$i]['propertyAddress']}}</td>
                                    <td>{{$properties[$i]['propertyLocation']}}</td>
                                    <td>{{$properties[$i]['propertySize']}}</td>
                                    <td>{{$applicanties[$i]['name']}}</td>
                                    <td>{{$applicanties[$i]['cnicNo']}}</td>
                                    <td>{{$payments[$i]['propertyPrice']}}</td>
                                    <td><a href="{{url('editingform/'.$properties[$i]['id'])}}">Edit</a></td>

                                </tr>
                            @endfor
                            
                        </tbody>
                    </table>
                    {{$properties->links()}}
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

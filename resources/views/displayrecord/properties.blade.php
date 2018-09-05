@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:60px;">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
            <div class="card">
                <div class="card-header" style="background-color: #f44336;color:white;">Display Properties</div>


                <div class="card-body">
                   
                 
                    <?php $appSize = sizeof($applicanties);
                          $proSize = sizeof($properties);
                          $proSize = sizeof($payments);

                          for($i=0; $i< $proSize; $i++ ){
                            
                          
                            
                        }
                    ?>

                    <table class="table table-striped table-hover table-responsive">
                        <thead bgcolor="#a6468c" style="color:white;">
                            <tr>
                               <a href="#"> <th>Property Type</th></a>
                               <!-- <th>Address /Location </th> -->
                               
                               <!-- <th>Size (sqr /ft )</th> -->
                               <th>Owner</th>
                               <th>Owner CNIC NO</th>
                               <th>Payment Procedure</th>
                               <th>Actions</th>
                               <th>Download</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0; $appSize >$i; $i++)
                                <tr>
                                
                                    <td><a href="{{url('display/'.$properties[$i]['id'])}}">{{$properties[$i]['propertyType']}}</a></td>
                                    <!-- <td>Floor No. :{{$properties[$i]['propertyAddress']}} <br><br>Room/Shop No. :{{$properties[$i]['propertyLocation']}}</td> -->
                                    <!-- <td>{{$properties[$i]['propertySize']}} sqr/ft</td> -->
                                    <td>{{$applicanties[$i]['name']}}</td>
                                    <td>{{$applicanties[$i]['cnicNo']}}</td>
                                    <td>{{$payments[$i]['propertyPaymentProcedure']}}</td>
                                    <td> <a href="{{url('editingform/'.$properties[$i]['id'])}}">Edit</a>&nbsp;&nbsp;
                                         <a href="#">History</a>
                                    </td>
                                   
                                    <td>
                                   
                                    @if($payments[$i]['propertyPaymentProcedure'] == "Token")
                                   
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Print Forms
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">  
                                            <a class="dropdown-item" href="{{url('Receptformtoken/'.$properties[$i]['id'])}}">Print Recept Form</a>
                                        </div>
                                    </div>
                                    @else
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Print Forms
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{url('form1/'.$properties[$i]['id'])}}">Print Form 1</a>
                                            <a class="dropdown-item" href="{{url('form2/'.$properties[$i]['id'])}}">Print Form 2</a>
                                            <a class="dropdown-item" href="{{url('form3/'.$properties[$i]['id'])}}">Print Form 3</a>
                                            <a class="dropdown-item" href="{{url('Receptform/'.$properties[$i]['id'])}}">Print Recept Form</a>
                                            <a class="dropdown-item" href="{{url('contractform/'.$properties[$i]['id'])}}">Print Contract Form</a>
                                        </div>
                                    </div>
                                    <!-- <a href="{{url('form1/'.$properties[$i]['id'])}}">Print Form1</a>,
                                    <a href="{{url('form2/'.$properties[$i]['id'])}}">Print Form2</a>,
                                    <a href="{{url('form3/'.$properties[$i]['id'])}}">Print Form3</a>,
                                    <a href="{{url('Receptform/'.$properties[$i]['id'])}}">Recept Form</a>,
                                    <a href="{{url('contractform/'.$properties[$i]['id'])}}">Contract Form</a> -->
                                    @endif
                                    
                                    </td>

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

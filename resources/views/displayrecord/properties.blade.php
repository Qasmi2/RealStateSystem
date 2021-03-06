@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:60px;">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
         @include('flash-message')
                            <script>
                                    $(document).ready(function() {
                                    $('a[data-confirm]').click(function(ev) {
                                    var href = $(this).attr('href');
                                    if (!$('#dataConfirmModal').length) {
                                    $('body').append('<div id="dataConfirmModal" class="modal fade modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog "><div class="modal-content"><div class=" modal-header" style="text-align:center;display:flow-root !important;color:white;background-color: Green;" ><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel" >Please Confirm the Approval</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button><a class="btn btn-success" id="dataConfirmOK">Approval</a></div></div></div></div>');
                                    } 
                                    $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
                                    $('#dataConfirmOK').attr('href', href);
                                    $('#dataConfirmModal').modal({show:true});
                                    return false;
                                        });
                                });
                            </script>
                            <script>
                                    $(document).ready(function(){
                                    $("#myInput").on("keyup", function() {
                                        var value = $(this).val().toLowerCase();
                                        $("#myTable tr").filter(function() {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                        });
                                    });
                                    });
                            </script>    
                            
            <div class="card">
                <div class="card-header" style="background-color: #f44336;color:white;">Display Properties</div>


                <div class="card-body">
                   
                 
                    <?php 
                        //  var_dump(json_encode($applicanties));                       
                        //  exit(); 
                         $appSize = sizeof($applicanties);
                          $proSize = sizeof($properties);
                          $proSize = sizeof($payments);
                          $approSize = sizeof($approvals);

                        
                    ?>
          

                    
                    <div class="container">
                      <div class="row">
                         <input id="myInput" type="text" class="form-control" placeholder="Search..">
                       </div>
                    </div>     
                    <br>      
                    <table class="table table-striped table-hover table-responsive w-100 d-block d-md-table">
                        <thead bgcolor="#a6468c" style="color:white;">
                            <tr>
                               <a href="#"> <th>Property Type</th></a>
                               <!-- <th>Address /Location </th> -->
                               
                               <!-- <th>Size (sqr /ft )</th> -->
                               <th>Owner</th>
                               <th>Owner CNIC NO</th>
                               <th>Payment Procedure</th>
                               <th>Actions</th>
                               <th>Download / Approval </th>
                               
                            </tr>
                        </thead>
                        <tbody id="myTable">
                       
                            @for($i=0; $appSize >$i; $i++)
                                <tr>
                                
                                    <td><a href="{{url('display/'.$properties[$i]['id'])}}">{{$properties[$i]['propertyType']}}</a></td>
                                    <td>{{$applicanties[$i]['name']}}</td>
                                    <td>{{$applicanties[$i]['cnicNo']}}</td>
                                    <td>{{$payments[$i]['propertyPaymentProcedure']}}</td>
                                    <td> <a href="{{url('editingform/'.$properties[$i]['id'])}}">Edit</a><br>
                                         <a href="{{url('paymenthistory/'.$properties[$i]['id'])}}">Payment History</a>
                                    </td>           
                                    <td>
                                        @if($approvals[$i]['status'] == "approved")

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
                                                        <a class="dropdown-item" href="{{url('form1/'.$properties[$i]['id'])}}" target="_blank">Print Form 1</a>
                                                        <a class="dropdown-item" href="{{url('form2/'.$properties[$i]['id'])}}" target="_blank">Print Form 2</a>
                                                        <a class="dropdown-item" href="{{url('form3/'.$properties[$i]['id'])}}" target="_blank">Print Form 3</a>
                                                        <a class="dropdown-item" href="{{url('Receptform/'.$properties[$i]['id'])}}" target="_blank">Print Recept Form</a>
                                                        <a class="dropdown-item" href="{{url('contractform/'.$properties[$i]['id'])}}" target="_blank">Print Contract Form</a>
                                                    </div>
                                                </div>
                                        
                                            @endif
                                        @else
                                          
                                            <div>  
                                            @can('user-actions', Auth::user())
                                                <a href="{{url('approved/'.$properties[$i]['id'])}}" data-confirm="Are you sure you want to give the Approval?" class="btn btn-lg btn-success " style="background-color: #a6468c !important;">Approved</a> 
                                                @else
                                                <span class="badge badge-pill badge-info" style="font-size: 100% !important; background-color: #a6468c !important;">Waiting</span>
                                            @endcan
                                            </div>
                                        
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

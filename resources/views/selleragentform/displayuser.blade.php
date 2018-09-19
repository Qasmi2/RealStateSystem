@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:60px;">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
        @include('flash-message')
            <div class="card">
                <div class="card-header" style="background-color: #f44336;color:white;">Display User Information</div>

                        <!-- javaScript delete confirmation -->
                        <script>
                                $(document).ready(function() {
                                $('a[data-confirm]').click(function(ev) {
                                var href = $(this).attr('href');
                                if (!$('#dataConfirmModal').length) {
                                $('body').append('<div id="dataConfirmModal" class="modal fade modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog "><div class="modal-content"><div class=" modal-header" style="text-align:center;display:flow-root !important;color:white;background-color: red;" ><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel" >Please Confirm</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button><a class="btn btn-danger" id="dataConfirmOK">Delete</a></div></div></div></div>');
                                } 
                                $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
                                $('#dataConfirmOK').attr('href', href);
                                $('#dataConfirmModal').modal({show:true});
                                return false;
                                    });
                            });
                        </script>
                        <!-- End JavaScript code -->
                <div class="card-body">
                
                 
                    <?php 
                          $userssize = sizeof($users);
                
                    ?>

                   
                    <table class="table table-bordered table-striped table-hover ">
                        <thead bgcolor="#a6468c" style="color:white;">
                            <tr>
                               <th>users ID</th>
                               <th>users Name</th>
                               <th>users Email</th>
                               <th>users Role</th>
                              
                               <th>Actions</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0; $i < $userssize ; $i++)
                                <tr>
                                    
                                    <td>{{$users[$i]['id']}}</td>
                                    <td>{{$users[$i]['name']}}</td>
                                    <td>{{$users[$i]['email']}}</td>
                                    <td>{{$users[$i]['role']}}</td>
                                  
                                    
                                    <td><a href="{{ url ('usersedit/'.$users[$i]['id'])}}"> Edit</a>
                                        
                                        <a href="{{ url('usersdelete/'.$users[$i]['id']) }}" data-confirm="Are you sure you want to delete?" class="btn btn-lg btn-danger ">Delete</a>
                                    </td>

                                   

                                </tr>
                            @endfor
                            
                        </tbody>
                    </table>
                    
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

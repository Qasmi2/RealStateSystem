@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:60px;">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
        @include('flash-message')
            <div class="card">
                <div class="card-header" style="background-color: #f44336;color:white;">Installment History</div>
                <div class="card-body">
                    <?php ?>
                   
                    <table class="table table-bordered table-striped table-hover table-responsive">
                        <thead bgcolor="#a6468c" style="color:white;">
                            <tr>
                               <th>Seller ID</th>
                               <th>Seller Name</th>
                               <th>Seller Father Name</th>
                               <th>Seller Designation </th>
                               <th>Seller Address</th>
                            
                               
                            </tr>
                        </thead>
                        <tbody>
                           
                                <tr>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                   

                                   

                                </tr>
                           
                            
                        </tbody>
                    </table>
                    
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

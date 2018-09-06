@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:60px;">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
        @include('flash-message')
            <div class="card">
                <div class="card-header" style="background-color: #f44336;color:white;">Installment History</div>
                <div class="card-body">
                <?php 


                        $installmentHistory = array($installmentHistory);
                        foreach($installmentHistory as $te){
                            $installmentNo = $te->installmentNo;
                            $installmentAmount = $te->installmentAmount;
                            $status = $te->status;
                            $dueDate = $te->installmentPaymentDate;
                        }
                        $paymentHistory = array($paymenthistory);
                        foreach($paymentHistory as $te){
                            $paidAmount = $te->paidAmount;
                            $remaingAmount = $te->remeaningAmount;
                        }
                       
                        
                       
                        $payment = array($payment);
                        foreach($payment as $te){
                            $PurchingDate = $te->propertyPurchingDate;
                            $propertyPrice = $te->propertyPrice;
                        }
                        $property = array($property);
                        foreach($property as $te){
                            $propertyType = $te->propertyType;
                            $propertySection= $te->propertySection;
                        }
                        $applicant = array($applicant);
                        foreach($applicant as $te){
                            $applicantName = $te->name;
                        }

                    ?>
                   
                   <br>
                   <h2>Installment Payment info</h2>
                   <br>
                   <table class="table table-striped table-hover table-responsive">
                        <thead bgcolor="#a6468c" style="color:white;">
                            <tr>
                               <th>Property Item</th>
                               <th>Owner Name</th>
                               <th>Property Total Amount </th>
                               <th>Paid Amount</th>
                               <th>Remaning Amount</th>
                               <th>Purching Data</th>
                               
                            
                               
                            </tr>
                        </thead>
                        <tbody>
                           
                                <tr>
                                    
                                    <td>{{$propertyType}} <br>{{$propertySection}} </td>
                                    <td>{{$applicantName}}</td>
                                  
                                    <td>{{$propertyPrice}}</td>
                                    <td>{{$paidAmount}}</td>
                                    <td>{{$remaingAmount}}</td>
                                    <td>{{$PurchingDate}}</td>
                                    
                        
                                </tr>
                           
                            
                        </tbody>
                    </table>
                    <br>
                    <h2> Installment Info</h2>
                    <br>
                     <table class="table table-striped table-hover table-responsive">
                        <thead bgcolor="#a6468c" style="color:white;">
                            <tr>
                               <th>installment Number</th>
                               
                               <th>Installment Amount </th>
                               <th>Installment Due Data</th>
                               <th>Status</th>
                               <th>Paid Installments</th>
                                <th>Remeaning Installments</th>
                               <th>Action</th>
                              
                               
                            
                               
                            </tr>
                        </thead>
                        <tbody>
                           
                                <tr>
                                    
                                    <td> {{$installmentNo}}</td>
                                    <td>{{ $installmentAmount}}</td>
                                  
                                    <td>{{$dueDate}}</td>
                                    <td>{{$status}}</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td><a href="">......</a></td>
                                  
                        
                                </tr>
                           
                            
                        </tbody>
                    </table>
                    
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

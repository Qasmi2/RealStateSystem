@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:60px;">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
        @include('flash-message')
                    <div>
                        <button class="btn btn-lg btn-default" onclick="window.history.go(-1)">Back</button>
                    </div>
                    <br>
            <div class="card">
                <div class="card-header" style="background-color: #f44336;color:white;">Total Payment History</div>
                <div class="card-body">
                    <?php 
                        $paymentHistory = array($paymenthistory);
                        foreach($paymentHistory as $te){
                            $paidAmount = $te->paidAmount;
                            $remaingAmount = $te->remeaningAmount;
                        }
                        $tokenhisory = array($tokenhisory);
                        // to find the tokenhisory empty or not
                         $tokenHistoryEmpty = json_encode($tokenhisory);

                        if($tokenHistoryEmpty == "[null]"){
                            $tokenpayment = 0;
                        }elseif($tokenHistoryEmpty !=  "[null]"){
                         
                            foreach($tokenhisory as $te){
                                 $tokenpayment = $te->tokenPayment;
                            }
                        }
                        
                        $totalAmount = array($payment);
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
                                  
                                    <td>{{$propertyPrice + $tokenpayment}}</td>
                                    <td>{{$paidAmount}}</td>
                                    <td>{{$remaingAmount}}</td>
                                    <td>{{$PurchingDate}}</td>
                                    
                        
                                </tr>
                           
                            
                        </tbody>
                    </table>
                    
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

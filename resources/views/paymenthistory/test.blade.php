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

                       // $installmentHistory = array($installmentHistory);
                            // var_dump(json_encode($installmentHistory));
                            // exit();
                          //  $installmentHistory = json_encode($installmentHistory);
                        // foreach($installmentHistory as $te){
                        //     $installment[] = $te->installmentNo;
                        //     $status[] = $te->status;
                        // }
                        // for($i=0; $i<sizeof($installment); $i++){
                        //     echo "installment No.".$installment[$i]."<br>";
                        //     echo "status".$status[$i]."<br>";

                        // }
                        // exit();
                        // var_dump($installmentHistory);
                        // exit();
                        //   foreach($installmentHistory as $te){
                        //     echo $te->status."<br>";
                     //   }

                        $paymentHistory = array($paymenthistory);
                        foreach($paymentHistory as $te){
                            $paidAmount = $te->paidAmount;
                            $remaingAmount = $te->remeaningAmount;
                        }
                       
                        $installment = array($installment);
                        foreach($installment as $te){
                            $propertyId = $te->propertyId;
                            $installmentDates = json_decode($te->installmentDates); 
                            $sizeofDates = sizeof($installmentDates);
                            $sizeofDates = $sizeofDates +1;
                            $temp = 0;
                           
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
                               <th>Action Paid </th>
                           
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($installment as $te)
                                @for($i = 1; $i < $sizeofDates; $i++)
                                <tr>

                                    <td> {{$i }}</td>
                                    <td>{{$te->amountOfOneInstallment}}</td>
                                    <td>{{$installmentDates[$i-1]}}</td>
                                    
                                    <td>unpaid</td>
                                    <td><a href="{{url('installmentpaid/'.$propertyId.'/'.$i)}}"> paid installment</a></td>
                                   
                              
                        
                                </tr>
                                @endfor
                                @endforeach
                            
                        </tbody>
                    </table>
                    
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
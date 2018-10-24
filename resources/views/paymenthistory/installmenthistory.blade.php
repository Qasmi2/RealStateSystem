@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:80px;">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
        @include('flash-message')
                    <div>
                        <button class="btn btn-lg btn-default" onclick="window.history.go(-1)">Back</button>
                    </div>
                    <br>
            <div class="card">
                <div class="card-header" style="background-color: #f44336;color:white;">Installment History</div>
                <div class="card-body">
                            <script>
                                $(document).ready(function() {
                                $('a[data-confirm]').click(function(ev) {
                                var href = $(this).attr('href');
                                if (!$('#dataConfirmModal').length) {
                                $('body').append('<div id="dataConfirmModal" class="modal fade modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog "><div class="modal-content"><div class=" modal-header" style="text-align:center;display:flow-root !important;color:white;background-color: green;" ><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel" >Installment Paid Confirmation </h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button><a class="btn btn-success" id="dataConfirmOK">Paid Installment</a></div></div></div></div>');
                                } 
                                $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
                                $('#dataConfirmOK').attr('href', href);
                                $('#dataConfirmModal').modal({show:true});
                                return false;
                                    });
                            });
                        </script>
                <?php 

                       foreach($installmentHistory as $te){
                            $status[] = $te->status;
                            $installmentdata[] = $te->installmentPaymentDate;

                       }
                       
                        if($installmentHistory != "[]")
                        {
                         $statusItems = sizeof($status);
                        }
                        // for($i= 1 ; $i <= $statusItems ; $i++){
                        //     echo $status[$i-1]."<br>";
                        // }
                     
                      
                         
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
                   <table class="table table-striped table-hover table-responsive w-100 d-block d-md-table">
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
                    <h2>Paid Installemnt Info</h2>
                    <br>
                    <table class="table table-striped table-hover table-responsive w-100 d-block d-md-table">
                        <thead bgcolor="#a6468c" style="color:white;">
                            <tr>
                               <th >Installment No.</th>
                               <th >Installment Amount</th>
                               <th>Status</th>
                               <th>Installment Paid Data</th>
                               <th>Download</th>
                              
                              
                            </tr>
                        </thead>
                        <tbody>
                            @if($installmentHistory != "[]")
                            @foreach($installmentHistory as $te)
                                
                               
                                <tr>

                                    <td> {{$te->installmentNo}}</td>
                                    <td>{{$te->installmentAmount}}</td>
                                    <td style="color:green">Paid Installment</td>
                                    <td>{{$te->installmentPaymentDate}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Print Forms
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">  
                                 
                                                <a class="dropdown-item" href="{{url('installmentfrom/'.$propertyId.'/'.$te->installmentNo.'/'.$te->installmentAmount)}}" target="_blank">Print Recept Form</a>
                                                
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    @can('user-actions', Auth::user())
                        <h2> Installment Info</h2>
                        <br>
                    
                        <table class="table table-striped table-hover table-responsive w-100 d-block d-md-table">
                            <thead bgcolor="#a6468c" style="color:white;">
                                <tr>
                                <th>installment Number</th>
                                <th>Installment Amount </th>
                                <th>Installment Due Data</th>
                                
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
                                        <td>
                                        <!--<a href="{{url('installmentpaid/'.$propertyId.'/'.$i)}}"> paid installment</a>-->
                                        <a href="{{url('installmentpaid/'.$propertyId.'/'.$i)}}" data-confirm="Are you sure to Confirm the Installment Paid ?" class="btn btn-success" >Paid Installment</a>                                        
                                        </td>
                                    
                                        </tr>
                                    @endfor
                                    @endforeach
                                
                                
                                
                            </tbody>
                            <thead bgcolor="#a6468c" style="color:white;">
                                <tr>
                                <th>installment Number</th>
                                <th>Installment Amount </th>
                                <th>Installment Due Data</th>
                                
                                <th>Action Paid </th>
                                
                                </tr>
                            </thead>
                        </table>
                    @endcan
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

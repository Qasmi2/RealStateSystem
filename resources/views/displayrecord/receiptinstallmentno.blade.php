<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'GothamBlack','GothamBook','arial';
            src: url("fonts/Gotham-Black.ttf");
			src: url("fonts/Gotham-Book.ttf");
			src: url("fonts/arial.ttf");
			
        }
		.table thead th{
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
		border-left: none;
		border-right: none;
		font-size:14px;
	}
.table tbody> tr>td {
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
		border-left: none;
		border-right: none;
		
	}
	.table td{
			padding-top:14px;
			padding-bottom:9px;
			border-top:none !important;
		}
        body {
            font-family:'Gotham Book',GothamBlack;
            font-size:12px;
            height: auto;
            width: 770px;
            position: relative;
            margin: 0 auto;
            color: #000;
            background: #FFFFFF;
            display: block;
            letter-spacing: 1px;
        } 
		
	.container{
		padding-left:80px;
		margin-left:80px;
		padding-right:65px;
	}
    </style>
		<?php  
                            
                      
							$property = array($property);
							$payment = array($payment);
							$seller = array($seller);
							foreach($seller as $te){
								
								$sallerName = $te->sallerName;
								$sallerCnicNo = $te->sallerCnicNo;
							
							}  
							$applicant = array($applicant);
							foreach($applicant as $te){
								$pic = $te->cover_image;
								$appName = $te->name;
								$cnicNo = $te->cnicNo;
								$address = $te->mailingAddress;
							
							}  
							
							$installments = array($installments);            
							foreach($property as $te){
							
									
								$propertySize = $te->propertySize;
								$item1 = $te->propertySection;
								$roomShopNO = $te->propertyLocation;
								$floor = $te->propertyAddress;
								$type = $te->propertyType;
								$appid = $te->id;
							}   
							foreach($payment as $te){
								$propertyPrice = $te->propertyPrice;
								$paymenType = $te->paymentType;
								$paymentData = $te->propertyPurchingDate;
							}
							// $paymentHistory = array($paymentHistory);     
							// foreach($paymentHistory as $te){
							//     $totalpaid = $te->paidAmount;
							//     $remeaningAmount = $te->remeaningAmount;
							// }         
							
							foreach($installments as $te){
								$downpayment = $te->downpayment;
								$noOfInstallment = $te->noOfInstallments;
								$intallmentDates = json_decode($te->installmentDates);
								if($number <= 9){
									$firstInstallmentDates = $intallmentDates[$number];
								}
							}
							
							// Reaming amount 
							$remaningAmount = $propertyPrice-$downpayment;
							// installment amount 
							$installmentAmount = $remaningAmount/$noOfInstallment;
							// get unit cost of the sqr ft 
							$unitCost = (int)($propertyPrice/$propertySize);
				
							// total paid and remeaning amount
							$installmentAmountPaid = $installmentAmount * $number;
							$totalpaid = $downpayment + $installmentAmountPaid;
							$remeaningAmount = $propertyPrice - $totalpaid;
				
							
				
						?>
</head>
<body>
<div class="container">
	<div class="row">
	<div class="col-md-8 token-headings">
	<h2 style="font-family:arial; margin-top:160px; font-weight:bold;font-size:44px;"> RECEIPT</h2>
	<h2 style="font-family:arial; margin-top:45px; font-weight:bold;font-size:32px;"> MONTVIRO INVESTMENT</h2>
	<h2 style="font-family:arial;  font-weight:bold;font-size:32px;">INSTALLMENT AMOUNT</h2>
	</div>
	<div class="col-md-4" style="margin-top:160px;">
	<p style="text-align:right; padding-right:20px;margin-bottom:0.3rem !important;"> Receipt #:<u>{{$appid}}</u></p>
	<p style="text-align:right;margin-bottom:0.3rem !important;"> Date :<u>{{$paymentData}}</u></p>
	</div>
	</div>
	</div>

	<div class="container">
	<div class="row">
	<div class="col-md-12 token-para">
	<div style="font-family:arial; font-size:11px; font-weight:bold; line-height:28px; padding:15px 0;">
	Payment Modes: <b>Cheque / Cash / Online / Pay order / Demand Draft / Bank Deposit</b><br />
				Payment through:  {{$paymenType}}
	</div>
	</div>
	</div>
	</div>
	<table class="table" style="font-family:arial;font-size:12px; width:83% !important; margin-left:160px;">
				  <thead>
				  <tr>
					<th scope="col">S.No</th>
					<th scope="col">Item</th>
					<th scope="col">Description</th>
					<th scope="col">Rate /Sqr ft (PKR)</th>
					<th scope="col">PKR</th>
				  </tr>
				  </thead>
				  <tbody>
				  <tr style="border-bottom:1px solid #000;">
				
				  	<td>1</td>
					<td>{{$type}}</td>
					<td>{{$propertySize}} sq ft,  Floor NO. {{$floor}},<br> Room No. / Shop No. {{$roomShopNO}}</td>
					<td>RS.{{$unitCost}}/- </td>
					<td>Total Price: {{$propertyPrice}}</td>
				  </tr>
				  <tr style="line-height:15px; ">
					 <td colspan="12" style="text-align: right;border-bottom:none !important;"> {{$number}}<sup>st</sup> Installment Amount Paid : {{$amount}}</b></td>
				  </tr>
				  <tr style="line-height:15px;">
					<td colspan="12" style="text-align: right;border-bottom:none !important;">Total Received Amount  RS. {{$totalpaid}}/-</b></td> 
				  </tr>
				  <tr style="line-height:15px;">
				  <td colspan="12" style="text-align: right;">Total Remaining Amount  RS. {{$remeaningAmount}}/-</b></td>
				  </tr>
				  </tbody>
				</table> 
				<div style="font-family:arial; font-size:13px; font-weight:bold;line-height:28px; padding:25px 0; padding-left:160px;">
			
				@if($number <= 9)
                {{$number + 1}}<sup>st</sup> Installment Amount:  RS. {{$amount}}/-  <br>
				{{$number + 1}}<sup>st</sup> Installment Due Date:  {{$firstInstallmentDates}}
                @else{
                    installment completed
                }
                @endif
			</div>
			<div class="container">
	<div class="row">
	<div class="col-md-4 token-signature" style="margin-top:78px">
	<div style="font-family:arial;font-size:10px;text-align:left;line-height:24px; padding:25px 0; font-weight:bold;">
							<b style="font-size:16px;">Saller</b><br>
							Signature:___________________________<br>
							MONTVIRO (Pvt) Ltd.<br>
							Name: <b>Mohsin Ali Khan</b><br>
							CNIC # 13101-9506840-5<br>
							
						</div>
	</div>
	<div class="col-md-1 offset-3" style="">
	<div style="position: absolute;left: -36px;top: 134px;">
	<img src="{{$pic}}" height="100" width="100">
	</div>
	</div>
	<div class="col-md-4 token-signature" style="margin-top:95px; font-family:arial;line-height:24px;font-size:10px;font-weight:bold;">
							<b style="font-size:16px;">Purchaser</b>
							<span>Signature:_____________________<br></span>
								Name:<b> {{$appName}} </b>		
							<br>
								CNIC #  {{$cnicNo}}<br>
							
							Address:{{$address}}
						
	</div>
	</div>
	</div>
	</div>

	<div class="container">
	<div class="row">
	<div class="col-md-4" style="margin-top:73px">
	<div style="front-family:arial;font-size:10px;text-align:left;line-height:24px; padding:25px 0;font-weight:bold;">
	<b>Witness 1:______________</b><br>
	Fintial consultants (Pvt) Ltd.<br>
	Name: <b>Kashif Malik </b><br>
	CNIC # 37405-4588246-1<br>
	</div>
	</div>
	<div class="col-md-4 offset-4" style="margin-top:97px;font-family:arial; line-height:24px;font-size:10px;font-weight:bold;">
	<b>Witness 2:</b><br>
	Fintial consultants (Pvt) Ltd.<br>
	Name:<b>{{$sallerName}}</b><br>
	CNIC NO # {{$sallerCnicNo}}<br>
	</div>
	</div>
	</div>
    
     
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>



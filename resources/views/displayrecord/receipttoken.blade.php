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
			$token = array($token);
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
            foreach($token as $te){
                $tokenpayment = $te->tokenPayment;
				$remaningDownPaymentDate = $te->remaningPaymentDate;
				

            }

        
            // get the download payment ( 20% )
             $downpayment = ($propertyPrice * 0.2);
             $remaingDownpayment = $downpayment - $tokenpayment;

			// get unit cost of the sqr ft 
			$unitCost = (int)($propertyPrice/$propertySize);

		?>
</head>
<body>
    
<div class="container">
	<div class="row">
	<div class="col-md-8 token-headings">
	<h2 style="font-family:arial; margin-top:160px; font-weight:bold;font-size:44px;"> RECEIPT</h2>
	<h2 style="font-family:arial; margin-top:45px; font-weight:bold;font-size:32px;"> MONTVIRO INVESTMENT</h2>
	<h2 style="font-family:arial;  font-weight:bold;font-size:32px;">TOKEN PAYMENT</h2>
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
				Payment through: {{$paymenType}}
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
					<td>{{$propertySize}} sq ft,  Floor NO. {{$floor}} <br> Room No. / Shop No. {{$roomShopNO}}</td>
					<td>RS.{{$unitCost}}/- </td>
					<td>Total Price: {{$propertyPrice}}</td>
				  </tr>
				  <tr style="line-height:15px; ">
					 <td colspan="12" style="text-align: right;border-bottom:none !important;"> Token Payment Amount Paid through CASH  <b> RS.{{$tokenpayment}}/-</b></td>
				  </tr>
				  <tr style="line-height:15px;">
					<td colspan="12" style="text-align: right;border-bottom:none !important;">20 % Downpayment  Amount <b> RS.{{$downpayment}}/-</b></td> 
				  </tr>
				  <tr style="line-height:15px;">
				  <td colspan="12" style="text-align: right;">Remaining Downpayment Amount <b> RS.{{$remaingDownpayment}}/-</b></td>
				  </tr>
				  </tbody>
				</table> 
				<div style="font-family:arial; font-size:13px; font-weight:bold;line-height:28px; padding:25px 0; padding-left:160px;">
				<!-- 1<sup>st</sup> Installment Amount:   RS.5600000/-  <br>
				1<sup>st</sup> Installment Due Date:  9-10-2019  -->
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
    
        <!-- <div style="width:750px; margin:0px auto; font-size:20px; line-height:25px; display:table;">
			
            <div style="font-family:Calibri;font-size:30px; font-weight:bold;margin-top:30px;">RECEIPT</div>
			&nbsp;
			
			<div style="font-family:Calibri; font-size:30px; font-weight:bold;margin-top:10px;">MONTVIRO INVESTMENT</div>
			<div style="font-family:Calibri; font-size:30px; font-weight:bold;">TOKEN PAYMENT</div>
			&nbsp;
			
			<div style="font-family:Calibri; font-size:13px; font-weight:bold; line-height:16px; padding:15px 0;">
				Payment Modes: <b>Cheque / Cash / Online / Pay order / Demand Draft / Bank Deposit</b><br />
				Payment through:  {{$paymenType}}
			</div>
			
          
                <table style="font-family:Calibri;font-size:15px;">
				  <tr>
					<th>S.No</th>
					<th>Item</th>
					<th>Description</th>
					<th>Rate /Sqr ft (PKR)</th>
					<th>PKR</th>
				  </tr>
				  <tr>
					<td>1</td>
					<td>{{$type}}</td>
					<td>{{$propertySize}} sq ft,  Floor NO. {{$floor}} <br> Room No. / Shop No. {{$roomShopNO}}</td>
					<td>RS.{{$unitCost}}/- </td>
					<td>Total Price: {{$propertyPrice}}</td>
				  </tr>
				  <tr style="border:none !important;line-height:15px;">
					 <td colspan="5" style="text-align: right;"> Token Payment Amount Paid through CASH  RS.{{$tokenpayment}}/-</td>
				  </tr>
				  <tr style="border:none !important;line-height:15px;">
					<td colspan="5" style="text-align: right;">20 % Downpayment  Amount  RS.{{$downpayment}}/-</td> 
				  </tr>
				  <tr style="border:none !important;line-height:15px;">
				  <td colspan="5" style="text-align: right;">Remaining Downpayment Amount  RS.{{$remaingDownpayment}}/-</td>
				  </tr>
				</table> 

			&nbsp;&nbsp;
			
			<table>
				<tr style="border:none !important;">
					<td style="border:none !important;">
						<div style="front-family:Calibri;font-size:12px;text-align:left;line-height:18px; padding:25px 0;">
							<b>Saller</b><br>
							Signature:___________________________<br>
							MONTVIRO (Pvt) Ltd.<br>
							Name:Mohsin Ali Khan<br>
							CNIC # 13101-9506840-5<br>
							
						</div>
					</td>
					<td style="border:none !important;">
						<div style="front-family:Calibri;font-size:12px;text-align:right;line-height:18px; padding:25px 0;">
							<b style="padding-right: 160px;">Purchaser</b><br>
							<span>Signature:_____________________<br></span>
							<div style="float:left;margin-left:87px;">
								<img src="{{$pic}}" height="70" width="70">
							</div>
							<div style="float:left;padding-left:15px;">
								Name: {{$appName}}<br>
							
								
								
							</div><br>
							<div style="float:left;padding-left:15px;">
								
								CNIC # {{$cnicNo}}<br>
								
								
							</div><br>
							<div style=" float:left; padding-left: 15px;">
							Address: {{$address}}
							</div>
						</div>
					</td>
				<tr>
			</table>
			
			&nbsp;&nbsp;
			<table>
				<tr style="border:none !important;">
					<td style="border:none !important;">
						<div style="front-family:Calibri;font-size:12px;text-align:left;line-height:18px; padding:25px 0;">
							<b>Witness 1:___________________</b><br>
							Fintial consultants (Pvt) Ltd.<br>
							Name:Kashif Malik<br>
							CNIC # 37405-4588246-1<br>
							
						</div>
					</td>
					
					<td style="border:none !important;">
						<div style="front-family:Calibri;font-size:12px;text-align:right;line-height:18px; padding:25px 0;">
							<b style="padding-right:164px;">Witness 2:</b><br>
							<tr>
							<td>
							<div style="padding-right: 53px;">
								Fintial consultants (Pvt) Ltd.<br>
							</div>
							</td>
							<td>
							<div style="padding-right: 150px;">
								Name: {{$sallerName}}<br>
							</div>
							</td>
							</td>
							<div style="padding-right: 48px;">
								CNIC NO # {{$sallerCnicNo}}<br>
							</div>
							</td>
							</tr>
							
							
						</div>
					</td>
				<tr>
			</table>
            
		</div> -->

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
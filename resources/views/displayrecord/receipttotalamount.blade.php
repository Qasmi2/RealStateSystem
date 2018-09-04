<!doctype html>
<html>
<head>
    <style>
        @font-face {
            font-family: 'GothamBlack','GothamBook';
            src: url("fonts/Gotham-Black.ttf");
            src: url("fonts/Gotham-Book.ttf");
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
		
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
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
			        
			foreach($property as $te){
				$propertySize = $te->propertySize;
				$item1 = $te->propertySection;
				$roomShopNO = $te->propertyLocation;
				$floor = $te->propertyAddress;
				$type = $te->propertyType;
				
			}   
			foreach($payment as $te){
				$propertyPrice = $te->propertyPrice;
				$paymenType = $te->paymentType;
			}         
			
			// get unit cost of the sqr ft 
			$unitCost = (int)($propertyPrice/$propertySize);

		?>
</head>
<body>
    
        <div style="width:750px; margin:0px auto; font-size:20px; line-height:25px; display:table;">
			
            <div style="font-family:Calibri;font-size:30px; font-weight:bold;margin-top:30px;">RECEIPT</div>
			&nbsp;
			
			<div style="font-family:Calibri; font-size:30px; font-weight:bold;margin-top:10px;">MONTVIRO INVESTMENT</div>
			<div style="font-family:Calibri; font-size:30px; font-weight:bold;">PAYMENT</div>
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
					<td>{{$propertySize}} sq ft  ,Floor NO. {{$floor}}<br> Room No. / Shop No. {{$roomShopNO}}</td>
					<td>RS.{{$unitCost}}/- </td>
					<td>Total Price: {{$propertyPrice}}</td>
				  </tr>
				  <tr style="border:none !important; line-height:15px;">
					 <td colspan="5" style="text-align: right;"> Payment Amount Paid through CASH  RS.{{$propertyPrice}}/-</td>
				  </tr>
				  <tr style="border:none !important;line-height:15px;">
					<td colspan="5" style="text-align: right;">Total Received Amount  RS.{{$propertyPrice}}/-</td> 
				  </tr>
				  <tr style="border:none !important;line-height:15px;">
				  <td colspan="5" style="text-align: right;">Total Remaining Amount  RS.0/-</td>
				  </tr>
				</table>
<!-- 				
			<div style="font-family:Calibri; font-size:13px; font-weight:bold;line-height:15px; padding:25px 0;">
				1<sup>st</sup> Installment Amount:  RS./-   <br>
				1<sup>st</sup> Installment Due Date: 
			</div> -->
			&nbsp;&nbsp;
			
			<table>
				<tr style="border:none !important;">
					<td style="border:none !important;">
						<div style="front-family:Calibri;font-size:12px;text-align:left;line-height:18px; padding:25px 0;">
							<b>Saller</b><br>
							Signature:___________________________<br>
							MONTVIRO (Pvt) Ltd.<br>
							Name:Mohsin Ali Khan<br>
							CNIC # 613101-9506840-5<br>
							
						</div>
					</td>
					<td style="border:none !important;">
						<div style="front-family:Calibri;font-size:12px;text-align:right;line-height:18px; padding:25px 0;">
							<b style="padding-right: 160px;">Purchaser</b><br>
							<span>Signature:_____________________<br></span>
							<div style="float:left;padding-left:333px;">
								<img src="{{$pic}}" height="70" width="70">
							</div>
							<div style="float:right;padding-right:15px;">
								Name: {{$appName}}<br>
							
								
								
							</div>
							<div style="float:right;padding-right:5px;">
								
								CNIC # {{$cnicNo}}<br>
								
								
							</div>
							<div style="padding-right: 30px;">
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
					<!-- <td style="border:none !important;">
						<div style="front-family:Calibri;font-size:12px;text-align:right;line-height:18px; padding:25px 0;">
							<b>Witness 2:___________________</b><br>
							Fintial consultants (Pvt) Ltd.<br>
							Name: {{$sallerName}}<br>
							CNIC # {{$sallerCnicNo}}<br>
							
						</div>
					</td> -->
					<td style="border:none !important;">
						<div style="front-family:Calibri;font-size:12px;text-align:right;line-height:18px; padding:25px 0;">
							<b style="padding-right:160px;">Witness 2:</b><br>
							<div style="padding-right: 52px;">
								Fintial consultants (Pvt) Ltd.<br>
							</div>
							<div style="padding-right: 70px;">
								Name: {{$sallerName}}<br>
							</div>
							<div style="padding-right: 58px;">
								CNIC NO # {{$sallerCnicNo}}<br>
							</div>
							
							
							
						</div>
					</td>
				<tr>
			</table>
            
		</div>
</body>
</html>
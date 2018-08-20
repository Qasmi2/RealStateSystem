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
			
			$installments = array($installments);            
			foreach($property as $te){
				$propertySize = $te->propertySize;
				$item1 = $te->propertySection;
				$item2 = $te->propertyLocation;
				
			}   
			foreach($payment as $te){
				$propertyPrice = $te->propertyPrice;
				$paymenType = $te->paymentType;
			}         
			foreach($installments as $te){
				$downpayment = $te->downpayment;
				$noOfInstallment = $te->noOfInstallments;
				$intallmentDates = json_decode($te->installmentDates);
				$firstInstallmentDates = $intallmentDates[0];

			}
			
			// Reaming amount 
			$remaningAmount = $propertyPrice-$downpayment;
			// installment amount 
			$installmentAmount = $remaningAmount/$noOfInstallment;
			// get unit cost of the sqr ft 
			$unitCost = (int)($propertyPrice/$propertySize);

			

		?>
</head>
<body>
    
        <div style="width:750px; margin:0px auto; font-size:20px; line-height:25px; display:table;">
			
            <div style="font-family:Calibri;font-size:30px; font-weight:bold;margin-top:30px;">RECEIPT</div>
			&nbsp;
			
			<div style="font-family:Calibri; font-size:30px; font-weight:bold;margin-top:10px;">MONTVIRO INVESTMENT</div>
			<div style="font-family:Calibri; font-size:30px; font-weight:bold;">DOWN PAYMENT</div>
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
					<td>Floor No. {{$item1}} <br /> Room No./Shop No.{{$item2}}</td>
					<td>{{$propertySize}} sq ft</td>
					<td>RS.{{$unitCost}}/- </td>
					<td>Total Price: {{$propertyPrice}}</td>
				  </tr>
				  <tr style="border:none !important;line-height:15px;">
					 <td colspan="5" style="text-align: right;">Down Payment Amount Paid through CASH  RS.{{$downpayment}}/-</td>
				  </tr>
				  <tr style="border:none !important;line-height:15px;">
					<td colspan="5" style="text-align: right;">Total Received Amount  RS.{{$downpayment}}/-</td> 
				  </tr>
				  <tr style="border:none !important;line-height:15px;">
				  <td colspan="5" style="text-align: right;">Total Remaining Amount  RS.{{$remaningAmount}}/-</td>
				  </tr>
				</table>
				
			<div style="font-family:Calibri; font-size:13px; font-weight:bold;line-height:15px; padding:25px 0;">
				1<sup>st</sup> Installment Amount:  RS.{{$installmentAmount}}/-   <br>
				1<sup>st</sup> Installment Due Date:  {{$firstInstallmentDates}}
			</div>
			&nbsp;&nbsp;
			
			<table>
				<tr style="border:none !important;">
					<td style="border:none !important;">
						<div style="front-family:Calibri;font-size:12px;text-align:left;line-height:18px; padding:25px 0;">
							<b>Saller</b><br>
							Signature:___________________________<br>
							MONTVIRO (Pvt) Ltd.<br>
							Name:Mohsin Ali Khan<br>
							CNIC # 6110139839393<br>
							
						</div>
					</td>
					<td style="border:none !important;">
						<div style="front-family:Calibri;font-size:12px;text-align:right;line-height:18px; padding:25px 0;">
							<b>Purchaser</b><br>
							Signature:___________________________<br>
							Name:___________________________<br>
							CNIC NO. ___________________________<br>
						
						</div>
					</td>
				<tr>
			</table>
			
			&nbsp;&nbsp;
			<table>
				<tr style="border:none !important;">
					<td style="border:none !important;">
						<div style="front-family:Calibri;font-size:12px;text-align:left;line-height:18px; padding:25px 0;">
							<b>Witness 1:</b><br>
							Fintial consultants (Pvt) Ltd.<br>
							Name  : ___________________________<br>
							CNIC NO . : ___________________________<br>
							
						</div>
					</td>
					<td style="border:none !important;">
						<div style="front-family:Calibri;font-size:12px;text-align:right;line-height:18px; padding:25px 0;">
							<b>Witness 2:</b><br>
							Fintial consultants (Pvt) Ltd.<br>
							Name:___________________________<br>
							CNIC NO. ___________________________<br>
							
						</div>
					</td>
				<tr>
			</table>
            
		</div>
</body>
</html>
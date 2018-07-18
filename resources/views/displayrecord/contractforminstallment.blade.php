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
            width: 800px;
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
		$applicant = array($applicant);
		$payment = array($payment);
		$witness = array($witness);
		$installment = array ($installments);

		foreach($property as $te){
			$propertyType = $te->propertyType;
			$propertySection = $te->propertySection;
			$size = $te->propertySize;
			$location = $te->propertyLocation;

		}
		foreach($payment as $te){
			$totalPrice = $te->propertyPrice;
			$mode = $te->propertyPaymentProcedure;
			$paymentType = $te->paymentType;
			$purchingDate = $te->propertyPurchingDate;
			 
		}
		// get per unit cost 
		$unitCost = (int)($totalPrice/$size);
		foreach($installment as $te){
			$noOfInstallments = $te->noOfInstallments;
			$downpayment = $te->downpayment;
			$OneInstalment = (int)($te->amountOfOneInstallment);
			$intallmentDates = json_decode($te->installmentDates);
			$firstInstallmentDates = $intallmentDates[0];
			
		}
		// reaming amount 
		$remaingAmount = $totalPrice - $downpayment;

		
	?>

</head>
<body>
    
        <div style="font-family:Arial; font-size:13px; width:800px; margin:20px; font-size:20px; line-height:17px; display:table;">
			
            <div style="font-family:Arial;font-size:30px; font-weight:bold;margin-top:30px;">CONTRACT</div>
			&nbsp;
			
			<div style="font-family:Arial; font-size:30px; font-weight:bold;margin-top:30px;">MONTVIRO INVESTMENT</div>
			
			&nbsp;
			@foreach($applicant as $te)
                <div style="font-family:Arial; font-size:13px;margin-top:10px; margin-right:20px;">
                  
                  This contract is between M/s. Montviro (Pvt) Ltd referred to as “SELLER” and <b>{{$te->name}}</b> S/O <b>{{$te->fatherName}},</b>
				  referred to as “BUYER bearing CNIC No: <b> {{$te->cnicNo}} , </b> Currently Resident of <b>{{$te->mailingAddress}}</b>
                </div>       
			@endforeach        
				<div style="font-family:Arial; font-size:13px; margin-top:10px; margin-right:20px;">
					According to this contract <b>CLIENT</b> is investing in one unit of Montviro Project. 
				</div>
				<div style="font-family:Arial; font-size:13px; margin-top:10px; margin-right:20px;">
					<b>Details of Unit </b>
					<ul>
						<li>
							    Unit No 1: <b>{{$propertyType}} {{$propertySection}},</b> Size <b>{{$size}} Sq ft,{{$location}}</b><br>
								Total Cost of unit: PKR <b></b>{{$totalPrice}}</b> @ PKR <b>{{$unitCost}} / Sq ft </b><br>
								Payment Made: 20% Down Payment: <b>{{$downpayment}}</b>  through Post Dated CASH on <b> {{$purchingDate}}</b><br>
								Payment Mode: <b>{{$paymentType}}</b> . <br>
								Remaining payment of PKR <b> {{$remaingAmount}} </b> will be paid by CLIENT in <b>{{$noOfInstallments}} </b> equal installments, 
								amount be PKR {{$OneInstalment}} per installment after every three months starting from payment
								of first installment on <b>{{$firstInstallmentDates}}</b>.

						</li>
					</ul>
				</div>
				
				&nbsp;

				<div style="font-family:Arial; font-size:30px; font-weight:bold;margin-top:10px;">TERMS AND CONDITIONS</div>
				&nbsp;&nbsp;
				<div style="font-family:Arial; font-size:13px;margin-top:10px; margin-right:20px;">
                    <b>
					The terms and conditions mentioned hereunder pertain to “Montviro” Hotel, Mall and Theme Park being 
					offered to its owners/ prospective buyers and clients.
					</b>
					</b>
					
                </div>  
				<div style="font-family:Arial; font-size:13px; margin-top:10px; margin-right:20px;">
					<ul>
						<li><b>DEFINITION</b></li>
						&nbsp;
						<ul>
							<li>The company means M/s. Montviro (Pvt) Ltd having its office situated at office # 19-20, Commercial 
							omplex, Safari Villas-2, Phase 7, Bahria Town, Rawalpindi, Pakistan, which is constructing and developing
							the project titled Montviro, Five Star Hotel, Mall and Theme Park situated at Murree Expressway near Toll Plaza,
							Islamabad, Pakistan.
							</li>
						</ul>
					</ul> 
					<ul>
						<li><b>BOOKING</b></li>
						&nbsp;
						<ul>
							<li>That the booking/allocation of the shops and rooms shall be on the principle of “first come first served” 
								basis.
							</li>
							<li>
								That all serial number/or other identification number and markings given in the layout plans, booking 
								and /or allocation letters pertaining to units are adhoc, temporary and tentative basis and the company 
								reserves the right to amend/change or renumber the same, if found necessary.

							</li>
						</ul>
					</ul> 
					<ul>
						<li><b>CHANGE OF ADDRESS</b></li>

						&nbsp;
						
						<ul>
							<li>The demand notice of payments and all correspondence will be dispatched by post at the address of 
								applicant as mentioned in the application form and shall be deemed to be duly received and served upon 
								the applicant. The company shall not be responsible for non-delivery of communication if change of address 
								is not informed by the applicant in advance or for the postal mishap.
							</li>
						</ul>
					</ul> 
					<ul>
						<li><b>PAYMENT OF INSTALMENTS/ PAYMENTS</b></li>

						&nbsp;
						
						<ul>
							<li>The time for each and every payment is the essence of this contract. The applicant must ensure the prompt payment of instalments on the due date as per payment schedule agreed at the time of booking. In case of failure, a demand notice for payment will be send to such applicant by ordinary post, if no payment received within next 15 days, the company shall have a right to demand a late payment surcharge and/or revoke the discount offered to the applicant (if any): Whereas, the applicant who shall have paid the full amount against his unit be exempted from this clause.
							</li>
							<li>
								That; all discounts shall be valid on regular payments and adjusted in the final payment.
							</li>
							<li>
								That; all payments shall be made by the applicant / client by cheque / pay order / bank draft in the name of M/s. Montviro (Pvt) Ltd.
							</li>
						</ul>
					</ul> 
					<ul>
						<li><b>NON PAYMENT OF INSTALMENTS</b></li>

						&nbsp;
						
						In case of failure on part of the applicant to make payments against his/ her booked unit within the prescribed time period or within 30 days from the date of issuance of demand notice, the allotment of unit shall be stand cancelled and the principle amount received as down payment and installments till date of cancellation of allotment shall be refunded to the applicant within next 30 days, thereon. The applicant shall have no right to object in such case.
					    
							
						
					</ul> 
					<ul>
						<li><b>OWNERSHIP/ POSSESSION EXECUTION</b></li>

						&nbsp;
						
						<ul>
							<li>
								In case of Booking of Shop, the applicant shall only be given the ownership and possession of his shop in case of full payment/ clearance of instalments against his booked unit. The company shall extend full cooperation to the applicant in registration of the shop after all payment is made. However, all legal expenses in this connection shall be borne by the applicant.

							
							</li>
							<li>
								In case of Booking of Hotel Room, the applicant shall only be given the ownership of hotel room in case of full payment/ clearance of instalments against his booked unit, however, possession shall be retained by the company to ensure the overall standard of a five star hotel. The hotel management shall manage all management affairs of such units under supervision of the company.

							</li>
							<li>
								That the applicant shall be bound to follow the by-laws of the company, accordingly.

							</li>
						</ul>
					</ul> 
					<ul>
						<li><b>AVAILABILITY OF ALLIED FACILITIES</b></li>

						&nbsp;
						
							Although the company shall be bound to provide all the allied facilities to the applicant and that the availability of the mentioned services are subject to the policy of the concerned department/ Government/ semi Government or Local Authorities’ the processing for installation/ transfer of such allied facilities shall be done on behalf of the applicant through demand notice and therefore, the applicant shall pay the processing fee as incurred.
						
						</ul>
					</ul> 
					<ul>
						<li><b>TRANSFER OF ALLOTMENT</b></li>

						&nbsp;
								The applicant shall have no right to transfer or sell his unit to anyone without prior permission of the company. Such transfer shall only be made through the Fintial Consultants (Pvt) Ltd and the transfer fee @2% of the total price shall be charged from the applicant as transfer charges as per company policy.

						</ul>
					</ul> 
					<ul>
						<li><b>SURRENDER OF ALLOTMENT</b></li>

						&nbsp;
								If applicant subsequently wishes to surrender his/her unit at any stage, allotment of booked unit shall stand cancelled and the amount received as down payment and instalments shall be refunded to the applicant without any deduction of amount within 30 days.
						</ul>
					</ul> 
					<ul>
						<li><b>COMMON AREA MAINTENANCE (CAM) CHARGES</b></li>
						
						&nbsp;
								The client (may or may not be the owner) shall be bound to pay the monthly CAM charges to the company as decided. In case of delay in payment, the company shall charge the client with late payment surcharge as penalty.

						</ul>
					</ul> 
					<ul>
						<li><b>RENTAL MANAGEMENT SERVICES (RMS)</b></li>

						&nbsp;
								The company shall offer rental management services to all valued applicants without any extra charges that include care taking of their units, collection of monthly rents from the clients and submission of allied charges (if any). The monthly rents so collected on behalf of the applicant will then be deposited into applicant’s bank account as given through bank draft etc. on monthly basis by the company. However, all the applicants with the prior approval of the company deal with the client, in this case company shall not be responsible for any applicant’s loss/ delay in monthly rent payment.

						</ul>
					</ul> 
					<ul>
						<li><b>COMPLETION OF PROJECT</b></li>
						
						&nbsp;
								The construction of the project shall be completed and hand over to the applicants as per schedule commitment (i.e. 30 months after the date of announcement) subject to the condition of force majeure, strikes, riots, war and other natural calamities which are beyond the control of the company. This also includes changes in fiscal policies of the government, non-availability of necessary materials/ labors etc. Further, the delays in payment of instalments by the applicants. In such condition, the company shall be at liberty to revise/interrupt the construction schedule, for which a No Objection Letter shall be given by all the buyers/applicants to the company for submission to the relevant bodies/ authorities.
						</ul>
					</ul>
					<ul>
						<li><b>PRICE OF UNIT (HOTEL ROOM/SHOP)</b></li>
						&nbsp;
								<p>The price of the unit shall be as per Annexure A1 of the terms and conditions inter-alia and signing of application forms/down payments made by the applicant. Furthermore, in case of full payment made by the applicant against shop/room, the company shall provide monthly discount as per Annexure A of the terms and conditions soon after the full payment made by the applicant</p>
								<p>The escalation in price shall be done only in the situation of unforeseen circumstances and unbearable changes in the national price structure of building materials, natural calamity, force-majeure, war, strikes and delay in payment from the applicant or any other reason beyond control of the company.</p>
						</ul>
					</ul>
					<ul>
						<li><b>USE OF UNIT (HOTEL ROOM/SHOP)</b></li>
						
						&nbsp;
						<ul>
							<li>
								Usage of Hotel Room: Such units shall be managed by the hotel management authorities under supervision of the company. The company shall run such units keeping in line the standard of five star hotel. The applicant who shall have made full payment can stay for maximum 30 days in his own unit without any room charges whenever he desires so, after prior intimation to the company authorities well before two weeks, however, the applicant shall not claim any discount/monthly rent for such days.
							</li>
							<li>
								Usage of Shop: Such units shall be managed by the applicant/ client under overall supervision of the company.

							</li>
							<li>
								That the applicant shall not made any additions involving structure of the building within the room/shop allotted. The structure includes columns, slabs and beams, nor shall change the elevation of the building and any part, thereof, under any circumstances. However, the applicant/ client shall be allowed for such minor fixation which doesn’t affect the structure of the unit after prior approval of the company. The restriction will continue even after the possession of the shop is taken by the applicant.


							</li>
							<li>
								That the applicant shall not object if company sublet the applicant’s unit to any of the brand.


							</li>
							<li>
								That the applicant/ client shall not be allowed for any kind of advertisement within the shopping mall premises, however, the applicant/ client shall only be allowed to use boards of specified size/ dimensions outside the shop as permitted by the company with prior written approval of the company.

							</li>
							
						</ul>
					</ul> 
					<ul>
						<li><b>IF THE PROJECT IS ABANDONED</b></li>

						&nbsp;
								If the project is abandoned due to any reason, the company shall refund the principle amount/ instalments received from the applicant within 90 days from the date of the announcement made to this effect. It is clearly understood that in such case the applicant shall not be entitled to any claim, interest or damages, except the original amount paid.

						</ul>
					</ul>
					<ul>
						<li><b>OTHER RESPONSIBILITIES</b></li>

						&nbsp;
						The applicant also agrees, in addition to above conditions, the following special conditions are also applicable for built-up units.

						<ul>
							<li>
								That the applicant/ client will permit the representatives of the company to enter into the unit for ascertaining the observance of all the covenants or for laying, testing, repairing, service main cables, drains service and other items etc. The applicant/ client shall take all precautions against tampering/fouling of all such other services.

							</li>
							<li>
								That the applicant shall not object, whatsoever, to the course of these lines.

							</li>
							<li>
								That the applicant shall not object to the structural, load-bearing columns, if these appear within the unit area.
							</li>
							<li>
								The company shall, from time to time, been titled to issue instructions and policy changes which the applicant/ client accepts and follows as part of this contract, application form, terms and conditions etc.

							</li>
							<li>
								No extra work shall be carried out by the company on the request of applicant under any circumstances uring the construction and finishing of the project.
							</li>
							<li>
								The applicant shall not misuse the amenities provided by the company nor they shall cover, encroach the open area on the ground floor, basement or anywhere in the project.

							</li>
							<li>
								All dimensions mentioned in the layout plans include walls, roof, parking, lobbies, atrium, all the infrastructure except the sold room/shop shall remain the ownership of the company.

							</li>
							<li>
								 That the use of exterior walls, front and common area shall be reserved by the company for other commercial use at the sole discretion of the company.
							</li>
							<li>
								That the applicant/ client shall keep the common way passages and staircase and streets etc. for the only purpose as being the common way passages staircase and streets etc. for all the applicants/ clients and shall not place any goods or create any obstruction in the same.

							</li>
							<li>
								
								The unit shall be used only for the purpose mentioned in application form, and the applicant/ client shall maintain the unit in good condition and shall not do anything contrary to law.

							</li>
							<li>
								The rights of the roof shall be retained by the company at all times and the applicant/ client shall have no share, claim or interest in and over the roof top and floors. Further, the company reserves the full rights of using top floor, roof or slide wall for erecting and fixing or constructing any additional floors.
							</li>
							<li>
							
								The applicant/ client, hereby, agrees to open the shop for business within 15 days after possession of the shop for running, if he desires to run the known brand in it. In case the applicant/ client fails to open the shop within the prescribed time, the company shall be entitled to imposed penalty on the applicant / client. However, the company shall facilitate the applicant for rent out as per the rates mentioned in Annexure A of the terms and conditions by the company and the applicant is bound to do so.

							</li>
							<li>
							All clients (may or may not be owner) shall liable to pay all allied bills before due date, if applicable. Breeding management system shall also be installed by the company to monitor transparent payment of such bills.
							</li>
							
						</ul>
					</ul> 
					<ul>
						
						<li>That; the company shall make internal and external minor charges in the designing and layout to the mall and hotel, if necessary.</li>
					</ul>
					<ul>
						<li>That; the company shall have first lien, claim and charge on the shop/ room, its fixtures and fitting and the contents, therein, regarding any amount liable to be paid by the applicant to the company.</li>
					</ul>
					
					<ul>
						<li>That; both company and the applicant have finalized the terms and conditions by themselves at their own free will and desire after full satisfaction and inspection of premises, including the title documents and legal authority of company to sell as status and credential of each other, and in further, for all purpose both the parties shall settle the matter by contacting each other on the given address and telephone numbers. However, in case of a dispute, it shall be dealt as per laws.
</li>
					</ul>
				</div>
           
        </div>
			
			
			<table>
				<tr style="border:none !important;">
					<td style="border:none !important;">
						<div style="front-family:Arial;font-size:12px;text-align:left;line-height:18px; padding:25px 0;">
							<b>Saller</b><br>
							Signature:___________________________<br>
							MONTVIRO (Pvt) Ltd.<br>
							Name:Mohsin Ali Khan<br>
							CNIC # 6110139839393<br>
							
						</div>
					</td>
					<td style="border:none !important;">
						<div style="front-family:Arial;font-size:12px;text-align:right;line-height:18px; padding:25px 0;">
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
						<div style="front-family:Arial;font-size:12px;text-align:left;line-height:18px; padding:25px 0;">
							<b>Witness 1:</b><br>
							Fintial consultants (Pvt) Ltd.<br>
							Name  : <br>
							CNIC NO . :<br>
							
						</div>
					</td>
					<td style="border:none !important;">
						<div style="front-family:Arial;font-size:12px;text-align:right;line-height:18px; padding:25px 0;">
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
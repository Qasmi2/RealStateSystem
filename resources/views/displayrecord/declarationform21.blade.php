<!doctype html>
<html>
<head>
    <style>
        @font-face {
            font-family: 'GothamBlack','GothamBook';
            src: url("../public/fonts/Gotham-Black.ttf");
            src: url("../public/fonts/Gotham-Book.ttf");
        }

        body {
            height: auto;
            width: 800px;
            position: relative;
            margin: 0 auto;
            color: #000;
            background: #FFFFFF;
            display: block;
            letter-spacing: 1px;
        }

        .complogo img {
            float: right;
            width: 117px;
            height: 40px;
            margin-top: 10px;
        }

        .comptable {
            display: table;
            /*width:600px;*/
            width: 800px;
            border: solid 2px #51BD9A;
            position: relative;
            color: white;
            margin-top: 10px;
            border-top: 0px;
        }

            .comptable img {
                /*width:600px;*/
                width: 800px;
                height: 20px;
            }

            .comptable h3 {
                position: absolute;
                top: 3px;
                left: 40px;
                font-size: 13px;
                font-family: GothamBlack;
                margin: 0px;
            }

        .h3prop {
            font-family: GothamBlack;
            font-size: 12px;
            margin: 10px 20px 15px 40px;
            color: black;
            letter-spacing: 0.5px;
        }

        .h3prop2 {
            font-family: 'Gotham Book';
            font-size: 14px;
            margin: 10px 20px 15px 40px;
            color: black;
            letter-spacing: 0.5px;
        }

        .rowprop {
            width: 100%;
            margin-right: 0px;
        }

        .spanprop {
            font-family: 'Gotham Book';
            font-size: 12px;
            margin: 10px 0px 5px 0px;
            color: black;
            letter-spacing: 0px;
        }

        .checkboxprop {
            align-items: baseline;
            font-family: 'Gotham Book';
            font-size: 14px;
            margin: 10px 20px;
        }

        /*input[type='checkbox']{
                border: 1px solid #FFFFFF;
                background: transparent;
        }*/
        .tempuncheck {
            background: transparent;
            background-position: center;
            border: solid 2px #000;
        }

        .tempcheck {
            background: black;
            background-position: center;
            border: solid 2px #000;
        }

        .block {
            background: transparent;
            background-position: center;
            border: solid 1px #000;
            padding: 0px 4px;
            margin-right: -4px;
        }

        .termblock {
            display: table;
            /*width:600px;*/
            width: 800px;
            position: relative;
            margin-top: 10px;
        }

        .footerprop {
            width: 800px;
            height: 26px;
            margin-top: 20px;
            bottom: 0px;
        }

        section {
            margin-bottom: 18px;
        }
        .tdprop{
            width:266px;
            height:25px;
            border:solid 1px #51BD9A;
            color:black;
            font-size:14px;
            font-family:'Gotham Book';
            padding-left:5px;
        }
        strong{
            font-family:GothamMedium;
            font-size:14px;
        }
    </style>
     <?php  
                           $payment = array($payment); 
                           $installment = array($installment); 
                           foreach($payment as $te){
                               $totalPrice = $te->propertyPrice;
                               $data = $te->propertyPurchingDate;
                               $paymentType = $te->paymentType;
                             
                           }
                           foreach($installment as $te){
                            $installmentDates = json_decode($te->installmentDates);
                            $sizeofDates = sizeof($installmentDates);
                            $iterate = 10 - $sizeofDates;
                            
                            $downPayment = $te->downpayment;
                            $temp = 0;
                           
                           }

                    ?>
</head>
<body>
    <div>
        <section class="comptable" style="margin-top:40px;">
            <img src="..\..\public\images\tabletop.jpg" />
            <h3>Joint Applicant</h3>
            <div class="h3prop">
                Joint Applicant:
                <label class="checkboxprop">
                    Yes <span class="tempuncheck">&nbsp; &nbsp;</span> 
                </label>
                <label class="checkboxprop">
                    No <span class="tempcheck">&nbsp; &nbsp;</span>
                </label>
            </div>
            <div class="h3prop2">
                <div style="font-size:13px; margin-bottom:10px;">
                    Particulars of Joint Applicant(If Applicable)
                </div>
                <table style="text-align:left;">
                    <tr>
                        <td style="width:380px;"><strong>Name of Applicant:</strong>&nbsp;<u>&nbsp;&nbsp;N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> </td>
                        <td><strong>S/O D/O W/O:</strong> <u>&nbsp;&nbsp;N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                    </tr>
                    <tr><td><br /></td></tr>
                    <tr>
                        <td colspan="2">
                            <strong>CNIC:</strong> &nbsp;
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">-</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">-</span>
                            <span class="block">&nbsp;</span>
                        </td>
                    </tr>
                </table>
                <br />
                <table style="text-align:left;">
                    <tr>
                        <td style="width:800px;"><strong>Mailing Address:</strong> <u>&nbsp;&nbsp;N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                    </tr>
                    <tr><td><br /></td></tr>
                    <tr>
                        <td><strong>Permenant Address:</strong> <u>&nbsp;&nbsp;N/A &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                    </tr>
                    <tr><td><br /></td></tr>
                    <tr>
                        <td><strong>Email:</strong> <u>&nbsp;&nbsp;N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                    </tr>
                </table>
                <br />
                <table style="text-align:left;">
                    <tr>
                        <td style="width:266px;"><strong>Phone No:</strong><u>&nbsp;N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                        <td style="width:266px;"><strong>Res:</strong><u>&nbsp;N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                        <td style="width:266px;"><strong>Mobile:</strong><u>&nbsp;N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                    </tr>
                </table>
                <br />
                <br />
                <table style="text-align:left;">
                    <tr>
                        <td style="width:800px;"><strong>Signature & Thumb Impression of Applicant:</strong><u>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                    </tr>
                </table>
            </div>
        </section>
      
        <div style="margin:30px 0px;">
           <b> Total Cost of Unit:</b><u> {{$totalPrice}}/-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><b> &nbsp;Amount Paid:</b><u> PKR {{$downPayment}}/- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>&nbsp;<b>Payment Throught:</b><u>{{$paymentType}}</u>
        </div>

        <section class="comptable">
            <img src="..\..\public\images\tabletop.jpg" />
            <h3 style="margin-bottom:0px; padding-bottom:0px;"><span style="padding:0px 70px;">Description</span><span style="padding:0px 70px;">Amount in PKR</span><span style="padding:0px 70px;">Date</span></h3>
            <table>
                <tr>
                    <td class="tdprop">Down Payment on Booking</td>
                    
                    <td class="tdprop">{{$downPayment}}</td>
                    
                    <td class="tdprop">{{$data}}</td>
                </tr>
            @foreach($installment as $te)
                @for($i=0; $i< $sizeofDates; $i++)
            
                    <tr>
                        <td class="tdprop">{{$i+1}}@if($i+1 == 1)st @elseif($i+1 == 2)nd @elseif($i+1 == 3)rd @else th @endif Installment</td>
                        <td class="tdprop">{{$te->amountOfOneInstallment}}</td>
                        <td class="tdprop">{{$installmentDates[$i]}}</td>
                    </tr>
                

                @endfor
            @endforeach
            @if($sizeofDates <= 10 )
                @for($i=0; $i < $iterate; $i++ )
                      <tr >
                           <td class="tdprop"></td>
                           <td class="tdprop"></td>
                           <td class="tdprop"></td>
                      <tr>
                @endfor
            @endif
          
            
               
            </table>
        </section>
       
        <section style="width:800px; font-family:'Gotham Book'; font-size:12px; margin-top:70px; text-align:left;">
            <table>
                <tr>
                    <td style="width:540px;" > Signature of Applicant: <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                    <td style="border-top:solid 1px #000; width:250px;"> Thumb Impression of Applicant</td>
                </tr>
            </table>
            <br />
            <br />
            <br />
            <br />
            <table>
                <tr>
                    <td style="width:540px;"> Signature of Applicant:<u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                    <td style="border-top:solid 1px #000; width:250px;"> Thumb Impression of Applicant</td>
                </tr>
            </table>
        </section>
    </div>
    <img src="../../public/images/footer.jpg" class="footerprop" />

   
   
</body>
</html>
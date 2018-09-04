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
                           foreach($payment as $te){
                               $totalPrice = $te->propertyPrice;
                               $data = $te->propertyPurchingDate;
                               $paymenttype = $te->paymentType;
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
                        <td style="width:380px;"><strong>Name of Applicant:</strong>&nbsp; </td>
                        <td><strong>S/O D/O W/O:</strong> &nbsp;N/A</td>
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
                        <td style="width:800px;"><strong>Mailing Address:</strong>&nbsp; N/A</td>
                    </tr>
                    <tr><td><br /></td></tr>
                    <tr>
                        <td><strong>Permenant Address:</strong> &nbsp;N/A</td>
                    </tr>
                    <tr><td><br /></td></tr>
                    <tr>
                        <td><strong>Email:</strong> &nbsp;N/A</td>
                    </tr>
                </table>
                <br />
                <table style="text-align:left;">
                    <tr>
                        <td style="width:266px;"><strong>Phone No:</strong>&nbsp;N/A</td>
                        <td style="width:266px;"><strong>Res:</strong>&nbsp;N/A</td>
                        <td style="width:266px;"><strong>Mobile:</strong>&nbsp;N/A</td>
                    </tr>
                </table>
                <br />
                <br />
                <table style="text-align:left;">
                    <tr>
                        <td style="width:800px;"><strong>Signature & Thumb Impression of Applicant:</strong>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                </table>
            </div>
        </section>
        
        <div style="margin:30px 0px;">
            <b>Total Cost of Unit</b>:<u>{{$totalPrice}}/-</u> &nbsp;&nbsp; <b>Amount Paid</b>: <u>PKR {{$totalPrice}}/-</u> &nbsp;&nbsp;<b>Payment Through</b>:<u>{{$paymenttype}}</u>
        </div>
       
        <section class="comptable">
            <img src="..\..\public\images\tabletop.jpg" />
            <h3 style="margin-bottom:0px; padding-bottom:0px;"><span style="padding:0px 70px;">Description</span><span style="padding:0px 70px;">Amount in PKR</span><span style="padding:0px 70px;">Date</span></h3>
            <table>
                <tr>
                    <td class="tdprop">Down Payment on Booking</td>
                    <td class="tdprop">{{$totalPrice}}</td>
                    <td class="tdprop">{{$data}}</td>
                </tr>
                <tr>
                    <td class="tdprop">1st Installment</td>
                    <td class="tdprop"></td>
                    <td class="tdprop"></td>
                </tr>
                <tr>
                    <td class="tdprop">2nd Installment</td>
                    <td class="tdprop"></td>
                    <td class="tdprop"></td>
                </tr>
                <tr>
                    <td class="tdprop">3rd Installment</td>
                    <td class="tdprop"></td>
                    <td class="tdprop"></td>
                </tr>
                <tr>
                    <td class="tdprop">4th Installment</td>
                    <td class="tdprop"></td>
                    <td class="tdprop"></td>
                </tr>
                <tr>
                    <td class="tdprop">5th Installment</td>
                    <td class="tdprop"></td>
                    <td class="tdprop"></td>
                </tr>
                <tr>
                    <td class="tdprop">6th Installment</td>
                    <td class="tdprop"></td>
                    <td class="tdprop"></td>
                </tr>
                <tr>
                    <td class="tdprop">7th Installment</td>
                    <td class="tdprop"></td>
                    <td class="tdprop"></td>
                </tr>
                <tr>
                    <td class="tdprop">8th Installment</td>
                    <td class="tdprop"></td>
                    <td class="tdprop"></td>
                </tr>
                <tr>
                    <td class="tdprop">9th Installment</td>
                    <td class="tdprop"></td>
                    <td class="tdprop"></td>
                </tr>
                <tr>
                    <td class="tdprop">10th Installment</td>
                    <td class="tdprop"></td>
                    <td class="tdprop"></td>
                </tr>
            </table>
        </section>
        <section style="width:800px; font-family:'Gotham Book'; font-size:12px; margin-top:70px; text-align:left;">
            <table>
                <tr>
                    <td style="width:540px;"> Signature of Applicant: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td style="border-top:solid 1px #000; width:250px;"> Thumb Impression of Applicant</td>
                </tr>
            </table>
            <br />
            <br />
            <br />
            <br />
            <table>
                <tr>
                    <td style="width:540px;"> Signature of Applicant: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td style="border-top:solid 1px #000; width:250px;"> Thumb Impression of Applicant</td>
                </tr>
            </table>
        </section>
        
    </div>
    <!--<img src="images/footer.jpg" class="footerprop" />-->

</body>
</html>
<!doctype html>
<html>
<head>
    <style>
            @font-face {
                font-family: 'Gotham Black','Gotham Book';
                src: url("../publicfonts/Gotham-Black.ttf");
                src: url("../publicfonts/Gotham-Book.ttf");
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

            .compmlogo img{
                float:right;
                width:180px;
                height:auto;
                margin-top:10px;
            }
            .compiglogo img{
                float:left;
                width:180px;
                height:auto;
                margin-top:10px;
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
                    font-family: 'Gotham Black';
                    margin: 0px;
                }

            .h3prop {
                font-family: 'Gotham Black';
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
                padding: 0px 2px;
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
                margin-top: 10px;
                bottom: 0px;
            }

            section {
                margin-bottom: 18px;
            }

            strong {
                font-family: 'Gotham Medium';
                font-size: 20px;
            }
    </style>
    <?php  
      
        $applicant = array($applicant);       
        $seller = array($seller); 
        $payment = array($payment);
        foreach($payment as $te){
          $bookingData = $te->propertyPurchingDate;
        }   
        foreach($seller as $te){
            $bookingPerson = $te->sallerName;
           
            
        }
        
    ?>
</head>
<body>
    <div>
        <div style="width:800px;">
            <div class="compiglogo">
                <img src="..\..\public\images\iglogo.png" />
            </div>
            <div class="compmlogo">
                <img src="../../public\images\mlogo.png" />
            </div>
        </div>
        @foreach($applicant as $te)
        <div style="width:800px; margin:10px auto; font-size:20px; line-height:40px; display:table;">
            <center><strong style="font-size:24px;">DECLARATION</strong></center>
            <div style="width:800px; margin:20px 20px 20px 20px;">
                <div style="margin-top:20px; margin-right:20px;">
                I/ We, Mr. /Mrs. /Ms. /M/s.   <u>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong> {{$te->name}}</strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</u>
                </div>
                <div style="margin-top:5px; margin-right:20px;">                    
                S/o / D/o   <u> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>{{$te->fatherName}}</strong>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </u> 
                <br />bearing CNIC No. <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>{{$te->cnicNo}}</strong>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</u>
                </div>

                <div style="margin-top:5px; margin-right:20px;">
                    Resident of / situated at <u>&nbsp;&nbsp;<strong> {{$te->mailingAddress}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
                    <br><br>
                    do hereby, confirm that I have fully read/understood the above terms and conditions and do hereby agree to abide the same. I further declare that I shall abide by the existing rules, regulations terms and conditions, requirement etc. laid down by the company and, furthermore, any condition of common interest should be promulgated by the company must be accomplished.
                </div> 
                <br/>
                <div style="margin-top:10px; margin-right:20px;">
                    Name of Booking Person <u>&nbsp;&nbsp; &nbsp; &nbsp;<strong>{{$bookingPerson}} </strong>&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><br>
                    Read, understood and accepted above terms and conditions of application form

                </div>                

                <div style="margin-top:50px; margin-right:160px;">
                    <strong>Authorized Signature: </strong> &nbsp; <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
                </div>
                <div style="margin-top:5px; margin-right:160px;">
                    <strong>Booking Date: </strong> &nbsp; {{$bookingData}}
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div style="margin-top:50px;margin-left:170px;   border-top:solid 1px #000; width:400px; text-align:center;">
                    Siganture of Applicant
                </div>
            </div>
        </div>
    </div>
    @endforeach
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <!-- <img src="..\..\public\images\footer.jpg" class="footerprop" style="margin-top:130px;"/> -->
</body>
</html>
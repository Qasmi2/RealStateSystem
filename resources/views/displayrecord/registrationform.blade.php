<!doctype html>
<html>
<head>
    <style>
        @font-face{
            font-family:'GothamBlack','GothamBook';
            src:url("../public/fonts/Gotham-Black.ttf");
            src:url("../public/fonts/Gotham-Book.ttf");
        }
        body{
            height:auto;
            width:800px;
            position: relative;
            margin: 0 auto;
            color: #000;
            background: #FFFFFF;
            display:block;
            letter-spacing:1px;

        }
        .compname{
            float:left;
        }        
        .compname h1{
            font-family:GothamBlack;
            font-size:20px;
            font-weight:bold;
            margin-bottom:0px;
        }
        .compname span{
            font-family:'Gotham Book';
            font-size:20px;
        }
        .compname h5{
            margin:0px;
            padding:0px;
            font-size:10px;
            font-family:'Gotham Book';
        }
        .compname h3{
            margin-top:5px;
            font-size:13px;
            font-family:'Gotham Book';
        }

        .compname h3 span{
            padding-left:200px;
            font-size:13px;
        }
        .complogo img{
            float:right;
            width:180px;
            height:auto;
            margin-top:10px;
        }
        .comptable{
            display:table;
            /*width:600px;*/
            width:800px;

            border:solid 2px #51BD9A;      
            position: relative;
            color:white;
            margin-top:10px;
            border-top:0px; 
        }
        .comptable img{
            /*width:600px;*/
            width:800px;
            height:20px;
        }
        .comptable h3{
            position: absolute;
            top:3px;
            left:40px;
            font-size:13px;
            font-family:GothamBlack;
            margin:0px;
        }

        .h3prop{
            font-family:GothamBlack;
            font-size:12px;
            margin:10px 20px 15px 40px;
            color:black;
            letter-spacing:0.5px;
        }
        .h3prop2{
            font-family:'Gotham Book';
            font-size:14px;
            margin:10px 20px 15px 40px;
            color:black;
            letter-spacing:0.5px;
        }
        .rowprop{
            width:100%;
            margin-right:0px;
        }
        .spanprop{
            font-family:'Gotham Book';
            font-size:12px;
            margin:10px 0px 5px 0px;
            color:black;
            letter-spacing:0px;
        }

        .checkboxprop{
            align-items:baseline;
            font-family:'Gotham Book';
            font-size:14px;
            margin:10px 20px;
        }

        /*input[type='checkbox']{
                border: 1px solid #FFFFFF;
                background: transparent; 
        }*/
        .tempuncheck{
            background:transparent ;
            background-position: center;
            border:solid 2px #000;
        }
        .tempcheck{
            background-color:black ;
            background-position: center;
            border:solid 2px #000;
        }
        .block{
            background:transparent ;
            background-position: center;
            border:solid 1px #000;
            padding:0px 4px;
            margin-right:-4px;
        }

        .termblock{
            display:table;
            /*width:600px;*/
            width:800px;

            position: relative;
            margin-top:10px;
        }
        .footerprop{
            width:800px;
            height:26px;
            margin-top:10px;
            bottom:0px;

        }
        section{
            margin-bottom:18px;
        }
        strong{
            font-family:GothamMedium;
            font-size:14px;
        }
    </style>
</head>
    <?php  
                            
        $property = array($property);
        $payment = array($payment);
        $applicant = array($applicant);          
        $paymentHistory = array($paymentHistory);
       
        foreach($applicant as $te){
            //applicant CNIC NO 
            $charsArrayCnica = str_split($te->cnicNo);
            $sizeofCNiCa = sizeof($charsArrayCnica);
            // applicant passport 
            $isEmptyPassporta = $te->passportNo;
            $hasPassporta = json_encode($isEmptyPassporta);
           
            $charsArrayPassporta = str_split($te->passportNo);
            $sizeofPassporta = sizeof($charsArrayPassporta);
            //Nominee Applicnat CNIC NO
            $charsArraynCnicn = Str_split($te->nomineeCnicNo);
            $sizeofCNICn = sizeof($charsArraynCnicn);
            // Nominee passport 
            $isEmptyPassportn = $te->nomineePassportNo;

            $hasPassportn = json_encode($isEmptyPassportn);
            $charsArrayPassportn = str_split($te->nomineePassportNo);
            $sizeofPassportn = sizeof($charsArrayPassportn);
        }           
        foreach($paymentHistory as $te){
            $paidAmount = $te->paidAmount;
        }
       
    ?>
<body>
    <div id="content">
        <div style="width:800px;">
        @foreach($property as $te)
            <div class="compname">
                <h1>MONTVIRO <span>(Pvt) Ltd</span></h1>
                <h5>Booking Application Form (Non-Refundable)</h5>
                <h3>CUSTOMER COPY  <span> APP NO: <u>&nbsp;&nbsp;&nbsp;{{$te->id}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></span></h3>
            </div>
            <div class="complogo">
                <img src="..\..\public\images\mlogo.png" />
            </div>
        </div>
      
        <section class="comptable">
            <img src="..\..\public\images\tabletop.jpg" />
            <h3>REGISTRATION DETAIL</h3>
            <div class="h3prop">
                REGISTRATION NUMBER
                <span class="spanprop">(as per submitted registration form):&nbsp; </span>
                <u>&nbsp;&nbsp;&nbsp;&nbsp;{{$te->id}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
            </div>
            <div class="h3prop">
                REGISTRATION PROJECT: &nbsp; &nbsp; &nbsp; 
              
                <label class="checkboxprop">
                    <span id="check1" class="tempuncheck">&nbsp; &nbsp;</span> Montviro Hotel
                </label>
                <label class="checkboxprop">
                    <span id="check2" class="tempuncheck">&nbsp; &nbsp;</span> Montviro Mall
                </label>
                <label class="checkboxprop">
                    <span id="check3" class="tempuncheck">&nbsp; &nbsp;</span> Montviro Theme Park
                </label>
            </div>
            <?php if($te->propertyType == "Montviro Hotal"){?>
                    <script>
                    
                        document.getElementById('check1').className='tempcheck';
                        
                    </script>
                <?php    
                }if($te->propertyType == "Montviro Mall"){?>
                    <script>
                    
                    document.getElementById('check2').className='tempcheck';
                    </script>
                <?php 
                }if($te->propertyType == "Montviro Theme Park"){?>
                    <script>
                    
                    document.getElementById('check3').className='tempcheck';
                    </script>
                <?php 
                }?>
                 
            <div class="h3prop">
                REGISTRATION STATUS: &nbsp; &nbsp; &nbsp;
                <label class="checkboxprop">
                    <span id="check4" class="tempuncheck">&nbsp; &nbsp;</span>Orignial First Alottee 
                </label>
                <label class="checkboxprop">
                    <span id="check5" class="tempuncheck">&nbsp; &nbsp;</span>Orignial Transfer Certificate
                </label>
                <br />
                <br />
                <label class="checkboxprop" style="margin-left:247px;">
                    <span id="check6" class="tempuncheck">&nbsp; &nbsp;</span>Orignial Open Certificate
                </label>
            </div>
            <?php if($te->registrationStatus == "First Alottee"){?>
                    <script>
                    
                        document.getElementById('check4').className='tempcheck';
                        
                    </script>
                <?php    
                }if($te->registrationStatus == "Transfer Certificate"){?>
                    <script>
                    
                    document.getElementById('check5').className='tempcheck';
                    </script>
                <?php 
                }if($te->registrationStatus == "Open Certificate"){?>
                    <script>
                    
                    document.getElementById('check6').className='tempcheck';
                    </script>
                <?php 
                }
                 ?>
        </section>
        
        <section class="comptable">
            <img src="..\..\public\images\tabletop.jpg" />
            <h3>PROPERTY SECTION</h3>
            <div class="h3prop">
               <b> {{$te->propertySection}}</b>
                <label class="checkboxprop">
                 
                    <span id="check7" class="tempuncheck">&nbsp; &nbsp;</span>
                    Office
                </label>
                <label class="checkboxprop">
                    
                    <span id="check8" class="tempuncheck">&nbsp; &nbsp;</span>
                    Shop
                </label>
                <label class="checkboxprop">
                    <span id="check9" class="tempuncheck">&nbsp; &nbsp;</span> Suite
                </label>
                <label class="checkboxprop">
                    <span id="check10" class="tempuncheck">&nbsp; &nbsp;</span> Food Court
                </label>
                <label class="checkboxprop">
                    <span id="check11" class="tempuncheck">&nbsp; &nbsp;</span> Kiosk
                </label>
                <label class="checkboxprop">
                    <span id="check12" class="tempuncheck">&nbsp; &nbsp;</span> Theme Park
                </label>
            </div>
        </section>
        <?php if($te->propertySection == "Office"){?>
                    <script>
                    
                        document.getElementById('check7').className='tempcheck';
                        
                    </script>
                <?php    
                }if($te->propertySection == "Shop"){?>
                    <script>
                    
                    document.getElementById('check8').className='tempcheck';
                    </script>
                <?php 
                }if($te->propertySection == "Suite"){?>
                    <script>
                    
                    document.getElementById('check9').className='tempcheck';
                    </script>
                <?php 
                }if($te->propertySection == "Food Court"){?>
                    <script>
                    
                    document.getElementById('check10').className='tempcheck';
                    </script>
                <?php 
                }if($te->propertySection == "Kiosk"){?>
                    <script>
                    
                    document.getElementById('check11').className='tempcheck';
                    </script>
                <?php 
                }if($te->propertySection == "Theme Park"){?>
                    <script>
                    
                    document.getElementById('check12').className='tempcheck';
                    </script>
                <?php 
                }
                 ?>
        @endforeach
        @foreach($applicant as $te)
        <section class="comptable">
            <img src="..\..\public\images\tabletop.jpg" />
            <h3>PERSONAL INFORMATION</h3>
            <div class="h3prop2">
                <table style="text-align:left;">
                    <tr>
                        <td style="width:380px;"><strong>Name of Applicant:</strong>&nbsp;<u> {{$te->name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> </td>
                        <td><strong>S/O:</strong> &nbsp; <u>{{$te->fatherName}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                    </tr>
                    <tr><td><br /></td></tr>
                    <tr>
                        <td>
                            <strong>CNIC:</strong> &nbsp;
                            
                            @for($i=0; $i< $sizeofCNiCa; $i++)
                            <span class="block">{{$charsArrayCnica[$i]}}</span>
                            @endfor
                        </td>
                        <td>
                            <strong>Passport No:</strong>&nbsp;
                         
                            @if($hasPassporta != "null")
                                @for($i=0; $i< $sizeofPassporta; $i++)
                             
                                <span class="block">{{$charsArrayPassporta[$i]}}</span>
                             
                                @endfor
                            @else
                            N/A
                            @endif
                               
                            <!-- <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span> -->
                        </td>
                    </tr>
                    <!--<tr>
                    <td><strong>Name of Applicant :</strong> <u>Dummy Dummy Dummy</u></td>
                    <td><strong>S/O D/O W/O :</strong> <u>Dummy Dummy Dummy</u></td>
                </tr>
                <tr>
                    <td><strong>CNIC :</strong> <u>12345-6789011-1</u></td>
                    <td><strong>Passport No :</strong> <u>12345678</u></td>
                </tr>-->
                </table>
                <br />
                <table style="text-align:left;">
                    <tr>
                        <td style="width:500px;"><strong>Mailing Address:</strong>&nbsp; <u>{{$te->mailingAddress}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                        <td style="height:100px !important ; width:100px !important;" rowspan="3"><img src="{{$te->cover_image}}" height="100" width="100 " style="height:100px !important; width:100px !important; padding-left:30px;"></td>
                    </tr>
                    <tr>
                        <td><strong>Permenant Address:</strong> &nbsp;  <u>{{$te->permanentAddress}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                    </tr>
                    <tr>
                        <td><strong style="display:inline-block;">Email:</strong> &nbsp;  <u style="display:inline-block;">{{$te->email}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                    </tr>
                </table>
                <br />
                <table style="text-align:left;">
                    <tr>
                        <td style="width:266px;"><strong>Phone No Res:</strong>&nbsp;<u> {{$te->phoneNO}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                        <td style="width:266px;"><strong>Mobile 1: </strong>&nbsp; <u>{{$te->mobileNo1}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </u></td>
                        <td style="width:204px;"><strong>Mobile 2:</strong>&nbsp;  <u>{{$te->mobileNo2}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                    </tr>
                </table>
            </div>
        </section>

        <section class="comptable">
            <img src="..\..\public\images\tabletop.jpg" />
            <h3>NOMINEE INFORMATION</h3>
            <div class="h3prop2">
                <table style="text-align:left;">
                    <tr>
                        <td style="width:380px;"><strong>Nominee Name:</strong>&nbsp;<u> {{$te->nomineeName}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                        <td><strong> S/O:</strong> &nbsp; <u>{{$te->nomineeFatherName}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> </td>
                    </tr>
                    <tr><td colspan="2"><br /></td></tr>
                    <tr>
                        <td>
                            <strong>CNIC:</strong> &nbsp;
                            @for($i=0; $i < $sizeofCNICn; $i++)
                            <span class="block">{{$charsArraynCnicn[$i]}}</span>
                          
                            @endfor
                            <br />
                        </td>
                        <!-- 61101-0588104-7 -->
                        <td>
                            <strong>Passport No:</strong>
                        @if($hasPassportn != "null")
                            @for($i=0; $i< $sizeofPassportn; $i++)
                            <span class="block">{{$charsArrayPassportn[$i]}}</span>
                            @endfor
                        @else
                        N/A
                        @endif
                            <!-- <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span>
                            <span class="block">&nbsp;</span> -->
                        </td>
                    </tr>
                </table>
                <br />
                <table style="text-align:left;">
                    <tr>
                        <td><strong>Relationship with Applicant:</strong> &nbsp; <u>{{$te->relationWithApplicant}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                    </tr>
                    <tr><td><br /></td></tr>
                    <tr>
                        <td ><strong>Mailing Address:</strong>&nbsp; <u>{{$te->nomineeMailingAddress}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                    </tr>
                </table>
            </div>
        </section>
        @endforeach
        @foreach($payment as $te)
        <section class="comptable">
            <img src="..\..\public\images\tabletop.jpg" />
            <h3>PAYMENT INFORMATION</h3>
            <div class="h3prop2">
                <table style="text-align:left;">
                    <tr>
                        <td style="width:360px;"><strong>Cash/Pay Order /Cheque/Adjustment:</strong>&nbsp; <u>{{$te->paymentType}}&nbsp;&nbsp;</u></td>
                        <td style="width:150px;"><strong>Date:</strong>&nbsp;  <u>{{$te->propertyPurchingDate}}&nbsp;&nbsp;</u></td>
                        <td><strong>In Favor of:</strong>&nbsp; <u>Montviro Pvt Limited</u></td>
                    </tr>
                </table>
                <br />
                <table style="text-align:left;">
                    <tr>
                        <td style="width:360px;"><strong>Bank:</strong>&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$te->bankName}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                        <td>
                            <strong>Total Amount(PKR):</strong>&nbsp;
                           <u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $paidAmount }}/-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
                        </td>
                    </tr>
                </table>
            </div>
        </section>
        @endforeach
        <section class="termblock">
            <div style="font-family:GothamBlack; font-size:14px;">Document to be attached with the form:</div>
            <div style="font-family:'Gotham Book'; font-size:10px; margin-top:5px;">
                1- Two Recent Passport Size Photographs.  2- Copy of Applicant CNIC.  3- Copy of Nominee CNIC.
            </div>
            <div style="font-family:'Gotham Book'; font-size:10px; margin-top:5px;">
                4- Original Registration Form(Customer Copy) / Original Registration Transfer Certificate / Original Registration Open Certificate.
            </div>
        </section>
        <section style="width:800px; font-family:'Gotham Book'; font-size:12px; margin-top:50px; text-align:center;">
            <table>
                <tr>
                    <td style="width:20px;"></td>
                    <td style="border-top:solid 1px #000; width:230px;"> BOOKING OFFICER & DATE</td>
                    <td style="width:20px;"></td>
                    <td style="border-top:solid 1px #000; width:230px;"> MANAGER</td>
                    <td style="width:20px;"></td>
                    <td style="border-top:solid 1px #000; width:230px;"> APPLICANT's SIGNATURE</td>
                </tr>
            </table>
        </section>
    </div>
    <img src="..\..\public\images\footer.jpg" class="footerprop" />
   


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script> -->
    <!-- <script>

    let doc = new jsPDF('p','pt','letter');
    doc.addHTML(document.body,function() {
    doc.save('form1.pdf');
    });

</script> -->
<!-- <script>
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};
var source = window.document.getElementsByTagName("body")[0];
$('#cmd').click(function () {
    doc.fromHTML(source, 15, 15, {
        'width': 200,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});
</script> -->
</body>
</html>
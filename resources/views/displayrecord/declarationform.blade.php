<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Declartion From') }}</title>

    
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
  
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    /* body {
        margin-top:50px;
        height: 842px;
        width: 595px;
   
        margin-left: auto;
        margin-right: auto;
        background-color:white;
        font-family:Arial, Helvetica, sans-serif;

    } */

      <style>
        @font-face {
            font-family: 'Gotham Black','Gotham Book';
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
            font-family: 'Gotham Medium';
            font-size:14px;
        }
    </style>
    </style>
</head>
<body style="backgrond-color:white;">
<div id="content">
<img src="..\public\images\logo.jpg" height="50" width="150">
<h2 class="text-center"><b>DECLARATION</b></h2>
<div>
    <p class="text-justify" style="line-height: 2.5;" style="font-size:18px !important;">
        I/ We, Mr. /Mrs. /Ms. /M/s._____________________________________________________
        S/O , D/O _____________________________________________________________
        bearing CNIN NO. ________________________________________________________
        Resident of/ situated at ______________________________________________________
        __________________________________________________________________________
    </p>
    &nbsp;&nbsp; 
    <p class="text-juistify" style="line-height: 2.5;">
        do hereby, confirm that I/ We have fully read/understood the above terms and conditions and do hereby 
        agree to abide the same. I/ We further declare that I/ We shall abide by the existing rules, regulations
        terms and conditions, requirement etc. laid down by the company and, furthermore, any condition of 
        common interest should be promulgated by the company must be accomplished
    </p>
    &nbsp;&nbsp; &nbsp;&nbsp; 
    <p class="text-juistify" style="line-height: 2.5;">
        Name of Booking Person ______________________________________________________________________
        Read, understood and accepted above terms and conditions of application form.
    </p>
    &nbsp;&nbsp;
    <p class="text-juistify" style="line-height: 2.5;">
        Authorized Signature       _______________________________<br>
        Booking Date     ______________________________________

    </p>
    &nbsp;
    <p class="text-center">
         ________________________<br>
    Applicant Signature
    </p>
</div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"
            <small>www.montviro.com</small><br>
            <small><strong>Montviro (Pvt) Ltd.</strong></small>
            <br>
            <small>CORPORATE OFFICE</small><br>
            <address><small>1804, 18<sup>th</sup>Floor, Tower B, F-8/4<br>
            The Centaurus, Islamabad<br>
            T +92 518306637 | +92 518316670
            </small></address>
            <small><strong>SALES $ MARKETING OFFICE <strong></small>
            <address><small>19-20, Safari Villas-2 Commercial Complex,<br>
            Phase 7, Bahria Town,Rawalpindi<br>
            T +92 518470750 | E info@montviro.com
            </small></address>

        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" >
            <div class="row" style="flex-wrap:nowrap !important; margin-bottom:10px;margin-left:70px;">
                <img src="..\public\images\irtifa.png" height="50"width="50">
                <img src="..\public\images\wizkon.png" height="50"width="50">
                <img src="..\public\images\liminarch.png" height="50"width="50">
                <img src="..\public\images\fintial.png" height="50"width="50">
                <img src="..\public\images\struxive.png" height="50"width="50">
           </div>
        </div>
    
</div>
</div>
</body>
<script>
//     let doc = new jsPDF('p','pt','a4');
// doc.addHTML(document.body,function() {
//     doc.save('declaration.pdf');
});
</script>
</html>

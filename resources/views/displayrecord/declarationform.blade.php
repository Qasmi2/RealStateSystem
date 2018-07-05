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
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    body {
        margin-top:50px;
        height: 842px;
        width: 595px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
        background-color:white;
        font-family:Arial, Helvetica, sans-serif;
        /* font-size:12px; */
    }
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

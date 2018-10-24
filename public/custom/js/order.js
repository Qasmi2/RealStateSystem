var manageOrderTable;

$(document).ready(function() {
  var divRequest = $(".div-request").text();
  $("#navOrder").addClass("active");

  if (divRequest == "add") {
    // add order

    // order date picker
    //$("#orderDate").datepicker();

    // create order form function
    $("#createOrderForm")
      .unbind("submit")
      .bind("submit", function() {
        var form = $(this);

        $(".form-group")
          .removeClass("has-error")
          .removeClass("has-success");
        $(".text-danger").remove();
        var appname = $("#appname").val();
        var appfname = $("#appfname").val();
        var appcnic = $("#appcnic").val();
        var apppsno = $("#apppsno").val();
        var appmaddr = $("#appmaddr").val();
        var apppaddr = $("#apppaddr").val();
        var appemail = $("#appemail").val();
        var appphoneno1 = $("#appphoneno1").val();
        var appphoneno2 = $("#appphoneno2").val();
        var appphoneno3 = $("#appphoneno3").val();
        var nomname = $("#nomname").val();
        var nomcnic = $("#nomcnic").val();
        var nompasno = $("#nompasno").val();
        var nommadd = $("#nommadd").val();
        var nomemail = $("#nomemail").val();
        var nomcellno1 = $("#nomcellno1").val();
        var nomcellno2 = $("#nomcellno2").val();
        var nomcellno3 = $("#nomcellno3").val();
        var proptype = $("#proptype").val();
        var registstatus = $("#registstatus").val();
        var propsection = $("#propsection").val();
        var propertyLoc = $("#propertyLoc").val();
        var propertySize = $("#propertySize").val();
        var paymentmethod = $("#paymentmethod").val();
        var paymenttype = $("#paymenttype").val();
        var totalamount = $("#totalamount").val();
        var downpayment = $("#downpayment").val();
        var initialdeposite = $("#initialdeposite").val();
        var remainamount = $("#remainamount").val();
        var bookingdate = $("#bookingdate").val();
        var bankname = $("#bankname").val();
        var chequeno = $("#chequeno").val();
        var installmetamount = $("#installmetamount").val();

        if (appname) {
          $.ajax({
            url: "createOrder.php",
            type: "post",
            data: form.serialize(),
            dataType: "json",
            success: function(response) {
              console.log(response);
              // reset button
              $("#createOrderBtn").button("reset");

              $(".text-danger").remove();
              $(".form-group")
                .removeClass("has-error")
                .removeClass("has-success");

              if (response.success == true) {
                // create order button
                $(".success-messages").html(
                  '<div class="alert alert-success">' +
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
                    response.messages +
                    "Your token no is --> " +
                    response.property_purchasertoken +
                    ' <br /> <br /> <a type="button" onclick="printOrder(' +
                    response.buyer_id +
                    ')" class="btn btn-primary"> <i class="glyphicon glyphicon-print"></i> Print </a>' +
                    '<a href="orders.php?o=add" class="btn btn-default" style="margin-left:10px;"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Order </a>' +
                    "</div>"
                );

                $("html, body, div.panel, div.pane-body").animate(
                  { scrollTop: "0px" },
                  100
                );

                // disabled te modal footer button
                $(".submitButtonFooter").addClass("div-hide");
                // remove the product row
                $(".removeProductRowBtn").addClass("div-hide");
              } else {
                alert(response.messages);
              }
            }
          });
        }
        return false;
      });
  }
});

function proppaymentmethodfunc(functype = null) {
  var formlength = $("#addchinfo .col-md-5").length;

  var fields =
    '<div class="col-md-5">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">payment</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control" id="chequeno" name="chequeno" placeholder="Cheque No" required>' +
    "</div>" +
    " </div>" +
    "</div>" +
    '<div class="col-md-5">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">account_balance</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control" id="bankname" name="bankname" placeholder="Bank Name" required>' +
    "</div>" +
    "</div>" +
    "</div>";

  if (functype == 1) {
    if (formlength > 0) {
      for (var j = formlength; j > 0; j--) {
        $("#addchinfo .col-md-5:last(" + j + ")").remove();
      }
    }
  }

  if (functype == 2) {
    if (formlength < 1) {
      $("#addchinfo").append(fields);
    }
  }
  if (functype == 3) {
    if (formlength > 0) {
      for (var j = formlength; j > 1; j--) {
        $("#addchinfo .col-md-5:last(" + j + ")").remove();
      }
    }
  }
  return 0;
}

function proppaymentTypefunc(functypes = null) {
  var formslength = $("#addamtinfo .col-md-5").length;
  var field =
    '<div class="col-md-5">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">monetization_on</i>' +
    "</span>" +
    '<div class="form-line">' +
    '<input type="text" class="form-control numeric" placeholder="Installmet Amount" id="installmetamount" name="installmetamount"  required>' +
    "</div>" +
    "</div>" +
    "</div> ";
  if (functypes == 1) {
    if (formslength > 1) {
      $("#addamtinfo .col-md-5:last").remove();
    }
  }

  if (functypes == 2) {
    if (formslength < 2) {
      $("#addamtinfo").append(field);
    }
  }

  return 0;
}

function proppayinfo() {
  var appinfoinfo =
    '<div class="container-fluid" id="appinfo">' +
    '<div class="row clearfix">' +
    ' <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">' +
    '<div class="card">' +
    '<div class="header">' +
    "<h2> APPLICANT INFO</h2>" +
    "</div>" +
    '<div class="body">' +
    '<div class="demo-masked-input">' +
    '<div class="row">' +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">credit_cardq</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control" id="appname" name="appname" placeholder="Applicant Name" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">credit_card</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control" id="appfname" name="appfname" placeholder="Applicant Father Name" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="row">' +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">credit_card</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control cnicno" id="appcnic" name="appcnic" placeholder="Applicant Cnic No" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">credit_card</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control" id="apppsno" name="apppsno" placeholder="Applicant Passport No" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="row"' +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">credit_card</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control" id="appmaddr" name="appmaddr" placeholder="Enter Mailing Address" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">credit_card</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control" id="apppaddr" name="apppaddr" placeholder="Enter Permanent Address" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="row">' +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">email</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control email" id="appemail" name="appemail" placeholder="Ex: example@example.com" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">phonelink_ring</i>' +
    " </span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control mobile-number" id="appphoneno1" name="appphoneno1" placeholder="Ex: +00 (000) 0000000" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="row">' +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">phonelink_ring</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control phone-number" id="appphoneno2" name="appphoneno2" placeholder="Ex: +00 000 0000000" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">stay_current_portrait</i>' +
    "</span>" +
    '<div class="form-line ">' +
    ' <input type="text" class="form-control " id="appphoneno3" name="appphoneno3" placeholder="Ex: +00 (000) 0000000" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    "<center>" +
    '<div class="form-group submitButtonFooter"> ' +
    '<button  id="appinfo" data-loading-text="Loading..."  class="btn btn-success waves-effect" style="margin-right:20px;" onclick="nominfo()">' +
    '<i class="material-icons">verified_user</i> Next Section ' +
    "</button>" +
    "</div>" +
    "</center>" +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>";

  $("#proppayinfo").append(appinfoinfo);

  return 0;
}

function jointappinfo() {
  var jointappinfo =
    '<div class="container-fluid" id="appinfo">' +
    '<div class="row clearfix">' +
    ' <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">' +
    '<div class="card">' +
    '<div class="header">' +
    "<h2>JOINT  APPLICANT INFO</h2>" +
    "</div>" +
    '<div class="body">' +
    '<div class="demo-masked-input">' +
    '<div class="row">' +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">credit_cardq</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control" id="jappname" name="jappname" placeholder=" Joint Applicant Name" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">credit_card</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control" id="jappfname" name="jappfname" placeholder="Joint Applicant Father Name" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="row">' +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">credit_card</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control cnicno" id="jappcnic" name="jappcnic" placeholder="Joint Applicant Cnic No" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">credit_card</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control" id="japppsno" name="japppsno" placeholder="Joint Applicant Passport No" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="row"' +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">credit_card</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control" id="jappmaddr" name="jappmaddr" placeholder="Enter Mailing Address" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">credit_card</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control" id="japppaddr" name="japppaddr" placeholder="Enter Permanent Address" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="row">' +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">email</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control email" id="jappemail" name="jappemail" placeholder="Ex: example@example.com" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">phonelink_ring</i>' +
    " </span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control mobile-number" id="jappphoneno1" name="jappphoneno1" placeholder="Ex: +00 (000) 0000000" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="row">' +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">phonelink_ring</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control phone-number" id="jappphoneno2" name="jappphoneno2" placeholder="Ex: +00 000 0000000" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">stay_current_portrait</i>' +
    "</span>" +
    '<div class="form-line ">' +
    ' <input type="text" class="form-control " id="jappphoneno3" name="jappphoneno3" placeholder="Ex: +00 (000) 0000000" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    "<center>" +
    '<div class="form-group submitButtonFooter"> ' +
    '<button  id="appinfo" data-loading-text="Loading..."  class="btn btn-success waves-effect" style="margin-right:20px;" >' +
    '<i class="material-icons">verified_user</i> Next Section ' +
    "</button>" +
    "</div>" +
    "</center>" +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>";

  $("#nominfo").append(jointappinfo);

  return 0;
}

function nominfo() {
  var nominfo =
    '<div class="container-fluid" id="nominfo">' +
    '<div class="row clearfix">' +
    '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">' +
    '<div class="card">' +
    '<div class="header">' +
    "<h2> NOMINEE INFO </h2>" +
    "</div>" +
    '<div class="body">' +
    '<div class="demo-masked-input">' +
    '<div class="row">' +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">person</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control" id="nomname" name="nomname" placeholder="Nominee Name" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">credit_card</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control" id="nomfname" name="nomfname" placeholder="Nominee Father Name" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="row">' +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">credit_card</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control" id="nomcnic" name="nomcnic" placeholder="Nominee CNIC no" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">credit_card</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control cnicno" id="nompasno" name="nompasno" placeholder="Nominee Passport No" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    ' <div class="row">' +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">credit_card</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control" id="relwithapp" name="relwithapp" placeholder="Relationship with Applicant" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    ' <i class="material-icons">credit_card</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control" id="nommadd" name="nommadd" placeholder="Nominee Mailing Address" required>' +
    "</div>" +
    " </div>" +
    "</div>" +
    "</div>" +
    '<div class="row">' +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">email</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control email" id="nomemail" name="nomemail" placeholder="Ex: example@example.com" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">phonelink_ring</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control mobile-number" id="nomcellno1" name="nomcellno1" placeholder="Ex: +00 (000) 0000000" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="row">' +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">phonelink_ring</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control phone-number" id="nomcellno2" name="nomcellno2" placeholder="Ex: +00 000 0000000" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    '<div class="col-md-6">' +
    '<div class="input-group">' +
    '<span class="input-group-addon">' +
    '<i class="material-icons">stay_current_portrait</i>' +
    "</span>" +
    '<div class="form-line ">' +
    '<input type="text" class="form-control " id="nomcellno3" name="nomcellno3" placeholder="Ex: +00 (000) 0000000" required>' +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>" +
    "<center>" +
    '<div class="form-group submitButtonFooter"> ' +
    '<button  id="nominfo" data-loading-text="Loading..."  class="btn btn-success waves-effect" style="margin-right:20px;" onclick="jointappinfo()">' +
    '<i class="material-icons">verified_user</i> Next Section ' +
    "</button>" +
    "</div>" +
    "</center>" +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>";

  $("#appinfo").append(nominfo);

  return 0;
}

// remove order from server

function removeOrder(orderId = null) {
  if (orderId) {
    $("#removeOrderBtn")
      .unbind("click")
      .bind("click", function() {
        $("#removeOrderBtn").button("loading");

        $.ajax({
          url: "php_action/removeOrder.php",
          type: "post",
          data: { orderId: orderId },
          dataType: "json",
          success: function(response) {
            $("#removeOrderBtn").button("reset");

            if (response.success == true) {
              manageOrderTable.ajax.reload(null, false);
              // hide modal
              $("#removeOrderModal").modal("hide");
              // success messages
              $("#success-messages").html(
                '<div class="alert alert-success">' +
                  '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                  '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
                  response.messages +
                  "</div>"
              );

              // remove the mesages
              $(".alert-success")
                .delay(500)
                .show(10, function() {
                  $(this)
                    .delay(3000)
                    .hide(10, function() {
                      $(this).remove();
                    });
                }); // /.alert
            } else {
              // error messages
              $(".removeOrderMessages").html(
                '<div class="alert alert-warning">' +
                  '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                  '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
                  response.messages +
                  "</div>"
              );

              // remove the mesages
              $(".alert-success")
                .delay(500)
                .show(10, function() {
                  $(this)
                    .delay(3000)
                    .hide(10, function() {
                      $(this).remove();
                    });
                }); // /.alert
            } // /else
          } // /success
        }); // /ajax function to remove the order
      }); // /remove order button clicked
  } else {
    alert("error! refresh the page again");
  }
}
function paymentOrder(orderId = null) {
  if (orderId) {
    $("#orderDate").datepicker();

    $.ajax({
      url: "php_action/fetchOrderData.php",
      type: "post",
      data: { orderId: orderId },
      dataType: "json",
      success: function(response) {
        // due
        $("#due").val(response.order[10]);
        // pay amount
        $("#payAmount").val(response.order[10]);

        var paidAmount = response.order[9];
        var dueAmount = response.order[10];
        var grandTotal = response.order[8];

        // update payment
        $("#updatePaymentOrderBtn")
          .unbind("click")
          .bind("click", function() {
            var payAmount = $("#payAmount").val();
            var paymentType = $("#paymentType").val();
            var paymentStatus = $("#paymentStatus").val();

            if (payAmount == "") {
              $("#payAmount").after(
                '<p class="text-danger">The Pay Amount field is required</p>'
              );
              $("#payAmount")
                .closest(".form-group")
                .addClass("has-error");
            } else {
              $("#payAmount")
                .closest(".form-group")
                .addClass("has-success");
            }

            if (paymentType == "") {
              $("#paymentType").after(
                '<p class="text-danger">The Pay Amount field is required</p>'
              );
              $("#paymentType")
                .closest(".form-group")
                .addClass("has-error");
            } else {
              $("#paymentType")
                .closest(".form-group")
                .addClass("has-success");
            }

            if (paymentStatus == "") {
              $("#paymentStatus").after(
                '<p class="text-danger">The Pay Amount field is required</p>'
              );
              $("#paymentStatus")
                .closest(".form-group")
                .addClass("has-error");
            } else {
              $("#paymentStatus")
                .closest(".form-group")
                .addClass("has-success");
            }

            if (payAmount && paymentType && paymentStatus) {
              $("#updatePaymentOrderBtn").button("loading");
              $.ajax({
                url: "php_action/editPayment.php",
                type: "post",
                data: {
                  orderId: orderId,
                  payAmount: payAmount,
                  paymentType: paymentType,
                  paymentStatus: paymentStatus,
                  paidAmount: paidAmount,
                  grandTotal: grandTotal
                },
                dataType: "json",
                success: function(response) {
                  $("#updatePaymentOrderBtn").button("loading");

                  // remove error
                  $(".text-danger").remove();
                  $(".form-group")
                    .removeClass("has-error")
                    .removeClass("has-success");

                  $("#paymentOrderModal").modal("hide");

                  $("#success-messages").html(
                    '<div class="alert alert-success">' +
                      '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                      '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
                      response.messages +
                      "</div>"
                  );

                  // remove the mesages
                  $(".alert-success")
                    .delay(500)
                    .show(10, function() {
                      $(this)
                        .delay(3000)
                        .hide(10, function() {
                          $(this).remove();
                        });
                    }); // /.alert

                  // refresh the manage order table
                  manageOrderTable.ajax.reload(null, false);
                } //
              });
            } // /if

            return false;
          }); // /update payment
      } // /success
    }); // fetch order data
  } else {
    alert("Error ! Refresh the page again");
  }
}

function printOrder(orderId = null) {
  if (orderId) {
    $.ajax({
      url: "php_action/printOrder.php",
      type: "post",
      data: { orderId: orderId },
      dataType: "text",
      success: function(response) {
        var mywindow = window.open(
          "",
          "Stock Management System",
          "height=1508px ,width=1480px"
        );
        mywindow.document.write("<html><head><title>Order Invoice</title>");
        mywindow.document.write("</head><body>");
        mywindow.document.write(response);
        mywindow.document.write("</body></html>");

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();
      } // /success function
    }); // /ajax function to fetch the printable order
  } // /if orderId
}

function totalamountFunc() {
  var totalAmount = null;
  var downpayment = null;
  var upfrontdiscount = null;
  var proppaymentTyped = $("#proppaymentType").val();

  totalAmount = Number($("#totalAmt").val());
  downpayment = (totalAmount / 100) * 20;
  if (proppaymentTyped == 1) {
    $("#totalDownpay").val(downpayment);
    $("#totalDownpayValue").val(downpayment);
  } else if (proppaymentTyped == 2) {
    upfrontdiscount = (totalAmount / 100) * 10;
    $("#upfrontDis").val(upfrontdiscount);
    $("#upfrontDisValue").val(upfrontdiscount);
  }
}

function initialDepositeFunc() {
  var totalAmount = null;
  var downpayment = null;
  totalAmount = Number($("#totalAmt").val());
  downpayment = (totalAmount / 100) * 20;

  var initialDeposite = Number($("#initialDeposite").val());
  var remdownpay = downpayment - initialDeposite;
  $("#remainingDownpay").val(remdownpay);
  $("#remainingDownpayValue").val(remdownpay);
  var instalamt = totalAmount - downpayment;
  var installmentamount = (instalamt / 100) * 10;

  $("#intallmentAmt").val(installmentamount);
  $("#intallmentAmtValue").val(installmentamount);
}

function fullamtPaidFunc() {
  var totalAmounts = null;
  var upfrontdiscounts = null;
  var amtPaids = null;
  var remainingfullAmt = null;

  totalAmounts = Number($("#totalAmt").val());
  amtPaids = $("#amtPaid").val();
  upfrontdiscounts = (totalAmounts / 100) * 10;

  remainingfullAmt = totalAmounts - upfrontdiscounts - amtPaids;
  $("#remainingfullPay").val(remainingfullAmt);
  $("#remainingfullPayValue").val(remainingfullAmt);
}

function adjustmentamtvalFunc() {
  var totalAmountsval = null;
  var adjAmtounts = null;
  var remainingAdjAmont = null;
  var adjustinstallment = null;

  totalAmountsval = Number($("#totalAmt").val());
  adjAmtounts = $("#adjAmt").val();
  remainingAdjAmont = totalAmountsval - adjAmtounts;
  adjustinstallment = (remainingAdjAmont / 100) * 10;

  $("#remainingAdjAmt").val(remainingAdjAmont);
  $("#remainingAdjAmtValue").val(remainingAdjAmont);

  $("#adjintallmentAmt").val(adjustinstallment);
  $("#adjintallmentAmtValue").val(adjustinstallment);
}

function resetOrderForm() {
  // reset the input field
  $("#createOrderForm")[0].reset();
  // remove remove text danger
  $(".text-danger").remove();
  // remove form group error
  $(".form-group")
    .removeClass("has-success")
    .removeClass("has-error");
} // /reset order form

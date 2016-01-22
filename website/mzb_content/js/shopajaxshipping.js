/*  700 - AJAX Shipping Calculation
Ajax routine for shipping calculations
*/
function updatezipcodecountryajax(form) {
   if (form.shipcountry.value.length == 0) {
      document.getElementById("selresultlist").innerHTML="<img src='images/ajaxshippingload.gif' border='0'> checking availability...";
      document.getElementById('Action').disabled = true;
      var checkingurl="shopajaxshippingzipcodecountry.asp";
      var pars = 'zipcode=' + form.strpostcode.value + '&country=' + form.strcountry.value +'';
      var url = checkingurl + '?' + pars;
      var target = 'selresultlist';
      var myAjax = new Ajax.Updater(target, checkingurl, {method: 'post',parameters: pars});
      document.getElementById('Action').disabled = false;
   }
}

function updateshipzipcodecountryajax(form) {
   document.getElementById("selresultlist").innerHTML="<img src='images/ajaxshippingload.gif' border='0'> checking availability...";
   document.getElementById('Action').disabled = true;
   var checkingurl="shopajaxshippingzipcodecountry.asp";
   var pars = 'zipcode=' + form.shipzip.value + '&country=' + form.shipcountry.value +'';
   var url = checkingurl + '?' + pars;
   var target = 'selresultlist';
   var myAjax = new Ajax.Updater(target, checkingurl, {method: 'post',parameters: pars});
   document.getElementById('Action').disabled = false;
}

function updatezipcodestrcountryajax(form) {
   if (form.strcountry.value.length != 0) {
      document.getElementById("selresultlist").innerHTML="<img src='images/ajaxshippingload.gif' border='0'> checking availability...";
      document.getElementById('Action').disabled = true;
      var checkingurl="shopajaxshippingzipcodecountry.asp";
      var pars = 'zipcode=' + form.strpostcode.value + '&country=' + form.strcountry.value +'';
      var url = checkingurl + '?' + pars;
      var target = 'selresultlist';
      var myAjax = new Ajax.Updater(target, checkingurl, {method: 'post',parameters: pars});
      document.getElementById('Action').disabled = false;
   }
   
}

function updatezipcodeajaxatc(form) {
document.getElementById("selresultlist").innerHTML="<img src='images/ajaxshippingload.gif' border='0'> Getting Shipping Selections...";
$.ajax({type:'POST', url: 'shopajaxshippingzipcodecountryATC.asp', data:$(form).serialize(), success: function(response) {
    $(form).find('#selresultlist').html(response);
}});

return false;
}

function updatezipcodeajaxatcSAVED(form) {
      document.getElementById("selresultlist").innerHTML="<img src='images/ajaxshippingload.gif' border='0'> Getting Shipping Selections...";
       document.getElementById('checkout').disabled = true;
     document.getElementById('ReCalculate').disabled = true;
      document.getElementById('continue').disabled = true;
      var checkingurl="shopajaxshippingzipcodecountryATC.asp";
      var pars = 'shipstate=' + form.shipstate.value + '&zipcode=' + form.strpostcode.value + '&country=' + form.shipcountry.value + '' + '';
      var url = checkingurl + '?' + pars;
      var target = 'selresultlist';
      var myAjax = new Ajax.Updater(target, checkingurl, {method: 'post',parameters: pars});
      //document.getElementById('Action').disabled = false;
	    document.getElementById('checkout').disabled = false;
  document.getElementById('ReCalculate').disabled = false;
  document.getElementById('continue').disabled = false;
   }
function updateordertotal(form,answer) {
  document.getElementById("orderreviewresult").innerHTML="<img src='images/ajaxshippingload.gif' border='0'> Recalculating Total";

   var checkingurl="shopajaxCartTotal.asp";
  // var pars = 'shipmethodtype=' + form.shipmethodtype.value +'';
   var pars = 'shipmethodtype=' +answer+'';
   var url = checkingurl + '?' + pars;
   var target = 'orderreviewresult';
	var myAjax = new Ajax.Updater(target, checkingurl, {method: 'post',parameters: pars});

}
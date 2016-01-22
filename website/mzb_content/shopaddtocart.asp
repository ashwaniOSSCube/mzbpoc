<!DOCTYPE html>
<html lang="en">
<head>
    <!-- This code must remain in all header files -->
    <base href="https://www.shopmzb.com/mzb_usa_com/store//" />
    <!-- end -->
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=iso-8859-1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width" />
	<title>Massimo Zanetti Beverage Online Store</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" media="all" href="stylesheets/contentslider.css" />
    <link rel="stylesheet" type="text/css" href="stylesheets/tabcontent700.css" />
	<link rel="stylesheet" type="text/css" media="all" href="templates/default-3cols/css/layout_checkout.css" />
	<link rel="stylesheet" type="text/css" media="all" href="templates/default-3cols/css/menu.css" />
	<link rel="stylesheet" type="text/css" media="all" href="templates/default-3cols/css/shop700_checkout.css" />
 <link href="templates/default-3cols/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="templates/default-3cols/css/bootstrap.offcanvas.css"/> <!-- Only If Using OffCanvas Menu -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!--[if lt IE 9]>
    <script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->	<script language="javascript" type="text/javascript">
	<!--
	function clearfield(pform){
	if (pform.keyword.value == "search this site")
		pform.keyword.value = "";
	}
	-->
	</script>
	<script language="javascript" type="text/javascript">
	<!--
	function toggleMe(a){
	  var e=document.getElementById(a);
	  //if(!e)return true;
	  if(e.style.display=="none"){
		e.style.display="block"
	  } else {
		e.style.display="none"
	  }
	  //return true;
	}
	-->
	</script>
	<script language="javascript" type="text/javascript">
	<!--
	function checkjavascriptstatus(){
	   var checkingurl="shopcheckjavascript.asp";
	   var pars = '';
	   var url = checkingurl + '?' + pars;
	   new Ajax.Request(url, {method: 'post',
					   onSuccess: function(transport) {
					   }
					   }); 
	}
	-->
	</script>
	<!--<noscript>not support</noscript>-->
	<script src="js/1.11.2.jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.offcanvas.js"></script>
	<script language="javascript" type="text/javascript" src="js/vs350.js"></script>
	<script language="javascript" type="text/javascript" src="js/contentslider.js"></script>
    <script language="javascript" type="text/javascript" src="js/tabcontent700.js"></script>
    <script language="javascript" type="text/javascript" src="js/shopajaxsearch.js"></script>
    <script language="javascript" type="text/javascript" src="shopcheckjavascript.asp"></script>
    <!-- '701 - 2011.03.15 - Enhancement: Speed up store performance -->
        <!-- Enhancement: To include TYNT -->
    <script type="text/javascript">
    ( function($) {
        // we can now rely on $ within the safety of our "bodyguard" function
        $(document).ready(function() {	
		var id = '#dialog';
	
		//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		//Set heigth and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		
		//transition effect		
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn(2000); 	
	
	//if close button is clicked
	$('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
	
	//if mask is clicked
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});		
	
});
    } ) ( jQuery );
</script>
<style type="text/css">
#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}  
#boxes .window {
  position:absolute;
  left:0;
  top:0;
  width:440px;
  height:200px;
  display:none;
  z-index:9999;
  padding:20px;
}
#boxes #dialog {
  width:375px; 
  height:203px;
  padding:10px;
  background-color:#ffffff;
border-radius: 10px; 
-moz-border-radius: 10px; 
-webkit-border-radius: 10px; 
border: 10px solid #0B4C8E;
}
</style>
</head>
<body>
<div class="visible-xs-block">
<nav class="navbar navbar-default navbar-fixed-top">
<div style="text-align:center;">
<div class="row"  style="height:90px;background-image:url(templates/default-3cols/images/logo-bg-main-CO.jpg
);background-size:cover;">
<header class="clearfix">
        
<a href="default.asp"><!--<img src="images/American_Patio_logo_mobile.gif" style='padding-top:10px;'/> --></a>
<div style='float:right;text-align:Center;padding-top:15px;font-size:30px;line-height:12px;padding-right:10px;line-height:12px;'>
<a href='shopaddtocart.asp' style="color:#fff">
<span class="glyphicon glyphicon glyphicon-shopping-cart" style="color:#fff" aria-hidden="true"></span><br><span style='font-size:11px;'>My Cart
 0
</span></a></div>

</div>
<div style="clear:both;"></div>
<div class="col-xs-2">
<button type="button" class="navbar-toggle offcanvas-toggle" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
</div>
<div class="col-xs-10" style="padding-top:7px;">
<form action="shopsearch.asp?search=Yes" method="post" class="form-inline">
<div class="input-group">
      <input type="text" class="form-control"  style='font-size:10px;'  required placeholder="Enter Search Term(s) Here">
      <span class="input-group-btn">
        <button class="btn btn-default" name="Action" type="submit">Search!</button>
      </span>
    </div>
	</form>
</div>


        <nav class="navbar navbar-default navbar-offcanvas navbar-offcanvas-touch" role="navigation" id="js-bootstrap-offcanvas">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Massimo Zanetti Beverage Online Store</a>
                </div>
                <div>     
					<ul class="nav navbar-nav" style='text-align:left;padding-left:4px;'>
     				<li class="active"><a href="default.asp">Home</a></li>          
                        <li class="dropdown"><a href='#' class='dropdown-toggle'>Chase &amp; Sanborn<span class="caret"></span></a><ul class="dropdown-menu" role="menu"><li><a href='shopdisplaycategories.asp?id=8'>View All</a></li><li><a href="shopdisplayproducts.asp?id=50&amp;cat=Special+Roast">Special Roast</a></li><li><a href="shopdisplayproducts.asp?id=49&amp;cat=Decaffeinated">Decaffeinated</a></li><li><a href="shopdisplayproducts.asp?id=215&amp;cat=Merchandise">Merchandise</a></li></ul></li><li class="dropdown"><a href='#' class='dropdown-toggle'>Krispy Kreme Doughnuts Coffee<span class="caret"></span></a><ul class="dropdown-menu" role="menu"><li><a href='shopdisplaycategories.asp?id=209'>View All</a></li><li><a href="shopdisplayproducts.asp?id=211&amp;cat=Smooth">Smooth</a></li><li><a href="shopdisplayproducts.asp?id=212&amp;cat=Rich">Rich</a></li><li><a href="shopdisplayproducts.asp?id=210&amp;cat=Decaffeinated">Decaffeinated</a></li></ul></li><li class="dropdown"><a href='#' class='dropdown-toggle'>Reveille Coffee<span class="caret"></span></a><ul class="dropdown-menu" role="menu"><li><a href='shopdisplaycategories.asp?id=217'>View All</a></li><li><a href="shopdisplayproducts.asp?id=219&amp;cat=Regular+Roast">Regular Roast</a></li><li><a href="shopdisplayproducts.asp?id=218&amp;cat=Dark+Roast">Dark Roast</a></li><li><a href="shopdisplayproducts.asp?id=220&amp;cat=Decaf">Decaf</a></li></ul></li><li><a href="shopdisplayproducts.asp?id=2&amp;cat=Segafredo+Zanetti">Segafredo Zanetti</a></li>
						<li><hr /></li>
						<li><a href="http://www.shopmzb.com/chockfullonuts_com/Shop/default.asp">Chock full o'Nuts</a></li>
      <li><a href="http://www.shopmzb.com/hillsbros_com/shop/">Hills Bros.</a></li>
	  <li><a href="http://www.shopmzb.com/hillsbros_cap_com/Shop/">Hills Bros. Cappuccino</a></li>
	  <li><a href="http://www.shopmzb.com/hillsbros_com/shop/shopdisplaycategories.asp?id=15">Hills Bros. Premium</a></li>
	  <li><a href="http://www.shopmzb.com/mzb_usa_com/kauaistore/">Kauai Coffee</a></li>
	  
	  <li><a href="http://www.shopmzb.com/mjbcoffee_com/Shop/">MJB</a></li>
	  <li><hr /></li>
						<li><a href="shopcustadmin.asp">My Account</a></li>
						<li><a href="shopcontent.asp?type=Aboutus">About Us</a> </li>
						<li><a href="shopcontent.asp?type=FAQ">FAQs</a></li>
						<li><a href="https://www.mzb-usa.com/contact/">Contact Us</a></li>
						<li><a href="shopcontent.asp?type=shipping">Shipping & Returns</a></li>
						<li><a href="shopcontent.asp?type=terms">Terms & Conditions</a></li>
						<li><a href="shopcontent.asp?type=privacy">Privacy</a></li>
                         
                        
						
						 
						  
						   
                           
					</ul>
                </div>
            </div>
        </nav>
    </header>
 </div>
 </nav>
 <div style="height:120px;"></div>
 </div>

<div style="clear:both;"></div>
	<div id="wrap page-content">
	<div class="container">
		<!-- BEGIN HEADER -->
		<div id="header" class="container visible-lg-block visible-md-block visible-sm-block">
			<div class="columns row" style="background-image:url(templates/default-3cols/images/logo-bg-main-CO.jpg
);">
				<!-- LOGO DISPLAY AND LINK -->
				<div class="col-xs-6">
                <div id="vp_logo"><a title="MZB-USA Online Store" class="logo" href="default.asp"><img  src="images/logo-shim.gif" width="295" height="140" alt="MZB-USA Online Store" title="MZB-USA Online Store" /></a>
</div>
				</div>
				<!-- WELCOME BOX  -->
				<div class="col-xs-6">
				<div id="vp_welcomeboxsquare"><table class="utility-box">
<tr>
<td valign="middle">
<div class="utility-box-top"></div>
<div class="utility-box-content">
<div class="utility-row">
<strong>
Welcome, Guest</strong>
<span style="float: right;"> 
(
<a href="shopaddtocart.asp
"> View Cart </a> &nbsp;|&nbsp;

<a href="shopcustadminlogin.asp">Login</a>
) 
</span>
<div class="cb"></div>
</div>
</div>
<div class="utility-box-bottom"></div>
<form action="shopsearch.asp?search=Yes" method="get">
<div align='right'><input name="keyword" type="text" id='keywordinputfld'> <input name="Search" type="submit" value="Search" id='searchbtn'>
<br><a href="shopsearch.asp"><span id='adsearchlink'>Advanced Search</span></a></div>
<input name='category' value='ALL' type='hidden'>
</form>
</td>
</tr>
</table>
</div>
				</div>
				<!-- END WELCOME BOX -->
			</div>
		</div>
		<!-- END HEADER -->
		<!-- BEGIN CONTENT -->
		<div id="content">            
			<!-- content columns -->
			<div class="columns-border">
            <div class="columns">
				<!-- side bar -->
<div class="col-lg-2_5 col-md-2_5 col-sm-3 visible-lg-block visible-md-block visible-sm-block">
                <div id="vp_leftsidebox">
					<div class="side-bar">
					<div class="sidebarcell">
<div id="side_categories_title_17" class="title">
<h2>MZB Brands</h2>
</div>
<div class="contentcell">
<ul class="menulist">

<li>
  <a href="shopdisplaycategories.asp?id=8&amp;cat=Chase+%26+Sanborn">Chase &amp; Sanborn...</a><div id="leftsideboxcatnavcid8" class="submenulist"><ul class="menulist"><li><a href="shopdisplayproducts.asp?id=50&amp;cat=Special+Roast">Special Roast</a></li><li><a href="shopdisplayproducts.asp?id=49&amp;cat=Decaffeinated">Decaffeinated</a></li><li><a href="shopdisplayproducts.asp?id=215&amp;cat=Merchandise">Merchandise</a></li></ul></div>
</li>

<li>
  <a href="shopdisplaycategories.asp?id=209&amp;cat=Krispy+Kreme+Doughnuts+Coffee">Krispy Kreme Doughnuts Coffee...</a><div id="leftsideboxcatnavcid209" class="submenulist"><ul class="menulist"><li><a href="shopdisplayproducts.asp?id=211&amp;cat=Smooth">Smooth</a></li><li><a href="shopdisplayproducts.asp?id=212&amp;cat=Rich">Rich</a></li><li><a href="shopdisplayproducts.asp?id=210&amp;cat=Decaffeinated">Decaffeinated</a></li></ul></div>
</li>

<li>
  <a href="shopdisplaycategories.asp?id=217&amp;cat=Reveille+Coffee">Reveille Coffee...</a><div id="leftsideboxcatnavcid217" class="submenulist"><ul class="menulist"><li><a href="shopdisplayproducts.asp?id=219&amp;cat=Regular+Roast">Regular Roast</a></li><li><a href="shopdisplayproducts.asp?id=218&amp;cat=Dark+Roast">Dark Roast</a></li><li><a href="shopdisplayproducts.asp?id=220&amp;cat=Decaf">Decaf</a></li></ul></div>
</li>

<li>
  <a href="shopdisplayproducts.asp?id=2&amp;cat=Segafredo+Zanetti">Segafredo Zanetti</a>
</li>

</ul>
<hr align="left" width="170" style="color:#9d1318;">
<ul class="menulist">
<li style='padding-bottom:10px;'><a href="http://shopmzb.com/chockfullonuts_com/Shop/default.asp">Chock full o'Nuts</a></li>
<li style='padding-bottom:10px;'><a href="http://shopmzb.com/hillsbros_com/shop/">Hills Bros.</a></li>
<li style='padding-bottom:10px;'><a href="http://shopmzb.com/hillsbros_cap_com/Shop/">Hills Bros. Cappuccino</a></li>
<li style='padding-bottom:10px;'><a href="http://shopmzb.com/hillsbros_com/shop/shopdisplaycategories.asp?id=15">Hills Bros. Premium</a></li>
<li style='padding-bottom:10px;'><a href="http://shopmzb.com/mzb_usa_com/kauaistore/">Kauai Coffee</a></li>
<li style='padding-bottom:10px;'><a href="http://shopmzb.com/mjbcoffee_com/Shop/">MJB</a></li>

</ul>
</div>
</div>
					<div class="sidebarcell">
<div id="side_freetext_title_204" class="title">
<h2>Information</h2>
</div>
<div class="contentcell">
<div class="sidefreetext" ><a href="default.asp">Home</a><br />
<a href="shopcustadmin.asp">My Account</a><br />
<a href="shopcontent.asp?type=Aboutus">About Us</a><br />
<a href="shopcontent.asp?type=FAQ">FAQs</a><br />
<a href="shopcustcontact.asp">Contact Us</a><br />
<a href="shopcontent.asp?type=shipping">Shipping & Returns</a><br />
<a href="shopcontent.asp?type=terms">Terms & Conditions</a><br />
<a href="shopcontent.asp?type=privacy">Privacy </a>
</div>
</div>
</div>
					   <div style=""clear:both""></div>
			        </div>
				</div>
</div>
				<!-- main content -->
				<div class="col-lg-9_5 col-md-9_5 col-sm-8 col-xs-12">
					<table width="100%" style="margin-top:20px;">
	<tr>
		<td colspan="6"><div class="breadcrumb"><img class="img-responsive" src="templates/default-3cols/images/brandstitleco.jpg" style="margin-bottom:5px;"></div></td>
	</tr>
	<tr>
		<td><img class="img-responsive" src="templates/default-3cols/images/brandsfamily-co.jpg" style="max-width:785px;width:100%;"></td>
	</tr>
</table>
				<!-- END SHOPPAGE_HEADER.HTM --><div class="breadcrumb"><a href="default.asp"> Home </a>&nbsp;: View Cart </div>
<div id="checkoutsteps">
<img border='0' src='images/checkout/1_view_cart.gif' alt='' class='img-responsive'/>&nbsp;
</div>
<h1> View Cart </h1>

<span class='fontbold carttittle'>Shopping Cart Items: 0</span> 
<form action="shopaddtocart.asp" method="post">
<input type="hidden" name="genpredefinedsecuritycode" value="MGQM2563KEXL7030JCER3325AKXA8114XYDF7037FCXM6656LLBH2556AEWN5845WBMT4261ESRK4846PYWT1081NVGZ1540DTDG" />
<table border="0" cellpadding="1" cellspacing="1" width="99%" class="info_table"><tr style="background-color:#FCFCFC" valign="top"><th class="menuhdr"> Description </th>
<th class="menuhdr"> Quantity </th>
<th class="menuhdr"><div style='text-align:right;width:100%;'>Total</div></th>
</tr><tr><td>&nbsp;</td><th colspan="1" class="menuhdr">Product Cost</th><td class="ar item_row2" style="background-color:#FFFFFF">$0.00</td></tr></table><table class="info_table" id="shipcalctable" width="50%" cellpadding="1" cellspacing="1" border="0" style='margin-top:-20px;float:right;margin-right:8px;border-top:0;'>
<tr style='background-color:#fcfcfc;'>
<td>
<table width='99%' border='0' id='shippingcalculator'><tr><td colspan=2>
<strong>Calculate Shipping Rates</strong>:</td></tr><tr><td>

<script type="text/javascript" language="javascript">
<!-- Begin Shipping information transfer
var shipFirst = "";
var shipLast = "";
var shipCompany = "";
var shipAddress = "";
var shipCity = "";
var shipState = "";
var shipZip = "";
var shipCountry = "";
var shipmethodtype =  "";

var shipAddress2 = "";

function InitSaveVariables(form) {
shipFirst = form.strfirstname.value;
shipLast = form.strlastname.value;
shipCompany = form.strcompany.value;
shipAddress = form.straddress.value;
shipmethodType = form.shipmethodtype.value;

shipAddress2 = form.straddress2.value;

shipCity = form.strcity.value;
shipZip = form.strpostcode.value;

shipState = form.strstate.value;

shipCountry = form.strcountry.value;

}
function ShipToBillPerson(form) {
toggle()
if (form.copy[0].checked) {
InitSaveVariables(form);
form.shipname.value = form.strfirstname.value + " " + form.strlastname.value;
form.shipcompany.value = form.strcompany.value;
form.shipaddress.value = form.straddress.value;

form.shipAddress2.value =form.straddress2.value;

form.shiptown.value = form.strcity.value;

form.shipstate.value = form.strstate.value;

form.shipzip.value = form.strpostcode.value;
form.resetS.value = "-1";
}
else {
form.shipname.value = "";
form.shipcompany.value = "";
form.shipaddress.value = "";

form.shipAddress2.value = "";

form.shiptown.value = "";
form.shipzip.value = "";

form.shipstate.value = "";

form.shipcountry.value = "";

}
}
// End Shipping info transfer-->
</script>

<script type="text/javascript" language="javascript">
function ResetShipping(form) {
toggle()
form.shipmethodtype.value = "";
if (form.resetS.checked) {
form.shipname.value = "";
form.shipcompany.value = "";
form.shipaddress.value = "";
form.copy.value = "";

form.shipAddress2.value = "";

form.shiptown.value = "";
form.shipzip.value = "";

form.shipstate.value = "";

form.shipcountry.value = "";

}
}
// End Shipping info transfer-->
</script>
<script language="javascript"> 
function toggle() {
	var ele = document.getElementById("toggleText");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
  	}
	else {
		ele.style.display = "block";
	}
} 
</script>
<script language="javascript" src="js/shopajaxshipping.js" type="text/javascript"></script>
<span class="al vt"><label>* Country:</label></td><td>
<select class="txtfielddropdown form-control" name="shipcountry" size="1">
<option value=""  selected="selected">Select</option>
<option value="US">United States</option>
<option value="CA">Canada</option>
<option value="">------------</option>
<option value="CA">Canada</option>
<option value="US">United States</option>
</select></span>
</td></tr><tr><td>
<span class="al vt"><label>* State:</label></td><td>
<select class="txtfielddropdown form-control" name="shipstate" size="1">
<option value=""  selected="selected">Select</option>
<option value="None" >None</option>
<option value="AL">Alabama</option>
<option value="AK">Alaska</option>
<option value="AP">APO - California</option>
<option value="AA">APO - Florida</option>
<option value="AE">APO - New York</option>
<option value="AZ">Arizona</option>
<option value="AR">Arkansas</option>
<option value="CA">California</option>
<option value="CO">Colorado</option>
<option value="CT">Connecticut</option>
<option value="DE">Delaware</option>
<option value="DC">District Of Columbia</option>
<option value="FL">Florida</option>
<option value="AE">FPO</option>
<option value="GA">Georgia</option>
<option value="HI">Hawaii</option>
<option value="ID">Idaho</option>
<option value="IL">Illinois</option>
<option value="IN">Indiana</option>
<option value="IA">Iowa</option>
<option value="KS">Kansas</option>
<option value="KY">Kentucky</option>
<option value="LA">Louisiana</option>
<option value="ME">Maine</option>
<option value="MD">Maryland</option>
<option value="MA">Massachusetts</option>
<option value="MI">Michigan</option>
<option value="MN">Minnesota</option>
<option value="MS">Mississippi</option>
<option value="MO">Missouri</option>
<option value="MT">Montana</option>
<option value="NE">Nebraska</option>
<option value="NV">Nevada</option>
<option value="NH">New Hampshire</option>
<option value="NJ">New Jersey</option>
<option value="NM">New Mexico</option>
<option value="NY">New York</option>
<option value="NC">North Carolina</option>
<option value="ND">North Dakota</option>
<option value="OH">Ohio</option>
<option value="OK">Oklahoma</option>
<option value="OR">Oregon</option>
<option value="PA">Pennsylvania</option>
<option value="RI">Rhode Island</option>
<option value="SC">South Carolina</option>
<option value="SD">South Dakota</option>
<option value="TN">Tennessee</option>
<option value="TX">Texas</option>
<option value="UT">Utah</option>
<option value="VT">Vermont</option>
<option value="VA">Virginia</option>
<option value="WA">Washington</option>
<option value="WV">West Virginia</option>
<option value="WI">Wisconsin</option>
<option value="WY">Wyoming</option>
<option value="">----- Canada ----- </option>
<option value="AB">Alberta</option>
<option value="BC">British Columbia</option>
<option value="MB">Manitoba</option>
<option value="NB">New Brunswick</option>
<option value="NF">Newfoundland/Labrador</option>
<option value="NT">Northwest Territories</option>
<option value="NS">Nova Scotia</option>
<option value="NU">Nunavut</option>
<option value="ON">Ontario</option>
<option value="PE">Prince Edward Island</option>
<option value="QC">Quebec</option>
<option value="SK">Saskatchewan</option>
<option value="YT">Yukon</option>
</select></span>
</td></tr><tr><td>
<span class="al vt"><label>* Zip Code:</label></td><td>
<input class="txtfield inputfield form-control" size="6" name="strpostcode" id="strpostcode" value="" onBlur="javascript:updatezipcodeajaxatc(this.form); return false;" />
</td></tr><tr><td colspan=2>
<input class="submitbtn" value="Get Shipping Rates"  onClick="javascript:updatezipcodeajaxatc(this.form); return false;" style='width:150px;'>
</td></tr></table>
</td></tr>
<tr><td colspan='2'>
<div class="custom_checkout_container">
		<div name='selresultlist' id="selresultlist">
		
</div>
</div>	
<div name='orderreviewresult' id = "orderreviewresult" style="height:auto;">

</div>	
</td></tr></table>

<input class="submitbtn" name="continue" type="submit" value="Continue Shopping" id="continue" />&nbsp;
<input class="submitbtn" name="ReCalculate" type="submit" value="Recalculate" id="ReCalculate"/>&nbsp;
<input class="submitbtn" name="checkout" id="checkout" type="submit" value="Proceed to Checkout" />&nbsp;</form>
<p>&nbsp;</p>
<br /><a href='shopsavecart.asp'>Save this cart</a><br />

				<!-- START SHOPPAGE_TRAILER.HTM -->
								</div>
                <div id="vp_rightsidebox"></div>
			</div>
            </div>
		</div>
		<!-- footer -->
		<div id="footer">
            <div id="vp_footer"><table cellpadding="0" cellspacing="0" width="100%" class="footertable">
<tr>
<td class="tdleft">&nbsp;</td>
<td class="tdcenter">
</td>
<td class="tdright">&nbsp;</td>
</tr>
</table>
<div class="bottom-row">
</div>
</div>
		</div>
	</div>
<script type="text/javascript">
<!--
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-1243241-64', 'auto', {'allowLinker': true});
	ga('require', 'linker');
	ga('linker:autoLink', ['hillsbros.com', 'chockfullonuts.com', 'mjbcoffee.com', 'hillsbroscappuccino.com']);
	ga('require', 'linkid', 'linkid.js');
	ga('send', 'pageview');
	
-->
</script>

<script language="javascript" type="text/javascript">
<!--
/*
Rewrite #anchor links for pages with BASE HREF 
*/
var anchors = document.getElementsByTagName("a");
var basehref = document.getElementsByTagName("base")[0].href;
var url = window.location.href;
if(url.indexOf("#") > 0) url = url.substr(0, url.indexOf("#"));
if(basehref) {
   for(var i = 0; i < anchors.length; i++) {
      var anchor = anchors[i];
      poundPos = anchor.href.indexOf("/#");
      if (poundPos > 0) {
         anchor.href = url + anchor.href.substr(poundPos + 1);
      }
   }
}
-->
</script>
</body>
</html>

//Jump Menu
function mm_jumpmenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

<!--
function mm_openbrwindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->

<!--
// Validate Form

function mm_findobj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=mm_findobj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

<!--
function mm_DisplayStatusmsg(msgStr) { //v1.0
  status=msgStr;
  document.mm_returnvalue = true;
}
//-->

<!--
function mm_reloadpage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
mm_reloadpage(true);
// -->

<!--
function mm_preloadimages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function mm_swapimgrestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}


function mm_swapimage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=mm_findobj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->

//Start Scrubber by Al Sparber
//function scrubber() {
//for (i in document.links)document.links
//[i].onfocus=document.links[i].blur;}
//window.onload=scrubber;
//End Scrubber

<!-- Begin Shipping information transfer
var shipFirst = "";
var shipLast = "";
var shipCompany = "";
var shipAddress = "";
var shipCity = "";
var shipState = "";
var shipZip = "";
var shipCountry = "";

function InitSaveVariables(form) {
shipFirst = form.strfirstname.value;
shipLast = form.strlastname.value;
shipCompany = form.strcompany.value;
shipAddress = form.straddress.value;
shipCity = form.strcity.value;
shipZip = form.strpostcode.value;
shipState = form.strstate.value;
shipCountry = form.strcountry.value;
}
function ShipToBillPerson(form) {
if (form.copy.checked) {
InitSaveVariables(form);
form.shipname.value = form.strfirstname.value + " " + form.strlastname.value;
form.shipcompany.value = form.strcompany.value;
form.shipaddress.value = form.straddress.value;
form.shiptown.value = form.strcity.value;
form.shipstate.value = form.strstate.value;
form.shipzip.value = form.strpostcode.value;
form.shipcountry.value = form.strcountry.value;
}
else {
form.shipname.value = "";
form.shipcompany.value = "";
form.shipaddress.value = "";
form.shiptown.value = "";
form.shipzip.value = "";
form.shipstate.value = "";
form.shipcountry.value = "";
}
}
// End Shipping info transfer-->

<!--

function mm_nbgroup(event, grpName) { //v3.0
  var i,img,nbArr,args=MM_nbGroup.arguments;
  if (event == "init" && args.length > 2) {
    if ((img = mm_findobj(args[2])) != null && !img.MM_init) {
      img.MM_init = true; img.MM_up = args[3]; img.MM_dn = img.src;
      if ((nbArr = document[grpName]) == null) nbArr = document[grpName] = new Array();
      nbArr[nbArr.length] = img;
      for (i=4; i < args.length-1; i+=2) if ((img = mm_findobj(args[i])) != null) {
        if (!img.MM_up) img.MM_up = img.src;
        img.src = img.MM_dn = args[i+1];
        nbArr[nbArr.length] = img;
    } }
  } else if (event == "over") {
    document.mm_nbover = nbArr = new Array();
    for (i=1; i < args.length-1; i+=3) if ((img = mm_findobj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = (img.MM_dn && args[i+2]) ? args[i+2] : args[i+1];
      nbArr[nbArr.length] = img;
    }
  } else if (event == "out" ) {
    for (i=0; i < document.MM_nbOver.length; i++) {
      img = document.MM_nbOver[i]; img.src = (img.MM_dn) ? img.MM_dn : img.MM_up; }
  } else if (event == "down") {
    if ((nbArr = document[grpName]) != null)
      for (i=0; i < nbArr.length; i++) { img=nbArr[i]; img.src = img.MM_up; img.MM_dn = 0; }
    document[grpName] = nbArr = new Array();
    for (i=2; i < args.length-1; i+=2) if ((img = mm_findobj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = img.MM_dn = args[i+1];
      nbArr[nbArr.length] = img;
  } }
}

function p7_autolayers() { //v1.2 by PVII
 var g,b,k,f,args=p7_autolayers.arguments;
 var a = parseInt(args[0]);if(isNaN(a))a=0;
 if(!document.p7setc) {p7c=new Array();document.p7setc=true;
  for (var u=0;u<10;u++) {p7c[u] = new Array();}}
 for(k=0; k<p7c[a].length; k++) {
  if((g=mm_findobj(p7c[a][k]))!=null) {
   b=(document.layers)?g:g.style;b.visibility="hidden";}}
 for(k=1; k<args.length; k++) {
  if((g=mm_findobj(args[k])) != null) {
   b=(document.layers)?g:g.style;b.visibility="visible";f=false;
   for(j=0;j<p7c[a].length;j++) {
    if(args[k]==p7c[a][j]) {f=true;}}
  if(!f) {p7c[a][p7c[a].length++]=args[k];}}}
}

function p7_redoit() { //v1.2 by PVII
 if(document.layers) {MM_reloadPage(false);}
}

function p7_snap() { //v2.63 by PVII
  var x,y,ox,bx,oy,p,tx,a,b,k,d,da,e,el,args=p7_snap.arguments;a=parseInt(a);
  for (k=0; k<(args.length-3); k+=4)
   if ((g=mm_findobj(args[k]))!=null) {
    el=eval(mm_findobj(args[k+1]));
    a=parseInt(args[k+2]);b=parseInt(args[k+3]);
    x=0;y=0;ox=0;oy=0;p="";tx=1;da="document.all['"+args[k]+"']";
    if(document.getElementById) {
     d="document.getElementsByName('"+args[k]+"')[0]";
     if(!eval(d)) {d="document.getElementById('"+args[k]+"')";if(!eval(d)) {d=da;}}
    }else if(document.all) {d=da;}
    if (document.all || document.getElementById) {
     while (tx==1) {p+=".offsetParent";
      if(eval(d+p)) {x+=parseInt(eval(d+p+".offsetLeft"));y+=parseInt(eval(d+p+".offsetTop"));
      }else{tx=0;}}
     ox=parseInt(g.offsetLeft);oy=parseInt(g.offsetTop);var tw=x+ox+y+oy;
     if(tw==0 || (navigator.appVersion.indexOf("MSIE 4")>-1 && navigator.appVersion.indexOf("Mac")>-1)) {
      ox=0;oy=0;if(g.style.left){x=parseInt(g.style.left);y=parseInt(g.style.top);
      }else{var w1=parseInt(el.style.width);bx=(a<0)?-5-w1:-10;
      a=(Math.abs(a)<1000)?0:a;b=(Math.abs(b)<1000)?0:b;
      x=document.body.scrollLeft + event.clientX + bx;
      y=document.body.scrollTop + event.clientY;}}
   }else if (document.layers) {x=g.x;y=g.y;var q0=document.layers,dd="";
    for(var s=0;s<q0.length;s++) {dd='document.'+q0[s].name;
     if(eval(dd+'.document.'+args[k])) {x+=eval(dd+'.left');y+=eval(dd+'.top');break;}}}
   if(el) {e=(document.layers)?el:el.style;
   var xx=parseInt(x+ox+a),yy=parseInt(y+oy+b);
   if(navigator.appName=="Netscape" && parseInt(navigator.appVersion)>4){xx+="px";yy+="px";}
   if(navigator.appVersion.indexOf("MSIE 5")>-1 && navigator.appVersion.indexOf("Mac")>-1){
    xx+=parseInt(document.body.leftMargin);yy+=parseInt(document.body.topMargin);
    xx+="px";yy+="px";}e.left=xx;e.top=yy;}}
}
//-->

<!--

function mm_showhidelayers() { //v6.0
  var i,p,v,obj,args=mm_showhidelayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=mm_findobj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
//-->

<!--
function openWindow(url) {
  popupWin = window.open(url,'new_page','width=350,height=300,scrollbars=yes,resizable=yes,menubar=no,toolbar=no,location=no,status=no,directories=no,copyhistory=no')
  popupWin.focus();
}
// done hiding -->


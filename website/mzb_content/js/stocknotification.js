/*  700 - Auto Notify When Stock Is Available */
function addtonotification(contactid,catalogid)
{
	if ((contactid != '') && (catalogid != '')) {
        document.getElementById("stocknotificationresult").innerHTML="<img src='images/ajaxshippingload.gif' border='0'> processing...";
        var checkingurl="shopstocknotificationajax.asp";
        var pars = 'ptype=addstocknotify&contactid='+ contactid +'&catalogid='+ catalogid +'';
        var target = 'stocknotificationresult';
        var myAjax = new Ajax.Updater(target, checkingurl, {method: 'post',parameters: pars});
    }
}

/*  700 - Quick Product Search Front End
Ajax routine to automatically populate list of product when typing keywords
*/
function getproductdesc(str,divname)
{
   document.getElementById(divname + "resultlist").style.visibility="visible";
   if (str.length==0)
   {
      document.getElementById(divname + "resultlist").style.visibility="hidden";
   }

   var checkingurl="shopajaxsearchlookup.asp"
   var pars = 'keyword=' + str;
   var target = divname + 'resultlist';
   var myAjax = new Ajax.Updater(target, checkingurl, {method: 'post',parameters: pars});
}
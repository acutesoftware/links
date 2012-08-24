

function LoadListOfLinks(str)
{
// This returns a list of links.

if (str.length==0)
  { 
  document.getElementById("txtResults").innerHTML="";
  return;
  }

document.getElementById("txtResults").innerHTML=" Please wait... Searching for URLs containing '" + str + "'" ; 

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtResults").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","links.php?q="+str , true);
xmlhttp.send();
document.getElementById("mainList").innerHTML=" List of URLs containing '" + str + "'" ; 
document.getElementById("mainList").innerHTML=" " ; 
return ;
}



function AddLink()
{
// This calls a PHP file to add a link to the list, saved in Cookies.

document.getElementById("mainList").innerHTML=" Adding URL = " + document.searchForm.txtSearch.value;

xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtResults").innerHTML=xmlhttp.responseText;
    }
  }


xmlhttp.open("GET","addurl.php?q="+document.searchForm.txtSearch.value ,true);
xmlhttp.send();

return false;

}








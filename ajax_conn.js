function createlink()
{
	var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
	
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
       var b=xmlhttp.responseText;
	   console.log(b);
    }
  }
  xhttp.open("GET", "updateindex.php", true);
  xhttp.send();
}
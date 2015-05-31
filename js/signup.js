function showUser() {
    
    var email=document.getElementById("email").innerHTML;
     var file=document.getElementById("file").innerHTML;
     var data="email=" +id+ "&Photo=" +file;
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var message = xmlhttp.responseText;
                document.getElementById("siignup-response").style.display="block";
                document.getElementById("siignup-response").innerHTML=message;
            }
        }
        xmlhttp.open("POST","CompleteSignup.php?"+data,true);
        xmlhttp.send();
    }
}
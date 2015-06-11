
function zabPass(){
	var email = document.getElementById("email").value;
	var ajax;
	/* if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                        ajax=new XMLHttpRequest();
                }
        else
                {// code for IE6, IE5
                        ajax=new ActiveXObject("Microsoft.XMLHTTP");
                }*/
	if(email == ""){
		document.getElementById("status").innerHTML = "Unesite svoju email adresu!";
	} else {
		document.getElementById("passbtn").style.display = "none";
		document.getElementById("status").innerHTML = 'Molimo sačekajte ...';
		 ajax= ajaxObj("POST", "zabpass.php");
		 
        ajax.onreadystatechange = function() {
			if (ajaxReturn(ajax)==true) {
                var odg = ajax.responseText;
				alert(ajax.responseText);
				
				if( odg == "ok"){
				document.getElementById("passform").innerHTML = '<p>Step 2. Provjerite svoj inbox !</p>';
				} else if (odg == "nema"){
				document.getElementById("status").innerHTML = "Ova email adresa ne postoji u bazi!";
				} else if(odg== "nije_uspjelo"){
					document.getElementById("status").innerHTML = "Mail nije uspjesno poslan";
				} else {
					document.getElementById("status").innerHTML = "Desila se neka nepoznata greška. Pokušajte ponovo.";
							document.getElementById("passbtn").style.display = "initial";
					}
	        
			}
        }
      ajax.send("email="+email);  
	}
	
//}

}

        document.getElementById("naslovna").addEventListener( "click", function(ev){
                openPage("Naslovna.html");
        }, false);

        document.getElementById("onama").addEventListener( "click", function(ev){
               openPage("onama.html");
        }, false);

        document.getElementById("aktivnosti").addEventListener( "click", function(ev){
                openPage("volonteri.html");
        }, false);
		
		  document.getElementById("partneri").addEventListener( "click", function(ev){
               openPage("partneri.html");
        }, false);
		  document.getElementById("ponuda").addEventListener( "click", function(ev){
               openPage("ponuda.html");
        }, false);
		  document.getElementById("kontakt").addEventListener( "click", function(ev){
                openPage("Kontakt.html");
        }, false);
			  document.getElementById("dodajArtikal").addEventListener( "click", function(ev){
                openPage("dodajartikal.html");
        }, false);
			  document.getElementById("obrisiArtikal").addEventListener( "click", function(ev){
                openPage("obrisiartikal.html");
        }, false);
		 document.getElementById("izmjeniArtikal").addEventListener( "click", function(ev){
                openPage("izmjeniartikal.html");
        }, false);
		
    function openPage(link){
            var ajax;
	if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
			ajax=new XMLHttpRequest();
		}
	else
		{// code for IE6, IE5
			ajax=new ActiveXObject("Microsoft.XMLHTTP");
		}
                ajax.onreadystatechange = function() {// Anonimna funkcija                 
                        if (ajax.readyState == 4 && ajax.status == 200)
                        {							
                                document.getElementById("sadrzaj").innerHTML = ajax.responseText;                               
                        }
                        if (ajax.readyState == 4 && ajax.status == 404)
                                document.getElementById("sadrzaj").innerHTML = "Greska: nepoznat URL";
                }
                ajax.open("POST", link, true);
                ajax.send();
        }
		
	function openPagePHP(link){
            var ajax;
	if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
			ajax=new XMLHttpRequest();
		}
	else
		{// code for IE6, IE5
			ajax=new ActiveXObject("Microsoft.XMLHTTP");
		}
                ajax.onreadystatechange = function() {// Anonimna funkcija                 
                        if (ajax.readyState == 4 && ajax.status == 200)
                        {							
                                document.getElementById("tijelo").innerHTML = ajax.responseText;                               
                        }
                        if (ajax.readyState == 4 && ajax.status == 404)
                                document.getElementById("tijelo").innerHTML = "Greska: nepoznat URL";
                }
                ajax.open("POST", link, true);
                ajax.send();
        }

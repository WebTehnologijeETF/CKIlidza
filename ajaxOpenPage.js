        document.getElementById("naslovna").addEventListener( "click", function(ev){
                openPage("Naslovna.html");
        }, false);
		
		document.getElementById("admin").addEventListener( "click", function(ev){
                openPage("admin.html");
        }, false);
			document.getElementById("logout").addEventListener( "click", function(ev){
                openPage("admin.html");
        }, false);
			document.getElementById("signup").addEventListener( "click", function(ev){
                openPage("admin.html");
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
                                document.getElementById("sadrzaj").innerHTML = ajax.responseText;                               
                        if (ajax.readyState == 4 && ajax.status == 404)
                                document.getElementById("sadrzaj").innerHTML = "Greska: nepoznat URL";
                }
                ajax.open("GET", link, true);
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
                                document.getElementById("sadrzaj").innerHTML = ajax.responseText;                               
                        if (ajax.readyState == 4 && ajax.status == 404)
                                document.getElementById("sadrzaj").innerHTML = "Greska: nepoznat URL";
                }
                ajax.open("GET", link, true);
                ajax.send();
        }
function openPagePHPK(id){
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
                      var s="tijelo"+id;                                
                        if (ajax.readyState == 4 && ajax.status == 200)                                                       
                                document.getElementById(s).innerHTML = ajax.responseText;                               
                        if (ajax.readyState == 4 && ajax.status == 404)
                                document.getElementById(s).innerHTML = "Greska: nepoznat URL";
                }
                ajax.open("GET", "komentar.php?novost="+id, true);
                ajax.send();
        }
		
		function openPagePHPKom(id){
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
                      var s="tijelo"+id;                                
                        if (ajax.readyState == 4 && ajax.status == 200)                                                       
                                document.getElementById(s).innerHTML = ajax.responseText;   
                                						
                        if (ajax.readyState == 4 && ajax.status == 404)
                                document.getElementById(s).innerHTML = "Greska: nepoznat URL";
							
							
                }
                ajax.open("GET", "komentari.php?novost="+id, true);
                ajax.send();
        }
		
		function openPagePHPDet(id){
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
                      var s="tijelo"+id;                                
                        if (ajax.readyState == 4 && ajax.status == 200)                                           
                                document.getElementById(s).innerHTML = ajax.responseText;   
                        if (ajax.readyState == 4 && ajax.status == 404)
                                document.getElementById(s).innerHTML = "Greska: nepoznat URL";			
                }
                ajax.open("GET", "detaljnije.php?novost="+id, true);
                ajax.send();
        }
		function sakrijKom(id){
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
                      var s="tijelo"+id;                                
                        if (ajax.readyState == 4 && ajax.status == 200)                                                     
                                document.getElementById(s).innerHTML="";   	
                }
                ajax.open("GET", "komentari.php?novost="+id, true);
                ajax.send();
        }
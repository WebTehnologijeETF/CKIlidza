function provjeriDodavanjeArtikla(){
var forma = document.getElementById('forma_dodaj');  

    //prva provjera da li su sva polja koja su required unesena
	if(forma.naziv.value.length == 0 || forma.opis.value.length== 0 || forma.slika.value.length== 0){
		alert("Polja koja su naznacena sa * moraju biti unesena");
		return false;
	}
   
//provjera da li je naziv dozvoljene duzine     
	 if(forma.naziv.value.length > 15 || forma.naziv.value.length < 3){		
		var errorElement = document.getElementById('nazivError');
        var x=document.getElementById('error_n');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Naziv mora biti duzine između 3 i 15 slova!";		
		forma.naziv.focus();
		return false;
  }
   else if(forma.naziv.value.length < 15 || forma.naziv.value.length > 3){
	  var errorElement = document.getElementById('nazivError');
        var x=document.getElementById('error_n');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";
	  
  }
	//provjera da li je opis dozvoljene duzine	
    if(forma.opis.value.length > 55 || forma.opis.value.length < 3){
		var errorElement = document.getElementById('opisError');
		 var x=document.getElementById('error_o');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Opis mora biti duzine između 3 i 55 slova!";
		forma.opis.focus();
		return false;
	}
	  else if(forma.opis.value.length < 15 || forma.opis.value.length > 3){
	  var errorElement = document.getElementById('opisError');
        var x=document.getElementById('error_o');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";
	  
  }
  
// provjera da li je resource slike ispravno unesen
var regexSlika =/\.(gif|jpg|jpeg|tiff|png)$/i;
	if(!regexSlika.test(forma['slika'].value)){		
		var errorElement = document.getElementById('slikaError');
		 var x=document.getElementById('error_s');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Niste pravilno unijeli path do slike!";		
		forma.slika.focus();
		return false;
  }
    else if(regexSlika.test(forma['slika'].value)){
	  var errorElement = document.getElementById('slikaError');
        var x=document.getElementById('error_s');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";
	  
  }
  var regexSlova= /^[a-zA-Z]+$/;
 	//provjera za kolicinu 
	 if(!regexSlova.test(forma['kolicina'].value) && Math.round(forma.kolicina.value) != forma.kolicina.value){		
		var errorElement = document.getElementById('kolicinaError');
        var x=document.getElementById('error_k');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Količina mora biti cio broj!";		
		forma.kolicina.focus();
		return false;
  }
   else if( Math.round(forma.kolicina.value) != forma.kolicina.value){		
		var errorElement = document.getElementById('kolicinaError');
        var x=document.getElementById('error_k');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Količina mora biti cio broj!";		
		forma.kolicina.focus();
		return false;
  }
   else if(Math.round(forma.kolicina.value) == forma.kolicina.value){
	  var errorElement = document.getElementById('kolicinaError');
        var x=document.getElementById('error_k');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";
	  
  }
	//provjera za dostupnost
    if(forma.dostupnost.value != 0 && forma.dostupnost.value != 1){
		var errorElement = document.getElementById('dostupnostError');
		 var x=document.getElementById('error_d');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Dostupnost mora biti 0 ili 1!";
		forma.dostupnost.focus();
		return false;
	}
	  else if(forma.dostupnost.value != 0 && forma.dostupnost.value != 1){
	  var errorElement = document.getElementById('dostupnostError');
        var x=document.getElementById('error_d');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";
	  
  }		
	return true;
}



function dodajArtikal(){
	if(provjeriDodavanjeArtikla()){
	var forma= document.getElementById("forma_dodaj");
	var naziv = forma.naziv.value;
    var opis = forma.opis.value;
	var slika = forma.slika.value;
	var kolicina = forma.kolicina.value;
	var dostupnost = forma.dostupnost.value;
	
	var index="16291";
	var proizvod={
		naziv: naziv,
		opis: opis,
		slika: slika,
		kolicina: kolicina,
		dostupnost: dostupnost
	};
	var proizvodJson=JSON.stringify(proizvod);
    var ajax=new XMLHttpRequest();
	if (window.XMLHttpRequest)	{// code for IE7+, Firefox, Chrome, Opera, Safari
			ajax=new XMLHttpRequest();
		}
	else	{// code for IE6, IE5
			ajax=new ActiveXObject("Microsoft.XMLHTTP");
		}
    ajax.onreadystatechange = function() {// Anonimna funkcija                                       
		if (ajax.readyState == 4 && ajax.status == 200 ){
				alert("Unijeli ste novi artikal!");    								
		} 					
	    if (ajax.readyState == 4 && ajax.status == 404){                                           
			document.getElementById("sadrzaj").innerHTML = "Greska: nepoznat URL";		
		} 		
   }
    ajax.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=", true);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("akcija="+"dodavanje" + "&brindexa="+"16291"+"&proizvod=" + proizvodJson);	
	}
	/*else if(!provjeriDodavanjeArtikla())
	{alert("validacija nije prosla");}*/
}

function izmjeniArtikal(){
	var forma= document.getElementById("forma_izmjeni");
	var id= forma.id_i.value;
	var naziv = forma.naziv_i.value;
    var opis = forma.opis_i.value;
	var slika = forma.slika_i.value;
	var kolicina = forma.kolicina_i.value;
	var dostupnost = forma.dostupnost_i.value;
	var index="16291";
	var proizvod={
		id:id,
		naziv:naziv,
		opis:opis,
		slika:slika,
		kolicina:kolicina,
		dostupnost:dostupnost
	};
	var proizvodJson=JSON.stringify(proizvod);
    var ajax;
	if (window.XMLHttpRequest)	{// code for IE7+, Firefox, Chrome, Opera, Safari
			ajax=new XMLHttpRequest();
		}
	else	{// code for IE6, IE5
			ajax=new ActiveXObject("Microsoft.XMLHTTP");
		}
    ajax.onreadystatechange = function() {// Anonimna funkcija
                                        
		if (ajax.readyState == 4 && ajax.status == 200 ){
				alert("Izmjenili ste artikal!");    								
		} 					
	    if (ajax.readyState == 4 && ajax.status == 404){                                           
			document.getElementById("sadrzaj").innerHTML = "Greska: nepoznat URL";		
		}  		
   }
   ajax.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16291", true);
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.send("akcija=promjena" + "&brindexa=16291&proizvod=" + JSON.stringify(proizvod));
}

function obrisiArtikal(){
	var forma= document.getElementById("forma_obrisi");
	var id = forma.id.value;
	var proizvod={
		id:id
	};
	var proizvodJson=JSON.stringify(proizvod);
 var ajax;
	if (window.XMLHttpRequest)	{// code for IE7+, Firefox, Chrome, Opera, Safari
			ajax=new XMLHttpRequest();
		}
	else	{// code for IE6, IE5
			ajax=new ActiveXObject("Microsoft.XMLHTTP");
		}
   ajax.onreadystatechange = function() {// Anonimna funkcija
                                        
		if (ajax.readyState == 4 && ajax.status == 200 ){
			alert("Obrisali ste proizvod ciji je ID"+""+id);						
		} 
						
	    if (ajax.readyState == 4 && ajax.status == 404){                                           
			document.getElementById("sadrzaj").innerHTML = "Greska: uneseni ID ne postoji";			
		}  
 		
   }
   ajax.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16291", true);
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.send("akcija=brisanje" + "&brindexa=16291&proizvod=" + JSON.stringify(proizvod));

}

function prikaziArtikle()
{
	var ajax;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
			ajax=new XMLHttpRequest();
		}
	else{// code for IE6, IE5
			ajax=new ActiveXObject("Microsoft.XMLHTTP");
		}
   ajax.onreadystatechange = function() {// Anonimna funkcija                                       
		if (ajax.readyState == 4 && ajax.status == 200 ){
			uzmiPodatke(ajax.responseText);						
		} 					
	    if (ajax.readyState == 4 && ajax.status == 404){                                           
			document.getElementById("sadrzaj").innerHTML = "Greska: nepoznat URL";			
		}  
 		
   }
    ajax.open("GET", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16291", true);
	ajax.send();
	
	function uzmiPodatke(odgovor){
		var niz= JSON.parse(odgovor);
		var i;
		var out = "<table id=podaciTabela>";
		out=out+"<tr><th>Opis:</th><th>Slika:</th></tr>";
		for(i=0; i < niz.length; i++){
			out= out + "<tr><td>" + niz[i].opis+"</td><td><a href='#'><img src=" + niz[i].slika + " alt=''></a></td></tr>";
		}
		out= out+ "</table";
		document.getElementById("ponudaTabela").innerHTML = out;		
	}
}
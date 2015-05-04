function provjeriFormu(){
	
var forma = document.getElementById('formica');  
	var regexSlova= /^[a-zA-Z]+$/;
	var regexTelefon=/^\(?(\d{3})\)?[]?(\d{3})[]?(\d{3})$/;
	var regexEmail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    //prva provjera da li su sva polja koja su required unesena
	if(forma.ime.value.length == 0 || forma.prezime.value.length== 0 || forma.email.value.length== 0 || forma.telefon.value.length==0 ){
		alert("Polja koja su naznacena sa * moraju biti unesena");
		return false;
	}
    //regex provjera da li u imenu ima drugih znakova osim slova
	 if(!regexSlova.test(forma['ime'].value)){		
		var errorElement = document.getElementById('imeError');
        var x=document.getElementById('error1');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Ime smije sadržavati samo slova!";		
		forma.ime.focus();
		return false;
  }
  else if(regexSlova.test(forma['ime'].value)){
	  var errorElement = document.getElementById('imeError');
        var x=document.getElementById('error1');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";
	  
  }
//provjera da li je ime dozvoljene duzine     
	 if(forma.ime.value.length > 15 || forma.ime.value.length < 3){		
		var errorElement = document.getElementById('imeError');
        var x=document.getElementById('error1');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Ime mora biti duzine između 3 i 15 slova!";		
		forma.ime.focus();
		return false;
  }
   else if(forma.ime.value.length < 15 || forma.ime.value.length > 3){
	  var errorElement = document.getElementById('imeError');
        var x=document.getElementById('error1');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";
	  
  }
	//provjera da li je prezime dozvoljene duzine	
    if(forma.prezime.value.length > 15 || forma.prezime.value.length < 3){
		var errorElement = document.getElementById('prezimeError');
		 var x=document.getElementById('error2');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Prezime mora biti duzine između 3 i 15 slova!";
		forma.prezime.focus();
		return false;
	}
	  else if(forma.prezime.value.length < 15 || forma.prezime.value.length > 3){
	  var errorElement = document.getElementById('prezimeError');
        var x=document.getElementById('error2');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";
	  
  }
//regex provjera da li u prezimenu ima drugih znakova osim slova
	if(!regexSlova.test(forma['prezime'].value)){		
		var errorElement = document.getElementById('prezimeError');
		 var x=document.getElementById('error2');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Prezime smije sadržavati samo slova!";		
		forma.ime.focus();
		return false;
  }
    else if(regexSlova.test(forma['prezime'].value)){
	  var errorElement = document.getElementById('prezimeError');
        var x=document.getElementById('error2');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";
	  
  }
 
	//regex provjera da li je email ispravnog formata
	 if(!regexEmail.test(forma['email'].value)){
		var errorElement = document.getElementById('emailError');
		 var x=document.getElementById('error3');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Email nije ispravno unesen! Pratite example!";
		forma.email.focus();	
		return false;
	}
	  else if(regexEmail.test(forma['email'].value)){
	  var errorElement = document.getElementById('emailError');
        var x=document.getElementById('error3');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";
	  
  }
//regex provjera da li je telefon ispravnog formata
    if(!regexTelefon.test(forma['telefon'].value)){
		var errorElement = document.getElementById('telefonError');
		 var x=document.getElementById('error4');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Format broja je: (061)-123-456 ili 061-123-456 ili 061123456";
		forma.telefon.focus();
		return false;
	}
	else if(regexTelefon.test(forma['telefon'].value)){
	  var errorElement = document.getElementById('telefonError');
        var x=document.getElementById('error4');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";	  
  }
	
    else if(document.getElementById("opcinaError").value != "" || document.getElementById("mjestoError").value != "")
	{
		return false;
	}		
	return true;
}
/*
function ajaxValidacijaOpcina(val)
{
var forma = document.getElementById('formica');  
//ajax validacija za mjesto i opcinu
	var opcina = val;
    var mjesto = forma.mjesto.value;
		if(opcina.length == 0){
			document.getElementById("opcinaError").innerHTML = "Unesite općinu!";
					document.getElementById("error5").innerHTML="<img src='error.png' alt=''/>"; 
		}
		else if(opcina.length != 0){
			document.getElementById("opcinaError").innerHTML = "";
					document.getElementById("error5").innerHTML="<img src='' alt=''/>"; 
		}	
}
function ajaxValidacijaMjesto(val){
	var forma = document.getElementById('formica');  
//ajax validacija za mjesto i opcinu
	var opcina = forma.opcina.value;
    var mjesto =  val;
    if(mjesto.length==0){
			document.getElementById("mjestoError").innerHTML = "Unesite mjesto!";
					document.getElementById("error6").innerHTML="<img src='error.png' alt=''/>"; 
		}
		else if(mjesto.length != 0){
			document.getElementById("mjestoError").innerHTML = "";
					document.getElementById("error6").innerHTML="<img src='' alt=''/>"; 
		}
}*/
function ajaxValidacija(){
	var forma = document.getElementById('formica');  
//ajax validacija za mjesto i opcinu
	var opcina = forma.opcina.value;
    var mjesto =  forma.mjesto.value;
	
    if(opcina.length !=0 && mjesto.length !=0){
    var ajax;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
			ajax=new XMLHttpRequest();
		}
	else{// code for IE6, IE5
			ajax=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
	ajax.onreadystatechange = function() {// Anonimna funkcija                                      
		if (ajax.readyState == 4 && ajax.status == 200 ){
			var odgovor=JSON.parse(ajax.responseText);
				if(odgovor.greska=="Nepostojeća općina"){
					document.getElementById("opcina").focus();
			    	document.getElementById("opcinaError").innerHTML = "Nepostojeća općina";
					document.getElementById("error5").innerHTML="<img src='error.png' alt=''/>"; 						
				}
				else if(odgovor.greska=="Nepostojeće mjesto"){
					document.getElementById('mjesto').focus();
					document.getElementById("mjestoError").innerHTML = "Nepostojeće mjesto";
					document.getElementById("error6").innerHTML="<img src='error.png' alt=''/>";
				}
				else if(odgovor.greska=="Mjesto nije iz date općine"){
					document.getElementById("mjesto").focus();
					document.getElementById("mjestoError").innerHTML = "Mjesto nije iz date općine";
					document.getElementById("error6").innerHTML="<img src='error.png' alt=''/>";					
				}
			    else if(odgovor.ok=="Mjesto je iz date općine") {
				    document.getElementById("opcinaError").innerHTML = "";	
                    document.getElementById("mjestoError").innerHTML = "";
					document.getElementById("error6").innerHTML="<img src='' alt=''/>";	
					document.getElementById("error5").innerHTML="<img src='' alt=''/>";					
		        }				
		} 	
		 /*if (ajax.readyState == 4 && ajax.status == 404){                                           
			document.getElementById("sadrzaj").innerHTML="Greska: nepoznat URL";		
		}*/
	}
       ajax.open("GET","http://zamger.etf.unsa.ba/wt/mjesto_opcina.php?opcina=" + encodeURIComponent(opcina) + "&mjesto=" + encodeURIComponent(mjesto), true);                        
    ajax.send(); 
	}
	
}

function enableKomentar(){
	if(document.getElementById("da").checked){
	document.getElementById("komentar").disabled = false;
	document.getElementById("ne").checked=false;
	}
	else if(document.getElementById("ne").checked){
	document.getElementById("komentar").disabled = true
	}
}
/*function potvrda(){
	if( provjeriFormu()){
		alert("Uspješno ste poslali vaše podatke.Uskoro ćemo Vas kontaktirati o daljnoj suradnji.Lijep pozdrav,Senada Brkić-Šegalo");
	}
}*/
function provjeriDodavanjeArtikla(){
	
var forma = document.getElementById('forma_dodaj');  

    //prva provjera da li su sva polja koja su required unesena
	if(forma.naziv.value.length == 0 || forma.opis.value.length== 0 || forma.slika.value.length== 0){
		alert("Polja koja su naznacena sa * moraju biti unesena");
		return false;
	}
   
//provjera da li je naziv dozvoljene duzine     
	 if(forma.naziv.value.length > 15 || forma.ime.value.length < 3){		
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
		var errorElement = document.opis.getElementById('Error');
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
	if(forma.slika.value.length == 0){		
		var errorElement = document.getElementById('slikaError');
		 var x=document.getElementById('error_s');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Niste pravilno unijeli path do slike!";		
		forma.slika.focus();
		return false;
  }
    else if(forma.slika.value.length != 0){
	  var errorElement = document.getElementById('slikaError');
        var x=document.getElementById('error_s');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";
	  
  }
 	//provjera za kolicinu 
	 if(Math.round(forma.kolicina.value) != forma.kolicina.value){		
		var errorElement = document.getElementById('kolicinaError');
        var x=document.getElementById('error_K');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Količinamora biti cio broj!";		
		forma.kolicina.focus();
		return false;
  }
   else if(Math.round(forma.kolicina.value) == forma.kolicina.value){
	  var errorElement = document.getElementById('kolicinaError');
        var x=document.getElementById('error_K');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";
	  
  }
	//provjera za dostupnost
    if(forma.dostupnost.value != 0 && forma.dostupnost.value != 1){
		var errorElement = document.opis.getElementById('dostupnostError');
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
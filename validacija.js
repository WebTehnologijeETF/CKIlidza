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
	

/*	
  if(forma.komentar.value.length > 100 || forma.komentar.value.length < 3){
		var errorElement = document.getElementById('komentarError');
		 var x=document.getElementById('error5');	
        x.innerHTML="<img src='slike/error.png' alt=''/>";
		errorElement.innerHTML = "Komentar mora biti unesen";
		forma.komentar.focus();	
		return false;
	}
		else if(forma.komentar.value.length < 100 || forma.komentar.value.length > 3){
	  var errorElement = document.getElementById('komentarError');
        var x=document.getElementById('error5');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";	  
  }*/
 return true;

}

function enableKomentar()
{
	if(document.getElementById("da").checked){
	document.getElementById("komentar").disabled = false;
	document.getElementById("ne").checked=false;
	}
	else if(document.getElementById("ne").checked){
	document.getElementById("komentar").disabled = true
	}
}
function potvrda()
{
	if( provjeriFormu()){
		alert("Uspješno ste poslali vaše podatke.Uskoro ćemo Vas kontaktirati o daljnoj suradnji.Lijep pozdrav,Senada Brkić-Šegalo");
	}
}
//document.getElementById("formica").addEventListener("submit", provjeriFormu,false);

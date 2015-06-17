function provjeriFormu(){
	
var forma = document.getElementById('formica');
var errorElement;
var x;  
	var regexSlova= /^[a-zA-Z]+$/;                  
	var regexTelefon=/^\(?(\d{3})\)?[-]?(\d{3})[-]?(\d{3})$/;
	var regexEmail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    //prva provjera da li su sva polja koja su required unesena
	if(forma.ime.value.length == 0 || forma.prezime.value.length== 0 || forma.email.value.length== 0 || forma.telefon.value.length==0 ){
		errorElement = document.getElementById('errorsvi');
		errorElement.innerHTML = "Polja naznačena sa * moraju biti unesena!";		
		return false;
	}
	 else if(forma.ime.value.length != 0 && forma.prezime.value.length!= 0 && forma.email.value.length!= 0 && forma.telefon.value.length!=0){
	    errorElement = document.getElementById('errorsvi');
		errorElement.innerHTML = "";
	  
  }
    //regex provjera da li u imenu ima drugih znakova osim slova
	 if(!regexSlova.test(forma['ime'].value)){		
		errorElement = document.getElementById('imeError');
        x=document.getElementById('error1');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Ime smije sadržavati samo slova!";		
		forma.ime.focus();
		return false;
  }
  else if(regexSlova.test(forma['ime'].value)){
	    errorElement = document.getElementById('imeError');
        x=document.getElementById('error1');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";
	  
  }
//provjera da li je ime dozvoljene duzine     
	 if(forma.ime.value.length > 15 || forma.ime.value.length < 3){		
		errorElement = document.getElementById('imeError');
        x=document.getElementById('error1');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Ime mora biti duzine između 3 i 15 slova!";		
		forma.ime.focus();
		return false;
  }
   else if(forma.ime.value.length < 15 || forma.ime.value.length > 3){
	    errorElement = document.getElementById('imeError');
        x=document.getElementById('error1');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";
	  
  }
	//provjera da li je prezime dozvoljene duzine	
    if(forma.prezime.value.length > 15 || forma.prezime.value.length < 3){
		errorElement = document.getElementById('prezimeError');
	    x=document.getElementById('error2');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Prezime mora biti duzine između 3 i 15 slova!";
		forma.prezime.focus();
		return false;
	}
	  else if(forma.prezime.value.length < 15 || forma.prezime.value.length > 3){
	    errorElement = document.getElementById('prezimeError');
        x=document.getElementById('error2');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";
	  
  }
//regex provjera da li u prezimenu ima drugih znakova osim slova
	if(!regexSlova.test(forma['prezime'].value)){		
	    errorElement = document.getElementById('prezimeError');
		x=document.getElementById('error2');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Prezime smije sadržavati samo slova!";		
		forma.ime.focus();
		return false;
  }
    else if(regexSlova.test(forma['prezime'].value)){
	    errorElement = document.getElementById('prezimeError');
        x=document.getElementById('error2');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";
	  
  }
 
	//regex provjera da li je email ispravnog formata
	 if(!regexEmail.test(forma['email'].value)){
		errorElement = document.getElementById('emailError');
		x=document.getElementById('error3');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Email nije ispravno unesen! Pratite example!";
		forma.email.focus();	
		return false;
	}
	  else if(regexEmail.test(forma['email'].value)){
	    errorElement = document.getElementById('emailError');
        x=document.getElementById('error3');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";
	  
  }
//regex provjera da li je telefon ispravnog formata
    if(!regexTelefon.test(forma['telefon'].value)){
		errorElement = document.getElementById('telefonError');
		x=document.getElementById('error4');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Format broja je: (061)-123-456 ili 061-123-456 ili 061123456";
		forma.telefon.focus();
		return false;
	}
	else if(regexTelefon.test(forma['telefon'].value)){
	    errorElement = document.getElementById('telefonError');
        x=document.getElementById('error4');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";	  
  }
  
  //provjera da li je unesen komentar	
    if(forma.komentar.value.length > 200 || forma.komentar.value.length < 3){
		errorElement = document.getElementById('komentarError');
	    x=document.getElementById('error7');	
        x.innerHTML="<img src='error.png' alt=''/>";
		errorElement.innerHTML = "Komentar mora biti dužine između 3 i 200 karaktera!";
		forma.komentar.focus();
		return false;
	}
	  else if(forma.komentar.value.length < 200 || forma.komentar.value.length > 3){
	    errorElement = document.getElementById('komentarError');
        x=document.getElementById('error7');	
        x.innerHTML="<img src='' alt=''/>";
		errorElement.innerHTML = "";
	  
  }

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
		
/*function potvrda(){
	if(!provjeriFormu()){
		openPagePHP("prikazphp.php");
	}
	else{
		alert("Uspješno ste poslali vaše podatke.Uskoro ćemo Vas kontaktirati o daljnoj suradnji.Lijep pozdrav,Senada Brkić-Šegalo");
		openPagePHP("potvrdaphp.php");
	}
}*/

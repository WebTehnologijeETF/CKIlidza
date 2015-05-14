<?php
 session_start();
// definise varijable i stavlja na null
$ime = $prezime = $telefon = $email = $komentar = $radio=$mjesto= $opcina= "";
$valid=true;

function test_input($data) {
   $data = trim($data); //uklanja nepotrebne karaktere (prazna mjesta, tabovi, nove linije)
   $data = stripslashes($data);// uklanja \
   $data = htmlspecialchars($data); //pretvara specijalne znakove u HTML entitete
   return $data;
}
// definise varijable i postavlja ih na null
$imeError = $prezimeError  = $emailError  = $telefonError  =$komentarError  = $radioError  = "";
if ($_SERVER["REQUEST_METHOD"]=="POST") {
  if (empty($_POST["ime"])) {
    $imeError = "Ime mora biti duzine između 3 i 15 slova!";
	$valid=false;
  } else {
    $ime = test_input($_POST["ime"]);
    // da li iem sadrzi samo slova i prazna mjesta
    if (!preg_match("/^[a-zA-Z ]*$/",$ime)) 
      $imeError = "Ime smije sadržavati samo slova i prazna mjesta!"; 
  else $imeError = " ";
    }
  if (empty($_POST["prezime"])) {
    $prezimeError = "Ime mora biti duzine između 3 i 15 slova!";
	$valid=false;
  } else {
    $prezime = test_input($_POST["prezime"]);
	    // da li prezime sadrzi samo slova i prazna mjesta
    if (!preg_match("/^[a-zA-Z ]*$/",$prezime)) 
      $prezimeError = "Prezime smije sadržavati samo slova i prazna mjesta!";
  else $prezimeError = " ";
  }

  if (empty($_POST["email"])) {
    $emailError = "Molimo unesite email";
	$valid=false;
  }  else {
    $email = test_input($_POST["email"]);
    // format e-maila
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
      $emailError = "Email nije ispravno unesen! Pratite example!"; 
  else $emailError = " ";
  
  }

  if (empty($_POST["telefon"])) {
    $telefonError = "Molimo unesite broj telefona!";
	$valid=false;
  } else {
    $telefon = test_input($_POST["telefon"]);
	$telfonError = " ";
  }

  if (empty($_POST["komentar"])) {
    $komentarError = "Unesite komentar!";
	$valid=false;
  } else {
    $komentar = test_input($_POST["komentar"]);
	if($radio=="ne"){ $komentar='disabled'; $komentarError =" ";}
    else if($radio=="da") $komentar='Polje komentar je omoguceno, molimo unesite komentar!';
    	
  }

  if (empty($_POST["radio"])) {
    $radioError = "Odaberite da ili ne!";
	$valid=false;
  } else {
    $radio = test_input($_POST["radio"]);
	$radioError = " ";
  }
  $mjesto = test_input($_POST["mjesto"]);
$opcina = test_input($_POST["opcina"]);
}


$_SESSION['sime']=$ime;
$_SESSION['sprezime']=$prezime;
$_SESSION['semail']=$email;
$_SESSION['skomentar']=$komentar;
$_SESSION['stelefon']=$telefon;
$_SESSION['smjesto']=$mjesto;
$_SESSION['sopcina']=$opcina;
 

?>

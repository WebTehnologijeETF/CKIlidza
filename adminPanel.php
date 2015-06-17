<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="stil.css">
<title>Crveni križ općine Ilidža</title>
</head>
<div id="okvir">
<div id="logo">
<img src="slike/logo.png" alt="">
</div>
<div id="naslov">
<table style="float:right">
<tr> <td><a href="#" id="admin" onclick="openPagePHP('admin.php')" >Login</a></td>
<td><a href="#" id="logout" onclick="openPagePHP('odjava.php')">Logout</a></td>
<td><a href="#" id="signup" onclick="openPagePHP('signup.php')">Sign up</a></td>
 </tr>
 </table>
<h1 >Crveni križ općine Ilidža</h1>
</div>
<body>
<div id="meni">
<ul id="ul_meni">
     <li><a href="#" onmouseover="prikazi('m1')" onmouseout="sakrij()" id="naslovna" onclick="openPagePHP('novosti.php');">Novosti</a>
	 <div id="m1" onmouseover="otkrij()" onmouseout="sakrij()">
	 <a href="#">Nove aktivnosti</a>
	 <a href="#">Termini za PP</a>
	 <a href="#">Takmicenja iz PP</a>
	 </div>
	 </li>
     <li><a href="#"onmouseover="prikazi('m2')" onmouseout="sakrij()" id="onama" onclick="openPage('onama.html');"> O nama</a>
	 <div id="m2" onmouseover="otkrij()" onmouseout="sakrij()">
	 <a href="#">O pokretu</a>
	 <a href="#">O organizaciji</a>
	 <a href="#">Struktura CK</a>	
	 </div>
	 </li>
     <li><a href="#" onmouseover="prikazi('m3')" onmouseout="sakrij()" id="aktivnosti" onclick="openPage('volonteri.html');">Aktivnosti</a>
	  <div id="m3" onmouseover="otkrij()" onmouseout="sakrij()">
	 <a href="#">Prva pomoć</a>
	 <a href="#">Dobrovoljno darivanje krvi</a>
	 <a href="#">Socijalne djelatnosti</a>
	 <a href="#">Služba traženja</a>
	 <a href="#">Služba i spašavanje u nesrećama</a>
	 <a href="#">Edukacije</a>
	 </div>
	 </li>
     <li class="dropdown"><a href="#" id="partneri"onclick="openPage('partneri.html');">Partneri</a></li>
     <li class="dropdown"><a href="#" id="kontakt" onclick="openPage('Kontakt.html');">Kontakt</a></li>
</ul>
</div>
<div id="traka">
<div id="principi">
<div id="naslov_p"> Principi Crvenog križa:</div>
<ul>
     <li>Humanost</li>
     <li>Nepristrasnost</li>
     <li>Neutralnost</li>
     <li>Neovisnost</li>
     <li>Dobrovoljnost</li>
     <li>Jedinstvo</li>
     <li>Univerzalnost</li>
</ul>
</div>

<div id="kontakt_info">
<div id="naslov_k"> Kontakt:</div>
<pre id="kontakt1">
Adresa:  Jahijela Fincija 14.<br>
Telefon: 033/638-022<br>
Fax:     033/638-023<br>
E-mail:  ck_ilidza@hotmail.com<br>
</pre>
</div>
</div>

<div id="sadrzaj">
  <?php
   print '<div class ="podloga">';
  	 print '<div class ="sadrzaj">';
 session_start();
          $veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
          $veza->exec("set names utf8");
      //  $username="";
	   if (isset($_REQUEST['username'])) {
        
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $upit = $veza->prepare("SELECT * FROM korisnici WHERE username=? and password=?");
    $upit->execute(array($username,$password));

if($upit->rowCount()==0){
 print "<p>Prijava nije uspješna. Vi niste prijavljeni korisnik! Molimo Vas da se prijavite! </p>";
 	 print '<br><small><a href="#" onclick=openPagePHP("admin.php") style="float:right"><< Nazad</a></small>'; 
}
else{
    foreach($upit as $red) {
         
       $usern=$red['username'];
       $pass=$red['password'];
       if($usern==$username && $pass==$password){
         $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
	$_SESSION['start']=time();
	   }
	    else {
            echo "Molimo Vas unesite Vaš username i password ponovo!";
        }
	}

	}
    if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
        echo '<p>Prijavljeni ste kao '.$username.'</p>';
        }
   else {
		$pocetak_sesije=time();
		 $_SESSION['expire'] = $pocetak_sesije + (1 * 60);
	if ($pocetak_sesije > $_SESSION['expire']){
		session_destroy();
		print 'Vaša sesija je istekla. Molimo Vas da se prijavite ponovo!';
		}
		else{
     print '<p>Uspješno ste prijavljeni kao '.$_SESSION['username'].' :D</p>';
		}
   }
		if(isset($_SESSION['username']) && $_SESSION['username']=="sumka" && $_SESSION['password']=="sum123")
		{
		?>
	          
			  <div> <a href="novosti2.php" class="uredi" id="admin" onclick="openPagePHP('novosti2.php')" style="float:right">Novosti</a></div>
			  <div> <a href="komentari2.php" class="uredi" id="admin2" onclick="openPagePHP('komentari2.php')" style="float:right">Komentari</a></div>
	          <div> <a href="korisnici.php" class="uredi" id="admin3" onclick="openPagePHP('korisnici.php')" style="float:right">Korisnici</a></div>
			  
			  <?php
			 
		}
		else{
			 print '<p>Sada možete koristiti stranicu kao prijavljeni korisnik.</p>';
			 print '<br><small><a href="index.html" style="float:right""><< Nazad na početnu stranicu</a></small>';
			 
		}
		
		}
    print '</div>';
  print '</div>';
   print '</div>';?>
		 <?php include 'podnozje.html'?>
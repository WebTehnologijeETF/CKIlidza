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
<?php include 'validacijaphp.php'?>
<div class= "sadrzaj1">
<div id="podloga">	

<?php
$imeError = $prezimeError  = $emailError  = $telefonError  =$komentarError  = $radioError  = "";
$ime= $_SESSION['sime'];
$prezime= $_SESSION['sprezime'];
$email= $_SESSION['semail'];
$komentar= $_SESSION['skomentar'];
$telefon= $_SESSION['stelefon'];

echo "<h2>Provjerite da li ste ispravno popunili kontakt formu:</h2>";
echo "Ime: ";
echo $ime;
echo "<br>";
echo "Prezime: " ;
echo $prezime;
echo "<br>";
echo "E-mail: ";
echo $email;
echo "<br>";
echo "Telefon: ";
echo $telefon;
echo "<br>";
echo "Komentar: ";
echo $komentar;
echo "<br>";
?>	
<form action="mail.php" method="post">
<p class="potvrda">Da li ste sigurni da želite poslati ove podatke?</P>
<button type="submit" name="siguran" id="siguran" >Siguran sam</button> 
</form>

<p class="potvrda">Ako ste pogrešno popunili formu, možete ispod prepraviti unesene podatke!</p>
<form id="formica"  method="post" action="prikazphp.php" novalidate>
			<fieldset id = "okvir_kontakt">
				<p id="bold" >Kontakt forma:</p>
				<table id="tabela_kontakt" onsubmit=" return potvrda()">
				<tr>
				<td>Ime: *</td> <td><input class = "polje" type="text" name="ime" value="<?php echo $ime;?>" ></td> 
				<td id="error1"> </td><td id="imeError" class="red"><?php echo $imeError;?></td></tr>
				<tr>
				<td >Prezime: *</td> <td><input class = "polje" type="text" name="prezime" value="<?php echo $prezime;?>"></td> 
				<td id="error2"></td><td id="prezimeError" class="red"><?php echo $prezimeError;?></td></tr>
				<tr>
				<td >E-mail: *</td> <td><input class = "polje" type="email" name="email" value="<?php echo $email;?>"placeholder="mymail@example.com"></td> 
				<td id="error3"></td><td id="emailError" class="red"><?php echo $emailError;?></td></tr>
				<tr>
				<td >Telefon: *</td> <td><input class = "polje" type="tel" name="telefon" value="<?php echo $telefon;?>"placeholder="061-123-456"></td> 
				<td id="error4"></td><td id="telefonError" class="red"><?php echo $telefonError;?></td></tr>
				<tr>
				<td >Komentar:</td><td><input id="komentar" name="komentar" value="<?php echo $komentar;?>"></td>
				<td id="error7"></td><td id="komentarError" class="red"><?php echo $komentarError;?></td></tr>	
				</table>
				<p><input id = "posalji" class="dugme" type="submit" action="potvrdaphp.php" value="Izmijeni"></p>
				
			</fieldset> 
		</form>
</div>
</div>
</div>
<?php include 'podnozje.html'?>

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
      print '<div class= "sadrzaj1">';
	   
     $veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select id, naslov, autor, UNIX_TIMESTAMP(datum) datum2,tekst,slika from novosti order by datum desc");
      if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
       	 print '<br><small><a href="adminPanel.php?" style="float:right"  onclick="openPagePHP("adminPanel.php")"><< Nazad na admin panel</a></small>';   
         foreach ($rezultat as $novost) {
          print"<p>".$novost['naslov']."</p><small>".$novost['autor']."</small><br>";
     $komentari=$veza->query("SELECT COUNT(*) FROM komentari WHERE novosti=".$novost['id']);
             $kom = $komentari->fetchColumn();
                
                
       $id=$novost['id'];
           if($kom == 0) print '<small><a href="#"onclick="openPagePHPK('.$novost['id'].')">Nema komentara</a></small>';
         else print'<small><a href="#"onclick="openPagePHPK('.$novost['id'].')">'.$kom.'komentara</a></small>';
        
        print"  <div id='tijelo".$id."'>
                <br>
        
       <?php include 'komentar.php'?>
                        </div>";
                 }
				 print'</div>';
				  print'</div>';
         ?>
<?php include 'podnozje.html'?>
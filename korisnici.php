<?php include 'zaglavlje.html'?>
     <?php
	  print '<div class= "sadrzaj1" id="tijelo">';
	   
     $veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select id, username,password from korisnici");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 print '<br><small><a href="adminPanel.php?" style="float:right"  onclick="openPagePHP("adminPanel.php")"><< Nazad na admin panel</a></small>  
    <br><p>Korisnici:</p>';
	 print'<table>';
         foreach ($rezultat as $korisnik) { 
          print'<tr><td>'.$korisnik['username'].'&nbsp&nbsp'.$korisnik['id'].'</td>
			  <td> <a href="obrisiKorisnika.php?korisnik='.$korisnik['id'].'" class="mini" style="float:right">Obriši</a></td>
	         <td><a href="izmjenaK.php?korisnik='.$korisnik['id'].'" class="mini" style="float:right">Izmjeni</a></td></tr>';
        
        }
		print '</table>
		   <br><br>
				<div class="komentar1">
				<form id="formica"  method="post" action="dodajKorisnika.php" novalidate>
				<p id="bold" >Dodajte korisnika:</p>
				<table id="tabela_kontakt">
				<tr><td>Username: </td> <td><input class = "polje" type="text" name="username" ></td></tr>
				<tr><td >Password: </td> <td><input class = "polje" type="password" name="password"></td> </tr>
				<tr><td >E-mail: </td> <td><input class = "polje" type="email" name="email"></td> </tr>
				<tr><td><input class="komentarisi" type="submit" value="Dodaj"></td></tr>
				</table>
		
		</form>
 </div>'; ?>
<?php include 'podnozje.html'?>
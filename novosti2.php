<?php include 'zaglavlje.html'?>
     <?php
	  print '<div class= "sadrzaj1" id="tijelo">';
	   
     $veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select id, naslov,autor,UNIX_TIMESTAMP(datum)datum2, tekst, slika from novosti order by datum desc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 print '<br><small><a href="adminPanel.php?" style="float:right"  onclick="openPagePHP("adminPanel.php")"><< Nazad na admin panel</a></small>';   
        
	 print'<table>';
         foreach ($rezultat as $novosti) {
			 
          print'<tr><td>'.$novosti['naslov'].'&nbsp&nbsp'.$novosti['id'].'</td>
			  <td> <a href="obrisiNovost.php?novosti='.$novosti['id'].'" class="mini" style="float:right">Obriši</a></td>
	         <td><a href="izmjena.php?novosti='.$novosti['id'].'" class="mini" style="float:right">Izmjeni</a></td></tr>';
        
        }
		print '</table>'; 
		?>
		   <br><br>
				<div class="komentar1">
				<form id="formica"  method="post" action="dodajNovost.php" novalidate>
				<p id="bold" >Dodajte novost:</p>
				<table id="tabela_kontakt">
				<tr><td>Naziv: </td> <td><input class = "polje" type="text" name="naziv" ></td></tr>
				<tr><td >Autor: </td> <td><input class = "polje" type="email" name="autor"></td> </tr>
				<tr><td >Slika: </td> <td><input class = "polje" type="text" name="slika"></td> </tr>
				<tr><td >Text:</td><td><textarea id="komentar" name="text" ></textarea></td></tr>	
				<tr><td><input class="komentarisi" type="submit" value="Dodaj"></td></tr>
				</table>
		
		</form>
<?php
 print '</div>'; ?>
 
<?php include 'podnozje.html'?>
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
         foreach ($rezultat as $novosti) {
			 
          print'<p>'.$novosti['naslov'].'&nbsp&nbspid'.$novosti['id'].'</p>
		      
			  <div> <a href="obrisiNovost.php?novosti='.$novosti['id'].'" class="mini" style="float:right">Obriši</a></div>
	          <div> <a href="#" class="mini"  onclick="openPagePHP("izmjeniNovost.php")" style="float:right">Izmjeni</a></div>';
        
        }?>
		   <br><br>
				<div class="komentar1">
				<form id="formica"  method="post" action="dodajNovost.php" novalidate>
				<p id="bold" >Dodajte novost:</p>
				<table id="tabela_kontakt">
				<tr><td>Naziv: </td> <td><input class = "polje" type="text" name="naziv" ></td></tr>
				<tr><td >Autor: </td> <td><input class = "polje" type="email" name="autor"></td> </tr>
				<tr><td >Slika: </td> <td><input class = "polje" type="email" name="slika"></td> </tr>
				<tr><td >Text:</td><td><textarea id="komentar" name="text" ></textarea></td></tr>	
				<tr><td><input class="komentarisi" type="submit" value="Dodaj"></td></tr>
				</table>
		
		</form>
<?php
 print '</div>'; ?>
 
<?php include 'podnozje.html'?>
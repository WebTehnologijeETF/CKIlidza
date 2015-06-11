<?php include 'zaglavlje.html'?>
  <?php
  print '<div class= "sadrzaj" id="tijelo">';

 $kor = intval($_GET['korisnik']);
         //$vijesti = $autor = $tekst = " ";
         $veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");
	 $sql = "DELETE FROM korisnici WHERE id=$kor";
	if($veza->exec($sql)) 
        {
           echo $poruka = "Obrisali ste korisnika.";
		 print '<br><small><a href="korisnici.php?" style="float:right"  onclick="openPagePHP("korisnici.php")"><< Nazad</a></small>';    
         }

 print '</div>'; ?>
 
<?php include 'podnozje.html'?>
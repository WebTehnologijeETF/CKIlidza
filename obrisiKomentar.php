<?php include 'zaglavlje.html'?>
  <?php
  print '<div class= "sadrzaj" id="tijelo">';

 $kom = intval($_GET['komentar']);
         //$vijesti = $autor = $tekst = " ";
         $veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");
	 $sql = "DELETE FROM komentari WHERE id=$kom";
	if($veza->exec($sql)) 
        {
           echo $poruka = "Obrisali ste komentar.";
		 print '<br><small><a href="komentari2.php?" style="float:right"  onclick="openPagePHP("komentari2.php")"><< Nazad</a></small>';    
         }

 print '</div>'; ?>
 
<?php include 'podnozje.html'?>
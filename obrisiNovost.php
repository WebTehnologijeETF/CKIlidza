<?php include 'zaglavlje.html'?>
  <?php
  print '<div class= "sadrzaj" id="tijelo">';

 $nov = intval($_GET['novosti']);
         //$vijesti = $autor = $tekst = " ";
         $veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");
	 $sql = "DELETE FROM novosti WHERE id=$nov";
	if($veza->exec($sql)) 
        {
           echo $poruka = "Obrisali ste novost.";
		 print '<br><small><a href="novosti2.php?" style="float:right"  onclick="openPagePHP("novosti2.php")"><< Nazad</a></small>';    
         }

 print '</div>'; ?>
 
<?php include 'podnozje.html'?>
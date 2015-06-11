
<?php
     $veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");
	 $novosti = intval($_GET['novost']); // make sure its only an id (SQL Incjection problems)
    
  $rezultat = $veza->query("select id, naslov, tekst, UNIX_TIMESTAMP(datum) datum2,slika, autor from novosti where id=$novosti");
	 //print '<div class= "sadrzaj" id="tijelo">';
       foreach ($rezultat as $det){
          print'<p class="tekst1">'.$det['tekst'].'</p>';
	   }
	//	print '</div>';
        

?>
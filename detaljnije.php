<?php include 'zaglavlje.html'?>
<?php
     $veza = new PDO("mysql:dbname=baza_wt_projekat; host=127.6.39.130; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");
	 $novosti = intval($_GET['novost']); // make sure its only an id (SQL Incjection problems)
    
  $rezultat = $veza->query("select id, naslov, tekst, UNIX_TIMESTAMP(datum) datum2,slika, autor from novosti where id=$novosti");
	 print '<div class= "sadrzaj" id="tijelo">';
       foreach ($rezultat as $det){
          print'<p class ="naslovN">'.$det['naslov'].'<p class = "autor">'.$det['autor']."&nbsp&nbsp&nbsp".date("d.m.Y.(h:i)", $det['datum2']).'</p><p class="slika"><img src="'.$det['slika'].'"alt=""></p><p>'.$det['tekst'].'</p>';
	   }
		print '</div>';
        

?>
<?php include 'podnozje.html'?>
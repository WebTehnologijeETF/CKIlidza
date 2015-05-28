
     <?php
     $veza = new PDO("mysql:dbname=baza_wt_projekat; host=127.5.44.130:3306; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select id, naslov,autor,UNIX_TIMESTAMP(datum)datum2, tekst, slika from novosti order by datum desc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 print '<div class= "sadrzaj" id="tijelo">';
         foreach ($rezultat as $novosti) {
			 print ' <div class ="novost">';
			 $string=$novosti['tekst'];
			 if (strlen($string) > 300) {
              $trimstring = substr($string, 0, 300).' <br><a href="detaljnije.php?novost='.$novosti['id'].'" onclick="openPagePHP("detaljnije.php")">Detaljnije...</a>';
            } else {
             $trimstring = $string;
          }
          print'<p class ="naslovN">'.$novosti['naslov'].'<p class = "autor">'.$novosti['autor']."&nbsp&nbsp&nbsp".date("d.m.Y.(h:i)", $novosti['datum2']).'</p><p class="slika"><img src="'.$novosti['slika'].'"alt=""></p><p class = "tekst">'.$trimstring.'</p>';
         $komentari=$veza->query("SELECT COUNT(*) FROM komentari WHERE novosti=".$novosti['id']);
           $kom = $komentari->fetchColumn();
           if($kom == 0) print '<br><small><a href="komentari.php?novosti='.$novosti['id'].'" style="float:right"  onclick="openPagePHP("komentari.php")">Nema komentara</a></small>';
         else print'<br><small><a href="komentari.php?novosti='.$novosti['id'].'" style="float:right"  onclick="openPagePHP("komentari.php")">'.$kom.' komentara</a></small>';
		print '</div>';
        }
		print '</div>';
         ?>


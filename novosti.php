
     <?php
	   print '<div class= "sadrzaj">';
     $veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select id, naslov,autor,UNIX_TIMESTAMP(datum)datum2, tekst, slika from novosti order by datum desc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	
         foreach ($rezultat as $novosti) {
			  $string=$novosti['tekst'];
			  if (strlen($string) > 300) {
              $trimstring = substr($string, 0, 300).' <br><a href="#" onclick="openPagePHPDet('.$novosti['id'].')" id="det">Detaljnije...</a>';
            } else {
             $trimstring = $string;
          }
		      $slika=$novosti['slika'];
			   if($slika==""){
			 print '<div class ="novost">
		  <p class ="naslovN">'.$novosti['naslov'].'</p><p class ="autor">'.$novosti['autor'].'&nbsp&nbsp&nbsp'.date("d.m.Y.(h:i)", $novosti['datum2']).'</p><p class="slika"><img src="slike/noimage.png" alt=""></p><p class="tekst" id="tekstic">'.$trimstring.'</p>';
			  } else if($slika!=""){
				   print '<div class ="novost">
		  <p class ="naslovN">'.$novosti['naslov'].'</p><p class ="autor">'.$novosti['autor'].'&nbsp&nbsp&nbsp'.date("d.m.Y.(h:i)", $novosti['datum2']).'</p><p class="slika"><img src='.$slika.' alt=""></p><p class="tekst" id="tekstic">'.$trimstring.'</p>';			 
			  }
			$komentari=$veza->query("SELECT COUNT(*) FROM komentari WHERE novosti=".$novosti['id']);
           $kom = $komentari->fetchColumn();
           if($kom == 0) print '<table style="float:right"><tr><td><a href="#" onclick="openPagePHPKom('.$novosti['id'].')">Dodaj komentar</a></td>';
         else print'<table style="float:right"><tr><td>'.$kom.' komentara</td><td><a href="#" onclick="openPagePHPKom('.$novosti['id'].')">Prikaži komentare</a></td>';
		 print'<td><a id="sakrij" href="#" onclick="sakrijKom('.$novosti['id'].')">Sakrij</a></td></tr>
		                <br><br><br>
	   <tr><div id="kom'.$novosti['id'].'">
       <?php include "komentari.php"?>
	   <?php include "detaljnije.php"?>
                      
	   </div>
	   </tr>
	    </table>
       </div>';
        }
	
	print'</div>';
         ?>


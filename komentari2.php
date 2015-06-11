<?php include 'zaglavlje.html'?>
     <?php
      print '<div class= "sadrzaj1" id="tijelo">';
	   
     $veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select id, naslov, autor, UNIX_TIMESTAMP(datum) datum2,tekst,slika from novosti order by datum desc");
      if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
       	 print '<br><small><a href="adminPanel.php?" style="float:right"  onclick="openPagePHP("adminPanel.php")"><< Nazad na admin panel</a></small>';   
         foreach ($rezultat as $novost) {
          print"<p>".$novost['naslov']."</p><small>".$novost['autor']."</small><br>";
     $komentari=$veza->query("SELECT COUNT(*) FROM komentari WHERE novosti=".$novost['id']);
             $kom = $komentari->fetchColumn();
                
                
       $id=$novost['id'];
           if($kom == 0) print '<small><a href="#"onclick="openPagePHPK('.$novost['id'].')">Nema komentara</a></small>';
         else print'<small><a href="#"onclick="openPagePHPK('.$novost['id'].')">'.$kom.'komentara</a></small>';
        
        print"  <div id='tijelo".$id."'>
                <br>
        
       <?php include 'komentar.php'?>
                        </div>";
                 }
				 print'</div>';
         ?>
<?php include 'podnozje.html'?>
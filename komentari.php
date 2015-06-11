
     <?php
     $veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");
	 $nov = intval($_GET['novost']); // make sure its only an id (SQL Incjection problems)
  $komentari=$veza->query("SELECT tekst, novosti, autor,UNIX_TIMESTAMP(datum) datum2 , email FROM komentari WHERE novosti=$nov order by datum desc");
   
   print '<div class= "sadrzaj">';
  // $to='sbotulja1@etf.unsa.ba';
         foreach ($komentari as $kom) {
			 if($kom['email']!=null){
		   print"<div class=komentar>"."<p><strong>"."<a href='mailto:".$kom['email']."?body=".$kom['tekst']."'>".$kom['autor']."</a></strong>&nbsp&nbsp&nbsp<small>".$kom['email']."</small></p><small>".date('d.m.Y. (h:i)', $kom['datum2'])."</small><p>".$kom['tekst']."</p></div>";    
			 }
			 else 
				  print'<div class="komentar"><p><strong>'.$kom['autor'].'</strong>&nbsp&nbsp&nbsp<small>'.$kom['email'].'</small></p><small>'.date("d.m.Y. (h:i)", $kom['datum2']).'</small><p>'.$kom['tekst'].'</p></div>';    
		}
		 
	   ?>
	            <br><br>
				<div class="komentar1">
				<form id="formica"  method="post" action="dodajKomentar.php" novalidate>
				<p id="bold" >Ostavite vaš komentar:</p>
				<table id="tabela_kontakt">
				<tr><td>Nick: </td> <td><input class = "polje" type="text" name="nick" ></td></tr>
				<tr><td >E-mail: </td> <td><input class = "polje" type="email" name="email" placeholder="mymail@example.com"></td> </tr>
				<tr><td >Komentar:</td><td><textarea id="komentar" name="komentar" ></textarea></td></tr>	
				<tr><td><input class="komentarisi" type="submit" value="Ostavi komentar"></td></tr>
				<tr hidden><td><input class = "polje" type="text" name="id" value="<?php echo htmlentities($nov) ?>" type=hidden></td><tr>
				</table>
		
		</form>
		</div>


 
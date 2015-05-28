<?php include 'zaglavlje.html'?>
     <?php
     $veza = new PDO("mysql:dbname=baza_wt_projekat; host=27.5.44.130:3306 ; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");
	 $nov = intval($_GET['novosti']); // make sure its only an id (SQL Incjection problems)
  $komentari=$veza->query("SELECT tekst, novosti, autor,UNIX_TIMESTAMP(datum) datum2 , email FROM komentari WHERE novosti=$nov");
   
   print '<div class= "sadrzaj" id="tijelo">';
  // $to='sbotulja1@etf.unsa.ba';
         foreach ($komentari as $kom) {
		   print'<div class="komentar"><p><strong>'.$kom['autor'].'</strong>&nbsp&nbsp&nbsp<small>'.$kom['email'].'</small></p><small>'.date("d.m.Y. (h:i)", $kom['datum2']).'</small><p>'.$kom['tekst'].'</p></div>';    
		}
		 
	   ?>
	            <br><br>
				<div class="komentar1">
				<form id="formica"  method="post" action="dodajKomentar.php" novalidate>
				<p id="bold" >Ostavite vaš komentar:</p>
				<table id="tabela_kontakt">
				<tr><td>Nick: </td> <td><input class = "polje" type="text" name="nick" ></td></tr>
				<td id="error11"> </td><td id="nickError" class="red"></td></tr>
				<tr><td >E-mail: </td> <td><input class = "polje" type="email" name="email" placeholder="mymail@example.com"></td> </tr>
				<td id="error12"> </td><td id="emailError" class="red"></td></tr>
				<tr><td >Komentar:</td><td><textarea id="komentar" name="komentar" ></textarea></td></tr>	
				<td id="error13"> </td><td id="komentarError" class="red"></td></tr>
				<tr><td><input class="komentarisi" type="submit" value="Ostavi komentar"></td></tr>
				<tr hidden><td><input class = "polje" type="text" name="id" value="<?php echo htmlentities($nov) ?>" type=hidden></td><tr>
				</table>
		
		</form>
		</div>
<?php
 print '</div>'; ?>
 
<?php include 'podnozje.html'?>
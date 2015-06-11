 <?php include 'zaglavlje.html'?>
  <?php
  print '<div class= "sadrzaj" id="tijelo">';

 $nov = intval($_GET['novosti']);
         //$vijesti = $autor = $tekst = " ";
         $veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");
	 $query =  $veza->query("SELECT * FROM novosti WHERE id=$nov");
	 $rez=$query->fetch(PDO::FETCH_BOTH);
	 $naziv=$rez['naslov'];
	 $autor=$rez['autor'];
	 $datum=$rez[3];
     $tekst=$rez[4];
     $slika=$rez['slika'];
?>
 <br><br>
				<div class="komentar1">
				<form id="formica"  method="post" action="izmjeniNovost.php" novalidate>
				<p id="bold" >Izmjenite novost:</p>
				<table id="tabela_kontakt">
				<tr><td>Naziv: </td> <td><input class = "polje" type="text" name="naziv" value="<?php echo $naziv;?>" ></td></tr>
				<tr><td >Autor: </td> <td><input class = "polje" type="text" name="autor" value="<?php echo $autor;?>"></td> </tr>
				<tr><td >Slika: </td> <td><input class = "polje" type="text" name="slika"value="<?php echo $slika;?>"></td> </tr>
				<tr><td >Text:</td><td><input id="komentar" name="text" value="<?php echo $tekst;?>"></td></tr>	
				<tr hidden><td><input class = "polje" type="text" name="id" value="<?php echo htmlentities($nov) ?>" type=hidden></td><tr>
				<tr><td><input class="komentarisi" type="submit" value="Izmjeni"></td></tr>
				</table>
		
		</form>
		<?php
		print'</div>';
         ?>
<?php include 'podnozje.html'?>
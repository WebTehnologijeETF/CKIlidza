 <?php include 'zaglavlje.html'?>
  <?php
    print '<div class= "podloga">';
  print '<div class= "sadrzaj">';

 $kor = intval($_GET['korisnik']);
         //$vijesti = $autor = $tekst = " ";
         $veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");
	 $query =  $veza->query("SELECT * FROM korisnici WHERE id=$kor");
	 $rez=$query->fetch(PDO::FETCH_BOTH);
	 $username=$rez['username'];
	 $password=$rez['password'];
	
?>
 <br><br>
				<div class="komentar1">
				<form id="formica"  method="post" action="izmjeniKorisnika.php" novalidate>
				<p id="bold" >Izmjenite korisnika:</p>
				<table id="tabela_kontakt">
				<tr><td>Username: </td> <td><input class = "polje" type="text" name="username" value="<?php echo $username;?>" ></td></tr>
				<tr><td >Password: </td> <td><input class = "polje" type="password" name="password" value="<?php echo $password;?>"></td> </tr>
				<tr hidden><td><input class = "polje" type="text" name="id" value="<?php echo htmlentities($kor) ?>" type=hidden></td><tr>
				<tr><td><input class="komentarisi" type="submit" value="Izmjeni"></td></tr>
				</table>
		
		</form>
		<?php
		print'</div>';
		print'</div>';
         ?>
<?php include 'podnozje.html'?>
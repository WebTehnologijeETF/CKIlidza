<?php include 'validacijaphp.php'?>
<?php include 'zaglavlje.html'?>
<div class= "sadrzaj1">
<div id="podloga">	<!--onsubmit="return provjeriFormu()"--->	

<form id="formica"  method="post" action="potvrdaphp.php" novalidate>
			<fieldset id = "okvir_kontakt">
				<p id="bold" >Kontakt forma:</p>
				<table id="tabela_kontakt" onsubmit=" return potvrda()">
				<tr>
				<td>Ime: *</td> <td><input class = "polje" type="text" name="ime" value="<?php echo $ime;?>" ></td> 
				<td id="error1"> </td><td id="imeError" class="red"><?php echo $imeError;?></td></tr>
				<tr>
				<td >Prezime: *</td> <td><input class = "polje" type="text" name="prezime" value="<?php echo $prezime;?>"></td> 
				<td id="error2"></td><td id="prezimeError" class="red"><?php echo $prezimeError;?></td></tr>
				<tr>
				<td >E-mail: *</td> <td><input class = "polje" type="email" name="email" value="<?php echo $email;?>"placeholder="mymail@example.com"></td> 
				<td id="error3"></td><td id="emailError" class="red"><?php echo $emailError;?></td></tr>
				<tr>
				<td >Telefon: *</td> <td><input class = "polje" type="tel" name="telefon" value="<?php echo $telefon;?>"placeholder="061-123-456"></td> 
				<td id="error4"></td><td id="telefonError" class="red"><?php echo $telefonError;?></td></tr>
				<tr>
				<td >Komentar:</td><td><input id="komentar" name="komentar" value="<?php echo $komentar;?>"></td>
				<td id="error7"></td><td id="komentarError" class="red"><?php echo $komentarError;?></td></tr>	
				</table>
				<p><input id = "posalji" class="dugme" type="submit"value="Izmijeni"></p>
				
			</fieldset> 
		</form>
</div>
</div>
<?php include 'podnozje.html'?>
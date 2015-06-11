<?php
   ini_set("SMTP","webmail.etf.unsa.ba");
       ini_set("smtp_port","25");
       ini_set("sendmail_from", "sbotulja1@etf.unsa.ba");
	   
if(isset($_POST["email"])){
	$e =  $_POST['email'];
	$veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");
	  $rezultat = $veza->prepare("SELECT id, username FROM korisnici WHERE email='".$e."'");
      if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
    $rezultat->execute(array($id,$username));

if($rezultat->rowCount()>0){
		foreach($rezultat as $red) {
       $usern=$red['username'];
		$pass=$red['password'];
		}
		$eskrati= substr($e, 0, 4);
		$randbr = rand(10000,99999);
		$pomPass = "$eskrati$randbr";
		$hashPass = md5($pomPass);
		$sql = "UPDATE korisnici SET pom_pass='".$hashPass."' WHERE username='".$usern."' LIMIT 1";
	   // $query = mysqli_query($db_conx, $sql);
	
		$to = "sbotulja1@etf.unsa.ba";
		$from = "sbotulja1@etf.unsa.ba";
	    $headers = "From:".$from."\r\n";
        $headers .= "Reply-To:".$from."\r\n";
       // $headers .= "Return-Path:".$from."\r\n";
		//$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
		$subject ="CKIlidza privremeni password";
		$poruka = '<h2>Zdravo '.$usern.'</h2><p>Ovo je automatski mail sa stranice Crvenog Križa Ilidža. Ukoliko niste inicirali proces promjene passworda, molimo Vas zanematrite ovaj mail.</p><p>Ukoliko ste ipak inicirali ovaj proces, mi ćemo Vam generisati privremeni password sa kojim se možete prijaviti na stranicu. Kada budete prijavljeni na stranici, možete promijeniti password na onaj koji želite koristiti.</p><p> Kada potvrdite link ispod, Vaš password za prijavu će biti:<br /><b>'.$pomPass.'</b></p><p><a href="potvrdiPass.php?username='.$usern.'&pass='.$hashPass.'">Kliknite ovdje da biste potvrdili Vaš privremeno generisani password.</a></p><p>Ukoliko ne potvrdite ovaj link, nikakve izmjene neće biti izvršene nad Vašim korisničkim računom.</p>';
		if(mail($to,$subject,$poruka,$headers)) {
			echo "ok";
		} else {
			echo "nije_uspjelo";
		}
} else {
        echo "nema";
    }

    exit();
}
?>


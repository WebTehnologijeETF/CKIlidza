<?php include 'zaglavlje.html'?>
<?php
if(isset($_GET['username']) && isset($_GET['pass'])){
	$u = preg_replace('#[^a-z0-9]#i', '', $_GET['username']); 
	$pom= preg_replace('#[^a-z0-9]#i', '', $_GET['pass']); 
	if(strlen($pom) < 10){
		exit();
	}
	$veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");
	  $rezultat = $veza->query("select * from korisnici WHERE username='".$u."' AND pom_pass='".$pom."'");
	  $rez=$rezultat->fetch(PDO::FETCH_BOTH);
	  	
	 
      if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	
	
        $id=$rez['id'];
	
		$sql = "UPDATE korisnici SET password='".$pom."' WHERE id='".$id."'";
		$sql = "UPDATE korisnici SET pom_pass='' WHERE id='".$id."'";
		print "Uspješno ste generisali novi password, a on je '".$pom."'";
		
       	 
}
?>
<?php include 'podnozje.html'?>
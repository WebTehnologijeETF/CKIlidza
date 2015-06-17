 <?php include 'zaglavlje.html'?>
  <?php
  print '<div class= "sadrzaj">';

	 // $kor = intval($_GET['korisnik']);
     function test_input($data) {
         $data = trim($data); //uklanja nepotrebne karaktere (prazna mjesta, tabovi, nove linije)
         $data = stripslashes($data);// uklanja \
         $data = htmlspecialchars($data); //pretvara specijalne znakove u HTML entitete
         return $data;
}
         //$vijesti = $autor = $tekst = " ";
         $veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");
	 $veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$validno=true;
   if (!isset($_POST['username'])) {
	$validno= false;   }
  
   if (!isset($_POST['password'])) {
 $validno= false;    }

	
	if($validno==true){
 if(isset($_POST['username']) && isset($_POST['password']))
  { 
   
    $username = $_POST['username'];
    $password = $_POST['password'];
	  	 $id=$_POST['id'];
     $username = test_input($_POST["username"]);
	  $password = test_input($_POST["password"]);
	  $id = test_input($_POST["id"]);
	  

    $sql = "UPDATE korisnici SET username='".$username."', password='".$password."' WHERE id='".$id."'";
    $query = $veza->prepare($sql);
    $query->bindParam(':username', $username);
    $query->bindParam(':password', $password);
	$query->bindParam(':id', $id);
	if($query->execute()) 
        {
           echo $poruka = "Izmjenili ste korisnika!";
		 print '<br><small><a href="korisnici.php" style="float:right"  onclick=openPagePHP("korisnici.php")><< Nazad</a></small>';    
       
		    }		
}
	}
	else if($validno==false) {
		echo $poruka = "Uneseni podaci nisu validni. Molimo Vas unesite sva polja. Hvala.";
		 print '<br><small><a href="korisnici.php" style="float:right"  onclick=openPagePHP("korisnici.php")><< Nazad</a></small>';    
       
		 }
print'</div>';
         ?>
<?php include 'podnozje.html'?>


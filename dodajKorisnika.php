<?php include 'zaglavlje.html'?>
  <?php
  print '<div class= "sadrzaj" id="tijelo">';

	 function test_input($data) {
         $data = trim($data); //uklanja nepotrebne karaktere (prazna mjesta, tabovi, nove linije)
         $data = stripslashes($data);// uklanja \
         $data = htmlspecialchars($data); //pretvara specijalne znakove u HTML entitete
         return $data;
}
         //$vijesti = $autor = $tekst = " ";
         $veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");

	$validno=true;
   if (empty($_POST["username"])) {
	$validno= false;   }
  
   if (empty($_POST["password"])) {
 $validno= false;    }
 
  if (empty($_POST["email"])) {
 $validno= false;    }
   
	
	if($validno==true){
 if(isset($_POST['username']) && isset($_POST['password'])&& isset($_POST['email']))
  { 
   
    $username = $_POST['username'];
    $password = $_POST['password'];
	$email=$_POST['email'];
   
     $username = test_input($_POST["username"]);
     $password = test_input($_POST["password"]);
	 $email=test_input($_POST['email']);

    $sql = "INSERT INTO korisnici (id, username, password,email) VALUES ('',:username,:password,:email)";

    $query = $veza->prepare($sql);
    $query->bindParam(':username', $username);
    $query->bindParam(':password', $password);
	 $query->bindParam(':email', $email);
	if($query->execute()) 
        {
           echo $poruka = "Unijeli ste korisnika";
		 print '<br><small><a href="korisnici.php?" style="float:right"  onclick="openPagePHP("korisnici.php")"><< Nazad</a></small>';    
       
		    }
		
}
	}
	else if($validno==false) {
		echo $poruka = "Uneseni podaci nisu validni. Molimo Vas unesite sva polja. Hvala.";
		 print '<br><small><a href="korisnici.php?" style="float:right"  onclick="openPagePHP("korisnici.php")"><< Nazad</a></small>';    
       
		 }

 print '</div>'; ?>
 
<?php include 'podnozje.html'?>
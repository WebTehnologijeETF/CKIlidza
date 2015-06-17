<?php include 'zaglavlje.html'?>
  <?php
  print '<div class= "sadrzaj" id="tijelo">';
   if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
        echo '<p>Prijavljeni ste kao '.$username.'</p>';

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
   if (empty($_POST["naziv"])) {
	$validno= false;   }
  
   if (empty($_POST["autor"])) {
 $validno= false;    }
   
    if (empty($_POST["text"])) {
 $validno= false;    }
 
/*if(isset($_POST['slika']))
	 $slika=$_POST['slika'];
 else $slika="";*/
	
	if($validno==true){
 if(isset($_POST['naziv']) && isset($_POST['autor'])&& isset($_POST['text'])&& isset($_POST['slika']))
  { 
   
    $naziv = $_POST['naziv'];
    $autor = $_POST['autor'];
    $text = $_POST['text'];
	 $slika=$_POST['slika'];
     $naziv = test_input($_POST["naziv"]);
     $autor = test_input($_POST["autor"]);
     $text = test_input($_POST["text"]);
	  $slika = test_input($_POST["slika"]);
	

    $sql = "INSERT INTO novosti (id, naslov, autor, datum,tekst,slika) VALUES ('',:naziv,:autor,NOW(),:text,:slika)";

    $query = $veza->prepare($sql);
    $query->bindParam(':naziv', $naziv);
    $query->bindParam(':autor', $autor);
    $query->bindParam(':text', $text);
	$query->bindParam(':slika', $slika);
	if($query->execute()) 
        {
           echo $poruka = "Unijeli ste novost";
		 print '<br><small><a href="novosti2.php?" style="float:right"  onclick="openPagePHP("novosti2.php")"><< Nazad</a></small>';    
       
		    }
		
}
	}
	else if($validno==false) {
		echo $poruka = "Uneseni podaci nisu validni. Molimo Vas unesite sva polja, osim polja za sliku, koje nije obavezno. Hvala.";
		 print '<br><small><a href="novosti2.php?" style="float:right"  onclick="openPagePHP("novosti2.php")"><< Nazad</a></small>';    
       
		 }

 print '</div>'; ?>
 
<?php include 'podnozje.html'?>
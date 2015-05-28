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
   if (empty($_POST["nick"])) {
	$validno= false;   }
  
   if (empty($_POST["komentar"])) {
 $validno= false;    }
   
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)&& !empty($_POST["email"])) {
	$validno= false;}
	
	if($validno==true){
 if(isset($_POST['nick']) && $_POST['nick']!=="" && isset($_POST['komentar'])&& $_POST['komentar']!=="" && isset($_POST['id']))
  { 
   
    $nick = $_POST['nick'];
    $komentar = $_POST['komentar'];
    $email = $_POST['email'];
	 $id=$_POST['id'];
     $nick = test_input($_POST["nick"]);
     $komentar = test_input($_POST["komentar"]);
     $email = test_input($_POST["email"]);
	  $id = test_input($_POST["id"]);
	

    $sql = "INSERT INTO komentari (id, tekst, autor, email,datum,novosti) VALUES ('',:komentar,:nick,:email,NOW(),:id)";

    $query = $veza->prepare($sql);
    $query->bindParam(':komentar', $komentar);
    $query->bindParam(':nick', $nick);
    $query->bindParam(':email', $email);
	$query->bindParam(':id', $id);
	if($query->execute()) 
        {
           echo $poruka = "Ostavili ste komentar na željenu novost!";
		    print '<br><small><a href="komentari.php?novosti='.$id.'" style="float:right"  onclick="openPagePHP("komentari.php")"><< Nazad</a></small>';    
        }
		
}
	}
	else if($validno==false) {
		 $id = test_input($_POST["id"]);
		echo $poruka = "Uneseni podaci nisu validni. Molimo Vas unesite nick i komentar, a za pravilan unos emaila pratite example!!";
		 print '<br><small><a href="komentari.php?novosti='.$id.'" style="float:right"  onclick="openPagePHP("komentari.php")"><< Nazad</a></small>';    
	}
       print '</div>';  ?>
		 <?php include 'podnozje.html'?>
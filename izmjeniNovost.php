 <?php include 'zaglavlje.html'?>
  <?php
  print '<div class= "sadrzaj" id="tijelo">';

	  $nov = intval($_GET['novosti']);
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
   if (!isset($_POST['naziv'])) {
	$validno= false;   }
  
   if (!isset($_POST['autor'])) {
 $validno= false;    }
   
    if (!isset($_POST['text'])) {
 $validno= false;    }
 
/*if(isset($_POST['slika']))
	 $slika=$_POST['slika'];
 else $slika="";*/
	
	if($validno==true){
 if(isset($_POST['naziv']) && isset($_POST['autor'])&& isset($_POST['text'])&& isset($_POST['slika']) && isset($_POST['id']))
  { 
   
    $naziv = $_POST['naziv'];
    $autor = $_POST['autor'];
    $text = $_POST['text'];
	 $slika=$_POST['slika'];
	  	 $id=$_POST['id'];
     $naziv = test_input($_POST["naziv"]);
     $autor = test_input($_POST["autor"]);
     $text = test_input($_POST["text"]);
	  $slika = test_input($_POST["slika"]);
	  $id = test_input($_POST["id"]);
	  

    $sql = "UPDATE novosti SET naslov='".$naziv."', autor='".$autor."', datum=now(),tekst='".$text."',slika='".$slika."' WHERE id='".$id."'";
    $query = $veza->prepare($sql);
    $query->bindParam(':naziv', $naziv);
    $query->bindParam(':autor', $autor);
    $query->bindParam(':text', $text);
	$query->bindParam(':slika', $slika);
	$query->bindParam(':id', $id);
	if($query->execute()) 
        {
           echo $poruka = "Izmjenili ste novost";
		 print '<br><small><a href="novosti2.php?" style="float:right"  onclick="openPagePHP("novosti2.php")"><< Nazad</a></small>';    
       
		    }
		
}
	}
	else if($validno==false) {
		echo $poruka = "Uneseni podaci nisu validni. Molimo Vas unesite sva polja, osim polja za sliku, koje nije obavezno. Hvala.";
		 print '<br><small><a href="novosti2.php?" style="float:right"  onclick="openPagePHP("novosti2.php")"><< Nazad</a></small>';    
       
		 }
print'</div>';
         ?>
<?php include 'podnozje.html'?>


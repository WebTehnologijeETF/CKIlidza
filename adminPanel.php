<?php include 'zaglavlje.html'?>
  <?php
  print '<div class= "sadrzaj" id="tijelo">';
 session_start();
          $veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
          $veza->exec("set names utf8");

    if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
        echo '<p>Prijavljeni ste kao '.$username.'</p>';
		      
        
        }
    else if (isset($_REQUEST['username'])) {
        
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $upit = $veza->prepare("SELECT * FROM korisnici WHERE username=? and password=?");
    $upit->execute(array($username,$password));

if($upit->rowCount()==0){
 print "<p>Prijava nije uspješna. Vi niste administrator! </p>";
 	 print '<br><small><a href="index.html" style="float:right"  onclick="openPagePHP("index.html")"><< Nazad</a></small>'; 
}
else{
    foreach($upit as $red) {
         
       $usern=$red['username'];
       $pass=$red['password'];
       if($usern==$username && $pass==$password){
         $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
     print '<p>Uspješno ste prijavljeni kao '.$usern. ' :D</p>'?>
	          
			  <div> <a href="novosti2.php" class="uredi" id="admin" onclick="openPagePHP('novosti2.php')" style="float:right">Novosti</a></div>
			  <div> <a href="novosti2.php" class="uredi" id="admin" onclick="openPagePHP('novosti2.php')" style="float:right">Komentari</a></div>
	          <div> <a href="#" class="uredi" id="admin" onclick="openPagePHP('admin.php')" style="float:right">Korisnici</a></div>
			  
			  <?php
       }
         
   }
}
        }
session_destroy();
   print '</div>';  ?>
		 <?php include 'podnozje.html'?>
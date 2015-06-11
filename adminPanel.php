<?php include 'zaglavlje.html'?>
  <?php
  	 print '<div class ="sadrzaj" id="tijelo">';
 session_start();
          $veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
          $veza->exec("set names utf8");
      //  $username="";
	   if (isset($_REQUEST['username'])) {
        
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $upit = $veza->prepare("SELECT * FROM korisnici WHERE username=? and password=?");
    $upit->execute(array($username,$password));

if($upit->rowCount()==0){
 print "<p>Prijava nije uspješna. Vi niste prijavljeni korisnik! Molimo Vas da se prijavite! </p>";
 	 print '<br><small><a href="#" onclick=openPagePHP("admin.php") style="float:right"><< Nazad</a></small>'; 
}
else{
    foreach($upit as $red) {
         
       $usern=$red['username'];
       $pass=$red['password'];
       if($usern==$username && $pass==$password){
         $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
	$_SESSION['start']=time();
	   }
	    else {
            echo "Molimo Vas unesite Vaš username i password ponovo!";
        }
	}

	/* }
    if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
        echo '<p>Prijavljeni ste kao '.$username.'</p>';
        }
  /* else {
		$pocetak_sesije=time();
		 $_SESSION['expire'] = $pocetak_sesije + (1 * 60);
	if ($pocetak_sesije > $_SESSION['expire']){
		session_destroy();
		print 'Vaša sesija je istekla. Molimo Vas da se prijavite ponovo!';
		}
		else{*/
     print '<p>Uspješno ste prijavljeni kao '.$_SESSION['username'].' :D</p>';
		
		if(isset($_SESSION['username']) && $_SESSION['username']=="sumka" && $_SESSION['password']=="sum123")
		{
		?>
	          
			  <div> <a href="novosti2.php" class="uredi" id="admin" onclick="openPagePHP('novosti2.php')" style="float:right">Novosti</a></div>
			  <div> <a href="komentari2.php" class="uredi" id="admin2" onclick="openPagePHP('komentari2.php')" style="float:right">Komentari</a></div>
	          <div> <a href="korisnici.php" class="uredi" id="admin3" onclick="openPagePHP('korisnici.php')" style="float:right">Korisnici</a></div>
			  
			  <?php
			 
		}
		else{
			 print '<p>Sada možete koristiti stranicu kao prijavljeni korisnik.</p>';
			 print '<br><small><a href="index.html" style="float:right""><< Nazad na početnu stranicu</a></small>';
			 
		}
		
		}
  }
   print '</div>'?>
		 <?php include 'podnozje.html'?>
<?php

$idnovosti = $_GET['novost'];

 $veza = new PDO("mysql:dbname=baza_wt_projekat; host=localhost; charset=utf8", "sumeja", "sum11");
     $veza->exec("set names utf8");

$upit = $veza->prepare("SELECT * FROM komentari WHERE novosti=?");
$upit->bindValue(1, $idnovosti, PDO::PARAM_INT);
$upit->execute();
print'<table>';
foreach ($upit->fetchAll() as $komentar)
    print '<tr><td>'.$komentar["tekst"] . '</td><td>'. $komentar["autor"] . '</td><td>' . $komentar["email"] . '</td><td>'. $komentar["datum"] .'</td>
        <td><a href="obrisiKomentar.php?komentar='.$komentar['id'].'" class="mini" style="float:right">Obriši</a></td></tr>';
      print'</table>';  
                        
?>
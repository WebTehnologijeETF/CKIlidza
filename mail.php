<?php include 'zaglavlje.html'?>
<?php
$sendime = $sendprezime= $sendemail =$sendmessage =$from=$to=$subject=$body=$headers="";
ini_set("SMTP","webmail.etf.unsa.ba");
ini_set("smtp_port","25");
ini_set("sendmail_from", "sbotulja1@etf.unsa.ba");

session_start();
$sendime= $_SESSION['sime'];
$sendprezime= $_SESSION['sprezime'];
$from= $_SESSION['semail'];
$sendmessage= $_SESSION['skomentar'];
$sendtelefon= $_SESSION['stelefon'];

$to = 'sbotulja1@etf.unsa.ba'; 
$subject = 'Poruka sa kontakt forme';
$body = "Postetioc: $sendime $sendprezime je poslao svoj email kontakt: $from i telefon $sendtelefon. 
         Napisao je sljedeći komentar: $sendmessage";
$msg=wordwrap($body,70);

$headers = "From:".$from."\r\n";
$headers .= "Reply-To:".$from."\r\n";
$headers .= "Return-Path:".$from."\r\n";
$headers .= "CC: vljubovic@etf.unsa.ba\r\n";
$headers .= "BCC: sbotulja1@etf.unsa.ba\r\n";

$success = mail($to, $subject, $msg, $headers);
  if($success == true)
    {
       echo ("<br><br><br> &nbsp; &nbsp; &nbsp; ".$sendime.", hvala Vam što ste nas kontaktirali.");
  }
  else {
	  echo "Poruka nije uspješno poslala, molimo Vas pokušajte ponovo";
	  
  }
  ?>
<?php include 'podnozje.html'?>

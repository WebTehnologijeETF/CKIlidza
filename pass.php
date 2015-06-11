
<div class="sadrzaj">
<br><small><a href="#" style="float:right"  onclick=openPagePHP("index.html")> << Nazad</a></small>

  <form id="passform" action="zabpass.php" method="post">
   <h3>Generišite privremeni password:</h3>
    <div>Korak 1: Unesite Vašu email adresu</div>
    <input name="email" id="email" type="text" onfocus="('status').innerHTML='';" maxlength="88">
	<div id="odgovor" hidden></div>
    <br><br>
    <button id="passbtn" type="submit" >Generiši password</button> 
    <p id="status"></p>
  </form>
</div>
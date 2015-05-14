
<?php
	$novosti="";
	$txtNovosti = glob("novosti/*.txt");
	$sve=$datum=$autor=$naslov=$slika=$opis=$detalj=$linke="";
	$detaljnijeIspis="Detaljnije...";

	foreach ($txtNovosti as $novosti) 
	{
		$sve = file($novosti);
		$datum = trim($sve[0]);
		$autor = trim($sve[1]);
		$naslov = strtolower(trim($sve[2]));
		$naslov = ucfirst($naslov);
		$slika = trim($sve[3]);
		$opis = "";
		$detalj = "";
		$link = "";
		$i = 3;
		$j = count($sve);
		while ($j-1 != $i && trim($sve[$i]) != "--") 
		{
			$opis = $opis.$sve[$i];
			$i++;
		}
		if(trim($sve[$i]) == "--")
		{
			$i++;
			while ($i != count($sve)) 
			{
				$detalj = $detalj.$sve[$i];
				$i++;
			}
		}
		
		$novost ='
		        <div class ="novost">
                <p class = "naslovN"> '.$naslov.'</p>                
				<p class = "autor">'.$autor.'</p>
				<p class="datum">'.$datum.'</p>
				<p class="slika"> <img src='.$slika.' alt=""> </p>
				<p class = "tekst">'.$opis.'</p>
				<p class = "detaljnije">'.$detalj.'</p></div>';
		
		if ($detalj != "")
		{
			$link = '<a href="#" class="detaljnije">'.$detaljnijeIspis.'.</a>';
		}
		$novost = $novost.'<br>'.$link.'</div>';
		 	echo $novost;
	}
?>

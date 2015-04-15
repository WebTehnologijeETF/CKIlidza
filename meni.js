var vrijeme	= 100;
var skriveno = 0;
var podmeni	= 0;

// otvaranje podmenija
function prikazi(id){	
	otkrij(); //prvo varijablu da li je skriveno stavljamo na 0
	zatvoriPodmeni(); // zatvara podmeni ako je neki vec otvoren
	podmeni = document.getElementById(id); //postavljanje podmenija na visible
	podmeni.style.visibility = 'visible';
}
function zatvoriPodmeni(){
	if(podmeni) podmeni.style.visibility = 'hidden';
}
//zatvaranje prikazanog kada mis ode sa meni opcije 
function sakrij(){
	skriveno= window.setTimeout(zatvoriPodmeni, vrijeme);
}
// postavlja varijablu skriveno na 0 da bi se meni vidio
function otkrij(){
	if(skriveno){
		window.clearTimeout(skriveno);
		skriveno = null;
	}
}

// close layer when click-out
//document.onclick = mclose; 
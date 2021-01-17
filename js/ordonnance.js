function sendEmail() {
	var email = document.getElementById("champEmail").value;

	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
		var nom = document.getElementById("champNom").value;
		var tel = document.getElementById("champTel").value;
		var subject = nom+" - ordonnance";
		var body = "Ecrivez votre message ici%0A%0A"+nom+"%0A"+tel;
    	window.open('mailto:Julie.Larroque@etu.univ-paris1.fr?subject='+subject+'&body='+body);
  	} else {
    	alert("Votre mail est incorrect!");
    	return (false);
  	}
}

function reset() {
	document.getElementById("form").reset();
}

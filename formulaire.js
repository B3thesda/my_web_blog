var champs;
var textes;
var regexListe;

function start()
{
recuperation();
}

function verification()
{

	var nombreErreur = 0;

	for(var i = 0; i < champs.length - 1; i++)
	{
		var regex = new RegExp(regexListe[i]);
		
		if (!regex.test(champs[i].value))
		{
			visibiliter(champs[i].parentNode.children[1], "visible");
			nombreErreur++;
		}

		else
		{
			visibiliter(champs[i].parentNode.children[1], "invisible");
		}
}

		if (nombreErreur > 0)
		{
			return false;
		}

}

function supprimeTexte(element)
{
	if (element.value == contenue[element.id])
	{
		element.value = "";
	} 
}

function afficheTexte(element)
{
	if (element.value == "")
	{
		element.value = contenue[element.id];
	}
}

function visibiliter(element, visib)
{

if (visib == "visible")
{
element.style.display = "inline";
}

else
{
element.style.display = "none";
}

}

function recuperation()
{
contenue = ["Nom", "PrÃ©nom", "Email", "Entrer votre texte ici..."];
regexListe = ["^[A-Za-z]+$", "^[A-Za-z]+$", "^[A-Za-z1-9]+@[a-zA-Z]+.[a-zA-Z]{2}$"];
champs = document.getElementsByName("champs");

for(var i = 0; i < champs.length; i++)
{

champs[i].addEventListener("focus", function(e)
	{
		supprimeTexte(e.target);
	});

champs[i].addEventListener("blur", function(e)
{
	afficheTexte(e.target);
});

}
}
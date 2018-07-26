<?php
//destinataire
$destinataire='mcmxcii@live.de';
//$destinataire='mortagne@architriad.fr';

// Messages d'erreur du formulaire
$message_non_envoye="erreur envoi formulaire";
$message_erreur_formulaire = "Vous devez d'abord <a href=\"pContact.html\">envoyer le formulaire</a>.";
$message_formulaire_invalide = "L'adresse mail semble incorrecte, envoi impossible.";


// on teste si le formulaire a été soumis
if (!isset($_POST['envoi']))
{	// formulaire non envoyé
	echo '<p>'.$message_erreur_formulaire.'</p>'."\n";
}
else
{
	/*
	 * cette fonction sert à nettoyer et enregistrer un texte
	 */
	 function Rec($text)
	{
		$text = htmlspecialchars(trim($text), ENT_QUOTES);
		if (1 === get_magic_quotes_gpc())
		{
			$text = stripslashes($text);
		}
		
		$text = nl2br($text);
		return $text;
	};
	
	/*
	 * Cette fonction sert à vérifier la syntaxe d'un email
	 */
	function IsEmail($email)
	{
		$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
		return (($value === 0) || ($value === false)) ? false : true;
	}
	
	// formulaire envoyé, on récupère tous les champs.
	$Nom     = (isset($_POST['formNom']))     ? Rec($_POST['formNom'])     : '';
	$Prenom  = (isset($_POST['formPrenom']))  ? Rec($_POST['formPrenom'])     : '';
	$email   = (isset($_POST['formEmail']))   ? Rec($_POST['formEmail'])   : '';
	$telephone   = (isset($_POST['formTelephone']))   ? Rec($_POST['formTelephone'])   : '';
	$sujet   = (isset($_POST['formSujet']))   ? Rec($_POST['formSujet'])   : '';
	$objet   = 'demande renseignement via site internet'; 
	$formMessage = (isset($_POST['formMessage'])) ? Rec($_POST['formMessage']) : '';
	
	// On va vérifier les variables et l'email ...
	$email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré
 
	if ($email != '')
	{
		// les 4 variables sont remplies, on génère puis envoie le mail
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers  .= 'From:'.$nom.' '.$prenom.' <'.$email.'>' . "\r\n" .
					'Reply-To:'.$email. "\r\n" .
					'X-Mailer:PHP/'.phpversion();
		//if ($nom = '')
		//{
		//	$nom = "nomvide";
		//	};
		//	
	//	if ($message = '')
	//{
	//		$message ="messagevide";
	//	}
				
		
		
		// Remplacement de certains caractères spéciaux
		$message = 'nom : '.$Nom.'<br>
prenom : '.$Prenom.'<br>
telephone : '.$telephone.'<br>
email : '.$email.'<br>
sujet : '.$sujet.'<br>
message : '.$formMessage;
		$message = str_replace("&#039;","'",$message);
		$message = str_replace("&#8217;","'",$message);
		$message = str_replace("&quot;",'"',$message);
		$message = str_replace('<br>','',$message);
		$message = str_replace('<br />','',$message);
		$message = str_replace("&lt;","<",$message);
		$message = str_replace("&gt;",">",$message);
		$message = str_replace("&amp;","&",$message);
		
		// Envoi du mail
		if (mail($destinataire, $objet, $message, $headers))
		{
			
			echo '
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Votre demande a été transmise, <br><br>
nous vous répondrons dans les plus brefs délais'
;
			
		}
		else
		{
			echo '<p>'.$message_non_envoye.'</p>'."\n";
		};
	}
	else
	{
		// une des 3 variables (ou plus) est vide ...
		echo '<p>'.$message_formulaire_invalide.' <a href="pContact.html">Retour au formulaire</a></p>'."\n";
	};
};// fin du if (!isset($_POST['envoi']))

?>
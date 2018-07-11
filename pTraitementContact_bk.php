<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>ArchiTriad</title>
<LINK rel=STYLESHEET href="pages_fond_couleur.css" type="text/css">
<LINK rel=STYLESHEET href="cssTraitementContact.css" type="text/css">
<LINK rel=STYLESHEET href="fCssFonts.css" type="text/css">
<script type="text/javascript">
function MM_changeProp(objId,x,theProp,theValue) { //v9.0
  var obj = null; with (document){ if (getElementById)
  obj = getElementById(objId); }
  if (obj){
    if (theValue == true || theValue == false)
      eval("obj.style."+theProp+"="+theValue);
    else eval("obj.style."+theProp+"='"+theValue+"'");
  }
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
</head>

<body>
	<div id=fond>
		<div id="zLeft">
		<div id="logo_left" onClick="MM_goToURL('parent','index.html');return document.MM_returnValue">
		  <img src="images/Logo-ss_nom-V.gif" width="85" height="515" alt=""/></div>
		<div id="btcontact" onMouseOver="MM_changeProp('btcontact','','color','#adbcc4','DIV')" onMouseOut="MM_changeProp('btcontact','','color','#FFFFFF','DIV')">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact
			</div>
		<div id="btAgenceMortagne" onClick="MM_goToURL('parent','pAgenceMortagne.html');return document.MM_returnValue" onMouseOver="MM_changeProp('btAgenceMortagne','','color','#adbcc4','DIV')" onMouseOut="MM_changeProp('btAgenceMortagne','','color','#FFFFFF','DIV')">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agence&nbsp;Mortagne
	</div>
		<div id="btAgenceArgentan" onClick="MM_goToURL('parent','pAgenceArgentan.html');return document.MM_returnValue" onMouseOver="MM_changeProp('btAgenceArgentan','','color','#adbcc4','DIV')" onMouseOut="MM_changeProp('btAgenceArgentan','','color','#FFFFFF','DIV')">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agence&nbsp;Argentan
    </div>
		</div>
		
		<div id="zCenter">
		
			<div id="triangle" >
			</div>
		  <div id="textValideFormulaire">
		  <?php
//destinataire
$destinataire='mortagne@architriad.fr';


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
		  
		  </div>

		</div>
		<div id="zRight">
	  	<div id=boxTextePresArchi>
	  		<div class="left"></div>
	  		
		  <div id="texte_p_a">
		  
				
			





				
		  </div>
			</div>
	
		<div id="btArchitecture" onClick="MM_goToURL('parent','pArchitecture.html');return document.MM_returnValue"
		onMouseOver="MM_changeProp('cercleHaut','','background','#df5225','DIV')"
		onMouseOut="MM_changeProp('cercleHaut','','background','#e3e9ec','DIV')">
		  <img src="images/imArchitectureOrange.gif" width="279" height="18" alt=""/> 
		  </div>
		<div id="btamenagements"
	    onMouseOver="MM_changeProp('cercleCentre','','background','#df5225','DIV')"	onMouseOut="MM_changeProp('cercleCentre','','background','#e3e9ec','DIV')">
		  <img src="images/imAmenagementOrange.gif" width="279" height="18" alt=""/> 
		  </div>
			
		<div id="btarchitriad" 
		onMouseOver="MM_changeProp('cercleBas','','background','#df5225','DIV')"
		onMouseOut="MM_changeProp('cercleBas','','background','#e3e9ec','DIV')">
		  <img src="images/imArchiTriadOrange.gif" width="279" height="18" alt=""/>
			</div>
		<div id="texte_bas">
		<div id="imBasArchitriad">
			<img src="images/imArchitriadNoir.gif" width="296" height="20" alt=""/> </div>
		<div id="imBasCabinetArchitecte">
		  <img src="images/imCabinetArchitecteNoir.gif" width="296" height="20" alt=""/> </div>
		<div id="imBasArgentan">
		  <img src="images/imArgentanNoir.gif" width="296" height="20" alt=""/> </div>
		<div id="imBasMortagne">
		  <img src="images/imMortagneNoir.gif" width="296" height="20" alt=""/> </div></div>
		<div id="traitVertGris">
		  </div>
		<div id="traitNoirBas">
		  </div>
		<div id="cercleHaut" 
			onMouseOver="MM_changeProp('cercleHaut','','background','#df5225','DIV')"
			onMouseOut="MM_changeProp('cercleHaut','','background','#e3e9ec','DIV')">
			</div>
		<div id="cercleCentre"			        
		onMouseOver="MM_changeProp('cercleCentre','','background','#df5225','DIV')"	onMouseOut="MM_changeProp('cercleCentre','','background','#e3e9ec','DIV')">
			</div>
		<div id="cercleBas"
			onMouseOver="MM_changeProp('cercleBas','','background','#df5225','DIV')"
			onMouseOut="MM_changeProp('cercleBas','','background','#e3e9ec','DIV')">
			</div>
		</div>
	</div>

</body>
</html>

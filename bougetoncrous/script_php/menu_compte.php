<?php

include_once("pages_secondlevel/tool.php");

if (is_logged())
{
	echo('

	<a href="?action=logout">'._('D&eacute;connecter').'</a>
	<a href="?action=change_pass">'._('Changer le mot de passe').'</a>
	<a href="?action=delete_account">'._('Se d&eacute;sinscrire').'</a>
	<a href="?action=display_useterms">'._('Conditions d\'utilisation').'</a>

	');

	if (user_privilege_level()>3) // Représentant CER/administrateur
	{
		echo('

		<a href="?action=new_document">Ajouter un document</a>

		');
	}
}
else
{
	echo('

	<a href="?action=create_account">Connexion</a>
	<a href="?action=lost_ids">Identifiants perdus</a>
	<a href="?action=create_account">Inscription</a>
	<a href="?action=display_useterms">Conditions d\'utilisation</a>

	');
}

?>

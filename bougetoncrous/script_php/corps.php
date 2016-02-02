<?php

include_once("pages_secondlevel/about.php");
include_once("pages_secondlevel/accounts.php");
include_once("pages_secondlevel/documents.php");
include_once("pages_secondlevel/posts.php");
include_once("pages_secondlevel/errors.php");
include_once("pages_secondlevel/comments.php");

// Cas vides renvoyés vers l'accueil
if (isset($_GET["action"]) && is_string($_GET["action"]))
{
	$ccar_to_treat=htmlentities($_GET["action"]);
	if (empty($ccar_to_treat))
	{
		$ccar_to_treat="go_home";
	}
}
else
{
	$ccar_to_treat="go_home";
}

// Appel de la fonction associ�e � la demande
switch ($ccar_to_treat)
{
	case "go_home":
		about_ppr();
		break;
	case "display_nouvelingenieur":
		about_nouvelingenieur();
		break;
	case "login":
		log_in();
		break;
	case "logout":
		log_out();
		break;
	case "create_account":
		create_account();
		break;
	case "confirm_subscribe":
		validate_account();
		break;
	case "change_pass":
		change_password(false);
		break;
	case "lost_ids":
		change_password(true);
		break;
	case "delete_account":
		if(isset($_SESSION["delete_account_state"]) && $_SESSION["delete_account_state"]=="display")
		{
			$_SESSION["delete_account_state"]="execute"; // Une fois r�affich�, on repasse en mode "ex�cution"
			if (isset($_SESSION["delete_account_display"]))
			{
				echo($_SESSION["delete_account_display"]); // Affichage;
				unset($_SESSION["delete_account_display"]); // On supprime le texte qui a �t� affich�
			}
		}
		break;
	case "display_useterms":
		display_userterms();
		break;
	// Affichage des documents CA/CER disponibles
	case "display_docu":
		display_documents();
		break;
	case "new_document":
		if(isset($_SESSION["new_document_state"]) && $_SESSION["new_document_state"]=="display")
		{
			$_SESSION["new_document_state"]="execute"; // Une fois r�affich�, on repasse en mode "ex�cution"
			if (isset($_SESSION["new_document_display"]))
			{
				echo($_SESSION["new_document_display"]); // Affichage;
				unset($_SESSION["new_document_display"]); // On supprime le texte qui a �t� affich�
			}
		}
		break;
	case "remove_doc":
		delete_doc();
		break;
	case "edit_doc":
		edit_doc();
		break;
	// Affichage des propositions
	case "display_post":
		display_post();
		break;
	// Nouvelle proposition
	case "new_post":
		new_post();
		break;
	// Suppression
	case "remove_post":
		deletion();
		break;
	// Edition
	case "edit_post":
		edition();
		break;
	// Message d'erreur
	default:
		unexistent_page();
		break;
}

?>
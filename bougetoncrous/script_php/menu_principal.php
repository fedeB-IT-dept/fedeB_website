<?php

$highlighted_title=1;	
				
if (isset($_GET["action"]) && is_string($_GET["action"]))
{
	$ccar_to_treat=htmlentities($_GET["action"]);
	if (empty($ccar_to_treat) || $ccar_to_treat=="go_home")
	{
		$highlighted_title=1;
	}
	elseif ($ccar_to_treat=="display_nouvelingenieur")
	{
		$highlighted_title=2;
	}
	elseif ($ccar_to_treat=="display_docu")
	{
		$highlighted_title=3;
	}
	elseif ($ccar_to_treat=="display_post")
	{
		$highlighted_title=4;
	}
	elseif ($ccar_to_treat=="new_post")
	{
		$highlighted_title=5;
	}
	else
	{
		$highlighted_title=6;
	}
}

switch ($highlighted_title)
{
	case 1:
		echo('
			<td class="menu_title_selected_first">
				<a href="?action=go_home">Accueil</a>
			</td>
			<td class="menu_title">
				<a href="?action=display_nouvelingenieur">FédéB</a>
			</td>
			<td class="menu_title">
				<a href="?action=display_docu">Documents</a>
			</td>
			<td class="menu_title">
				<a href="?action=display_post">Propositions</a>
			</td>
			<td class="menu_title">
				<a href="?action=new_post">Participer</a>
			</td>
		');
		break;
	case 2:
		echo('
			<td class="menu_title_first">
				<a href="?action=go_home">Accueil</a>
			</td>
			<td class="menu_title_selected">
				<a href="?action=display_nouvelingenieur">FédéB</a>
			</td>
			<td class="menu_title">
				<a href="?action=display_docu">Documents</a>
			</td>
			<td class="menu_title">
				<a href="?action=display_post">Propositions</a>
			</td>
			<td class="menu_title">
				<a href="?action=new_post">Participer</a>
			</td>
		');
		break;
	case 3:
		echo('
			<td class="menu_title_first">
				<a href="?action=go_home">Accueil</a>
			</td>
			<td class="menu_title">
				<a href="?action=display_nouvelingenieur">FédéB</a>
			</td>
			<td class="menu_title_selected">
				<a href="?action=display_docu">Documents</a>
			</td>
			<td class="menu_title">
				<a href="?action=display_post">Propositions</a>
			</td>
			<td class="menu_title">
				<a href="?action=new_post">Participer</a>
			</td>
		');
		break;
	case 4:
		echo('
			<td class="menu_title_first">
				<a href="?action=go_home">Accueil</a>
			</td>
			<td class="menu_title">
				<a href="?action=display_nouvelingenieur">FédéB</a>
			</td>
			<td class="menu_title">
				<a href="?action=display_docu">Documents</a>
			</td>
			<td class="menu_title_selected">
				<a href="?action=display_post">Propositions</a>
			</td>
			<td class="menu_title">
				<a href="?action=new_post">Participer</a>
			</td>
		');
		break;
	case 5:
		echo('
			<td class="menu_title_first">
				<a href="?action=go_home">Accueil</a>
			</td>
			<td class="menu_title">
				<a href="?action=display_nouvelingenieur">FédéB</a>
			</td>
			<td class="menu_title">
				<a href="?action=display_docu">Documents</a>
			</td>
			<td class="menu_title">
				<a href="?action=display_post">Propositions</a>
			</td>
			<td class="menu_title_selected">
				<a href="?action=new_post">Participer</a>
			</td>
		');
		break;
	case 6:
		echo('
			<td class="menu_title_first">
				<a href="?action=go_home">Accueil</a>
			</td>
			<td class="menu_title">
				<a href="?action=display_nouvelingenieur">FédéB</a>
			</td>
			<td class="menu_title">
				<a href="?action=display_docu">Documents</a>
			</td>
			<td class="menu_title">
				<a href="?action=display_post">Propositions</a>
			</td>
			<td class="menu_title">
				<a href="?action=new_post">Participer</a>
			</td>
		');
		break;
}

?>


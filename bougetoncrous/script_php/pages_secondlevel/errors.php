<?php

function unexistent_page()
{
	echo('<h1>La page demand&eacute;e n\'existe pas</h1>');
}

function need_ecole_member_privilege($level=1)
{
	if ($level==2)
	{
		echo('

		<h1>Vous n\'avez pas le droit d\'acc&eacute;der &agrave; cette page</h1>
		<h2><a href="?action=create_account">Identifiez-vous</a>'.((LIMIT_IP)?', visitez ce site depuis le r&eacute;seau &eacute;tudiant de l\'école ou utilisez un
		<a href="'.URL_VPN.'">VPN</a>':'').'</h2>

		');
	}
	else
	{
		echo('

		<h1>Vous n\'avez pas le droit d\'acc&eacute;der &agrave; cette page</h1>
		<h2 align=center><a href="?action=create_account">Identifiez-vous</a>'.((LIMIT_IP)?', visitez ce site depuis le r&eacute;seau &eacute;tudiant de l\'ecole ou utilisez un
		<a href="'.URL_VPN.'">VPN</a>':'').'</h2>

		');
	}
}

function need_logged_member_privilege()
{
	echo('

	<h1>Vous n\'avez pas le droit d\'acc&eacute;der &agrave; cette page</h1>
	<h2>Il est n&eacute;cessaire de vous <a href="?action=create_account">identifier</a></h2>

	');
}

?>

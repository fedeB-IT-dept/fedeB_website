<?php

$link=@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);

if ($link)
{
	if (!(@mysql_select_db(DB_NAME, $link)))
	{
		echo('<div class="warning">Probl&egrave;me de connexion &agrave; la base, la navigation risque d\'&ecirc;tre perturb&eacute;e</div>');
	}
}
else
{
	echo('<div class="warning">Probl&egrave;me de connexion &agrave; la base, la navigation risque d\'&ecirc;tre perturb&eacute;e</div>');	
}

?>
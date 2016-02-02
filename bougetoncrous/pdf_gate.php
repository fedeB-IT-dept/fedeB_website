<?php

/*
	Plateforme web PPR - outil de crowdsourcing
	Copyright(C) 2011 Nicolas SEICHEPINE

	This file is part of PPR.
	
	PPR is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as
    published by the Free Software Foundation, either version 3 of the
    License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
	
	Contact : nicolas.seichepine.org/?action=contact
*/

// Lis le fichier demand� apr�s avoir v�rifi� les droits d'acc�s; permet de :
//	- masquer le nom du fichier sur le serveur
//	- faire la lecture via readfile, non d�pendante du .htaccess; on peut donc prot�ger les documents contre un acc�s direct
//	- v�rifier qu'on provient bien de la page pdf_display (l'utilisateur n'est pas cens� pouvoir appeler pdf_gate.php directement)

session_start();
include_once("script_php/pages_secondlevel/tool.php");

// On doit �tre pass� par pdf_display juste avant, i.e. �tre appel� par le javascript associ� ; apparemment plus fiable que d'utiliser le referer
if (isset($_SESSION['hidden_authorize_pdf_gate_use']))
{
	list($tps,$pass)=explode("_",$_SESSION['hidden_authorize_pdf_gate_use'],2);
	unset($_SESSION['hidden_authorize_pdf_gate_use']); // Chargement unique autoris�; Le lien devient invalide d�s que l'objet commence � �tre charg�
	if ((time()<($tps+10)) && $pass=="3ec25e04a301535b9bc8c44b172dbcee420cf544")
	{
		if (user_privilege_level()>0) // On doit poss�der les droits n�cessaires � l'acc�s aux documents
		{
			if(is_logged() || (isset($_SESSION['confirmation_agreement']) && $_SESSION['confirmation_agreement']=="ok"))
			{
				// C'est plus lourd, mais mieux vaut v�rifier � nouveau que le document existe. L'utilisateur ne doit pas pouvoir donner de lui-m�me le nom du fichier
				if ((isset($_GET["document_id"]) && is_numeric($_GET["document_id"])))
				{
					$result=@mysql_query(sprintf("SELECT filename FROM document WHERE document_id='%s'",mysql_real_escape_string($_GET["document_id"])));
					if ($result)
					{
						if ($row=mysql_fetch_assoc($result))
						{
							$name=htmlentities($row["filename"]);
							$name="rep_documents/$name";
							
							if (file_exists($name)) 
							{
								header('Content-Description: File Transfer');
								header('Content-Type: application/octet-stream');
								header('Content-Disposition: attachment; filename=fichier.swf'); // Important : ne pas trahir ici le v�ritable nom du fichier !
								header('Content-Transfer-Encoding: binary');
								header('Expires: 0');
								header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
								header('Pragma: public');
								header('Content-Length: '.filesize($name));
								@ob_clean();
								@flush();
								@readfile($name);
								return ;
							}
						}
						@mysql_free_result($result);
					}
				}
			}
		}
	}
}

?>
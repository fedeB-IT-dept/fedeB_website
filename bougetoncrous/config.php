<?php

/** Define ABSPATH as this files directory */
define( 'ABSPATH', dirname(__FILE__) . '/' );

////////////////////////////////////////////////////////////////////////////////
// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
////////////////////////////////////////////////////////////////////////////////
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'brestcam_blog');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'brestcam_blog');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'jevoteunef');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'mysql5-1.pro');

///////////////////////////////////////////////////
// ** Paramètres de customisation de l'école. ** //
///////////////////////////////////////////////////
/** Nom de l'école. */
define('NOM_ECOLE', 'Bouge ton Campus');

/** Adresse mail du contact en charge de modérer la plateforme. */
define('MAIL_CONTACT', 'contact@fedeb.net');

/** Mots clés caractérisant le Refresh. */
define('KEYWORDS', 'FédéB, FAGE, Innovation, Brest, Finistère, Etudiants');

////////////////////////////////////////
// ** Paramètres de sécurité mail. ** //
////////////////////////////////////////
/** Limitations à un domaine pour les adresses mail. */
define('LIMIT_MAIL', false); // boolean
/** Indique les adresses mail à autoriser en expression régulière. */
define('PREGMATCH_MAIL', '#^([a-z][\-_]?)*[a-z]+\.([a-z][\-_]?)*[a-z]+@eleves\.ecole\.fr$#'); // regular expression
/** Indique les adresses mail à autoriser en langage compréhensible. */
define('PREGMATCH_MAIL_HUMAN_READABLE', 'de type prenom.nom@eleve.ecole.fr'); // regular expression

//////////////////////////////////////////
// ** Paramètres de sécurité réseau. ** //
//////////////////////////////////////////
/** Limitations aux adresses IP. */
define('LIMIT_IP', false); // boolean
/** Url du VPN. */
define('URL_VPN', 'http://ecole.fr/accesVPN.htm');

///////////////////////////////////////////////////
// ** Paramètres de langue. ** //
///////////////////////////////////////////////////
define("LANG", 'fr_FR');

?>

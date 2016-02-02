<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
<head>
<link rel="icon" type="image/png" href="favicon.ico" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Fédé B | Fédération des Etudiants de Bretagne Occidentale</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" href="http://www.fedeb.net/wp-content/themes/fedeb/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="http://www.fedeb.net/wp-content/themes/fedeb/css/demo.css" />
<link rel="stylesheet" type="text/css" href="http://www.fedeb.net/wp-content/themes/fedeb/css/component.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<script src="http://www.fedeb.net/wp-content/themes/fedeb/js/modernizr.custom.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://www.fedeb.net/wp-content/themes/fedeb/js/lib/modernizr-2.5.3.min.js"></script>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

        <!-- Elément Google Maps indiquant que la carte doit être affiché en plein écran et
        qu'elle ne peut pas être redimensionnée par l'utilisateur -->
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <!-- Inclusion de l'API Google MAPS -->
        <!-- Le paramètre "sensor" indique si cette application utilise détecteur pour déterminer la position de l'utilisateur -->
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript">
            function initialiser() {
                var latlng = new google.maps.LatLng(46.779231, 6.659431);
                //objet contenant des propriétés avec des identificateurs prédéfinis dans Google Maps permettant
                //de définir des options d'affichage de notre carte
                var options = {
                    center: latlng,
                    zoom: 19,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                
                //constructeur de la carte qui prend en paramêtre le conteneur HTML
                //dans lequel la carte doit s'afficher et les options
                var carte = new google.maps.Map(document.getElementById("carte"), 

    //création du marqueur
    var marqueur = new google.maps.Marker({
        position: new google.maps.LatLng(46.779231, 6.659431),
        map: carte
    });
            }
       </script>

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>
	
	<body onload="initialiser()" data-spy="scroll" data-target=".bs-docs-sidebar">
		<div id="global">
		
			<div id="wrap-header">
				
				<div id="header-container">
					<header id="header">
						<div id="banner">

							<table><tr><td><a href="http://www.fedeb.net"><img src="http://www.fedeb.net/wp-content/uploads/2013/11/banniere_2c.png" class="image-projet" /></a></td>
<td><img src="http://www.fedeb.net/wp-content/uploads/2013/12/banniere_2a.png" class="image-projet" /></td>
<td><div class="liens" style="width:150px;">
<a href="http://www.lespetarades.org"><img src="http://www.fedeb.net/wp-content/uploads/2014/02/petarades.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2014/02/petaradesover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2014/02/petarades.png'"/></a>
</div>
</td><td>
<a href="http://www.fage.org" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/11/banniere_2b.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/banniere_2bover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/banniere_2b.png'" class="image-projet" /></a>
</td></tr></table>
						</div>
								
					<div class="ribbon-wrapper">
						<div class="ribbon-front">			
							<ul id="menu-main" class="menu-main">
								<li class="trigger">
									<a class="icon icon-menu"><span>Menu</span></a>
									
											<nav id="menu" class="menu-wrapper">
								
												<?php wp_nav_menu(array(
													'theme_location' => 'nav'
												)); ?>
								
											</nav>
						
								</li>
								<li><a href="http://www.fedeb.net" class="fedeb-menu">Fédé B</a></li>
							</ul>					
						</div>
						<div class="ribbon-edge-topleft"></div>
						<div class="ribbon-edge-topright"></div>
						<div class="ribbon-edge-bottomleft"></div>
						<div class="ribbon-edge-bottomright"></div>
						<div class="ribbon-back-left"></div>
						<div class="ribbon-back-right"></div>
					</div>
						
						<div id="galerie-slide-content">
							<?php if (function_exists('slideshow')) { slideshow($output = true, $post_id = false, $gallery_id = false, $params = array()); } ?>
							<div id="shadow">
								<img src="http://www.fedeb.net/wp-content/themes/fedeb/images/shadow-slider.png" class="image-projet" />	
							</div>
						</div>
						
					</header>
						<!-- On charge les scripts du menu responsive juste avant la fermeture de la partie -->
						<script src="http://www.fedeb.net/wp-content/themes/fedeb/js/classie.js"></script>
						<script src="http://www.fedeb.net/wp-content/themes/fedeb/js/gnmenu.js"></script>
						<script>
							new mainMenu( document.getElementById( 'menu-main' ) );
						</script>

					<div id="column-left">
						<table>
<tr><td>

<a href="https://www.facebook.com/ades.brest.3?fref=ts" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/12/ades.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/adesover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/ades.png'" class="image-projet" title="ADES" style="width:80%;" /></a>

</td></tr><tr><td>

<a href="https://www.facebook.com/aiaia.fip" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/11/aiaia.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/aiaiaover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/aiaia.png'" class="image-projet" title="AIAIA" style="width:80%;" /></a>

</td></tr><tr><td>

<a href="http://acid29.org + https://www.facebook.com/acidbrest?fref=ts" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/12/acid.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/acidover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/acid.png'" class="image-projet" title="ACID" style="width:80%;" /></a>

</td></tr><tr><td>

<a href="https://www.facebook.com/aulion.joueur?fref=ts" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/12/lion.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/lionover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/lion.png'" class="image-projet" title="Au Lion Joueur" style="width:80%;" /></a>

</td></tr><tr><td>

<a href="https://www.facebook.com/pages/IE-Brest/359604284059577" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/11/ieb.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/iebover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/ieb.png'" class="image-projet" title="IE Brest" style="width:80%;" /></a>

</td></tr><tr><td>

<a href="https://www.facebook.com/assoagora.aesbrest" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/12/agora.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/agoraover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/agora.png'" class="image-projet" title="Agora" style="width:80%;" /></a>

</td></tr><tr><td>

<a href="https://www.facebook.com/BdeEnstaBretagne" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/12/ensta.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/enstaover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/ensta.png'" class="image-projet" title="BDE Ensta" style="width:80%;" /></a>

</td></tr><tr><td>

<a href="https://www.facebook.com/anfert.oueest" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/11/anfert.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/anfertover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/anfert.png'" class="image-projet" title="Anfert de l'Oueest" style="width:80%;" /></a>

</td></tr></table>
					</div>
					<div id="column-bottom">
						<table>
<tr><td>

<a href="https://www.facebook.com/pages/GA%C3%8FA-Association-des-%C3%A9tudiants-en-G%C3%A9osciences-de-Brest/478163078865406" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/12/gaia.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/gaiaover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/gaia.png'" class="image-projet" title="GAÏA" style="width:80%;" /></a>

</td><td>

<a href="https://www.facebook.com/CorpoMedBrest?fref=ts" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/11/cemb.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/cembover'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/cemb.png'" class="image-projet" title="CEMB" style="width:80%;" /></a>

</td><td>

<a href="https://www.facebook.com/assescib" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/11/assescib.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/assescibover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/assescib.png'" class="image-projet" title="AssESciB" style="width:80%;" /></a>

</td><td>

<a href="https://www.facebook.com/kubebrest" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/12/kube.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/kubeover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/kube.png'" class="image-projet" title="KUBE" style="width:80%;" /></a>

</td><td>

<a href="https://www.facebook.com/masalla.ubo?fref=ts" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/12/masalla.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/masallaover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/masalla.png'" class="image-projet" title="Mas Alla" style="width:80%;" /></a>

</td><td>

<a href="https://www.facebook.com/AssoEcoplus" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/11/eco.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/ecoover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/eco.png'" class="image-projet" title="Eco+" style="width:80%;" /></a>

</td><td>

<a href="https://www.facebook.com/pages/Association-G%C3%A9o-Horizons/554084644613293?fref=ts" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/12/geo.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/geoover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/geo.png'" class="image-projet" title="Géo Horizons" style="width:80%;" /></a>

</td><td>

<a href="https://www.facebook.com/cercleetudiant.naturalistebrestois?fref=ts" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/12/cenb.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/cenbover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/cenb.png'" class="image-projet" title="CENB" style="width:80%;" /></a>

</td></tr></table>
					</div>
<div id="column-right">

<table>
<tr><td>

<a href="https://www.facebook.com/ginie.carasoub?fref=ts" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/12/race.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/raceover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/race.png'" class="image-projet" title="UBO Saling Race" style="width:80%;" /></a>

</td></tr><tr><td>

<a href="https://www.facebook.com/bde.iaebrest?fref=ts" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/12/gescom.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/gescomover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/gescom.png'" class="image-projet" title="BDE Gescom" style="width:80%;" /></a>

</td></tr><tr><td>

<a href="https://www.facebook.com/bde.euria" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/11/euria.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/euriaover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/euria.png'" class="image-projet" title="Euria" style="width:80%;" /></a>

</td></tr><tr><td>

<a href="https://www.facebook.com/UBOFADA?fref=ts" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/11/fada.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/fadaover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/fada.png'" class="image-projet" title="FADA" style="width:80%;" /></a>

</td></tr><tr><td>

<a href="https://www.facebook.com/corpo.brest" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/12/cesfb.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/cesfbover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/12/cesfb.png'" class="image-projet" title="CESFB" style="width:80%;" /></a>

</td></tr><tr><td>

<a href="http://www.aeob.org/" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/11/aeob.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/aeobover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/aeob.png'" class="image-projet" title="AEOB" style="width:80%;" /></a>

</td></tr><tr><td>

<a href="https://www.facebook.com/assoOBI1?fref=ts" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/11/obi1.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/obi1over.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/obi1.png'" class="image-projet" title="OBI1" style="width:80%;" /></a>

</td></tr><tr><td>

<a href="http://pilidous.wordpress.com/" border="0"><img src="http://www.fedeb.net/wp-content/uploads/2013/11/pilidoux.png" onmouseover="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/pilidouxover.png'" onmouseout="this.src='http://www.fedeb.net/wp-content/uploads/2013/11/pilidoux.png'" class="image-projet" title="Les Pilidoux" style="width:80%;" /></a>

</td></tr></table>

</div>

				</div>

			</div>
			
			<div id="wrap-content">
				<div id="page">		
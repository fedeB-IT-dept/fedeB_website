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
<link rel="icon" type="image/png" href="favicon.ico"/>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Le site de la Fédé B</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link href="http://www.fedeb.net/wp-content/themes/fedeb/css/menu-responsive.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://www.fedeb.net/wp-content/themes/fedeb/js/lib/modernizr-2.5.3.min.js"></script>
<script src="http://www.fedeb.net/wp-content/themes/fedeb/js/script-menu-responsive.js"></script>
<script src="http://www.fedeb.net/wp-content/themes/fedeb/js/init-script-menu-responsive.js"></script>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

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
	
	<body data-spy="scroll" data-target=".bs-docs-sidebar">
		<div id="global">
		
			<div id="wrap-header">
				
				<div id="header-container">
					<header id="header">
						<div id="banner">
							<hgroup>
								
							</hgroup>
						</div>
					       
					       		<h2 class="menuheader-slide-trigger">Menu <span></span></h2>
								<nav id="menu">
									<?php wp_nav_menu(array(
										'theme_location' => 'nav'
									)); ?>
								</nav>
						 

						<div id="galerie-slide-content">
							<?php if (function_exists('slideshow')) { slideshow($output = true, $post_id = false, $gallery_id = false, $params = array()); } ?>
							<div id="shadow"></div>
						</div>
						
					</header>

					<div id="column-left"></div>
					<div id="column-bottom"></div>
					<div id="column-right"></div>

				</div>

			</div>
			
			<div id="wrap-content">
				<div id="page">




<div id="wrapper">
<div class="blog-head"></div>
				<div id="blog">
					<div class="blog-title">
						<h4></h4>
					</div>

					<div class="blog-content">

						<p>Ce site est la propriété de la Fédé B
							Fédé B - Fédération des Associations Etudiantes de Bretagne Occidentale
							
							UFR Sciences et Techniques
							6 av. Victor Le Gorgeu
							CS 93 837
							29238 Brest Cedex 3


							Tél : 02 98 01 29 36
							Fax :  09 52 94 41 83
							Courriel : contact@fedeb.net

							Réalisation du site :
							Conception technique : Benjamin Buton, <a href="http://www.benjaminbuton.fr" title="Site portfolio personnel de Benjamin Buton" target="_blank">www.benjaminbuton.fr</a>
							Conception graphique : Maxime Gourmelen <a href="#" title="Site portfolio personnel de Maxime Gourmelen" target="_blank"></a>
						</p>

							<div class="cb"></div>
						
					</div>
				</div>

				<div class="blog-footer"></div>
</div>
					<?php include('sidebar.php'); ?>

<?php wp_footer(); ?>
				</div>
				
			</div>
		</div>

		<?php
			if ( function_exists('register_sidebar'))
			register_sidebar(array(
			'name' => 'Footer Left',));

			if ( function_exists('register_sidebar'))
			register_sidebar(array(
			'name' => 'Footer Center',));

			if ( function_exists('register_sidebar'))
			register_sidebar(array(
			'name' => 'Footer Right',));
		?>
					<div class="spacer"></div>
					<div id="wrap-footer">
							<div id="footer">
								<div id="footer_column_left">
									<h6 class="title-footer">Navigation</h6>
									<div class="first-column">
										<ul class="top">
											<li><a href="" class="title-page-footer">Fédé B</a></li>
												<li><a href="http://www.fedeb.net/fedeb/presentation/">Présentation</a></li>
												<li><a href="http://www.fedeb.net/fedeb/fonctionnement/">Fonctionnement</a></li>
												<li><a href="http://www.fedeb.net/fedeb/historique/">Historique</a></li>
												<li><a href="http://www.fedeb.net/fedeb/bureau/">Bureau</a></li>												
										</ul>

										<ul class="bottom">
											<li><a href="http://www.fedeb.net/category/formation/" class="title-page-footer">Formation</a></li>
										</ul>
									</div>

									<div class="middle-column">
										<ul class="top">
											<li><a href="" class="title-page-footer">Réseau</a></li>
												<li><a href="http://www.fedeb.net/reseau/associations-du-reseau/">Associations du réseau</a></li>
												<li><a href="http://www.fedeb.net/reseau/agenda-des-assos/">Agenda des assos</a></li>											
										</ul>

										<ul class="bottom">
											<li><a href="http://www.fedeb.net/category/animation/" class="title-page-footer">Animation</a></li>
												<li><a href="http://www.fedeb.net/category/animation/improu/">Impro U</a></li>
												<li><a href="http://www.fedeb.net/category/animation/petarades/">Les Pétarades</a></li>
												<li><a href="http://www.fedeb.net/category/animation/operations/">Opérations de rentrée</a></li>
										</ul>
									</div>

									<div class="last-column">
										<ul class="top">
											<li><a href="" class="title-page-footer">Représentation</a></li>
												<li><a href="">La représentation des étudiants</a></li>
												<li><a href="http://www.fedeb.net/page-d-exemple-2/ubo/">L'UBO</a></li>
												<li><a href="http://www.fedeb.net/page-d-exemple-2/le-crous/">Le Crous</a></li>
												<li><a href="http://www.fedeb.net/page-d-exemple-2/le-bureau-information-de-brest/">Le Bureau Information Jeunesse</a></li>
										</ul>
										
										<ul class="bottom">
											<li><a href="http://www.fedeb.net/category/solidarite/" class="title-page-footer">Solidarité</a></li>
												<li><a href="http://www.fedeb.net/category/solidarite/agora/">Agoraé</a></li>
												<li><a href="http://www.fedeb.net/category/solidarite/telethon/">Téléthon</a></li>
												<li><a href="http://www.fedeb.net/category/solidarite/bienetre/">Bien être étudiant</a></li>
										</ul>
									</div>
								</div>

								<div id="footer_column_middle">
									<h6 class="title-footer">Contact du Bureau</h6>
										<p>UFR Sciences et Techniques<br/>
										6 av. Victor Le Gorgeu<br/>
										CS 93 837<br/>
										29238 Brest Cedex 3<br/>
										<a href="mailto:contact@fedeb.net">contact@fedeb.net</a><br/>
										02 98 01 29 36<br/>
										09 52 94 41 83<br/>
										<a href="http://www.fedeb.net" target="_blank">http://www.fedeb.net</a></p>
								</div>
									
								
								<div id="footer_column_right">
									<h6 class="title-footer">Partenaires</h6>
									<div class="content-link">
										<div class="link"><p class="name-link"><a href="http://www.univ-brest.fr/" target="_blank"><img src="http://www.fedeb.net/wp-content/themes/fedeb/images/logo-ubo-1.png" title="Université de Bretagne Occidentale" alt="Logo de l'UBO" /></a></p></div>
										<div class="link"><p class="name-link"><a href="http://www.credit-agricole.fr/" target="_blank"><img src="http://www.fedeb.net/wp-content/themes/fedeb/images/logo-credit-agricole-1.png" title="Crédit Agricole" alt="Logo du Crédit Agricole" /></a></p></div>
										<div class="link"><p class="name-link"><a href="http://www.a2presse-educ.fr/" target="_blank"><img src="http://www.fedeb.net/wp-content/themes/fedeb/images/logo-a2presse-1.png" title="A2Presse" alt="Logo de A2Presse" /></a></p></div>
									</div>
								</div>

								<div id="footer_bottom">
									<p class="mentions">Copyright © 2013 - Site propriétaire de la Fédé B - Tous droits réservés - <a href="http://www.fedeb.net/wp-content/themes/fedeb/mentions-legales.php">Mentions légales</a></p>
								</div>
							</div>
						</div>

			<!-- Le javascript
		    ================================================== -->
		    <!-- Placed at the end of the document so the pages load faster -->
			
	</body>
</html>
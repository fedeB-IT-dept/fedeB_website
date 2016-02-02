<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage fedeb
 */

get_header(); ?>
<div id="wrapper">
<div class="blog-head"></div>	
<?php if(have_posts()): while(have_posts()): the_post(); ?>	
				<div id="blog">
					<div class="blog-title">
						<h4 class="title-article"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<?php if ( comments_open() ) :
							  echo '<a>';
							  comments_popup_link( '0', '1', '%', 'nbcom', 'Commentaires désactivés');
							  echo '</a>';
							endif;
							?>
						</h4>
					</div>
					<div class="vignette">
						<a href="<?php the_permalink(); ?>" class="preview"><?php the_post_thumbnail(); ?></a>
					</div>

					<div class="blog-content">
						
							<?php the_content('Lire la suite'); ?>

							<p class="date">Posté le <?php the_time('l d F Y') ?> dans <?php echo get_the_category_list(', '); ?></p>
							<div class="cb"></div>
						
					</div>
				</div>

<?php endwhile; endif; ?>
				<div class="blog-footer"></div>
</div>
					<?php get_sidebar(); ?>

<?php get_footer(); ?>
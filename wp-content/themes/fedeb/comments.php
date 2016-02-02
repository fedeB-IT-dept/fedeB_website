<div class="form-commentaire">

	<?php if(have_comments()): ?>
	<h6>Vos commentaires</h6>

	<?php

	function wp_comments($comment, $args, $depth) {
			$GLOBALS['comment'] = $comment;
			extract($args, EXTR_SKIP);

			if ( 'div' == $args['style'] ) {
				$tag = 'div';
				$add_below = 'comment';
			} else {
				$tag = 'li';
				$add_below = 'div-comment';
			}
	?>
			<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
			<?php if ( 'div' != $args['style'] ) : ?>
			<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
			<?php endif; ?>
			<div class="author"><?php echo get_comment_author_link(); ?> a dit :</div>
			<div class="date-comment"><?php echo get_comment_date(); ?> à <?php echo get_comment_time(); ?><?php edit_comment_link(__('(Edit)'),'  ','' ); ?></div>
			<br />
	<?php if ($comment->comment_approved == '0') : ?>
			<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
			<br />
	<?php endif; ?>
		

			<div class="commentaire"><?php comment_text() ?></div>
			<div class="shadow-comment"></div>
			<div class="cb"></div>

			<div class="reply">
			<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div><div class="cb"></div>
			<?php if ( 'div' != $args['style'] ) : ?>
			</div>
			<?php endif; ?>
	<?php
	        }

	?>

	<?php wp_list_comments('callback=wp_comments'); ?>
	<?php endif; ?>

	<h6>Laisser un commentaire</h6>

	<?php 
	$commenter = wp_get_current_commenter();
	$fields =  array(
	'author' => '<div class="input-author"><label for="author">' . __( 'Nom', 'domainreference' ) . '' . ( $req ? '<span class="required">*</span>' : '' ) . '</label> <input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div><br/>',
	'email' => '<div class="input-email"><label for="email">' . __( 'Email', 'domainreference' ) . '' . ( $req ? '<span class="required">*</span>' : '' ) . '</label> <input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>'
	);

	comment_form(array(
		'fields' => $fields,
		'title_reply' => '',
		'comment_notes_after' => '',
		'label_submit' => 'Envoyer un commentaire',
		'comment_field' => '<div class="cb"></div><div class="message"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>'
		)); 
	?>

</div>
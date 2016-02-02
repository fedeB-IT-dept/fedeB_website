				<?php wp_footer(); ?>
				</div>
				
			</div>
		</div>

		
					<div class="spacer"></div>
					<div id="wrap-footer">
							<div id="footer">

								<div id="footer_column_left">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
								<?php endif; ?>
								</div>

								<div id="footer_column_middle">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : ?>
								<?php endif; ?>
								</div>

								<div id="footer_column_right">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(3) ) : ?>
								<?php endif; ?>
								</div>

								<div id="footer_bottom">
									<p class="mentions">Copyright © 2013 - Site propriétaire de la Fédé B - Tous droits réservés - <a href="http://www.fedeb.net/mentions-legales/">Mentions légales</a></p>
								</div>
							</div>
						</div>

	</body>
</html>


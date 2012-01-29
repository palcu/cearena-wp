<?php get_header() ?>

	<div id="container">
		<div id="content">

			<div id="post-0" class="post error404 not-found">
				<div class=info></div><h2 class="page-title"><?php _e( 'Not Found', 'sandbox' ) ?></h2>
				<div  class="entry-content-width">
				<div class="entry-content">
					<p><?php _e( 'Apologies, but we were unable to find what you were looking for. Perhaps  searching will help.', 'sandbox' ) ?></p>
					<!-- Search -->
					<div id="search">
						<form action="<?php bloginfo('url'); ?>" method="get">
								<div id="search-input">
								<input id=search-input-input type="text" size="13" value="<?php the_search_query(); ?>" name="s" id="s" /><input type="submit" value="OK" name="" id="search-submit" />
								</div>
						</form>
					</div>
					</div>
				</div>
					
			</div><!-- .post -->

		</div><!-- #content -->		
		
	</div><!-- #container -->


<?php get_footer() ?>
<?php get_header() ?>

	<div id="container">
		<div id="content">

<?php if (is_category() or is_search()) { $posts = query_posts($query_string . '&order by=date&showposts=10'); } ?>		
<?php if ( have_posts() ) : ?>

		<div class=info></div>
		<h2 class="page-title"><?php _e( 'Search Results for:', 'sandbox' ) ?> <span><?php the_search_query() ?></span></h2>

<?php while ( have_posts() ) : the_post() ?>

			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?><?php sticky_class(); ?>">
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'sandbox'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a>
				</h2>

				<div class="entry-content">
					<div class="entry-meta"></div>
					<div  class="entry-content-width">

						<?php
							if (is_single() or is_page()) {
								the_content( __( '<span class="meta-nav">Read More &raquo;</span>', 'sandbox' ) ) ;
							} else {
							the_excerpt();
							} 
						?>
						<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sandbox' ) . '&after=</div>') ?>
					</div>
				</div>
			</div><!-- .post -->

<?php endwhile; ?>

			<div id="nav-below" class="navigation">
				<?php if(function_exists('wp_pagenavi')){ wp_pagenavi(); } else { ?> 
				<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'sandbox' )) ?></div>
				<div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'sandbox' )) ?></div>
				<?php } ?> 
			</div>

<?php else : ?>

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

<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>
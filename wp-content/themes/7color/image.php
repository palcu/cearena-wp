<?php get_header() ?>

	<div id="container">
		<div id="content">

<?php the_post() ?>

			<div class=info></div><h2 class="page-title"><a href="<?php echo get_permalink($post->post_parent) ?>" title="<?php printf( __( 'Return to %s', 'sandbox' ), wp_specialchars( get_the_title($post->post_parent), 1 ) ) ?>" rev="attachment"><?php echo get_the_title($post->post_parent) ?></a></h2>
					
			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				
					<div class="entry-content"><div  class="entry-content-width">
						<div class="entry-attachment"><?php echo wp_get_attachment_image( $post->ID, 'large' ); ?></div>
					<div class="entry-caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt() ?></div>
					</div><!-- #entry-content -->
				</div><!-- #entry-content-width -->
			</div>
		</div><!-- #content -->
	</div><!-- #container -->


<?php get_footer() ?>
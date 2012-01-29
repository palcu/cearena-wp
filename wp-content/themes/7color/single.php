<?php get_header() ?>

	<div id="container">
		<div id="content">

<?php the_post() ?>


			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?><?php sticky_class(); ?>">
				<h2 class="entry-title"><?php the_title() ?></h2>
				<div class="entry-content">
				<div  class="entry-content-width">
					<?php the_content() ?>
					<hr />
					<?php if (function_exists('nrelate_related')) nrelate_related(); ?>
					
						

					</div>
					<div id="author-info"><!--Author Info-->
						<div id="author-image">
							<a href="<?php the_author_meta('user_url'); ?>"><?php echo get_avatar( get_the_author_meta('user_email'), '80', '' ); ?></a>
						</div>   
						<div id="author-bio">
							<h4>Publicat de <?php the_author_link(); ?></h4>
							<p><?php the_author_meta('description'); ?></p>
						</div>
					</div><!--Author Info-->
					
					<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sandbox' ) . '&after=</div>') ?>
					
					<div class="entry-meta">
						<?php printf( __( 'Postat pe data de <abbr class="published" title="%2$sT%3$s">%4$s la ora %5$s</abbr>, în categoria %6$s%7$s.', 'sandbox' ),
							'<span class="author vcard"><a class="url fn n" href="' . get_author_link( false, $authordata->ID, $authordata->user_nicename ) . '" title="' . sprintf( __( 'View all posts by %s', 'sandbox' ), $authordata->display_name ) . '">' . get_the_author() . '</a></span>',
							get_the_time('Y-m-d'),
							get_the_time('H:i:sO'),
							the_date( '', '', '', false ),
							get_the_time(),
							get_the_category_list(', '),
							get_the_tag_list( __( ' și cu etichetele ', 'sandbox' ), ', ', '' ),
							get_permalink(),
							the_title_attribute('echo=0'),
							comments_rss() ) ?>

						<?php if ( ('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Comments and trackbacks open ?>
						<?php elseif ( !('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Only trackbacks open ?>
											<?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'sandbox' ), get_trackback_url() ) ?>
						<?php elseif ( ('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Only comments open ?>
											<?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.', 'sandbox' ) ?>
						<?php elseif ( !('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Comments and trackbacks closed ?>
											<?php _e( 'Both comments and trackbacks are currently closed.', 'sandbox' ) ?>
						<?php endif; ?>
						<?php edit_post_link( __( 'Edit', 'sandbox' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>
					<hr />
					<div style="float:right;"><?php if(function_exists("SFBSB_direct")) {echo SFBSB_direct("box_count");} ?></div>
					<?php comments_template('', true); ?>
				</div>
			</div><!-- .post -->


		</div>
		</div><!-- #content -->
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>
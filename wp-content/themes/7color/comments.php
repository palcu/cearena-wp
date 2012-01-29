<?php
	if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
		die ( 'Please do not load this page directly. Thanks.' );
?>
			<div id="comments">
<?php
	if ( post_password_required() ) { ?>
				<div class="nopassword"><?php _e( 'This post is protected. Enter the password to view any comments.', 'sandbox' ) ?></div>
			</div><!-- .comments -->
<?php
		return;
}
?>
<?php if ( have_comments() ) : ?>

<?php // Number of pings and comments
$ping_count = $comment_count = 0;
foreach ( $comments as $comment )
	get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;
?>

<?php if ( ! empty($comments_by_type['comment']) ) : ?>

				<div id="comments-list" class="comments">
					<h3><?php printf($comment_count > 1 ? __('<span>%d</span> Comments', 'sandbox') : __('<span>One</span> Comment', 'sandbox'), $comment_count) ?></h3>

					<ol>
						<?php wp_list_comments('type=comment&callback=sandbox_comments'); ?>
					</ol>

	<div id="comments-nav-below" class="comment-navigation">
		<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
	</div>

				</div><!-- #comments-list .comments -->

<?php endif; // REFERENCE: if ( $comment_count ) ?>


<?php if ( ! empty($comments_by_type['pings']) ) : ?>

				<div id="trackbacks-list" class="comments">
					<h3><?php printf($ping_count > 1 ? __('<span>%d</span> Trackbacks', 'sandbox') : __('<span>One</span> Trackback', 'sandbox'), $ping_count) ?></h3>

					<ol>
						<?php wp_list_comments('type=pings&callback=sandbox_pings'); ?>
					</ol>
				</div><!-- #trackbacks-list .comments -->

<?php endif // REFERENCE: if ( $ping_count ) ?>
<?php endif // REFERENCE: if ( $comments ) ?>
<?php if ( 'open' == $post->comment_status ) : ?>
<?php $req = get_option('require_name_email'); // Checks if fields are required. Thanks, Adam. ;-) ?>

				<div id="respond">
					<h3><?php comment_form_title( __('Post a Comment', 'sandbox'), __('Post a Reply to %s', 'sandbox') ); ?></h3>
					<div id="cancel-comment-reply"><?php cancel_comment_reply_link() ?></div>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
					<p id="login-req"><?php printf(__('You must be <a href="%s" title="Log in">logged in</a> to post a comment.', 'sandbox'),
					get_bloginfo('wpurl') . '/wp-login.php?redirect_to=' . get_permalink() ) ?></p>

<?php else : ?>
					<div class="formcontainer">	
						<form id="commentform" action="<?php bloginfo('wpurl') ?>/wp-comments-post.php" method="post">

<?php if ( $user_ID ) : ?>
							<p id="login"><?php printf( __( '<span class="loggedin">Logged in as <a href="%1$s" title="Logged in as %2$s">%2$s</a>.</span> <span class="logout"><a href="%3$s" title="Log out of this account">Log out?</a></span>', 'sandbox' ),
								get_bloginfo('wpurl') . '/wp-admin/profile.php',
								wp_specialchars( $user_identity, 1 ),
								wp_logout_url(get_permalink()) ) ?></p>

<?php else : ?>

							<p id="comment-notes"><?php _e( 'Your email is <em>never</em> shared.', 'sandbox' ) ?> <?php if ($req) _e( 'Required fields are marked <span class="required">*</span>', 'sandbox' ) ?></p>

							<div class="form-label"><label for="author"><?php _e( 'Name', 'sandbox' ) ?></label> <?php if ($req) _e( '<span class="required">*</span>', 'sandbox' ) ?></div>
							<div class="form-input"><input id="author" name="author" class="text<?php if ($req) echo ' required'; ?>" type="text" value="<?php echo $comment_author ?>" size="30" maxlength="50" tabindex="3" /></div>

							<div class="form-label"><label for="email"><?php _e( 'Email', 'sandbox' ) ?></label> <?php if ($req) _e( '<span class="required">*</span>', 'sandbox' ) ?></div>
							<div class="form-input"><input id="email" name="email" class="text<?php if ($req) echo ' required'; ?>" type="text" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" /></div>

							<div class="form-label"><label for="url"><?php _e( 'Website', 'sandbox' ) ?></label></div>
							<div class="form-input"><input id="url" name="url" class="text" type="text" value="<?php echo $comment_author_url ?>" size="30" maxlength="50" tabindex="5" /></div>

<?php endif // REFERENCE: * if ( $user_ID ) ?>

							<div class="form-label"><label for="comment"><?php _e( 'Comment', 'sandbox' ) ?></label></div>
							<div class="form-textarea"><textarea id="comment" name="comment" class="text required" cols="45" rows="8" tabindex="6"></textarea></div>

							<div class="form-submit"><input id="submit" name="submit" class="button" type="submit" value="<?php _e( 'Post Comment', 'sandbox' ) ?>" tabindex="7" /><input type="hidden" name="comment_post_ID" value="<?php echo $id ?>" /></div>

							<div class="form-option"><?php comment_id_fields(); ?></div>

						</form><!-- #commentform -->
					</div><!-- .formcontainer -->
<?php endif // REFERENCE: if ( get_option('comment_registration') && !$user_ID ) ?>

				</div><!-- #respond -->
<?php endif // REFERENCE: if ( 'open' == $post->comment_status ) ?>

			</div><!-- #comments -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php wp_title( '-', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ) ?></title>
	<link rel="icon" type="image/png" href="http://www.cearena.info/favicon.png" />
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); // support for comment threading ?>
<?php wp_head() // For plugins ?>
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php printf( __( '%s latest posts', 'sandbox' ), wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'sandbox' ), wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" /> 
</head>

<body class="<?php sandbox_body_class() ?>">
<script type="text/javascript">
	document.body.oncopy=function()
	{
	event.returnValue=false;
	var txt_cr=document.selection.createRange().text;
	var curr_url = window.location;
	var copy_cr="\nFrom - ";
	clipboardData.setData('Text',txt_cr+copy_cr+ curr_url);
	}
</script>



	<h1 class="hidden">Consiliul Elevilor Arena</h1>
	<div id="header"><a href="<?php echo home_url(); ?>">
		<img class="farabordura" src="<?php bloginfo('template_directory'); ?>/images/bg_header.png" alt="CEArena" height="120" width="1024" />
	</a></div><!--  #header -->

	<div id="header_nav">
		<?php wp_nav_menu(); ?>
		<?php /*sandbox_globalnav()*/ ?>
	</div><!-- #header_nav -->

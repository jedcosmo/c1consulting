<?php 

if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>

<!DOCTYPE html>

<?php

global $kerna_options;

 ?>

<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<?php if(isset($kerna_options['meta_author']) && $kerna_options['meta_author']!='') : ?>

	<meta name="author" content="<?php echo esc_attr($kerna_options['meta_author']); ?>" />	

	<?php else: ?>

	<meta name="author" content="<?php esc_attr(bloginfo('name')); ?>" />

	<?php endif; ?>

	<?php if(isset($kerna_options['meta_author']) && $kerna_options['meta_desc']!='') : ?>

	<meta name="description" content="<?php echo esc_attr($kerna_options['meta_desc']); ?>" />	

	<?php endif; ?>

	<?php if(isset($kerna_options['meta_author']) && $kerna_options['meta_keyword']!='') : ?>

	<meta name="keyword" content="<?php echo esc_attr($kerna_options['meta_keyword']); ?>" />	

	<?php endif; ?>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0" />

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if(isset($kerna_options['favicon']['url']) && $kerna_options['favicon']['url']!='') :  ?>

	<link rel="shortcut icon" href="<?php echo esc_url($kerna_options['favicon']['url']); ?>">

	<?php endif; ?>



	<?php

	// WordPress Head

	wp_head();

	?>

<script type="text/javascript">

jQuery(document).ready(function(){
	jQuery("#deparment_job").html('<iframe id="deparment_job" width="100%" height="500" frameborder="0" scrolling="yes" onload="window.scrollTo(0,0)" src="http://c1consulting.com/careers"></iframe>');
});
</script>
</head> 

<!-- BEGIN BODY -->

<?php $pageArray = explode("/", get_page_template()); 

$pageTemplate = end($pageArray);

?>

<body  <?php if(isset($kerna_options['box_layout']) && $kerna_options['box_layout']==1)	echo'id="boxed"';?> <?php body_class(); ?>> 

<?php if ( isset($kerna_options['preloader'])  && $kerna_options['preloader'] == 1 ) : ?> 	

    <div id="loader">

	    <div class="loader-container">

	    	<div class="loading-css"></div>

	    	<?php if(isset($kerna_options['preloader-logo']['url']) && $kerna_options['preloader-logo']['url']!='') : ?>

	        <img src="<?php echo esc_url($kerna_options['preloader-logo']['url']); ?> "   alt="" class="loader"/>

	        <?php else : ?>

	        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/loader.gif" alt="" class="loader">

	        <?php endif; ?>

		        

	    </div>

	</div>

<?php endif ; ?>



  	

 <!--Begin wrapper-->   

<div id="wrapper" <?php if(isset($kerna_options['box_layout']) && $kerna_options['box_layout']==1)	echo 'class="container-fluid"';?>> 



<?php if(isset($kerna_options['header_layout']) && $kerna_options['header_layout']==1):

	get_template_part('partials/navbar-dark');

else:

	get_template_part('partials/navbar');

endif;



if (!is_page_template('kerna-page-builder.php') ) :

	if(!is_page_template('kerna-page-builder-boxed.php')):

		if(!is_page_template('kerna-page-builder-dark.php')):?>

	

	<?php

		$pageid=get_the_ID();

		$page_setting_activate=get_post_meta( $pageid, 'kerna_pagetitle_activate',true);

		if(isset($page_setting_activate) && $page_setting_activate=='on') {

		  $page_setting_image=get_post_meta( $pageid, 'kerna_pagetitle_image',true);

		  	

		  	if(!empty($page_setting_image)):?>

		  	<section id="page-header" class="section background" style="background:url('<?php echo esc_url($page_setting_image); ?>') no-repeat center center; background-size: cover;">

		   

		   <?php endif;

		}

		elseif (isset($kerna_options['background-image']) && $kerna_options['background-image']['url']!=''){?>

		   <section id="page-header" class="section background" style="background:url('<?php echo esc_url($kerna_options['background-image']['url']) ; ?>') no-repeat center center; background-size: cover;">

		<?php }else{?>	

			<section id="page-header" class="section background">

		<?php }?>

        <?php get_template_part('partials/breadcrumb');?>

    	</section><?php

		endif;

	endif;

endif;

?>
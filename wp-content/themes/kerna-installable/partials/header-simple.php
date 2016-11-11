<?php 

if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>

<!DOCTYPE html>

<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->

<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->

<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->

<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->



<?php

global $kerna_options;

 ?>

<html <?php language_attributes(); ?>>

<head>



	<meta charset="<?php bloginfo('charset'); ?>" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<?php if(isset($kerna_options['meta_author']) && $kerna_options['meta_author']!='') : ?>

		<meta name="author" content="<?php echo esc_attr($kerna_options['meta_author']); ?>">	

	<?php else: ?>

		<meta name="author" content="<?php esc_attr(bloginfo('name')); ?>">

	<?php endif; ?>

	<?php if(isset($kerna_options['meta_author']) && $kerna_options['meta_desc']!='') : ?>

		<meta name="description" content="<?php echo esc_attr($kerna_options['meta_desc']); ?>">	

	<?php endif; ?>

	<?php if(isset($kerna_options['meta_author']) && $kerna_options['meta_keyword']!='') : ?>

		<meta name="keyword" content="<?php echo esc_attr($kerna_options['meta_keyword']); ?>">	

	<?php endif; ?>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if(isset($kerna_options['favicon']['url'])) :  ?>

		<link rel="shortcut icon" href="<?php echo esc_url($kerna_options['favicon']['url']); ?>">

	<?php endif; ?>



	<?php



	wp_head();

	?>



</head> 

<?php $pageArray = explode("/", get_page_template()); 

$pageTemplate = end($pageArray);

?>

<?php $bodyid='comingsoon';

if($pageTemplate=='page.php' || is_page_template('404.php'))

$bodyid='notfound';?>

<body id="<?php echo $bodyid;?>" <?php body_class(); ?>> 

<?php if ( isset($kerna_options['preloader'])  && $kerna_options['preloader'] == 1 ) : ?> 	

    <div id="loader">

	    <div class="loader-container">

	    	<div class="loading-css"></div>

	    	<?php if(isset($kerna_options['preloader-logo']['url']) && $kerna_options['preloader-logo']['url']!='') : ?>

	        <h3 class="loader-back-text"><img src="<?php echo esc_url($kerna_options['preloader-logo']['url']); ?> "   alt="" class="loader"/></h3>

	        <?php else : ?>

	        <h3 class="loader-back-text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/loader.gif" alt="" class="loader"></h3>

	        <?php endif; ?>

	        

	    </div>

	</div>

<?php endif ; ?>



  	

 <!--Begin wrapper-->   

<div id="wrapper"> 


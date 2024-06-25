<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html lang="en" <?php language_attributes(); ?>>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/assets/css/datepicker.css" rel="stylesheet" type="text/css" />
	<!--Slick css-->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/slick-theme.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.css" rel="stylesheet">
	<!--Fevicon Icon-->
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/fevicon.png" type="image/png" sizes="32x32">
	<!--Font awesome-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/font-awesome.css"/>
	<!--Google font-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<!-- Custom CSS -->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" rel="stylesheet">
<?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <!--Header start here-->
    <header id="HeaderSec">
       <div class="container-fluid">
		  <div class="header-wrap">
		    <nav class="navbar navbar-expand-lg navbar-light">
			  <div class="container-fluid">
				<a class="navbar-brand" href="<?php echo home_url('/'); ?>">
				  <img src="<?php the_field('header_logo','option'); ?>" alt="">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
				 <div class="header-bottom d-flex align-items-center ms-auto">
					  <ul class="navbar-nav me-5">
					  <?php wp_nav_menu(array('sort_column'=>'menu_order','menu'=>'Main Menu','container'=>false,'items_wrap'=>'%3$s')); ?>
					  </ul>
					  <div class="d-flex book-app">
					  <?php 
						$link = get_field('book_appointment_button_','option');
						if( $link ): 
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
							<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>
					 </div>
				  </div>
				  <div class="header-top">
				    <div class="header-left">
					   <ul>
					   <?php if(get_field('head_left','option')):while(the_repeater_field('head_left','option')): ?>
						   <li><em><?php the_sub_field('call_us_label'); ?></em> <a href="<?php the_sub_field('contact_link'); ?>"><?php the_sub_field('contact_details'); ?></a></li>
						   <li><a href="<?php the_sub_field('contact_link_2'); ?>"><?php the_sub_field('contact_detail2'); ?></a></li>
						   <?php  endwhile; endif; ?>
					   </ul>  
				    </div>
					<div class="header-right">
					   <ul>
					   <?php if(get_field('head_right','option')):while(the_repeater_field('head_right','option')): ?>
						   <li><em><?php the_sub_field('content'); ?>:</em> <a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('details'); ?> </a></li>
						  <?php  endwhile; endif; ?>
					   </ul> 
					   <div class="social-media ps-4">
						 <ul>
						 <?php if(get_field('social_feeds','option')):while(the_repeater_field('social_feeds','option')): ?>
						   <li><a href="<?php the_sub_field('social_link'); ?>"><i class="<?php the_sub_field('social_icons'); ?>"></i></a></li> 
						   <?php  endwhile; endif; ?> 
						   </ul>
					   </div>
					</div>
				  </div>
				</div>
			  </div>
			</nav> 
		  </div>
	   </div>
    </header>
    <!--Header end here-->
    <?php wp_body_open(); ?>

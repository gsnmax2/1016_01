<?php /*
*
*Template name: Testimonial
*/get_header(); 
global $post;
$page_slug = $post->post_name;
?>
	  
    <!--Breadcrumb start here-->
    <section class="breadcrumb mb-5">
	  <div class="container">
		<div class="container-reset">
		    <ul class="d-flex align-items-center">
			  <li class="item-page-name">
				<p><?php the_title(); ?></p>
			  </li>
			  <li class="item-home">
				<a href="<?php echo home_url('/'); ?>">Home</a>
			  </li>
			  <li class="item-current">
				<a href="<?php echo home_url('/'); ?><?php echo $page_slug; ?>"><?php the_title(); ?></a>
			  </li>
			</ul>
		</div>
	  </div>
	</section>
    <!--Breadcrumb end here-->
	  
	<!--What our patients say sec start here-->
	   <section class="patients-sec">
	     <div class="container">
		   <div class="container-reset">
		    <div class="patients-heading pb-5">
			  <p><?php the_field('testimonial_title'); ?></p>
			  <h2><?php the_field('testimonial_sub-title'); ?></h2>
			</div>
			<div class="patients-slider">
			<?php if(get_field('testimonials_top')): while(the_repeater_field('testimonials_top')): ?>
			  <div class="patients-wrap">
				  <div class="patients-slide d-flex">
					  <div class="patients-left">
						<img src="<?php the_sub_field('picture'); ?>" alt="">
					  </div>
					  <div class="patients-right">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/comma.png" alt="" class="comma">
						<p><?php the_sub_field('testimonial_content'); ?></p>
						<img src="<?php the_sub_field('sign'); ?>" alt="">
						<h5><?php the_sub_field('name'); ?></h5>
						<h6><?php the_sub_field('designation'); ?></h6>
					  </div>
				  </div>
			   </div>
			   <?php endwhile; endif; ?> 
			</div>
		   </div>
		 </div>
	   </section>
	<!--What our patients say sec start here-->
	  
	<!--Some of the best testimonials sec start here--> 
	  <section class="best-testimonials">
	    <div class="container">
		  <div class="container-reset">
			 <div class="row">
			   <div class="col-md-8">
				  <div class="best-testimonials-slider">
				  <?php if(get_field('best_testimonials')): while(the_repeater_field('best_testimonials')): ?>
				    <div class="best-testimonials-slide">
						<h6><?php the_sub_field('patient_say'); ?></h6>
						<h5><?php the_sub_field('best_testimonial_title'); ?></h5>
						<p><?php the_sub_field('testimonial_content'); ?></p>
						<img src="<?php the_sub_field('sign'); ?>" alt="" class="signature">
						<h3><?php the_sub_field('name'); ?></h3>
						<h4><?php the_sub_field('designation'); ?></h4>
					</div>
					<?php endwhile; endif; ?> 
				  </div>
			   </div>
			   <div class="col-md-4">
				 <div class="young-asian">
				   <img src="<?php the_field('woman_image'); ?>">  
				 </div> 
			   </div>
			 </div>
		  </div>
		</div>
	  </section>
	<!--Some of the best testimonials sec start here--> 
	  
	<!--What our patients say bottom sec start here-->
	   <section class="testimonial-sec what-our-testi">
		 <div class="container">
		  <div class="container-reset">
			<div class="testimonial-bg">
				<p><?php the_field('testimonial_title_bottom'); ?></p>
				<h2><?php the_field('testimonial_sub-title_bottom'); ?></h2>
			  <div class="what-testi-slider">
			  <?php if(get_field('testimonials_bottom')): while(the_repeater_field('testimonials_bottom')): ?>  
				<div class="testimonial-slide">
				  <p><?php the_sub_field('testimonial_content'); ?></p>
				  <div class="people-wrap">
					 <div class="people-img">
					   <img src="<?php the_sub_field('picture'); ?>" alt="">
					 </div>
					 <div class="people-text">
					   <h3><?php the_sub_field('name'); ?></h3>
					   <p><?php the_sub_field('designation'); ?></p>
					 </div>
				  </div>
				 </div>
				 <?php endwhile; endif; ?> 
				
			</div>
		  </div>
		 </div>
	  </section>
	<!--What our patients say bottom sec start here-->
<?php get_footer(); ?>
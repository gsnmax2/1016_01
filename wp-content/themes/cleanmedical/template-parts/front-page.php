<?php /*
*
*Template name: Front page
*
*/get_header(); ?>
    
	<!--Hero sec start here-->
	  <section class="hero-sec">
	    <div class="hero-slider">
		<?php if(get_field('banner_slider')): while(the_repeater_field('banner_slider')): ?>
		  <div class="hero-slide">
			 <img src="<?php the_sub_field('slider_image'); ?>" alt="">
			  <div class="container">
			    <div class="hero-text">
				  <h2><?php the_sub_field('slider_title'); ?> <em><?php the_sub_field('slider_sub-title'); ?></em></h2>  
				  <p><?php the_sub_field('slider_content'); ?></p>
				  <?php 
					$link = get_field('slider_button');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>
				</div>
			  </div>
		  </div> 
		  <?php endwhile; endif; ?> 
		</div>
	  </section>
	<!--Hero sec end here-->
	  
	<!--BOOK YOUR APPOINTMENT sec start here--> 
	  <section class="book-sec">
<?php echo do_shortcode('[contact-form-7 id="386" title="BOOK YOUR APPOINTMENT"]'); ?>
	  </section>
	<!--BOOK YOUR APPOINTMENT sec end here--> 
	  
	<!--A Great Place sec start here-->
	  <section class="great-sec">
	    <div class="container">
		  <div class="great-wrap">
			 <div class="row align-items-center">
			   <div class="col-md-5">
				  <div class="great-img">
				   <img src="<?php the_field('great_day_image'); ?>" alt="">
					<div class="clean-text">
				     <h3><?php the_field('claen_medical_title'); ?></h3>
				    </div>
				  </div>
			   </div>
			   <div class="col-md-7">
				 <div class="great-text">
				   <h2><?php the_field('great_day_title'); ?></h2>
				   <?php the_field('great_day_content'); ?>
				</div>
			   </div>
			 </div>
		  </div>  
		</div>
	  </section>
	<!--A Great Place sec end here-->
	  
	<!--Our Services sec start here-->
	  <section class="our-services">
		 <div class="container-fluid">
	      <h2>Our Services</h2>
		   <div class="row services-slider pb-4">
		   <?php if(get_field('our_services')): while(the_repeater_field('our_services')): ?>
			 <div class="col-md-3 services-slide">
			   <div class="card">
				  <img src="<?php the_sub_field('service_image'); ?>" alt="">
				  <div class="card-content">
				   <h3><?php the_sub_field('services_title'); ?></h3>
				   <?php the_sub_field('service_content'); ?>
								  </div>
			   </div>
			 </div>
			 <?php endwhile; endif; ?> 

		   </div>
		 </div>
	  </section>
	<!--Our Services sec end here-->
	  
	<!--Testimonial sec start here-->
	  <section class="testimonial-sec">
	    <div class="testimonial-bg">
		  <img src="<?php the_field('testimonial_background_image'); ?>" alt=""> 
		  <div class="testimonial-slider">
		  <?php if(get_field('testimonials')): while(the_repeater_field('testimonials')): ?>
			<div class="testimonial-slide">
			<?php the_sub_field('testimonial_content'); ?>
						  <div class="people-wrap">
				 <div class="people-img">
				   <img src="<?php the_sub_field('image'); ?>" alt="">
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
	  </section>
	<!--Testimonial sec start here-->
	
	<!--Certifications sec start here-->
	  <section class="certifications-sec">
	     <div class="container">
		   <div class="top-heading">
			  <h2><?php the_field('certifications_main_head'); ?></h2> 
		   </div> 
			<div class="row certifications-slider">
			<?php if(get_field('certifications')): while(the_repeater_field('certifications')): ?>
			  <div class="col-md-3 certifications-slide">
				<img src="<?php the_sub_field('certificate_image'); ?>" alt="">
				<p><?php the_sub_field('certifications_name'); ?></p>
			  </div>
			  <?php endwhile; endif; ?> 
			</div>
		 </div>
	  </section>
	<!--Certifications sec end here-->
	  
	<!--Map sec start here--> 
	  <section class="map-sec">
	    <div class="row g-0">
		  <div class="col-md-6">
			 <div class="map-img">
			   <img src="<?php the_field('map_image'); ?>" alt=""> 
			 </div>
		  </div>
		  <div class="col-md-6">
			 <div class="form-wrap" style="background-image: url(<?php the_field('form_bg_image'); ?>);">
			   <div class="form-area">
			     <h2>Have some questions?</h2>
                 <?php $sendusform = get_field('form_shortcode'); 
				 echo do_shortcode($sendusform);  ?>
			   </div>
			 </div>
		  </div>
		</div>
	  </section>
	<!--Map sec end here--> 
	 
	<?php get_footer(); ?>

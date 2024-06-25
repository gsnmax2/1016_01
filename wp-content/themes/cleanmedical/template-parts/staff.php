<?php 
/*
*
*Template name: Staff
*
*/get_header(); 
  global $post;
  $page_slug = $post->post_name;
?>
	<style>
		.datepicker.datepicker-inline { display: none!important; }
	</style>  
   <!--Breadcrumb start here-->
   <section class="breadcrumb mb-5">
	  <div class="container">
		<div class="container-reset">
		    <ul class="d-flex align-items-center">
			  <li class="item-page-name">
				<p>Our Staff</p>
			  </li>
			  <li class="item-home">
				<a href="<?php echo home_url('/'); ?>#">Home</a>
			  </li>
			  <li class="item-current">
				<a href="<?php echo home_url('/'); ?><?php echo $page_slug; ?>">Staff</a>
			  </li>
			</ul>
		</div>
	  </div>
	</section>
    <!--Breadcrumb end here-->
	  
	<!--Our Staff sec start here-->
	  <section class="our-staff-sec">
		<div class="container">
	     <div class="container-reset">
		   <div class="filters filter-button-group">
				<ul>
				<?php
/* 		$args = array('hide_empty' => false); */
			$terms = get_terms('staff_types', $args); // Get Taxonomy Terms
	        $count = count($terms);
	            echo '<li class="active"><a href="javascript:void(0);" data-filter="*">All</a></li>';
	        if ( $count > 0 ){
	 
	            foreach ( $terms as $term ) {
	 
	                $termname = strtolower($term->name);
	                $termname = str_replace(' ', '-', $termname);
	                echo '<li><a href="javascript:void(0);" title="Staff" data-filter="'.$termname.'">'.$term->name.'</a></li>';
	            }
	        }
	    ?>
				
				</ul>
			</div>
			<div id="container" class="isotope row pb-5">
			<?php
		$args = array( 
			'post_type' => 'staff',
			'posts_per_page' => -1, 
			'orderby' => 'menu_order', // When order via "Simple Page Ordering"-Plugin
			'order' => 'ASC'
		);
		
		$loop = new WP_Query( $args );
		$i=1; while ( $loop->have_posts() ) : $loop->the_post(); 
		 
		$terms = get_the_terms( $post->ID, 'staff_types' );	// Custom Taxonomy Terms
		if ( $terms && ! is_wp_error( $terms ) ) : 
		
		$links = array();
		
		foreach ( $terms as $term ) {
			$links[] = $term->name;
		}
		
		$tax_links = join( " ", str_replace(' ', '-', $links));          
		$tax = strtolower($tax_links);
		else :	
		$tax = '';					
		endif;
		
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium');
		$url = $thumb[0];
		$width = $thumb[1];
		$height = $thumb[2];
	?>
		<?php
    global $post;
    $post_slug = $post->post_name;
?>	

			   <div class="grid-item col-md-4 col-lg-3 " data-filter="<?php echo $tax; ?>">
					<a class="staff-details" data-bs-toggle="modal" href="#<?php echo $post_slug; ?>" role="button">
					<img src="<?php echo $url; ?>" alt="">
					</a>
					<div class="filters-content">
				      <h2><?php the_title(); ?></h2>
					  <p><?php the_field('designation'); ?></p>
				    </div>
				</div>
				<?php $i++; endwhile;  ?>
	<?php wp_reset_query(); ?>
             
			</div>
             <div class="showing-page pb-5">
			  <!-- <p>Showing 1 to 12 of 36 staffs</p> -->
			   <div class="isotope-pager" style="padding-top: 15px; text-align:center;"></div>  
		     </div>
		 </div>
		</div>
	  </section>
	<!--Our Staff sec start here-->
	  
   <!--Staff Details popup start here--> 
   <?php
		$args = array( 
			'post_type' => 'staff',
			'posts_per_page' => -1, 
			'orderby' => 'menu_order', // When order via "Simple Page Ordering"-Plugin
			'order' => 'ASC'
		);
		
		$loop = new WP_Query( $args );
		$i=1; while ( $loop->have_posts() ) : $loop->the_post(); 
		//$post_slug = $post_obj->post_name;
		$terms = get_the_terms( $post->ID, 'staff_types' );	// Custom Taxonomy Terms
		if ( $terms && ! is_wp_error( $terms ) ) : 
		
		$links = array();
		
		foreach ( $terms as $term ) {
			$links[] = $term->name;
		}
		
		$tax_links = join( " ", str_replace(' ', '-', $links));          
		$tax = strtolower($tax_links);
		else :	
		$tax = '';					
		endif;
		
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium');
		$url = $thumb[0];
		$width = $thumb[1];
		$height = $thumb[2];
	?>
	<?php
    global $post;
    $post_slug = $post->post_name;
?>
   <div class="staff-details-wrap">
	<div class="modal fade" id="<?php echo $post_slug; ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
	  <div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalToggleLabel"></h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<div class="row g-5 pb-5 align-items-end staff-profile">
			  <div class="col-md-12 col-lg-6">
				 <img src="<?php echo $url; ?>" alt="">
			  </div>
			  <div class="col-md-12 col-lg-6 ps-5">
				 <h2><?php the_title(); ?></h2>
				 <p><?php the_field('designation'); ?></p>
			<?php if(get_field('staff_profile_details')): while(the_repeater_field('staff_profile_details')): ?>
			   <ul class="staff-profile-details">
				 <li><p>Specialty:</p> <em><?php the_sub_field('specialty'); ?></em></li>  
				 <li><p>Degrees:</p> <em><?php the_sub_field('degrees'); ?></em></li>  
				 <li><p>Training:</p> <h6><?php the_sub_field('training'); ?></h6></li>  
				 <li><p>Contact info:</p> <em>
					 <ul class="contact-no"> 
					 <?php while(the_repeater_field('contact_info')): ?>
					 <li><a href="<?php the_sub_field('contact_number_link'); ?>"><?php the_sub_field('contact_number'); ?></a></li> 
					 <?php endwhile; ?>
					</ul></em>
				</li>  
			   </ul>
			   <?php endwhile; endif; ?>
				<div class="socials-media">
				  <ul class="d-flex">
					 <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook-f"></i> Facebook</a></li>
					 <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
					 <li><a href="#"><i class="fab fa-linkedin-in"></i> Linkedin</a></li>
				  </ul>  
				</div>
			  </div>
			</div>
			<div class="row g-5 staff-text-wrap">
			  <div class="col-md-12 col-lg-6">
				<h2><?php the_title(); ?> Information</h2>
				<?php the_field('staff_information'); ?>
			  </div>
			  <div class="col-md-12 col-lg-6 ps-5">
				<h2>Book an Appointment</h2>
				<?php echo do_shortcode('[contact-form-7 id="388" title="Book Appointment staff"]'); ?>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
   </div>
   <?php $i++; endwhile;  ?>
	<?php wp_reset_query(); ?>
		   
	<!--Staff Details popup end here-->
	  
<?php get_footer(); ?>

  
  <?php get_header(); while (have_posts()) : the_post();?>
  <!--Breadcrumb start here-->
  <section class="breadcrumb mb-5">
	  <div class="container">
		<div class="container-reset">
		    <ul class="d-flex align-items-center">
			  <li class="item-page-name">
				<p><?php the_title(); ?></p>
			  </li>
			  <li class="item-home">
				<a href="#">Home</a>
			  </li>
			  <li class="item-current">
				<a href="#">Press</a>
			  </li>
			</ul>
		</div>
	  </div>
	</section>
    <!--Breadcrumb end here-->
	  
	<!--Press sec start here-->
	   <section class="press-sec pb-5">
		<div class="container">
	     <div class="container-reset">
		   <div class="row g-5">
			  <div class="col-md-12">
			     <div class="row align-items-center researchers-text pb-5">
				   <div class="col-md-12 pb-4">
                   <?php 
							$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							if($feat_image){?><img src="<?php echo $feat_image; ?>" alt="media" >
						<?php } ?>  
				   </div>
				   <div class="col-md-12">
					  <h2><?php the_title(); ?></h2>
					   <h3><i class="fa fa-calendar-alt"></i><?php the_time('F j, Y'); ?></h3>
					  <?php the_content(); ?>
				  <div class="comment-box pb-4">
                      <?php 
                      if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                    ?>
				    
				    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/book-an-appointment.png" alt="" class="mb-3">
				  </div>
			  </div> 
		   </div> 
		 </div>
		</div>
	  </section>
	<!--Blog sec start here-->

    <?php endwhile; get_footer(); ?>
<?php 
/*
*
*Template name: Standalone
*
*/get_header(); ?>
	  
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
				<a href="#"><?php the_title(); ?></a>
			  </li>
			</ul>
		</div>
	  </div>
	</section>
    <!--Breadcrumb end here-->
	  
	<!--Standalone sec start here-->
	 <section class="press-sec standalone-sec pb-5">
		<div class="container">
	     <div class="container-reset">
		   <div class="row g-5">
			  <div class="col-md-12">
			     <div class="row align-items-center researchers-text pb-1">
				   <div class="col-md-12 pb-5">
					<video controls width="100%">
						<source src="<?php the_field('video_file'); ?>"type="video/webm">
						<source src="video/Sample_512x288.mp4"type="video/mp4">
					</video> 
				   </div>
					<div class="row mb-5">
					  <div class="col-md-5">
						 <h4><?php the_field('maintitle'); ?></h4>
					  </div>
					  <div class="col-md-7">
					  <?php the_field('content'); ?>
										  </div>
					</div>
					<div class="get-free-wrap mb-5">
					   <div class="get-free-left">
						  <h5><?php the_field('consultation_title'); ?></h5>
						  <?php 
					$link = get_field('contact_number');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>
					   </div>
					   <div class="get-free-btn">
					   <?php 
					$link = get_field('get_free_consultation_button');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>
					   </div>
					</div>
				   <div class="col-md-12">
					  <h2><?php the_field('title'); ?></h2>
					   <h3><i class="fa fa-calendar-alt"></i><?php the_field('date'); ?></h3>
					   <p><?php the_field('content_2'); ?></p>
					</div>
				 </div>
				  <div class="press-list-text standalone-list pb-5">
				  <?php the_field('standalone_list'); ?>
				</div>
				  <div class="standalone-tools pb-4">
				    <ul class="row g-5">
					<?php if(get_field('standalone_tools')): while(the_repeater_field('standalone_tools')): ?>
					  <li class="d-flex col-md-4">
						<div class="tools-left-img">
						  <img src="<?php the_sub_field('tool_image'); ?>" alt="">
					    </div>
						<div class="tools-right-text">
						   <h3><?php the_sub_field('tool_title'); ?></h3>
						   <p><?php the_sub_field('tool_description'); ?></p>
						</div>
					  </li> 
					  <?php endwhile; endif; ?> 
					</ul>
				  </div>
			  </div> 
		   </div> 
		 </div>
		</div>
	  </section>
	<!--Standalone end here-->
	  
<?php get_footer(); ?>
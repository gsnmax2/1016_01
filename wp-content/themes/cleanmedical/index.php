<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>

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
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			  </li>
			</ul>
		</div>
	  </div>
	</section>
    <!--Breadcrumb end here-->
	  
	<!--Blog sec start here-->
	  <section class="blog-sec pb-5">
	   <div class="container">
	     <div class="container-reset">
		   <div class="row g-5">
			  <div class="col-md-8">
			     <div class="row blog-list">
				 <?php while (have_posts()) : the_post(); ?>
					 <div class="col-md-12 pb-5">
					 <?php 
						$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						if($feat_image){?><a href="<?php the_permalink(); ?>"><img src="<?php echo $feat_image; ?>" alt="media" ></a>
					<?php } ?> 

						 <ul class="d-flex align-items-center">
						   <li class="life-style">
						   <?php 
							$link = get_field('list_style_button');
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>
							</li>
						   <li class="datepicker"><div  class="input-group" >
							    <span class="input-group-addon"><i class="fa fa-calendar-alt"></i></span>
								<?php the_time('m-d-Y'); ?>
								<!-- <input class="form-control" type="text" readonly /> -->
							</div>
						   </li>
						   <li class="posted-by"><a href="#">Posted By: <img src="<?php the_field('posted_by_image'); ?>" alt=""> <em><?php the_field('posted_by_name'); ?></em></a></li>
						   <li class="posted-by"><a href="#">Time: <i class="far fa-clock"></i> <em><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ''; ?></em></a></li>
						 </ul>
						<h2><?php the_title(); ?></h2>
						<?php the_excerpt(); ?>
					 </div>
					 <?php endwhile;  ?>
 
					
				 </div>
				   <!-- <nav aria-label="Page navigation example pagination-wrap">
				     <div class="d-flex align-items-center justify-content-end showing-wrap">
					   	 <p>Showing 1 to 12 of 36 Articles</p>
						  <ul class="pagination">
							<li class="page-item">
							  <a class="page-link" href="#" aria-label="Previous">
								<span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
							  </a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">4</a></li>
							<li class="page-item"><a class="page-link" href="#">...</a></li>
							<li class="page-item">
							  <a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
							  </a>
							</li>
						  </ul>  
					 </div>
				   </nav> -->
			  </div> 
			  <div class="col-md-4">
			    <div class="most-viewed">
				
				<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				 <div class="input-group search-bar pb-5">
					<input type="search" name="s" class="form-control" placeholder="Search...">
					<div class="input-group-append">
					  <button class="btn search-btn btn-secondary" type="submit">
						<i class="fa fa-search"></i>
					  </button>
					</div>
				  </div>
				</form>
				   <div class="most-viewed-list pb-4">
					  <h2>Most Viewed</h2>
					   <ul>
					   <?php
						query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&posts_per_page=4');
						if (have_posts()) : while (have_posts()) : the_post();
						?>
							<li class="d-flex">
						   <div class="most-left-img">
						   <?php 
								$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
								if($feat_image){?><img src="<?php echo $feat_image; ?>" alt="media" >
							<?php } ?>

						   </div>
						   <div class="most-right-text">
							 <h6><?php echo wp_trim_words( get_the_title(), 3, '...' ); ?></h6>
							 <p><?php the_time('d F Y'); ?></p>
						   </div>
						 </li>
						<?php
						endwhile; endif;
						wp_reset_query();
						?>
					   </ul>
				   </div>
					<div class="today-stories pb-5">
					  <h2>Today Stories</h2>
					  <div class="today-stories-slider">
					  <?php
						$day = date('j');
						query_posts('day='.$day);
						if (have_posts()) :
						while (have_posts()) : the_post(); 
						?>
              
						  <div class="today-stories-slide">
						  <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
								if($feat_image){?><a href="<?php the_permalink(); ?>"><img src="<?php echo $feat_image; ?>" alt="media" ></a>
							<?php } ?>
							 <div class="today-stories-wrap">
							 <?php 
							$link = get_field('list_style_button');
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<h3><?php echo esc_html( $link_title ); ?></h3>
							<?php endif; ?>
							   <!-- <h3>Life Style</h3> -->
							   <h2><?php the_title(); ?></h2>
							   <ul class="d-flex">
								 <li>Kiron Day</li> 
								 <li><?php the_time('d F Y'); ?></li> 
							   </ul>
							 </div>
						  </div>
						  <?php endwhile; ?>
<?php endif; ?>
						
					  </div>
					</div>
					<div class="subscribe-wrap">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/subscribe-bg.png" alt="">
					   <?php echo do_shortcode('[newsletter_form form="1"] '); ?>
					</div>
				</div>
			  </div>
		   </div> 
		 </div>
		</div>
	  </section>
	<!--Blog sec start here-->



<?php get_footer();

<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
setPostViews(get_the_ID());

/* Start the Loop */  ?>
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
	  
	<!--Blog sec start here-->
	   <section class="blog-sec pb-5">
		<div class="container">
	     <div class="container-reset">
		   <div class="row g-5">
			  <div class="col-md-8">
			     <div class="row blog-list">
					 <div class="col-md-12 pb-5">
					 <?php 
						$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						if($feat_image){?><img src="<?php echo $feat_image; ?>" alt="media" >
					<?php } ?> 
						 <ul class="d-flex align-items-center">
						   <li class="life-style"><?php 
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
						<h2><?php the_title();  ?></h2>
						<?php the_content(); ?>
					</div>
				 </div>
				  <div class="libero-volutpat-sec">
				     <div class="libero-volutpat-slider">
					 <?php if(get_field('slider')): while(the_repeater_field('slider')): ?>
					    <div class="libero-volutpat-slide">
						   <div class="libero-heading text-center pb-5">
							   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon.svg" alt="">
							  <h2><?php the_sub_field('title'); ?></h2>
						   </div>
						   <?php the_sub_field('content_2'); ?>
							<div class="row pt-4 pb-5">
							<?php while(the_repeater_field('images')): ?>
							  <div class="col-md-6">
								 <img src="<?php the_sub_field('image_2'); ?>" alt="">
								  <em><?php the_sub_field('image_title'); ?> </em>
							  </div>
							  <?php endwhile; ?>
							</div>
							<?php the_sub_field('content'); ?>
							<div class="like-social-wrap d-flex align-items-center justify-content-between pt-4">
							   <ul class="like-comm-list d-flex align-items-center">
								 <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/hart-icon.svg" alt=""> 18</li>
								 <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/comment-icon.svg" alt=""> 
								 <?php echo get_comments_number();?>
								</li>
								 <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/posted-people.png" alt=""> John Doe</li>
							   </ul>
								<ul class="d-flex social-media">
								  <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i class="fab fa-linkedin-in"></i></a></li>
								  <li><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>"><i class="fab fa-twitter"></i></a></li>
								  <li><a href="https://instagram.com/intent/tweet?url=<?php the_permalink(); ?>"><i class="fab fa-instagram"></i></a></li>
								  <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook-f"></i></a></li>
								</ul>
							</div>
						</div> 
						<?php endwhile; endif; ?>
					 </div>
                                  <div class="comment-box">
                                  <?php //get_template_part( 'template-parts/content/content-single' );
while (have_posts()) : the_post();
// if ( is_attachment() ) {
//      // Parent post navigation.
//      the_post_navigation(
//              array(
//                      /* translators: %s: Parent post link. */
//                      'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone' ), '%title' ),
//              )                        
//      );                               
// }                                            
                                                
//If comments are open or there is at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) {
        comments_template();                       
}                                                       
                                                        
                                                                
                                                                
endwhile; ?>                                                    
<?php comment_form(); ?>
                                                                
                                  </div> 
					 <?php	//get_template_part( 'template-parts/content/content-single' );
while (have_posts()) : the_post();
					 // Previous/next post navigation.
$twentytwentyone_next = is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' );
$twentytwentyone_prev = is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' );

$twentytwentyone_next_label     = esc_html__( 'Next', 'twentytwentyone' );
$twentytwentyone_previous_label = esc_html__( 'Previous', 'twentytwentyone' );

the_post_navigation(
	array(
		'next_text' => '' . $twentytwentyone_next_label . $twentytwentyone_next . '',
		'prev_text' => '' . $twentytwentyone_prev . $twentytwentyone_previous_label . '',
	)
	
);endwhile;
// End of the loop. ?>
				  </div>

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
							 <h6><?php echo wp_trim_words( get_the_title(), 4, '...' ); ?></h6>
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
					<div class="subscribe-wrap pb-5">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/subscribe-bg.png" alt="">
					   <?php echo do_shortcode('[newsletter_form form="1"] '); ?>
					</div>
					
					<div class="write-comment">
					<?php
					// $comments_args = array(
					// 	// change the title of send button 
					// 	'label_submit'=>'Submit',
					// 	// change the title of the reply section
					// 	'title_reply'=>'<h2>Write your <br> Comment</h2>',
					// 	// remove "Text or HTML to be displayed after the set of comment fields"
					// 	'comment_notes_after' => '',
					// 	// redefine your own textarea (the comment body)
					// 	'comment_field' => '<label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea class="form-control" id="CommentsTextarea2" style="height: 150px" aria-required="true"></textarea>',
					// );
					
					//comment_form($comments_args);?>

					  <h2>Write your <br> Comment</h2>
					  <p>Subscribe to our mailing list to get the new updates!</p>
					  <form  method="post" id="commentform">
						   <div class="row align-items-center"><div class="col-md-12 mb-4 input-box">
								<label for="FullName">Full Name</label>
								<input type="text" class="form-control" id="FullName" placeholder="Jennie Wilkerson">
							  </div>
							  <div class="col-md-12 mb-4 input-box">
								<label for="staticEmail2">Email</label>
								<input type="text" class="form-control" id="staticEmail2" placeholder="jenniewilkerson@info.com">
							  </div>
							  <div class="col-md-12 mb-4 input-box">
							   <label for="CommentsTextarea2">Comments</label>
							   <textarea class="form-control" id="CommentsTextarea2" style="height: 150px"></textarea>
							  </div>
							  <div class="col-md-12 input-box text-right">
								<button type="submit" class="btn btn-primary mb-3">Submit</button>
							  </div>
							</div>
						</form>
					</div>
				</div>
			  </div>
		   </div> 
		 </div>
		</div>
	  </section>
	<!--Blog sec start here-->
<?php 

get_footer();

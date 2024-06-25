<?php 
/*
*
*Template name: Press
*
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
	  
	<!--Press sec start here-->
	   <section class="press-sec pb-5">
	    <div class="container">
	     <div class="container-reset">
		   <div class="row g-5">
			  <div class="col-md-12">
			  <?php $pid = array(); query_posts(array('post_type'=>'press_post','posts_per_page' => 1));
               while (have_posts()) : the_post(); array_push($pid,$post->ID) ?>
			    <?php 
							$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							if($feat_image){?>
			     <div class="row align-items-center researchers-text pb-5">
					<div class="col-md-4">
					<a href="<?php the_permalink(); ?>"><img src="<?php echo $feat_image; ?>" alt="media" ></a>
						
					</div>
				   <div class="col-md-8">
					  <h2><?php the_title(); ?></h2>
					   <h3><i class="fa fa-calendar-alt"></i> <?php the_time('F j, Y'); ?></h3>
					   <?php the_excerpt(); ?>
					   </div>
				</div>
				 
				<?php } ?> 
				<?php endwhile; wp_reset_query(); ?>
				<?php  $args = array(
                                'post_type' => 'press_post', 'post_status' => 'publish','post__not_in' => $pid,'posts_per_page' => 1,'paged' => $paged
                            );
                            $arr_posts = new WP_Query( $args );

                            if ( $arr_posts->have_posts() ) :

                                while ( $arr_posts->have_posts() ) :
                                    $arr_posts->the_post(); ?>
				  <div class="study-suggests mb-5">
				     <h2><?php the_title(); ?></h2>
					 <h3><i class="fa fa-calendar-alt"></i><?php the_time('F j, Y'); ?></h3>
					 <?php the_excerpt(); ?>
					</div>
				 
					<?php
                            endwhile;
                           
                        endif;
                        ?>
				  <div class="row press-list pb-5">
				  <?php
                            $paged = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
                            $args = array(
                                'post_type' => 'press_post', 'post_status' => 'publish','post__not_in' => $pid,'posts_per_page' => -1,'paged' => $paged
                            );
                            $arr_posts = new WP_Query( $args );

                            if ( $arr_posts->have_posts() ) :

                                while ( $arr_posts->have_posts() ) :
                                    $arr_posts->the_post();
                                    ?>
				    <div class="col-md-4 pb-5">
					<?php 
							$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							if($feat_image){?><a href="<?php the_permalink(); ?>"><img src="<?php echo $feat_image; ?>" alt="media" ></a>
						<?php } ?> 
					  <h2><?php the_title(); ?></h2>
					  <h3><i class="fa fa-calendar-alt"></i><?php the_time('F j, Y'); ?></h3>
					  <?php the_excerpt(); ?>
					</div>

					<?php
                            endwhile;
                            wp_pagenavi(
                                array(
                                    'query' => $arr_posts,
                                )
                            );
                        endif;
                        ?>
					
				  </div>
				  <!-- <nav aria-label="Page navigation example pagination-wrap">
				     <div class="d-flex align-items-center justify-content-center showing-wrap">
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
		   </div> 
		 </div>
		</div>
	  </section>
	<!--Blog sec start here-->
	  
	<?php get_footer(); ?>
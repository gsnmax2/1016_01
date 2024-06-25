<?php /*
*
*Template name: FAQs
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
	  
	<!--Specialists sec start here-->
	  <section class="specialists-sec">
		<div class="container">
	     <div class="container-reset">
		   <div class="row g-5">
			  <div class="col-md-8">
			    <div class="specialists-top">
				  <h2><?php the_field('main_head_title'); ?></h2> 
				  <?php the_field('main_content'); ?>
				</div> 
				<div class="accordion" id="accordionExample">
				<?php if(get_field('faqs')): $i=1; while(the_repeater_field('faqs')): ?>	
				  <div class="accordion-item">
					<h2 class="accordion-header" id="heading<?php echo $i; ?>">
					  <button class="accordion-button <?php if($i!=1){?>collapsed<?php } ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
					  <?php the_sub_field('qusetions'); ?>
					  </button>
					</h2>
					<div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse <?php if($i==1){?>show<?php } ?>" aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionExample">
					  <div class="accordion-body">
					  <?php the_sub_field('answer'); ?>
					  </div>
					</div>
				  </div>
				  <?php $i++; endwhile; endif; ?>  

				</div>		
			  </div> 
			  <div class="col-md-4">
			    <div class="download-card">
				  <img src="<?php the_field('download_image'); ?>" alt="">
				  <div class="download-text">
					 <p>For more information</p>
					 <h2> <?php the_field('download_title'); ?></h2>
					  <ul>
					  <?php if(get_field('downloads')):$k=1; while(the_repeater_field('downloads')): ?>	
					    <li <?php if($k==1){?>class="active"<?php } ?>>
						<?php 
							$link = get_sub_field('download_link');
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>
						</li>
						<?php $k++; endwhile; endif; ?>  
					  </ul>
			      </div>
				</div>
			  </div>
		   </div> 
		 </div>
		</div>
	  </section>
	<!--Specialists sec start here-->
	  
<?php get_footer(); ?>
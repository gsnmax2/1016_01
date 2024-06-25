<?php /*
*
*Template Name: Contact Page
*
*
*/
get_header();
while ( have_posts() ) : the_post();
global $post;
$page_slug = $post->post_name;
?>

<!-- HTML Code -->
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
    
    <!--Page Titles sec start here-->
	   <section class="patients-sec">
	     <div class="container">
		   <div class="container-reset">
		    <div class="patients-heading pb-5">
			    <?php $contact_title = get_field('contact_page_title'); if($contact_title): ?>
                    <p><?php echo $contact_title; ?></p>
			    <?php 
                     endif;
                     $contact_subtitle = get_field('contact_page_subtitle'); if($contact_subtitle):
                ?>
                <h2><?php echo $contact_subtitle; ?></h2>
                <?php endif; ?>
			</div>
		   </div>
		 </div>
	   </section>
	<!--Page Titles sec start here-->

    <!-- Contact Form and Sidebar Starts here -->
       <section class="contact-form-sidebar">
           <div class="container">
               <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="con-form">
                         <?php the_field('contact_form_shortcode'); ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="contact-wrap">
                            <div class="con-info">
                                <ul>
                                  <?php if(get_field('footer_contact_details','option')):while(the_repeater_field('footer_contact_details','option')): ?>
                                    <li><a href="<?php the_sub_field('contact_link'); ?>"><i class="<?php the_sub_field('contact_icon'); ?>"></i> <?php the_sub_field('contact_destail'); ?></a></li> 
                                    <?php  endwhile; endif; ?>
                                </ul>
                            </div>
                            <div class="work-hours">
                                <h6><?php the_field('hours_of_operation_label','option'); ?></h6>
                                  <ul>
                                  <?php     if(get_field('hours_of_operation','option')):while(the_repeater_field('hours_of_operation','option')): ?>
                                <li><p><?php the_sub_field('days'); ?></p><em><?php the_sub_field('timing'); ?></em></li> 
                                    <?php  endwhile; endif; ?>
                                  </ul>
                            </div>
                        </div>
                    </div>
               </div>
           </div>
       </section>
       <?php $store_map = get_field('store_location_map_shortcode'); if($store_map): ?>
           <section class="store-map">
                <div class="container">
                   <div class="row">
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <div clas="map-location">
                               <?php echo $store_map; ?>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
     <?php endif; ?>
    <!-- Contact Form and Sidebar Starts here -->

<!-- HTML Code -->
<?php  endwhile;
get_footer(); 
?>

<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
        <!--BOOK YOUR APPOINTMENT sec start here-->
          <section class="book-appt-footer">
            <a id="book_appt_footer">
<?php echo do_shortcode('[contact-form-7 id="386" title="BOOK YOUR APPOINTMENT"]'); ?>
          </section>
        <!--BOOK YOUR APPOINTMENT sec end here-->

		<!--Footer start here-->
		<footer class="footer-sec">
	    <div class="container">
		  <div class="footer-wrap">
		    <div class="footer-top">
			 <div class="row">
			   <div class="col-md-4 contact-no">
				 <div class="footer-logo pb-5">
				   <a href="<?php echo home_url('/'); ?>"><img src="<?php the_field('footer_logo','option'); ?>" alt=""></a>  
				 </div>
				 <?php the_field('footer_content','option'); ?>
				 				  <ul>
				  <?php if(get_field('footer_contact_details','option')):while(the_repeater_field('footer_contact_details','option')): ?>
				    <li><a href="<?php the_sub_field('contact_link'); ?>"><i class="<?php the_sub_field('contact_icon'); ?>"></i> <?php the_sub_field('contact_destail'); ?></a></li> 
					<?php  endwhile; endif; ?>
				  </ul>
			   </div> 
			   <div class="col-md-2 quick-links">
				  <h6>Quick Links</h6>
				  <ul>
				  <?php wp_nav_menu(array('sort_column'=>'menu_order','menu'=>'Quick Links','container'=>false,'items_wrap'=>'%3$s')); ?>
				  </ul>
			   </div>
			   <div class="col-md-3 latest-tweets">
				 <h6>Latest Tweets</h6>
				  <ul>
					<?php echo do_shortcode('[custom-twitter-feeds]'); ?>  
				   <!-- <li><i class="fab fa-twitter"></i> <p>@aliasadadm Hi @aliasadadm , can you please submit a ticket at https://t.co/JLV61aXG7d and one of our support agent… </p></li> 
				   <li><i class="fab fa-twitter"></i> <p>@HenrySefaBoaky1 Check out our theme Gioia which has all necessary elements to build a multi vendor marketplace. </p></li> 
				   <li><i class="fab fa-twitter"></i> <p>@dincompleteman When you import theme content, you also import the landing page with all its elements… </p></li> 
				   -->
				   </ul>
			   </div>
			   <div class="col-md-3 hours-of-operation">
				 <h6><?php the_field('hours_of_operation_label','option'); ?></h6>
				  <ul>
				  <?php if(get_field('hours_of_operation','option')):while(the_repeater_field('hours_of_operation','option')): ?>
				<li><p><?php the_sub_field('days'); ?></p><em><?php the_sub_field('timing'); ?></em></li> 
					<?php  endwhile; endif; ?>
				  </ul>
				  <div class="make-appo">
				     <img src="<?php echo get_template_directory_uri(); ?>/assets/images/make-appointment.png" alt="">
					 <?php 
$link = get_field('book_appointment_button__2','option');
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
			</div>
			<div class="footer-middle">
			  <p>Our location List:</p>
			  <ul>
			  <?php if(get_field('location_list','option')):while(the_repeater_field('location_list','option')): ?>
				<li><a href="<?php the_sub_field('location_link'); ?>"><?php the_sub_field('location_name'); ?></a></li> 
					<?php  endwhile; endif; ?>
				
			  </ul>
			</div>
			<div class="footer-bottom">
			  <div class="row">
				<div class="col-md-6">
				  <?php the_field('copyright_text','option'); ?>
Site Designed by <a href="https://www.kiwidrug.com">Kiwi</a>
				</div>
				 <div class="col-md-6">
				    <div class="social-media">
					  <ul>
					  <?php wp_nav_menu(array('sort_column'=>'menu_order','menu'=>'footer menu','container'=>false,'items_wrap'=>'%3$s')); ?>
					  </ul>
					  <ul class="social-link">
					  <?php if(get_field('social_feeds_footer','option')):while(the_repeater_field('social_feeds_footer','option')): ?>
				    <li><a href="<?php the_sub_field('social_link'); ?>"><i class="<?php the_sub_field('social_icons'); ?>"></i></a></li> 
					<?php  endwhile; endif; ?>  
					  
					 </ul>
					</div>
				 </div>
			  </div>  
			</div>
		  </div> 
		</div>
	 </footer>
	<!--Footer end here-->
	  
    <!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap-datepicker.js"></script>
	<script src='<?php echo get_template_directory_uri(); ?>/assets/js/isotope.pkgd.min.js'></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom.js"></script>
	<?php wp_footer(); ?>
  </body>
</html>

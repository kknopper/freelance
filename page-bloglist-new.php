<?php /* Template Name: Blog List */ ?>
<?php get_header() ?>
<link href="<?php echo get_stylesheet_directory_uri()?>/css/blog.css" rel="stylesheet" media="all">


<link href="<?php echo get_stylesheet_directory_uri()?>/css/bootstrap.css" rel="stylesheet" media="all">
<link href="<?php echo get_stylesheet_directory_uri()?>/css/theme.css" rel="stylesheet" media="all">
<style>
                        .post .color1:before{
                            background-color: #102855;
                        }
                        #about-tim-sec1{min-height:400px;}

                    </style>
<div id="front-page-10" class="front-page-10">
	  <div class="">
		  <div class="flexible-widgets widget-area">
			  <div class="wrap">


			  <section class=" post-list">
					<div class="">

							<?php while ( have_posts() ) : the_post();?>
							<?php the_content(); ?>

							<?php endwhile; ?>
							<div class="blog-items">

							<?php
							// Get current page and append to custom query parameters array
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							// Define custom query parameters
							$args = array(
								'post_type' => array('post'),
								'posts_per_page' => 12,
								'post_status' => 'publish',
								'order' => 'DESC',
								'orderby' => 'ID',
								'paged' => $paged,
							);

							// Pagination fix
							$temp = $wp_query;
							$wp_query= null;
							// Instantiate custom query
							$wp_query =  new WP_Query($args);

							//Output custom query loop
							if ($wp_query->have_posts()):
								$i = 1;
								while ($wp_query->have_posts()) : $wp_query->the_post();
									if($i == 1 || $i == 7)
										$class = 'col-md-4';
									else if($i == 2 || $i == 6)
										$class = 'col-md-4';
									else
										$class = 'col-md-4';

							?>
								<?php if($i ==1 || $i == 4 || $i == 7 || $i == 10){
								$row_start = true;
								echo '<div class="row">';
								}
								?>

										<div class="col-sm-6 blog-item blog-clear stories-item <?php echo $class?>">
											<div class="post">
												<a style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(),array(1280,448)) ?>');" class="post-item-image" href="<?php echo get_the_permalink(); ?>">

													<div class="post-item-container color1">
													  <?php
													  $post_categories = get_the_terms( get_the_ID(), 'category' );

													  $categories = wp_list_pluck( $post_categories, 'term_id' );

													  $attachment_id = get_option('templtax_'.$categories[0]);

													  $cat_icon = wp_get_attachment_image_src($attachment_id['img'],array(150,150));

													  ?>
														<img class="ico-handshake cat-icon" src="<?php echo $cat_icon[0]?>">
													</div>
												</a>

												<div class="post-content">
													<h5 style="color: #102855;" class="micro">
													<?php

													if ( ! empty( $post_categories ) && ! is_wp_error( $post_categories ) ) {
														$categories = wp_list_pluck( $post_categories, 'name' );
													}
													echo implode(', ',$categories);
													?>
													</h5>
													<div class="archive_cat_line" style="background-color: #102855;"></div>
													<h4 class="post-title">
														<a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title() ?></a>
													</h4>

													<a href="<?php echo get_the_permalink(); ?>" class="link-more link-more-grey">Read More</a>
												</div><!-- /.post-content -->
											</div><!-- /.post -->
										</div><!-- /.col-sm-3 col-sm-6 -->
										<?php if($i ==3 || $i == 6 || $i == 9 || $i == 12){
											echo '</div>';
											$row_start = false;
										}
										?>


							<?php
								$i++;



								endwhile;
								if($row_start) {
									echo '</div>';
								}
							endif;

							/* PageNavi at Bottom */
							if (function_exists('wp_pagenavi')){wp_pagenavi();}
							$wp_query = null;
							$wp_query = $temp;
							wp_reset_query();
							?>


						    </div>

					</div>
				</section>




			</div>
		</div>
	</div>
</div>















<?php get_footer(); ?>
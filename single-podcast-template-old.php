<?php get_header() ?>
<link href="<?php echo get_stylesheet_directory_uri()?>/css/blog.css" rel="stylesheet" media="all">
  

<link href="<?php echo get_stylesheet_directory_uri()?>/css/bootstrap.css" rel="stylesheet" media="all">
<link href="<?php echo get_stylesheet_directory_uri()?>/css/theme.css" rel="stylesheet" media="all">

<style>
.image-section h4, .solid-section h4{font-size:18px !important;}
</style>
<style>
                        .post .color1:before{
                            background-color: #102855;
                        }
                        
                        
                    </style>

  <div id="front-page-10" class="front-page-10">
  <div class="solid-section" style="padding:0px"><div class="flexible-widgets widget-area">
  <div class="wrap">
  <?php
  while ( have_posts() ) :
			the_post();
	?>		
  <article class="article article-secondary" style="padding:0px">
     <div class="" style="text-align:left;">
	 	<?php 
		$post_categories = get_the_terms( get_the_ID(), 'category' );
													  
		if ( ! empty( $post_categories ) && ! is_wp_error( $post_categories ) ) {
				$categories = wp_list_pluck( $post_categories, 'name' );
        
		?>
        <em style="color: #14aecf;" class="article-meta tag"><a href="javascript:void(0)" rel="category tag">
		
		<?php echo implode(',',$categories); ?>
		
		</a></em>
<?php } ?>
        <h1 class="post-title" style="font-size:36px"><?php the_title();?></h1>
		
		<h4><?php the_excerpt() ?></h4>
        
        <span class="">
            Posted by: <strong>Tim O'Brien </strong>
        </span>
		

        <p>
		<?php the_content();?>
		</p>

    </div><!-- /.container -->
</article>
<?php endwhile; ?>



                
  
  
  <?php
     $related_args = array(
	'post_type' => 'podcast',
	'posts_per_page' => 3,
	'post_status' => 'publish',
	'orderby' => 'rand',
	);
$related = new WP_Query( $related_args );
?>

  
  
  <section class="section-posts post">
    <div class="">

<div class="blog-items">
<?php
if( $related->have_posts() ) :?>
		<h5>related posts</h5>
        <div class="row">

                    <?php while( $related->have_posts() ): $related->the_post(); ?>
                    <div class="col-sm-6 blog-item blog-clear stories-item col-md-4">
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
													
													echo implode(', ',$categories);
	}												?>
													</h5>
													<div class="archive_cat_line" style="background-color: #102855;"></div>
													<h4 class="post-title">
														<a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title() ?></a>
													</h4>

													<a href="<?php echo get_the_permalink(); ?>" class="link-more link-more-grey">Read More</a>
												</div><!-- /.post-content -->
											</div><!-- /.post -->
										</div><!-- /.col-sm-3 col-sm-6 -->
							<?php endwhile; ?>			
                    
          
        </div><!-- /.row -->
		<?php endif; 
		wp_reset_postdata();
		?>
		</div><!-- /.row -->
    </div><!-- /.container -->
</section>
  
</div></div></div></div>


<?php get_footer(); ?>
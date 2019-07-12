<?php get_header() ?>
<link href="<?php echo get_stylesheet_directory_uri()?>/css/blog.css" rel="stylesheet" media="all">


<link href="<?php echo get_stylesheet_directory_uri()?>/css/bootstrap.css" rel="stylesheet" media="all">
<link href="<?php echo get_stylesheet_directory_uri()?>/css/theme.css" rel="stylesheet" media="all">


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
  <article class="article article-secondary">
     <div class="">

        <h1 class="post-title"><?php the_title();?></h1>

        <span class="article-author">
            Posted by:

            <strong>Tim O'Brien</strong>
        </span>

        <p>
		<?php the_content();?>
		</p>

			<div class="article-group">
				<div class="article-image-secondary">
                       <?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?>
					</div><!-- /.article-image-secondary -->

				<div class="article-content">
					<strong><?php the_author()?></strong>

					<p><?php the_author_description() ?></p>
				</div><!-- /.article-content -->
			</div><!-- /.article-group -->
    </div><!-- /.container -->
</article>
<div id="disqus_thread"></div>
<?php endwhile; ?>

<!-- Disqus Embed Script -->
<script>
    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT
     *  THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR
     *  PLATFORM OR CMS.
     *
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT:
     *  https://disqus.com/admin/universalcode/#configuration-variables
     */
    /*
    var disqus_config = function () {
        // Replace PAGE_URL with your page's canonical URL variable
        this.page.url = PAGE_URL;

        // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        this.page.identifier = PAGE_IDENTIFIER;
    };
    */

    (function() {  // REQUIRED CONFIGURATION VARIABLE: EDIT THE SHORTNAME BELOW
        var d = document, s = d.createElement('script');

        // IMPORTANT: Replace EXAMPLE with your forum shortname!
        s.src = 'https://EXAMPLE.disqus.com/embed.js';

        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>
    Please enable JavaScript to view the
    <a href="https://disqus.com/?ref_noscript" rel="nofollow">
        comments powered by Disqus.
    </a>
</noscript>


<?php
  $related_args = array(
		'post_type' => 'post',
		'posts_per_page' => 3,
		'post_status' => 'publish',
		'post__not_in' => array( get_the_ID() ),
		'orderby' => 'rand',
	);
$related = new WP_Query( $related_args );
?>



  <section class="section-posts post">
    <div class="">


        <h5>related posts</h5>
<div class="blog-items">
<?php
if( $related->have_posts() ) :
?>
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
}
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

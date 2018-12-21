<?php /* Template Name: Podcast List */ ?>
<?php get_header() ?>
<link href="<?php echo get_stylesheet_directory_uri()?>/css/blog.css" rel="stylesheet" media="all">


<link href="<?php echo get_stylesheet_directory_uri()?>/css/bootstrap.css" rel="stylesheet" media="all">
<link href="<?php echo get_stylesheet_directory_uri()?>/css/theme.css" rel="stylesheet" media="all">
<script type="text/javascript" src="/wp-includes/js/jquery/jquery.js?ver=1.12.4"></script>



<div id="front-page-10" class="front-page-10" >
	<div class="solid-section" style="padding:0px 0px">
		<div class="flexible-widgets widget-area">
			<div class="wrap">
				<section class="section-posts post-list" style="padding:0px">
					<div class="">
							<?php while ( have_posts() ) : the_post();?>
								<?php the_content(); ?>
							<?php endwhile; ?>
						<div class="row">
							<div class="podcast-list">
								<?php
								$args = array(
									'post_type' => array('podcast_list'),
									'post_status' => 'publish',
									'order' => 'DESC',
									'orderby' => 'ID',
									'posts_per_page' => -1
								);
								$custom_query =  new WP_Query($args);

								if ($custom_query->have_posts()):

									while ($custom_query->have_posts()) : $custom_query->the_post();
								?>
								<div class="podcast-post">
									<a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title() ?></a>
									<?php the_content(); ?>
								</div>
							<?php endwhile; endif; ?>
							</div>
						</div><!-- /.row -->
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<script>
	jQuery(function( $ ) {
		let $head = $(".podcast-list").find("iframe").contents().find("head");
		let css = `<style type="text/css">
						.styles__progressBar___3pIiH rect:nth-child(3) {
							fill: blue;
						};
					</style>`;
		$head.append(css);
	});
</script>
<?php /* Template Name: Podcast List */ ?>
<?php get_header() ?>

<link href="<?php echo get_stylesheet_directory_uri()?>/css/bootstrap.css" rel="stylesheet" media="all">
<link href="<?php echo get_stylesheet_directory_uri()?>/css/theme.css" rel="stylesheet" media="all">

<main class="content podcast-home" id="genesis-content">
	<div class="entry-content">
        <?php while ( have_posts() ) : the_post();?>
            <?php the_content(); ?>
        <?php endwhile; ?>

        <div class="row">
            <div class="podcast-list">    
                <section class="podcast-subscribe">
                    <h1 class="subscribe">Subscribe to <i>The Person To See</i> Podcast<br>with your favorite app</h1>
                    <ul class="podcast-link-list">
                        <li class="podcast-link apple">
                            <a href="https://itunes.apple.com/us/podcast/the-person-to-see/id1448295597" target="_blank" rel="noopener noreferrer">
                                <img src="/wp-content/uploads/2019/01/apple-podcast.jpg">
                                <span>Apple Podcasts</span>
                            </a>
                        </li>
                        <li class="podcast-link google">
                            <a href="https://www.google.com/podcasts?feed=aHR0cHM6Ly9hbmNob3IuZm0vcy83ZjVkNThjL3BvZGNhc3QvcnNz" target="_blank" rel="noopener noreferrer">
                                <img src="/wp-content/uploads/2019/01/google-podcast.jpg">
                                <span>Google Podcasts</span>
                            </a>
                        </li>
                        <li class="podcast-link spotify">
                            <a href="https://open.spotify.com/show/3WOfGOwR9S0fEPIzbx6eYF" target="_blank" rel="noopener noreferrer">
                                <img src="/wp-content/uploads/2019/01/spotify.jpg">
                                <span>Spotify</span>
                            </a>
                        </li>
                        <li class="podcast-link breaker">
                            <a href="https://www.breaker.audio/the-person-to-see" target="_blank" rel="noopener noreferrer">
                                <img src="/wp-content/uploads/2019/01/breaker.jpg">
                                <span>Breaker</span>
                            </a>
                        </li>
                        <li class="podcast-link overcast">
                            <a href="https://overcast.fm/itunes1448295597/the-person-to-see" target="_blank" rel="noopener noreferrer">
                                <img src="/wp-content/uploads/2019/01/overcast.jpg">
                                <span>Overcast</span>
                            </a>
                        </li>
                        <li class="podcast-link pocket-casts">
                            <a href="https://pca.st/M7TX" target="_blank" rel="noopener noreferrer">
                                <img src="/wp-content/uploads/2019/01/pocket-casts.jpg">
                                <span>Pocket Casts</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </div>
        </div>

        <div class="blog-items">
            <?php 
            $args = array(
                'post_type' => array('podcast_list'),
                'post_status' => 'publish',
                'order' => 'DESC',
                'orderby' => 'ID',
            );
            $custom_query =  new WP_Query($args);
            
            if ($custom_query->have_posts()):
                $i = 1;
                while ($custom_query->have_posts()) : $custom_query->the_post();
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
                                <a style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(),array(1280,448)) ?>');" class="post-item-image" href="<?php echo get_the_permalink(); ?>"></a>

                                <div class="post-content">

                                    <!-- <h4 class="post-title">
                                        <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title() ?></a>
                                    </h4> -->

                                    <p><?php echo get_the_excerpt() ?></p>

                                    <a href="<?php echo get_the_permalink(); ?>" class="link-more view-post">View Post</a>
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
                if($row_start){
                            echo '</div>';
                        }
            endif;
            
            ?>
        </div>

        <div class="row">
            <div class="podcast-list">    
                <section>
                    <h1 class="subscribe"><i>The Person to See</i> Podcast helps you mantain a competitive edge.</h1>
                    <p>At the end of the day what do you think we are all after? Money? Fame? Happiness? For me it is freedom. The freedom to do what I want, when I want with whom I want.</p>
                    <p>The only way to have this freedom is to build relationships with people who can pull us up. As my next-door neighbor, Dick Mercer once told me, “Tim, nobody is a success unless an awful lot of people want you to be.” And I am here to tell you that you will never attract the kind of people who can help you catapult you to where you want to be without a great personal brand.</p>
                    <p>For the past fifteen years I have dedicated myself to researching and uncovering the secrets and strategies for building a great personal brand.</p>
                    <p>In an economy where it is becoming increasingly difficult to stand out from the competition, personal branding continues to be the only enduring differentiator. Being talented -even very talented - is not enough to gain, let alone maintain, a competitive advantage.</p>
                    <p>Let me put this in perspective. I live in Los Angeles and I practiced law for many years. I can tell you that there are literally thousands of lawyers in California who are extremely talented who have zero book of business. The reason is because they refuse to get out from behind their desks and build a great personal brand.</p>
                    <p>There are two central themes at the core of building a great personal branding. First, personal branding is not an option; everybody has a personal brand and that brand is either positive, negative or neutral and, second, everything we do either adds to or takes away from our personal brand credibility.</p> 
                    <p>It is our hope that by listening to <i>The Person To See</i> Podcast you will gain the insight and strategies you need to position yourself as <i>The Person To See</i> with your target audience.</p>
                </section>
                <section class="podcast-subscribe">
                    <h3 class="subscribe">Subscribe to <i>The Person To See</i> Podcast<br>with your favorite app</h3>
                    <ul class="podcast-link-list">
                        <li class="podcast-link apple">
                            <a href="https://itunes.apple.com/us/podcast/the-person-to-see/id1448295597" target="_blank" rel="noopener noreferrer">
                                <img src="/wp-content/uploads/2019/01/apple-podcast.jpg" />
                                <span>Apple Podcasts</span>
                            </a>
                        </li>
                        <li class="podcast-link google">
                            <a href="https://www.google.com/podcasts?feed=aHR0cHM6Ly9hbmNob3IuZm0vcy83ZjVkNThjL3BvZGNhc3QvcnNz" target="_blank" rel="noopener noreferrer">
                                <img src="/wp-content/uploads/2019/01/google-podcast.jpg" />
                                <span>Google Podcasts</span>
                            </a>
                        </li>
                        <li class="podcast-link spotify">
                            <a href="https://open.spotify.com/show/3WOfGOwR9S0fEPIzbx6eYF" target="_blank" rel="noopener noreferrer">
                                <img src="/wp-content/uploads/2019/01/spotify.jpg" />
                                <span>Spotify</span>
                            </a>
                        </li>
                        <li class="podcast-link breaker">
                            <a href="https://www.breaker.audio/the-person-to-see" target="_blank" rel="noopener noreferrer">
                                <img src="/wp-content/uploads/2019/01/breaker.jpg" />
                                <span>Breaker</span>
                            </a>
                        </li>
                        <li class="podcast-link overcast">
                            <a href="https://overcast.fm/itunes1448295597/the-person-to-see" target="_blank" rel="noopener noreferrer">
                                <img src="/wp-content/uploads/2019/01/overcast.jpg" />
                                <span>Overcast</span>
                            </a>
                        </li>
                        <li class="podcast-link pocket-casts">
                            <a href="https://pca.st/M7TX" target="_blank" rel="noopener noreferrer">
                                <img src="/wp-content/uploads/2019/01/pocket-casts.jpg" />
                                <span>Pocket Casts</span>
                            </a>
                        </li>
                        <!-- <li class="podcast-link radio-public">
                            <a href="https://radiopublic.com/the-person-to-see-Wlkzww" target="_blank" rel="noopener noreferrer">
                                <img src="/wp-content/uploads/2019/01/radio-public.jpg" />
                                <span>RadioPublic</span>
                            </a>
                        </li>
                        <li class="podcast-link rss">
                            <a href="https://anchor.fm/s/7f5d58c/podcast/rss" target="_blank" rel="noopener noreferrer">
                                <img src="/wp-content/uploads/2019/01/rss.jpg" />
                                <span>RSS</span>
                            </a>
                        </li> -->
                    </ul>
                </section>
            </div>
        </div><!-- /.row -->
    </div>
</main>
<script>
	jQuery(function( $ ) {
// 		let $head = $(".podcast-list").find("iframe").contents().find("head");
// 		let css = `<style type="text/css">
// 						.styles__progressBar___3pIiH rect:nth-child(3) {
// 							fill: blue;
// 						};
// 					</style>`;
// 		$head.append(css);
		
		function fullWidthRow() {
            var $elements = $('[data-vc-full-width="true"]');
            $.each($elements, function(key, item) {
                var $el = $(this);
                $el.addClass("vc_hidden");
                var $el_full = $el.next(".vc_row-full-width");
                if ($el_full.length || ($el_full = $el.parent().next(".vc_row-full-width")), $el_full.length) {
                    var el_margin_left = parseInt($el.css("margin-left"), 10),
                        el_margin_right = parseInt($el.css("margin-right"), 10),
                        offset = 0 - $el_full.offset().left - el_margin_left,
                        width = $(window).width();
                    if ($el.css({
                            position: "relative",
                            left: offset,
                            "box-sizing": "border-box",
                            width: $(window).width()
                        }), !$el.data("vcStretchContent")) {
                        var padding = -1 * offset;
                        0 > padding && (padding = 0);
                        var paddingRight = width - padding - $el_full.width() + el_margin_left + el_margin_right;
                        0 > paddingRight && (paddingRight = 0), $el.css({
                            "padding-left": padding + "px",
                            "padding-right": paddingRight + "px"
                        })
                    }
                    $el.attr("data-vc-full-width-init", "true"), $el.removeClass("vc_hidden")
                }
            }), $(document).trigger("vc-full-width-row", $elements)
        }
		fullWidthRow();
		$(window).resize(function() {
			fullWidthRow();
		});
	});
</script>
<?php get_footer() ?>
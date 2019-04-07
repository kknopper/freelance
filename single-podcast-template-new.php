<?php get_header() ?>
<link href="<?php echo get_stylesheet_directory_uri()?>/css/blog.css" rel="stylesheet" media="all">
  

<link href="<?php echo get_stylesheet_directory_uri()?>/css/bootstrap.css" rel="stylesheet" media="all">
<link href="<?php echo get_stylesheet_directory_uri()?>/css/theme.css" rel="stylesheet" media="all">


<div id="front-page-10" class="front-page-10">
    <div class="solid-section" style="padding:0px"><div class="flexible-widgets widget-area">
        <div class="wrap">
            <?php
            while ( have_posts() ) :
                        the_post();
            ?>		
                <article class="article article-secondary" style="padding:0px">
                        <h1 class="post-title" style="font-size:36px"><?php the_title();?></h1>
                        <?php the_excerpt() ?>
                        <p class="posted-by">Posted by: <strong>Tim O'Brien </strong></p>
                        <?php the_content();?>
                        <section class="twitter-share-tweet">
                            <h3>Share this tweet</h3>
                            <h4><a>Building a great personal brand is a lifetime journey #thepersontosee</a></h4>
                            <a>
                                Click to tweet
                                <svg id="social-twitter" viewBox="0 0 32 32" width="100%" height="100%">
                                    <title>twitter</title>
                                    <path class="path1" d="M30.071 7.286q-1.196 1.75-2.893 2.982.018.25.018.75 0 2.321-.679 4.634t-2.063 4.437-3.295 3.759-4.607 2.607-5.768.973q-4.839 0-8.857-2.589.625.071 1.393.071 4.018 0 7.161-2.464-1.875-.036-3.357-1.152t-2.036-2.848q.589.089 1.089.089.768 0 1.518-.196-2-.411-3.313-1.991t-1.313-3.67v-.071q1.214.679 2.607.732-1.179-.786-1.875-2.054t-.696-2.75q0-1.571.786-2.911Q6.052 8.285 9.15 9.883t6.634 1.777q-.143-.679-.143-1.321 0-2.393 1.688-4.08t4.08-1.688q2.5 0 4.214 1.821 1.946-.375 3.661-1.393-.661 2.054-2.536 3.179 1.661-.179 3.321-.893z"></path>
                                </svg>  
                            </a>
                        </section>
                        <section class="tuning-in">
                            <h2>Thank You for Tuning In!</h2>
                            <p>There are a lot of podcasts you could be tuning into today, but you chose ours, and we are grateful for that. If you enjoyed today’s show, please share it by using the social media buttons you see at the top and bottom of this page.</p>
                            <p>Also, please take 60-seconds to <a href="https://itunes.apple.com/us/podcast/the-person-to-see/id1448295597">leave an honest review and rating for the podcast on iTunes</a>, they’re <strong>extremely helpful</strong> when it comes to the ranking of the show and you can bet that we read every single one of them!</p>
                            <p>Lastly, don’t forget to <a href="https://itunes.apple.com/us/podcast/the-person-to-see/id1448295597?mt=2">subscribe to the podcast on iTunes</a>, to get automatic updates every time a new episode goes live!</p>
                        </section>
                </article>

                <div class="bio">
                    <img class="wp-image-2978 aligncenter" src="/wp-content/uploads/2019/03/Final-Blog-Signature-1-300x94.png" alt="" width="600" height="188" srcset="/wp-content/uploads/2019/03/Final-Blog-Signature-1-300x94.png 300w, /wp-content/uploads/2019/03/Final-Blog-Signature-1-768x240.png 768w, /wp-content/uploads/2019/03/Final-Blog-Signature-1-1024x320.png 1024w" sizes="(max-width: 600px) 100vw, 600px">
                </div>
            <?php endwhile; ?>

        </div>
    </div>
</div>
</div> <!-- /.site-container -->


<?php get_footer(); ?>
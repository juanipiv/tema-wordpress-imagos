<?php
    get_header();




    $num_results = $wp_the_query->found_posts;

    $words = get_search_query();

    if ( !empty($words) ) {
        $criterio = $words;
    } else {
        $criterio = "All posts";
    }

?>

<div class="main">
      <?php
        get_template_part('nav');
      ?>
  <section class="module-small">
    <div class="container">
      <div class="row">
        <!-- sidebar start -->
          <?php get_sidebar();?>
        <!-- sidebar end -->
        <h1>Search For</h1>
        <!-- <h2><?php echo $tax; ?></h2> -->
        <h3><?php echo $criterio; ?></h3>
        <h4>Number of Results: <?php echo $num_results; ?></h4>
        <div class="col-sm-8 col-sm-offset-1">
          
            <?php

                if(have_posts()):
                    
                        
            ?>

                    <table>
                            <tr>
                                <th>Published on:</th>
                                <th>Author:</th>
                                <th>Title:</th>
                                <th>Status</th>
                            </tr>

            <?php


                    while(have_posts()):
                        the_post();
                        
            ?>

                        
                        

            <?php
                            echo '<tr>';
                            echo '<td>'.get_the_time('F j Y').'</td>';
                            echo '<td>'.get_the_author_posts_link().'</td>';
                            echo '<td><a href="'.get_the_permalink().'">'.get_the_title().'</a></td>';
                            echo '<td></td>';
                            echo '</tr>';

                    endwhile;

                    echo '</table>';
                else:
                    echo "no posts found...";
                endif;
            ?>
            
          
        </div>
      </div>
    </div>
  </section>
  <div class="module-small bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="widget">
            <h5 class="widget-title font-alt">About Titan</h5>
            <p>The languages only differ in their grammar, their pronunciation and their most common words.</p>
            <p>Phone: +1 234 567 89 10</p>Fax: +1 234 567 89 10
            <p>Email:<a href="#">somecompany@example.com</a></p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="widget">
            <h5 class="widget-title font-alt">Recent Comments</h5>
            <ul class="icon-list">
              <li>Maria on <a href="#">Designer Desk Essentials</a></li>
              <li>John on <a href="#">Realistic Business Card Mockup</a></li>
              <li>Andy on <a href="#">Eco bag Mockup</a></li>
              <li>Jack on <a href="#">Bottle Mockup</a></li>
              <li>Mark on <a href="#">Our trip to the Alps</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="widget">
            <h5 class="widget-title font-alt">Blog Categories</h5>
            <ul class="icon-list">
              <li><a href="#">Photography - 7</a></li>
              <li><a href="#">Web Design - 3</a></li>
              <li><a href="#">Illustration - 12</a></li>
              <li><a href="#">Marketing - 1</a></li>
              <li><a href="#">Wordpress - 16</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="widget">
            <h5 class="widget-title font-alt">Popular Posts</h5>
            <ul class="widget-posts">
              <li class="clearfix">
                <div class="widget-posts-image"><a href="#"><img
                      src="<?php echo get_template_directory_uri(); ?>/assets/images/rp-1.jpg"
                      alt="Post Thumbnail" /></a></div>
                <div class="widget-posts-body">
                  <div class="widget-posts-title"><a href="#">Designer Desk Essentials</a></div>
                  <div class="widget-posts-meta">23 january</div>
                </div>
              </li>
              <li class="clearfix">
                <div class="widget-posts-image"><a href="#"><img
                      src="<?php echo get_template_directory_uri(); ?>/assets/images/rp-2.jpg"
                      alt="Post Thumbnail" /></a></div>
                <div class="widget-posts-body">
                  <div class="widget-posts-title"><a href="#">Realistic Business Card Mockup</a></div>
                  <div class="widget-posts-meta">15 February</div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr class="divider-d">
  <footer class="footer bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <p class="copyright font-alt">&copy; 2017&nbsp;<a href="index.html">TitaN</a>, All Rights Reserved</p>
        </div>
        <div class="col-sm-6">
          <div class="footer-social-links"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i
                class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i
                class="fa fa-skype"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>
<div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
</main>

  <?php
      get_footer();
  ?>
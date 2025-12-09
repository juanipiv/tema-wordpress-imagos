<div class="col-sm-4 col-md-3 sidebar">
          <div class="widget" >
            <form role="form" action="<?php echo home_url('/') ?>">
              <div class="search-box">
                <input class="form-control" name="s" id="s" type="text" placeholder="Search..." />
                <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
              </div>
            </form>
          </div>

          <div class="widget">
            <h5 class="widget-title font-alt">Calendar</h5>
            <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Widgets')):;?>
            <p class="no-widget">Sorry, no widget installed for these theme.</p>
            <?php endif;?>
          </div>

          <div class="widget">
            <h5 class="widget-title font-alt">Blog Categories</h5>
            <ul class="icon-list">
              <?php 
                $cats = wp_list_categories('title_li=&show_count=1&echo=0');
                /* magia con expresiones regulares */
                $cats = preg_replace('/<\/a> \(([0-9]+)\)/', '<span class="numpost">&nbsp\\1</span></a>', $cats);
                echo $cats;
              ?>
            </ul>
          </div>
          <div class="widget">
            <h5 class="widget-title font-alt">Popular Posts</h5>
            <ul class="widget-posts">
              <?php
                  $args = array(
                      // Corregido a posts_per_page
                      "posts_per_page" => 5,
                  );

                  // ... (El resto del código de WP_Query)

                  $recent_posts = new WP_Query($args);

                  if ($recent_posts->have_posts()):
                    while ($recent_posts->have_posts()):
                      $recent_posts->the_post();
                      if ( has_post_thumbnail() ):
                        // Estas funciones devuelven un string, no devuelven una función
                        $img_url = get_the_post_thumbnail_url();
                      else:
                        $img_url = get_template_directory_uri().'/assets/images/images.jpeg';
                      endif;
              ?>
              <li class="clearfix">
                  <div class="widget-posts-image">
                      <a href="<?php the_permalink(); ?>">
                          <img
                              src="<?php echo $img_url; ?>"
                              alt="Post Thumbnail"
                          />
                      </a>
                  </div>
                  <div class="widget-posts-body">
                      <div class="widget-posts-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                      <div class="widget-posts-meta"><?php the_time('F j, Y'); ?></div>
                  </div>
              </li>

              <?php
                    endwhile;
                    // IMPORTANTE: Restaurar los datos del post global después de WP_Query
                    wp_reset_postdata();
                  else:
                    echo ('No posts published yet...');
                  endif;
              ?>
            </ul>
          </div>
          <div class="widget">
            <h5 class="widget-title font-alt">Authors</h5>
            <ul>
              <?php
                $args = array(
                  'hide_empty' => false, // Hace que se visualicen los autores que no tienen posts publicados
                  'optioncount' => true, // Hace que aparezca el numero de posts publicados por cada persona
                );
                wp_list_authors( $args )
              ?>
            </ul>
          </div>

          <div class="widget">
            <h5 class="widget-title font-alt">Pages</h5>
            <ul>
              <?php
                $pages = get_pages(); // Devolver una collecion de objetos tipo pagina - las que estan creadas en el admin area
                foreach($pages as $page) {
                  if ( !in_array($page->post_title, array('HOME', 'PROJECTS','NEWS', 'CONTACT', 'ARCHIVES'))) {
                    $exclude_pages[] = $page->ID; // crear array y le va metiendo los ids al final
                  }
                }
                $args = array(
                  'exclude' => implode(', ', $exclude_pages), // string con los IDs de las 
                  'title_li' => '',
                );

                wp_list_pages( $args );
              ?>
            </ul>
          </div>
          
          <div class="widget">
            <h5 class="widget-title font-alt">Text</h5>The languages only differ in their grammar, their pronunciation
            and their most common words. Everyone realizes why a new common language would be desirable: one could
            refuse to pay expensive translators.
          </div>
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
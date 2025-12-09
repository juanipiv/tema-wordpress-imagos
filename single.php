<?php
    get_header();

    the_post();

    $post_id = $post->ID;

    $author_id = get_the_author_meta('ID');
    $bio = get_the_author_meta('description');

    $cat = wp_get_post_categories($post_id); // devuelve un array con los ids de las categorias 

    if ( has_post_thumbnail() ):
        $img_url = get_the_post_thumbnail_url();
    else:
        $img_url = get_template_directory_uri().'/assets/images/images.jpeg';
    endif;
?>
<div class="main">
    <?php
        get_template_part('nav');
    ?>
    <section class="module-small">
        <div class="container">
            <div class="row">
                <!-- sidebar start-->
                <?php get_sidebar();?>
                <!-- sidebar end-->
                <div class="col-sm-8 col-sm-offset-1">
                    <div class="post">
                        <div class="post-thumbnail"><img src="<?php echo $img_url ?>" alt="Blog Featured Image" />
                        </div>
                        <div class="post-header font-alt">
                            <h1 class="post-title"><?php the_title(); ?></h1>
                            <div class="post-meta">By&nbsp;<a href="<?php echo get_author_posts_url($author_id); ?>"><?php the_author(); ?></a>|  <?php the_date(); ?> | 3 Comments | <a href="#"> <?php echo get_post_categories_boot( $post_id ); ?></div>
                        </div>
                        <div class="post-entry">
                            <p>
                                <i class="fa fa-tags"></i>
                                <?php echo get_post_tag_list( $post_id ) ?>
                            </p>
                            <?php the_content() ?>
                        </div>
                    </div>
                    <div class="related-posts">
                        <div class="container">
                            
                            <div class="row multi-columns-row post-columns">
                            <?php 

                                $args = array(
                                "post_type" => "post",
                                "post_per_page" => 3, // queremos los tres ultimos posts
                                'post__not_in' => array($post_id), // excluye el blog en el que estas de por si
                                'category__in' => $cat, // Comprueba si alguna categoria coincide con alguna categoria de los posts que estamos viendo

                                );

                                $query = new WP_Query($args);

                                if ( $query->have_posts() ):
                                    while ($query->have_posts()):
                                    $query->the_post();

                                    if ( has_post_thumbnail() ):
                                        $img_url = get_the_post_thumbnail_url();
                                    else:
                                        $img_url = get_template_directory_uri().'/assets/images/images.jpeg';
                                    endif;
                                ?>
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <a href="<?php the_permalink(); ?>">
                                <div class="post mb-20">
                                <div class="post-thumbnail"><a href="#"><img src="<?php echo $img_url; ?>" alt="Blog-post Thumbnail"/></a></div>
                                <div class="post-header font-alt">
                                    <h2 class="post-title"><a href="#"><?php the_title(); ?></a></h2>
                                    <div class="post-meta">By&nbsp;<a href="#"><?php the_author() ?></a>&nbsp;| <?php the_date() ?>  | <?php the_category() ?>
                                    </div>
                                </div>
                                <div class="post-entry">
                                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                                </div>
                                <div class="post-more"><a class="more-link" href="<?php the_permalink();?>">Read more</a></div>
                                </div>
                                </a>
                            </div>

                            <?php
                        
                                endwhile;
                                else:
                                    echo ("No posts publised yet...");

                                endif;

                                wp_reset_postdata(); //resetear la consulta predeterminada de WP para poder hacer otra desde cero
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="author-info">
                        <div class="author">
                            <img src="<?php echo get_avatar_url($author_id) ?>" alt="Foto">
                            <h2><?php the_author_posts_link() ?></h2>
                        </div>
                        <br>
                        <p><?php echo $bio ?></p>
                    </div>
                    <hr>
                    <div class="comments">
                        <h4 class="comment-title font-alt">There are 3 comments</h4>
                        <div class="comment clearfix">
                            <div class="comment-avatar"><img
                                    src="https://s3.amazonaws.com/uifaces/faces/twitter/ryanbattles/128.jpg"
                                    alt="avatar" /></div>
                            <div class="comment-content clearfix">
                                <div class="comment-author font-alt"><a href="#">John Doe</a></div>
                                <div class="comment-body">
                                    <p>The European languages are members of the same family. Their separate existence
                                        is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The
                                        European languages are members of the same family. Their separate existence is a
                                        myth.</p>
                                </div>
                                <div class="comment-meta font-alt">Today, 14:55 - <a href="#">Reply</a>
                                </div>
                            </div>
                            <div class="comment clearfix">
                                <div class="comment-avatar"><img
                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/draganbabic/128.jpg"
                                        alt="avatar" /></div>
                                <div class="comment-content clearfix">
                                    <div class="comment-author font-alt"><a href="#">Mark Stone</a></div>
                                    <div class="comment-body">
                                        <p>Europe uses the same vocabulary. The European languages are members of the
                                            same family. Their separate existence is a myth.</p>
                                    </div>
                                    <div class="comment-meta font-alt">Today, 15:34 - <a href="#">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment clearfix">
                            <div class="comment-avatar"><img
                                    src="https://s3.amazonaws.com/uifaces/faces/twitter/pixeliris/128.jpg"
                                    alt="avatar" /></div>
                            <div class="comment-content clearfix">
                                <div class="comment-author font-alt"><a href="#">Andy</a></div>
                                <div class="comment-body">
                                    <p>The European languages are members of the same family. Their separate existence
                                        is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The
                                        European languages are members of the same family. Their separate existence is a
                                        myth.</p>
                                </div>
                                <div class="comment-meta font-alt">Today, 14:59 - <a href="#">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-form">
                        <h4 class="comment-form-title font-alt">Add your comment</h4>
                        <form method="post">
                            <div class="form-group">
                                <label class="sr-only" for="name">Name</label>
                                <input class="form-control" id="name" type="text" name="name" placeholder="Name" />
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="email">Name</label>
                                <input class="form-control" id="email" type="text" name="email" placeholder="E-mail" />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="comment" name="comment" rows="4"
                                    placeholder="Comment"></textarea>
                            </div>
                            <button class="btn btn-round btn-d" type="submit">Post comment</button>
                        </form>
                    </div>
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
                        <p>The languages only differ in their grammar, their pronunciation and their most common words.
                        </p>
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
                                <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-1.jpg"
                                            alt="Post Thumbnail" /></a></div>
                                <div class="widget-posts-body">
                                    <div class="widget-posts-title"><a href="#">Designer Desk Essentials</a></div>
                                    <div class="widget-posts-meta">23 january</div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-2.jpg"
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
                    <p class="copyright font-alt">&copy; 2017&nbsp;<a href="index.html">TitaN</a>, All Rights Reserved
                    </p>
                </div>
                <div class="col-sm-6">
                    <div class="footer-social-links"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i
                                class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a
                            href="#"><i class="fa fa-skype"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<?php
    get_footer();
?>
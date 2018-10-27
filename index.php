<?php get_header(); ?>
<!--==========================
  Home slider
============================-->
<?php if( have_rows('g_slayder', 'option') ): ?>
  <section class="flexslider">
    <ul class="slides">
      <?php while( have_rows('g_slayder', 'option') ): the_row(); ?>
        <?php if( have_rows('g_slayder_item', 'option') ): ?>
            <?php while( have_rows('g_slayder_item', 'option') ): the_row(); ?>
              <li style="background-image: url(<?php the_sub_field('g_slayder_image', 'option'); ?>)" class="overlay">
                <div class="container">
                  <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                      <div class="probootstrap-slider-text text-center">
                        <h1 class="probootstrap-heading probootstrap-animate"><?php the_sub_field('g_slayder_text', 'option'); ?></h1>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            <?php endwhile; ?>
        <?php endif; ?>
      <?php endwhile; ?>
    </ul>
  </section>
<?php endif; ?>

      <section class="probootstrap-section probootstrap-section-colored">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-left section-heading probootstrap-animate">
              <h2><?php the_field('page-title'); ?></h2>
            </div>
          </div>
        </div>
      </section>

      <?php 
        $field = get_field('t-block_select');
        if( $field == true ): ?>                   
        <section class="probootstrap-section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="probootstrap-flex-block">
                  <div class="probootstrap-text probootstrap-animate">
                    <h3><?php the_field('t-block_title'); ?></h3>
                    <p><?php the_field('t-block_text'); ?></p>
                    <p><a href="<?php the_field('t-block_link'); ?>" class="btn btn-primary">Learn More</a></p>
                  </div>
                  <div class="probootstrap-image probootstrap-animate" style="background-image: url(<?php the_field('t-block_video_img'); ?>)">
                    <a href="<?php the_field('t-block_video'); ?>" class="btn-video popup-vimeo"><i class="icon-play3"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php endif; ?>

      <section class="probootstrap-section" id="probootstrap-counter">
        <div class="container">
          <div class="row">

            <?php
              $idObj = get_category_by_slug('counter');
              $id = $idObj->term_id;
              $post = get_post($id);
              if ( have_posts() ) : query_posts('cat=' . $id);
              while (have_posts()) : the_post(); ?>
                <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
                  <div class="probootstrap-counter-wrap">
                    <div class="probootstrap-icon">
                      <i class="<?php the_field('counter_icon'); ?>"></i>
                    </div>
                    <div class="probootstrap-text">
                      <span class="probootstrap-counter">
                        <span class="js-counter" data-from="0" data-to="<?php the_field('counter_value'); ?>" data-speed="5000" data-refresh-interval="50">1</span><?php the_field('counter_symbol'); ?>
                      </span>
                      <span class="probootstrap-counter-label"><?php the_field('counter_title'); ?></span>
                    </div>
                  </div>
                </div>
            <? endwhile; endif; wp_reset_query(); ?>  

          </div>
        </div>
      </section>

      <section class="probootstrap-section probootstrap-section-colored probootstrap-bg probootstrap-custom-heading probootstrap-tab-section" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/slider_2.jpg)">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate">
              <h2 class="mb0">Highlights</h2>
            </div>
          </div>
        </div>
        <div class="probootstrap-tab-style-1">
          <ul class="nav nav-tabs probootstrap-center probootstrap-tabs no-border">
            <li class="active"><a data-toggle="tab" href="#featured-news">Featured News</a></li>
            <li><a data-toggle="tab" href="#upcoming-events">Upcoming Events</a></li>
          </ul>
        </div>
      </section>

      <section class="probootstrap-section probootstrap-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              
              <div class="tab-content">

                <div id="featured-news" class="tab-pane fade in active">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="owl-carousel" id="owl1">

                        <?php
                          $idObj = get_category_by_slug('news');
                          $id = $idObj->term_id;
                          $post = get_post($id);
                          if ( have_posts() ) : query_posts('cat=' . $id);
                          while (have_posts()) : the_post(); ?>
                            <div class="item">
                              <a href="#" class="probootstrap-featured-news-box">
                                <figure class="probootstrap-media">
                                  <?php 
                                  $image = get_field('news_img');
                                  if( !empty($image) ): ?>
                                    <img src="<?php echo $image['url']; ?>" class="img-responsive" alt="<?php echo $image['alt']; ?>" />
                                  <?php endif; ?>
                                </figure>
                                <div class="probootstrap-text">
                                  <h3><?php the_title(); ?></h3>
                                  <?php the_content(); ?>
                                  <span class="probootstrap-date"><i class="icon-calendar"></i><?php the_field('news_time'); ?></span>
                                </div>
                              </a>
                            </div>
                        <? endwhile; endif; wp_reset_query(); ?>  
                        <!-- END item -->

                      </div>
                    </div>
                  </div>
                  <!-- END row -->
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <p><a href="<?php the_field('all_news', 'option'); ?>" class="btn btn-primary">View all news</a></p>  
                    </div>
                  </div>
                </div>
                <div id="upcoming-events" class="tab-pane fade">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="owl-carousel" id="owl2">

                        <?php
                          $idObj = get_category_by_slug('events');
                          $id = $idObj->term_id;
                          $post = get_post($id);
                          if ( have_posts() ) : query_posts('cat=' . $id);
                          while (have_posts()) : the_post(); ?>
                            <div class="item">
                              <a href="#" class="probootstrap-featured-news-box">
                                <figure class="probootstrap-media">
                                  <?php 
                                  $image = get_field('events_img');
                                  if( !empty($image) ): ?>
                                    <img src="<?php echo $image['url']; ?>" class="img-responsive" alt="<?php echo $image['alt']; ?>" />
                                  <?php endif; ?>
                                </figure>
                                <div class="probootstrap-text">
                                  <h3><?php the_title(); ?></h3>
                                  <span class="probootstrap-date"><i class="icon-calendar"></i><?php the_field('events_time'); ?></span>
                                  <span class="probootstrap-location"><i class="icon-location2"></i><?php the_field('events_place'); ?></span>
                                </div>
                              </a>
                            </div>
                        <? endwhile; endif; wp_reset_query(); ?>  
                        <!-- END item -->

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <p><a href="<?php the_field('all_events', 'option'); ?>" class="btn btn-primary">View all events</a></p>  
                    </div>
                  </div>
                </div>

              </div>
            
            </div>
          </div>
        </div>
      </section>

      <section class="probootstrap-section probootstrap-bg-white probootstrap-border-top">
        <div class="container">
          <div class="row">
            <?php
                $idObj = get_category_by_slug('сourses');
                $id = $idObj->term_id;
                $post = get_post($id);
            ?>
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
              <h2><?php echo get_cat_name($id);?></h2>
              <div class="lead">
                <?php echo category_description($id);?>
              </div>
            </div>
          </div>
          <!-- END row -->
          <div class="row">
            
            <?php
            if ( have_posts() ) : query_posts(array('cat' => $id,'posts_per_page' => 2));
            while (have_posts()) : the_post(); ?>
              <div class="col-md-6">
                <div class="probootstrap-service-2 probootstrap-animate">
                  <div class="image">
                    <div class="image-bg">
                      <?php 
                      $image = get_field('сourses_img');
                      if( !empty($image) ): ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="text">
                    <span class="probootstrap-meta"><i class="icon-calendar2"></i> <?php the_time('F j, Y'); ?></span>
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                    <p><a href="<?php the_field('courses_link'); ?>" class="btn btn-primary">Enroll now</a> <span class="enrolled-count"><?php the_field('сourses_students'); ?> students enrolled</span></p>
                  </div>
                </div>
              </div>
            <? endwhile; endif; wp_reset_query(); ?>        

          </div>
        </div>
      </section>

      
      
      <section class="probootstrap-section">
        <div class="container">
          <div class="row">
            <?php
                $idObj = get_category_by_slug('teachers');
                $id = $idObj->term_id;
                $post = get_post($id);
            ?>
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
              <h2><?php echo get_cat_name($id);?></h2>
              <div class="lead">
                <?php echo category_description($id);?>
              </div>
            </div>
          </div>
          <!-- END row -->

          <div class="row">
            <?php
            if ( have_posts() ) : query_posts(array('cat' => $id,'posts_per_page' => 4));
            while (have_posts()) : the_post(); ?>
              <div class="col-md-3 col-sm-6">
                <div class="probootstrap-teacher text-center probootstrap-animate">
                  <figure class="media">
                     <?php 
                      $image = get_field('teachers_img');
                      if( !empty($image) ): ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
                      <?php endif; ?> 
                  </figure>
                  <div class="text">
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                    <?php if( have_rows('teachers_social') ): ?>
                      <ul class="probootstrap-footer-social">
                        <?php while( have_rows('teachers_social') ): the_row(); ?>
                          <?php if( have_rows('teachers_social-item') ): ?>
                              <?php while( have_rows('teachers_social-item') ): the_row(); ?>
                                <li class="<?php the_sub_field('teachers_social-class'); ?>"><a href="<?php the_sub_field('teachers_social-link'); ?>"><i class="<?php the_sub_field('teachers_social-icon'); ?>"></i></a></li>
                              <?php endwhile; ?>
                          <?php endif; ?>
                        <?php endwhile; ?>
                      </ul> 
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <? endwhile; endif; wp_reset_query(); ?>        
          </div>
        </div>
      </section>

      <section class="probootstrap-section probootstrap-bg probootstrap-section-colored probootstrap-testimonial" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/slider_4.jpg);">
        <div class="container">
          <div class="row">
            <?php
                $idObj = get_category_by_slug('testimonial');
                $id = $idObj->term_id;
                $post = get_post($id);
            ?>
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
              <h2><?php echo get_cat_name($id);?></h2>
              <div class="lead">
                <?php echo category_description($id);?>
              </div>
            </div>
          </div>
          <!-- END row -->
          <div class="row">
            <div class="col-md-12 probootstrap-animate">
              <div class="owl-carousel owl-carousel-testimony owl-carousel-fullwidth">

                <?php
                  if ( have_posts() ) : query_posts('cat=' . $id);
                  while (have_posts()) : the_post(); ?>
                    <div class="item">
                      <div class="probootstrap-testimony-wrap text-center">
                        <figure>
                          <?php 
                            $image = get_field('testimonial_img');
                            if( !empty($image) ): ?>
                              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php endif; ?>
                        </figure>
                        <blockquote class="quote"><?php the_content(); ?> <cite class="author"> &mdash; <span><?php the_title(); ?></span></cite></blockquote>
                      </div>
                    </div>
                  <? endwhile; endif; wp_reset_query(); ?>       
 
              </div>
            </div>
          </div>
          <!-- END row -->
        </div>
      </section>

      <section class="probootstrap-section">
        <div class="container">
          <div class="row">
            <?php
                $idObj = get_category_by_slug('choose');
                $id = $idObj->term_id;
                $post = get_post($id);
            ?>
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
              <h2><?php echo get_cat_name($id);?></h2>
              <div class="lead">
                <?php echo category_description($id);?>
              </div>
            </div>
          </div>
          <div class="row">

            <?php
              if ( have_posts() ) : query_posts('cat=' . $id);
              while (have_posts()) : the_post(); ?>
                <div class="col-md-6">
                  <div class="service left-icon probootstrap-animate">
                    <div class="icon"><i class="icon-checkmark"></i></div>
                    <div class="text">
                      <h3><?php the_title(); ?></h3>
                      <?php the_content(); ?>
                    </div>  
                  </div>
                </div>
              <? endwhile; endif; wp_reset_query(); ?>      

          </div>
          <!-- END row -->
        </div>
      </section>
      <?php 
        $field = get_field('cta_text', 'option');
        if( !empty($field) ): ?>                   
        <section class="probootstrap-cta">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2 class="probootstrap-animate" data-animate-effect="fadeInRight"><?php the_field('cta_text', 'option'); ?></h2>
                <a href="<?php the_field('cta_link', 'option'); ?>" role="button" class="btn btn-primary btn-lg btn-ghost probootstrap-animate" data-animate-effect="fadeInLeft"><?php the_field('cta_btn_text', 'option'); ?></a>
              </div>
            </div>
          </div>
        </section>
      <?php endif; ?>
<?php get_footer(); ?>      
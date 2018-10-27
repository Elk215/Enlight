<?php /* Template Name: Courses */ ?>

<?php get_header(); ?>

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
                    <div class="text-uppercase probootstrap-uppercase"><?php the_field('t-block_slug'); ?></div>
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

      <section class="probootstrap-section probootstrap-bg-white probootstrap-border-top">
        <div class="container">
          <div class="row">
            <?php
            $idObj = get_category_by_slug('сourses');
            $id = $idObj->term_id;
            $post = get_post($id);
            if ( have_posts() ) : query_posts('cat=' . $id);
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
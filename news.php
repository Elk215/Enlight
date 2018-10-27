<?php /* Template Name: News */ ?>

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

      <section class="probootstrap-section">
        <div class="container">
          <div class="row">

            <?php
              $idObj = get_category_by_slug('news');
              $id = $idObj->term_id;
              $post = get_post($id);
              if ( have_posts() ) : query_posts('cat=' . $id);
              while (have_posts()) : the_post(); ?>
                <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
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
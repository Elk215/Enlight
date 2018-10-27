<?php /* Template Name: Gallery */ ?>

<?php get_header(); ?>

      <section class="probootstrap-section probootstrap-section-colored">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-left section-heading mb0 probootstrap-animate">
              <h2><?php the_field('page-title'); ?></h2>
            </div>
          </div>
        </div>
      </section>
<section class="probootstrap-section probootstrap-bg-white">
      <div class="container">
        
        <div class="row">
          <div class="col-md-12">
            <div class="portfolio-feed three-cols">
              <div class="grid-sizer"></div>
              <div class="gutter-sizer"></div>
              <div class="probootstrap-gallery">

              <?php
                $idObj = get_category_by_slug('gallery');
                $id = $idObj->term_id;
                $post = get_post($id);
                if ( have_posts() ) : query_posts('cat=' . $id);
                while (have_posts()) : the_post(); ?>
                  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="grid-item probootstrap-animate">
                    <?php 
                    $image = get_field('gallery_img');
                    if( !empty($image) ): ?>
                      <a href="<?php echo $image['url']; ?>" itemprop="contentUrl" data-size="<?php echo $image['width']; ?>x<?php echo $image['height']; ?>">
                        <img src="<?php echo $image['url']; ?>" itemprop="thumbnail" alt="<?php echo $image['alt']; ?>" />
                      </a>
                    <?php endif; ?>
                    <figcaption itemprop="caption description"><?php the_field('gallery_title'); ?></figcaption>
                  </figure>
                <? endwhile; endif; wp_reset_query(); ?>  
                
              </div>
            </div>
          </div>
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

    <!-- Photoswipe Modal -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="pswp__bg"></div>
      <div class="pswp__scroll-wrap">

          <div class="pswp__container">
              <div class="pswp__item"></div>
              <div class="pswp__item"></div>
              <div class="pswp__item"></div>
          </div>

          <div class="pswp__ui pswp__ui--hidden">
              <div class="pswp__top-bar">
                  <div class="pswp__counter"></div>
                  <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                  <button class="pswp__button pswp__button--share" title="Share"></button>
                  <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                  <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                  <div class="pswp__preloader">
                      <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                          <div class="pswp__preloader__donut"></div>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                  <div class="pswp__share-tooltip"></div> 
              </div>
              <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
              </button>
              <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
              </button>
              <div class="pswp__caption">
                  <div class="pswp__caption__center"></div>
              </div>
          </div>
      </div>
    </div>

<?php get_footer(); ?>      
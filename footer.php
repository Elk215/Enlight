      
      <footer class="probootstrap-footer probootstrap-bg">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="probootstrap-footer-widget">
                <h3>About The School</h3>
                <p><?php the_field('g_site_description', 'option'); ?></p>
                <h3>Social</h3>
                <?php if( have_rows('g_site_social', 'option') ): ?>
                  <ul class="probootstrap-footer-social">
                    <?php while( have_rows('g_site_social', 'option') ): the_row(); ?>
                      <?php if( have_rows('g_site_social_item', 'option') ): ?>
                          <?php while( have_rows('g_site_social_item', 'option') ): the_row(); ?>
                            <li><a href="<?php the_sub_field('g_site_social_link', 'option'); ?>"><i class="<?php the_sub_field('g_site_social_icon', 'option'); ?>"></i></a></li> 
                          <?php endwhile; ?>
                      <?php endif; ?>
                    <?php endwhile; ?>
                  </ul>  
                <?php endif; ?>
              </div>
            </div>
            <div class="col-md-3 col-md-push-1">
              <div class="probootstrap-footer-widget">
                <h3>Links</h3>
                <?php wp_nav_menu( array(
                    'theme_location'  => 'Нижнее меню',
                    'menu'            => 'bottom', 
                    'container'       => 'ul', 
                    'echo'            => true,
                    'before'          => '<li>',
                    'after'           => '</li>',
                ) ); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="probootstrap-footer-widget">
                <h3>Contact Info</h3>
                <?php if( have_rows('g_site_address', 'option') ): ?>
                  <ul class="probootstrap-contact-info">
                    <?php while( have_rows('g_site_address', 'option') ): the_row(); ?>
                      <?php if( have_rows('g_site_address_item', 'option') ): ?>
                          <?php while( have_rows('g_site_address_item', 'option') ): the_row(); ?>
                            <li><i class="<?php the_sub_field('g_site_address_icon', 'option'); ?>"></i> <span><?php the_sub_field('g_site_address_text', 'option'); ?></span></li>
                          <?php endwhile; ?>
                      <?php endif; ?>
                    <?php endwhile; ?>
                  </ul>  
                <?php endif; ?>
              </div>
            </div>
           
          </div>
          <!-- END row -->
          
        </div>

        <div class="probootstrap-copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-8 text-left">
                <p>&copy; 2017 <a href="https://probootstrap.com/">ProBootstrap:Enlight</a>. All Rights Reserved. Designed &amp; Developed with <i class="icon icon-heart"></i> by <a href="https://probootstrap.com/">ProBootstrap.com</a></p>
              </div>
              <div class="col-md-4 probootstrap-back-to-top">
                <p><a href="#" class="js-backtotop">Back to top <i class="icon-arrow-long-up"></i></a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>

    </div>
    <!-- END wrapper -->
    
  <?php wp_footer(); ?>
  </body>
</html>
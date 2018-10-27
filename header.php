<!DOCTYPE html>

<!-- 
  Theme Name: Enlight
  Theme URL: https://probootstrap.com/enlight-free-education-responsive-bootstrap-website-template
  Author: ProBootstrap.com
  Author URL: https://probootstrap.com
  License: Released for free under the Creative Commons Attribution 3.0 license (probootstrap.com/license)
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ProBootstrap:Enlight &mdash; Free Bootstrap Theme, Free Responsive Bootstrap Website Template</title>
    <meta name="description" content="Free Bootstrap Theme by ProBootstrap.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <?php wp_head(); ?>

    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="probootstrap-search" id="probootstrap-search">
      <a href="#" class="probootstrap-close js-probootstrap-close"><i class="icon-cross"></i></a>
      <form action="#">
        <input type="search" name="s" id="search" placeholder="Search a keyword and hit enter...">
      </form>
    </div>
    
    <div class="probootstrap-page-wrapper">
      <!-- Fixed navbar -->
      
      <div class="probootstrap-header-top">
        <div class="container">
          <div class="row">
            <?php if( have_rows('g_site_address-header', 'option') ): ?>
              <div class="col-lg-9 col-md-9 col-sm-9 probootstrap-top-quick-contact-info">
                <?php while( have_rows(' g_site_address-header', 'option') ): the_row(); ?>
                  <?php if( have_rows('g_site_address-header_item', 'option') ): ?>
                      <?php while( have_rows('g_site_address-header_item', 'option') ): the_row(); ?>
                        <span><i class="<?php the_sub_field('g_site_address-header_icon', 'option'); ?>"></i><?php the_sub_field('g_site_address-header_text', 'option'); ?></span>
                      <?php endwhile; ?>
                  <?php endif; ?>
                <?php endwhile; ?>
              </div>  
            <?php endif; ?>
            <div class="col-lg-3 col-md-3 col-sm-3 probootstrap-top-social">
              <ul>
                <?php if( have_rows('g_site_social-header', 'option') ): ?>
                    <?php while( have_rows('g_site_social-header', 'option') ): the_row(); ?>
                      <?php if( have_rows('g_site_social-header_item', 'option') ): ?>
                          <?php while( have_rows('g_site_social-header_item', 'option') ): the_row(); ?>
                            <li><a href="<?php the_sub_field('g_site_social-header_link', 'option'); ?>"><i class="<?php the_sub_field('g_site_social-header_icon', 'option'); ?>"></i></a></li>
                          <?php endwhile; ?>
                      <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <li><a href="#" class="probootstrap-search-icon js-probootstrap-search"><i class="icon-search"></i></a></li>
              </ul>  
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-default probootstrap-navbar">
        <div class="container">
          <div class="navbar-header">
            <div class="btn-more js-btn-more visible-xs">
              <a href="#"><i class="icon-dots-three-vertical "></i></a>
            </div>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="/" title="ProBootstrap:Enlight">
              <?php the_field('g_site_title', 'option'); ?>
              <?php
              $image = get_field('g_site_logo', 'option');;
                if( !empty($image) ): ?>
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                <?php endif; ?>
            </a>
          </div>

          <?php wp_nav_menu( array(
              'theme_location'  => 'Верхнее меню',
              'menu'            => 'top', 
              'container'       => 'div', 
              'container_class' => 'navbar-collapse collapse', 
              'container_id'    => 'navbar-collapse',
              'menu_class'      => 'nav navbar-nav navbar-right', 
              'echo'            => true,
              'before'          => '',
              'after'           => '',
              'walker'        => new magomra_walker_nav_menu
              
          ) );

           ?>
        </div>
      </nav>
<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-ts">
 *
 * @package advance-fitness-gym
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'advance-fitness-gym' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','advance-fitness-gym'); ?></a></div>

<div id="header"> 
  <div class="top_headbar">
    <div class="container">  
      <div class="row">
        <div class="top-contact col-lg-6 col-md-8 p-0">
          <span class="contact">
          <?php if( get_theme_mod( 'advance_fitness_gym_contact','' ) != '') { ?>
            <i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('advance_fitness_gym_contact',__('+14 256 265 2589','advance-fitness-gym') )); ?>
           <?php } ?>
          </span>
         <span class="mail">
          <?php if( get_theme_mod( 'advance_fitness_gym_email','' ) != '') { ?>
            <i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('advance_fitness_gym_email',__('example@123.com','advance-fitness-gym')) ); ?>
          <?php } ?>
          </span>
        </div>
        <div class="col-lg-6 col-md-4 socialbox">
          <?php if( get_theme_mod( 'advance_fitness_gym_cont_facebook' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'advance_fitness_gym_cont_facebook','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'advance_fitness_gym_cont_twitter' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'advance_fitness_gym_cont_twitter','' ) ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'advance_fitness_gym_google_plus') != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'advance_fitness_gym_google_plus','' ) ); ?>"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'advance_fitness_gym_instagram') != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'advance_fitness_gym_instagram','' ) ); ?>"><i class="fab fa-instagram"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'advance_fitness_gym_linkedin') != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'advance_fitness_gym_linkedin','' ) ); ?>"><i class="fab fa-linkedin-in"></i></i></a>
          <?php } ?>
        </div>
        <div class="clearfix"></div>  
      </div>
    </div>
  </div>
  <div class="middle-header">
    <div class="container">
      <div class="row">
        <div class="logo col-lg-3 col-md-3">
          <?php if( has_custom_logo() ){ advance_fitness_gym_the_custom_logo();
           }else{ ?>
          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?> 
            <p class="site-description"><?php echo esc_html($description); ?></p>       
          <?php endif; }?>
        </div>
        <div class="col-lg-9 col-md-9">
           <div class="main-menu">
            <div class="container">
              <div class="nav">
                <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
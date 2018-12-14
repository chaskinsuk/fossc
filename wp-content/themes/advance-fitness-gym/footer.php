<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package advance-fitness-gym
 */
?>
    <div id="footer" class="copyright-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                <?php dynamic_sidebar('footer-1');?>
                    </div>
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('footer-2');?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('footer-3');?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('footer-4');?>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p><?php echo esc_html(get_theme_mod('advance_fitness_gym_footer_copy', __('Copyright 2018 -', 'advance-fitness-gym')));?> <?php advance_fitness_gym_credit();?></p>
    </div>
    <?php wp_footer();?>
    </body>
</html>
<!-- sidebar -->
<?php Plugins::act( 'theme_sidebar_top' ); ?>

    <div id="search">
     <h2><?php _e('Search'); ?></h2>
<?php $theme->display ('searchform' ); ?>
    </div>	

<?php $theme->show_recentcomments(); ?>
 
    <div class="sb-user">
     <h2><?php _e('User'); ?></h2>
<?php $theme->display ( 'loginform' ); ?>
    </div>	
    
<?php Plugins::act( 'theme_sidebar_bottom' ); ?>
<!-- /sidebar -->

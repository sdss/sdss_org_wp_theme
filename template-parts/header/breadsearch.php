<?php 
	$breadcrumbtext = show_breadcrumbs();
?>
<div id='breadsearch' class='wrapper'>
<div class='gx-card-content'>
<div class='crumbs'><?php if (is_plugin_active( 'sdss_breadcrumb_baker/sdss_breadcrumb_baker.php' )) { echo $breadcrumbtext;  } else { echo "<strong>sdss_breadcrumb_baker plugin not found!</strong>";} ?></div><!-- found in functions.php -->
<div class='searcher'><?php dynamic_sidebar( 'search-widget' ); ?></div><!-- sidebar created in functions.php and populated in Dashboard -> Theme -> Customize -> Widgets -->
</div>
</div>
<?php  ?>
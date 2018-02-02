<?php 

function wp_dev_resources(){
	wp_enqueue_style('style' , get_stylesheet_uri());
	wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css',false,'1.1','all');
	wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array ( 'jquery' ), 1.9, true);
	
	//wp_enqueue_script( 'job-admin-js',plugins_url('js/job-admin.js' , __FILE__), array('jquery' , 'jquery-ui-datepicker'), '20150204',true);
    //wp_enqueue_style( 'jquery-style','https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css' );
}

add_action('wp_enqueue_scripts', 'wp_dev_resources');

// Nav menu

register_nav_menus(array(
	'primary' => __('Primary Menu'),
	'footer' => __('Footer Menu')
));

/* child page display */

function get_top_ancestor_id(){
	global $post;
	if($post->post_parent){
		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
	}

	return $post->ID;
}

// does page have children 

function has_children(){
	global $post;
	$pages = get_pages('child_of='.$post->ID);
	return count($pages);
}
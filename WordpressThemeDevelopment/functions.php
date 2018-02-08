<?php 

function wp_dev_resources(){
	wp_enqueue_style('style' , get_stylesheet_uri());
	wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css',false,'1.1','all');
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css',false,'2.7','all');
	wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array ( 'jquery' ), 1.9, true);
	wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js' , array ( 'jquery' ), 2.7, true);
	wp_enqueue_script('globle-js', get_template_directory_uri() . '/js/globle.js' , array ( 'jquery' ), 1.0, true);
	//wp_enqueue_script( 'job-admin-js',plugins_url('js/job-admin.js' , __FILE__), array('jquery' , 'jquery-ui-datepicker'), '20150204',true);
    //wp_enqueue_style( 'jquery-style','https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css' );
}

add_action('wp_enqueue_scripts', 'wp_dev_resources');


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

function custom_excerpt_length(){
	return 25;
}
add_filter('excerpt_length' , 'custom_excerpt_length');


// theme setup

function featured_image_support(){
	// Nav menu

	register_nav_menus(array(
		'primary' => __('Primary Menu'),
		'footer' => __('Footer Menu')
	));

	add_theme_support('post-thumbnails');
	add_image_size('small-thumbnail',180,120,true);
	add_image_size('banner-image',920,210,array('left','top'));
	add_image_size('slider-image',920,410,array('left','top'));

	//add post format support

	add_theme_support('post-formats' , array('aside', 'gallery' , 'link','image'));
}

add_action('after_setup_theme', 'featured_image_support');


function customWidgetInit(){
	register_sidebar(array(
			'name'		=> 'Sidebar',
			'id'		=>	'sidebar1',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>',
			'before_title'	=> '<h4>',
			'after_title'	=> '</h4>',
		)
	);

		register_sidebar(array(
			'name'		=> 'Footer Area 1',
			'id'		=>	'footer1',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>',
			'before_title'	=> '<h4>',
			'after_title'	=> '</h4>',
		)
	);


	register_sidebar(array(
			'name'		=> 'Footer Area 2',
			'id'		=>	'footer2',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>',
			'before_title'	=> '<h4>',
			'after_title'	=> '</h4>',
		)
	);


	register_sidebar(array(
			'name'		=> 'Footer Area 3',
			'id'		=>	'footer3',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>',
			'before_title'	=> '<h4>',
			'after_title'	=> '</h4>',
		)
	);


	register_sidebar(array(
			'name'		=> 'Footer Area 4',
			'id'		=>	'footer4',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>',
			'before_title'	=> '<h4>',
			'after_title'	=> '</h4>',			
		)
	);

}

add_action('widgets_init', 'customWidgetInit');

// Costomize appearance options

function wordpressThemeDevelopment_customize_register($wp_customize){

	$wp_customize->add_setting('wp_link_color' , array(
		'default' => '#006ec3',
		'transport'	=> 'refresh',
	));


	$wp_customize->add_setting('wp_button_color' , array(
		'default' => '#006ec3',
		'transport'	=> 'refresh',
	));

	$wp_customize->add_section('wp_standard_colors', array(
		'title'	=> __('Standard Colors','wordpressThemeDevelopment'),
		'priority' => 30,
	));

	

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'wp-link-color-control' , array(
			'label'	=> __('Link Color','wordpressThemeDevelopment'),
			'section'	=> 'wp_standard_colors',
			'settings'	=> 	'wp_link_color',
	)));


	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'wp-button-color-control' , array(
			'label'	=> __('Button Color','wordpressThemeDevelopment'),
			'section'	=> 'wp_standard_colors',
			'settings'	=> 	'wp_button_color',
	)));

}

add_action('customize_register', 'wordpressThemeDevelopment_customize_register');


//output customize css 

function wp_customize_css(){ ?>

	<style type="text/css">
		a:link,
		a:visited{
			color: <?php echo get_theme_mod('wp_link_color'); ?>;
		}
		.site-header nav ul li.current-menu-item a:link,
		.site-header nav ul li.current-menu-item a:visited,
		.site-header nav ul li.current-page-ancestor a:link,
		.site-header nav ul li.current-page-ancestor a:visited
		{
			background-color:<?php echo get_theme_mod('wp_link_color'); ?>;
		}

		div.hd-search #searchsubmit {
		  background-color:<?php echo get_theme_mod('wp_button_color'); ?>;
		}
	</style>

<?php
}

add_action('wp_head', 'wp_customize_css');


// add footer callout section 

function wordpressThemeDevelopment_footer_callout($wp_customize){
	$wp_customize->add_section('wp-footer-callout-section', array(
		'title'	=> 'Footer Callout'
	));

	$wp_customize->add_setting('wp-footer-callout-display' , array(
		'default' => 'No'
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize,
			'wp-footer-callout-display-control', array(
			'label'	=> 'Display this section ?',
			'section'	=> 'wp-footer-callout-section',
			'settings'	=> 	'wp-footer-callout-display',
			'type'		=>  'select',
			'choices'	=>  array('No' =>'No','Yes' =>'Yes')
	)));


	$wp_customize->add_setting('wp-footer-callout-headline' , array(
		'default' => 'Example Headline text!'
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize,
			'wp-footer-callout-control', array(
			'label'	=> 'Headline',
			'section'	=> 'wp-footer-callout-section',
			'settings'	=> 	'wp-footer-callout-headline'
	)));


	$wp_customize->add_setting('wp-footer-callout-text' , array(
		'default' => 'Example paragraph text!'
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize,
			'wp-footer-callout-text-control', array(
			'label'	=> 'Text',
			'section'	=> 'wp-footer-callout-section',
			'settings'	=> 	'wp-footer-callout-text',
			'type'		=> 	'textarea'
	)));



	$wp_customize->add_setting('wp-footer-callout-link');

	$wp_customize->add_control(new WP_Customize_Control($wp_customize,
			'wp-footer-callout-link-control', array(
			'label'	=> 'Link',
			'section'	=> 'wp-footer-callout-section',
			'settings'	=> 	'wp-footer-callout-link',
			'type'		=> 	'dropdown-pages'
	)));


	$wp_customize->add_setting('wp-footer-callout-image');

	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,
			'wp-footer-callout-link-control', array(
			'label'	=> 'Image',
			'section'	=> 'wp-footer-callout-section',
			'settings'	=> 	'wp-footer-callout-image',
			'width'		=>	750,
			'height'	=>	500
	)));

}

add_action('customize_register', 'wordpressThemeDevelopment_footer_callout');
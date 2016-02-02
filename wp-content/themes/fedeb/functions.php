<?php

if ( function_exists('register_sidebar'))
register_sidebar(array(
'name' => 'Footer Left',));

if ( function_exists('register_sidebar'))
register_sidebar(array(
'name' => 'Footer Center',));

if ( function_exists('register_sidebar'))
register_sidebar(array(
'name' => 'Footer Right',));


require TEMPLATEPATH.'/framework/theme.php';
$theme = new Theme (array(
	'menus' => array(
		'nav' => 'navigation'
		),
	'sidebar' => array(
		'principal' => array(
			'name'          => 'Sidebar Principale',
			'id'            => 'main',
			'description'   => 'La sidebar principale',
		        'class'         => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>')
	),
	'images' => array(
		'post' => array(
			array('thumb',761,306,true)
		),
		'page' => array(
			array('thumb',360,200,true)
			)
		)
));

add_filter("mce_buttons_3", "custom_mce_buttons_3");
function custom_mce_buttons_3($buttons) {
    array_unshift( $buttons, 'fontselect' );
    array_unshift( $buttons, 'fontsizeselect' );
    return $buttons;
}

add_filter( 'mce_buttons_2', 'juiz_mce_buttons_2' );  
   
if ( !function_exists('juiz_mce_buttons_2')) {  
    function juiz_mce_buttons_2( $buttons ) {  
        array_unshift( $buttons, 'styleselect' );  
   
        return $buttons;  
    }  
}

add_filter( 'tiny_mce_before_init', 'custom_mce_before_init' );
function custom_mce_before_init( $settings ) {
    global $post;
    $style_formats = array(
        array(
            'title' => 'centrer_image',
            'selector' => 'p',
            'attributes' => array(
            'id' => 'center-img',
            "style" => "text-align:center;"
            )
        ),
        array(
            'title' => 'border_h2',
            'selector' => 'h2',
            "attributes" => array(
                "style" => "border-bottom:1px solid #CCC!important;margin-top:20px!important;",
            )
        ),
        array(
            'title' => 'modif',
            'inline' => 'span',
            'classes' => 'notranslate'
            )
    );
    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
}

?>
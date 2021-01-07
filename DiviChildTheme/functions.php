<?php

/**
 * Loads parent and child themes' style.css
 */
function ai_divi_child_theme_child_theme_enqueue_styles() {
    $parent_style = 'ai_divi_child_theme_parent_style';
    $parent_base_dir = 'Divi';

    wp_enqueue_style( $parent_style,
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme( $parent_base_dir ) ? wp_get_theme( $parent_base_dir )->get('Version') : ''
    );

}

add_action( 'wp_enqueue_scripts', 'ai_divi_child_theme_child_theme_enqueue_styles' );


add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
    /*wp_enqueue_style( 'ai-child1', get_stylesheet_directory_uri().'/css/fonts.css', array('ai_divi_child_theme_parent_style')  );*/
    /*wp_enqueue_style( 'ai-child2', get_stylesheet_directory_uri().'/css/main.css', array('ai_divi_child_theme_parent_style')  );*/
    //add jquery
    wp_enqueue_script('ai-child3', get_stylesheet_directory_uri() .'/js/customscript.js', array('jquery'), null, true);
}

// admin styles

function admin_style() {
  wp_enqueue_style('admin-styles', get_stylesheet_directory_uri().'/css/adminstyles.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

// create new column in et_pb_layout screen
add_filter( 'manage_et_pb_layout_posts_columns', 'ai_create_shortcode_column', 5 );
add_action( 'manage_et_pb_layout_posts_custom_column', 'ai_shortcode_content', 5, 2 );
// register new shortcode
add_shortcode('ai_layout_sc', 'ai_shortcode_mod');

// New Admin Column
function ai_create_shortcode_column( $columns ) {
$columns['ai_shortcode_id'] = 'Module Shortcode';
return $columns;
}

//Display Shortcode
function ai_shortcode_content( $column, $id ) {
if( 'ai_shortcode_id' == $column ) {
?>
<p>[ai_layout_sc id="<?php echo $id ?>"]</p>
<?php
}
}

// Create New Shortcode
function ai_shortcode_mod($ai_mod_id) {
extract(shortcode_atts(array('id' =>'*'),$ai_mod_id));
return do_shortcode('[et_pb_section global_module="'.$id.'"][/et_pb_section]');
}

// Remove query strings
function remove_query_string( $src ){
  $parts = explode( '?ver', $src );
  return $parts[0];
}
add_filter( 'script_loader_src', 'remove_query_string', 15, 1 );
add_filter( 'style_loader_src', 'remove_query_string', 15, 1 );


//Footer wordpress
function remove_footer_admin () {
 
  echo 'Aeveloped by <a href="https://github.com/AndreLuizMag/" target="_blank" rel="noopener noreferrer">AndreLuizMag</a></p>';
   
  }
   
  add_filter('admin_footer_text', 'remove_footer_admin');

//Anything added should go below here. Please do NOT delete anything above this line. 



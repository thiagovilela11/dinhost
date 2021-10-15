<?php
define('DISALLOW_FILE_EDIT', false);
add_theme_support( 'post-thumbnails' );  
wp_enqueue_script("jquery");
/* WIDGETS */
if (function_exists('register_sidebar'))
{
    register_sidebar(array(
        'name'          => 'Sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
   ));
}
register_nav_menu( 'main-menu', 'Menu Principal' );
function getAuthors() {
    global $wpdb;
    $authors = $wpdb->get_results("SELECT ID, user_nicename from $wpdb->users ORDER BY display_name");
    return $authors;
}
function fb_mce_external_languages($initArray){
    $initArray['spellchecker_languages'] = '+Portuguese=pt, English=en';
 
    return $initArray;
}
add_filter('tiny_mce_before_init', 'fb_mce_external_languages');
// AQUI REMOVE A VERSÃO DO WORDPRESS
remove_action('wp_head', 'wp_generator');
function remove_generator_filter() { return ''; }
 
if (function_exists('add_filter')) {
$types = array('html', 'xhtml', 'atom', 'rss2', /*'rdf',*/ 'comment', 'export');
 
foreach ($types as $type)
add_filter('get_the_generator_'.$type, 'remove_generator_filter');
}
// AQUI REMOVE A LOGO DO WP DO BACK-END
function login_enqueue_scripts(){
    echo '
        <div class="background-cover"></div>
        <style type="text/css" media="screen">
            .background-cover{
                background:url('.get_bloginfo('template_directory').'/img/loginbg.jpg) no-repeat center center fixed; 
                -webkit-background-size: cover; 
                -moz-background-size: cover; 
                -o-background-size: cover; 
                background-size: cover; 
                position:fixed; 
                top:0; 
                left:0; 
                z-index:10; 
                overflow: hidden; 
                width: 100%; 
                height:100%;
            } 
            #login{ z-index:9999; position:relative; }
            .login form { box-shadow: 0px 0px 0px 0px !important; }
            .login h1 a {  } 
            input.button-primary, button.button-primary, a.button-primary{ 
                border-radius: 3px !important;                      background:#333; 
                    border:none !important;
                    font-weight:normal !important;
                    text-shadow:none !important;
                }
                .button:active, .submit input:active, .button-secondary:active {
                    background:#96C800 !important; 
                    text-shadow: none !important;
                }
                .login #nav a, .login #backtoblog a {
                    color:#fff !important;
                    text-shadow: none !important;
                }
                .login #nav a:hover, .login #backtoblog a:hover{
                    color:#96C800 !important;
                    text-shadow: none !important;
                }
                .login #nav, .login #backtoblog{
                    text-shadow: none !important;
                }
            </style>
        ';
    }
add_action( 'login_enqueue_scripts', 'login_enqueue_scripts' );

function cutom_login_logo() {
echo "<style type=\"text/css\">
body.login div#login h1 a {
background-image: url(".get_bloginfo('template_directory')."/images/logowpadmin.png);
-webkit-background-size: auto;
background-size: auto;
margin: 0 0 0px;
width: 320px;
height: 107px;
}
</style>";
}

add_action( 'login_enqueue_scripts', 'cutom_login_logo' );
function loginpage_custom_link() {
	return get_bloginfo('url');
}
add_filter('login_headerurl','loginpage_custom_link');
 
function change_title_on_logo() {
	return 'Voltar para ' . get_bloginfo('name');
}
add_filter('login_headertitle', 'change_title_on_logo');

add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}
// AQUI REMOVE A AJUDA DO WP DO BACK-END  
add_filter( 'contextual_help', 'mytheme_remove_help_tabs', 999, 3 );
function mytheme_remove_help_tabs($old_help, $screen_id, $screen){
    $screen->remove_help_tabs();
    return $old_help;
}
// ALTERANDO AUTOR NO PAINEL
function remove_footer_admin () {
  echo 'Desenvolvido pela Agência 7 Cores';
}
add_filter('admin_footer_text', 'remove_footer_admin');
add_filter('generate_rewrite_rules', 'remcat_rewrite');
function remcat_rewrite($wp_rewrite) {
$new_rules = array('(.+)/page/(.+)/?' => 'index.php/?category_name='.$wp_rewrite->preg_index(1).'&paged='.$wp_rewrite->preg_index(2));
$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
function wordpress_pagination() {
global $wp_query;

$big = 999999999;

echo paginate_links( array(
'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
'format' => '?paged=%#%',
'current' => max( 1, get_query_var('paged') ),
'total' => $wp_query->max_num_pages
) );
}
	add_filter('admin_footer_text', 'remove_footer_admin');
	remove_action('wp_head', 'wp_generator');

add_action( 'init', 'register_cpt_bannertopo' );
function register_cpt_bannertopo() {
    
        $labels = array( 
            'name' => _x( 'Banner Topo', 'bannertopo' ),
            'singular_name' => _x( 'Banner Topo', 'bannertopo' ),
            'add_new' => _x( 'Add Novo', 'bannertopo' ),
            'add_new_item' => _x( 'Add Novo Banner Topo', 'bannertopo' ),
            'edit_item' => _x( 'Edit Banner Topo', 'bannertopo' ),
            'new_item' => _x( 'Novo Banner Topo', 'bannertopo' ),
            'view_item' => _x( 'Ver Banner Topo', 'bannertopo' ),
            'search_items' => _x( 'Buscar Banner Topo', 'bannertopo' ),
            'not_found' => _x( 'No quadras found', 'bannertopo' ),
            'not_found_in_trash' => _x( 'Não tem Banner Topo na Lixeira', 'bannertopo' ),
            'parent_item_colon' => _x( 'Parent Banner Topo:', 'bannertopo' ),
            'menu_name' => _x( 'Banner Topo', 'bannertopo' ),
        );
    
        $args = array( 
            'labels' => $labels,
            'hierarchical' => true,
            'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
            'taxonomies' => array( 'category', 'post_tag', 'page-category' ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,   
            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => true,
            'capability_type' => 'post'
        );
    
        register_post_type( 'bannertopo', $args );
    }
add_action( 'init', 'register_cpt_bannerrodape' );
   function register_cpt_bannerrodape() {
        
            $labels = array( 
                'name' => _x( 'Banner Rodapé', 'bannerrodape' ),
                'singular_name' => _x( 'Banner Rodapé', 'bannerrodape' ),
                'add_new' => _x( 'Add Novo', 'bannerrodape' ),
                'add_new_item' => _x( 'Add Novo Banner Rodapé', 'bannerrodape' ),
                'edit_item' => _x( 'Edit Banner Rodapé', 'bannerrodape' ),
                'new_item' => _x( 'Novo Banner Rodapé', 'bannerrodape' ),
                'view_item' => _x( 'Ver Banner Rodapé', 'bannerrodape' ),
                'search_items' => _x( 'Buscar Banner Rodapé', 'bannerrodape' ),
                'not_found' => _x( 'No quadras found', 'bannerrodape' ),
                'not_found_in_trash' => _x( 'Não tem Banner Rodapé na Lixeira', 'bannerrodape' ),
                'parent_item_colon' => _x( 'Parent Banner Rodapé:', 'bannerrodape' ),
                'menu_name' => _x( 'Banner Rodapé', 'bannerrodape' ),
            );
        
            $args = array( 
                'labels' => $labels,
                'hierarchical' => true,
                'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
                'taxonomies' => array( 'category', 'post_tag', 'page-category' ),
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => true,   
                'show_in_nav_menus' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => false,
                'has_archive' => true,
                'query_var' => true,
                'can_export' => true,
                'rewrite' => true,
                'capability_type' => 'post'
            );
        
            register_post_type( 'bannerrodape', $args );
        }
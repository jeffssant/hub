<?php
/**
 * 
 * Functions php
 */

define('ASSETS', get_stylesheet_directory_uri() . '/assets/');

function setAssets() {
    // Css's

    wp_enqueue_style('bootstrap', ASSETS. 'vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('icofont', ASSETS. 'vendor/icofont/icofont.min.css');
    wp_enqueue_style('boxicons', ASSETS. 'vendor/boxicons/css/boxicons.min.css');
    wp_enqueue_style('owl', ASSETS. 'vendor/owl.carousel/assets/owl.carousel.min.css'); 
    wp_enqueue_style('venobox', ASSETS. 'vendor/venobox/venobox.css');  
    wp_enqueue_style('remixicon', ASSETS. 'vendor/remixicon/remixicon.css');  
    wp_enqueue_style('aos', ASSETS. 'vendor/aos/aos.css');     
    wp_enqueue_style('style', ASSETS. 'css/style.css');
    wp_enqueue_style('google-font','https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i');

    // Js's

    wp_enqueue_script('waypoints', ASSETS.'lib/waypoints/waypoints.min.js');
    wp_enqueue_script('counterup', ASSETS.'lib/counterup/counterup.min.js');
    wp_enqueue_script('owlcarousel', ASSETS.'lib/owlcarousel/owl.carousel.min.js', '', '', true );
    wp_enqueue_script('contact', ASSETS.'contactform/contactform.js');    
    wp_enqueue_script('bootstrap-js', ASSETS.'vendor/bootstrap/js/bootstrap.bundle.min.js', '', '', true );
    wp_enqueue_script('jq-easing-js', ASSETS.'vendor/jquery.easing/jquery.easing.min.js', '', '', true );
    wp_enqueue_script('phpform-validate', ASSETS.'vendor/php-email-form/validate.js', '', '', true );
    wp_enqueue_script('isotope', ASSETS.'vendor/isotope-layout/isotope.pkgd.min.js', '', '', true );
    wp_enqueue_script('venobojs', ASSETS.'vendor/venobox/venobox.min.js', '', '', true ); 
    wp_enqueue_script('waypoints', ASSETS.'vendor/waypoints/jquery.waypoints.min.js', '', '', true ); 
    wp_enqueue_script('aos-js', ASSETS.'vendor/aos/aos.js', '', '', true ); 
    wp_enqueue_script('main', ASSETS.'js/main.js', '', '', true );

    // Teste vocacional
    wp_enqueue_script('teste-vocacional-inicio', ASSETS.'js/form-inicio-teste.js');
    wp_enqueue_script('teste-vocacional-js', ASSETS.'js/teste-vocacional.js');
    wp_enqueue_style('teste-vocacional-css', ASSETS.'css/teste-vocacional.css');

    // Setar ajaxurl
    wp_localize_script( 'teste-vocacional-inicio', 'wpobj',
        array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action('wp_enqueue_scripts', 'setAssets');

function phpinclude($file) {
    $param = shortcode_atts(array (
        'file' => 'file'
    ), $file);

    ob_start();
    $dir = get_stylesheet_directory();
    include ($dir . "/assets/{$param['file']}.php");
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}

add_shortcode('phpinclude', 'phpinclude');

function salva_dados_teste() {
    $message = '';
    
    try {
        global $wpdb;
        $usuario = $_POST['usuario'];
        $wpdb->insert('teste_vocacional_usuarios', $usuario);
        
        $message = 'Dados salvos com sucesso!';
    } catch (\Exepction $e) {
        $message = "Houve um erro: {$e->getMessage()}";
    }

    echo json_encode(['message' => $message]);
    exit;
}

add_action('wp_ajax_salva_dados_teste', 'salva_dados_teste');
add_action('wp_ajax_nopriv_salva_dados_teste', 'salva_dados_teste');

// Adicionar uma função de usuário personalizada
 
$fundamental = add_role( 'fundamental', __('Fundamental' ),
    array(
    'read' => true, // true allows this capability
    'edit_posts' => false, // Allows user to edit their own posts
    'edit_pages' => false, // Allows user to edit pages
    'edit_others_posts' => false, // Allows user to edit others posts not just their own
    'create_posts' => false, // Allows user to create new posts
    'manage_categories' => false, // Allows user to manage post categories
    'publish_posts' => false, // Allows the user to publish, otherwise posts stays in draft mode
    'edit_themes' => false, // false denies this capability. User can’t edit your theme
    'install_plugins' => false, // User cant add new plugins
    'update_plugin' => false, // User can’t update any plugins
    'update_core' => false // user cant perform core updates
    )
);

$intermediario = add_role( 'intermediario', __('Intermediario' ),
    array(
    'read' => true, // true allows this capability
    'edit_posts' => false, // Allows user to edit their own posts
    'edit_pages' => false, // Allows user to edit pages
    'edit_others_posts' => false, // Allows user to edit others posts not just their own
    'create_posts' => false, // Allows user to create new posts
    'manage_categories' => false, // Allows user to manage post categories
    'publish_posts' => false, // Allows the user to publish, otherwise posts stays in draft mode
    'edit_themes' => false, // false denies this capability. User can’t edit your theme
    'install_plugins' => false, // User cant add new plugins
    'update_plugin' => false, // User can’t update any plugins
    'update_core' => false // user cant perform core updates
    )
);

$avancado = add_role( 'avancado', __('Avançado' ),
    array(
    'read' => true, // true allows this capability
    'edit_posts' => false, // Allows user to edit their own posts
    'edit_pages' => false, // Allows user to edit pages
    'edit_others_posts' => false, // Allows user to edit others posts not just their own
    'create_posts' => false, // Allows user to create new posts
    'manage_categories' => false, // Allows user to manage post categories
    'publish_posts' => false, // Allows the user to publish, otherwise posts stays in draft mode
    'edit_themes' => false, // false denies this capability. User can’t edit your theme
    'install_plugins' => false, // User cant add new plugins
    'update_plugin' => false, // User can’t update any plugins
    'update_core' => false // user cant perform core updates
    )
);

//retirar barra wpadmin
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
    //categorias que não deverá exibir admin bar.
    $roles = ['avancado', 'intermediario', 'fundamental' ];

    $user = wp_get_current_user();
    if(array_intersect($user->roles, $roles)){
     show_admin_bar(false);
    }
}
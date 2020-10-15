<?php
/**
 * 
 * Functions php
 */

define('ASSETS', get_stylesheet_directory_uri() . '/assets/');

function setAssets() {
    // Css'   
    wp_enqueue_style('bootstrap', ASSETS. 'vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('font', ASSETS. 'vendor/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('icofont', ASSETS. 'vendor/icofont/icofont.min.css');
    wp_enqueue_style('boxicons', ASSETS. 'vendor/boxicons/css/boxicons.min.css');
    wp_enqueue_style('owl', ASSETS. 'vendor/owl.carousel/assets/owl.carousel.min.css'); 
    wp_enqueue_style('venobox', ASSETS. 'vendor/venobox/venobox.css');  
    wp_enqueue_style('remixicon', ASSETS. 'vendor/remixicon/remixicon.css');  
    wp_enqueue_style('aos', ASSETS. 'vendor/aos/aos.css');     
    wp_enqueue_style('style', ASSETS. 'css/style.css');
    wp_enqueue_style('google-font','https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i');

    // Js'

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



    wp_enqueue_script('mask', ASSETS.'js/mask.js', '', '', true );
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
 
$geral = add_role( 'geral', __('Geral' ),
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
    $roles = ['avancado', 'intermediario', 'fundamental', 'geral' ];

    $user = wp_get_current_user();
    if(array_intersect($user->roles, $roles)){
     show_admin_bar(false);
    }
}



function addUser(){
    global $wpdb;    
    $nome = $_POST['nome'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $origem = $_POST['origem'];
   

    $ulogin = explode(" ", $nome);
    $primeiroNome = $ulogin[0];
    $login = $ulogin[0];
  

    array_shift($ulogin);
    $sobrenome = "";
    foreach($ulogin as $nome){
        $login =  $login .'.'.$nome;
        $sobrenome = $sobrenome." ".$nome;
    }


    $sobrenome = trim($sobrenome);

    $checkEmail = email_exists($email);

    if (!empty($checkEmail)) {
        echo '<div class="error-message">Email já Cadastrado</div>';
        exit();
    }   
    
    $check = username_exists($login);
    
    if (!empty($check)) {
        $suffix = 2;
        while (!empty($check)) {
            $alt_ulogin = $login . '-' . $suffix;
            $check = username_exists($alt_ulogin);
            $suffix++;
        }
        $login = $alt_ulogin;
      
    }   

    $userdata = array(
        'user_login' =>  $login,        
        'first_name' =>  $primeiroNome,        
        'user_pass'  =>  $password, // When creating an user, `user_pass` is expected.
        'user_email'  =>  $email, // When creating an user, `user_pass` is expected.
        'display_name'  =>  $primeiroNome, // When creating an user, `user_pass` is expected.
        'last_name'  =>  $sobrenome, // When creating an user, `user_pass` is expected.
        'role'  =>  'geral', // When creating an user, `user_pass` is expected.
    );
     
    
    $user_id = wp_insert_user( $userdata ) ;
    

    if( $user_id ) {
        $user_id;
        echo '<div class="cadastrado">Usuário cadastrado com sucesso </div>';

        // Adicionar dados meta especiais
        update_user_meta( $user_id, 'telefone', $telefone );
        update_user_meta( $user_id, 'estado', $estado );
        update_user_meta( $user_id, 'cidade', $cidade );
		    update_user_meta( $user_id, 'origem', $origem );
		
		phpMail($_POST['nome'],$_POST['telefone'],$_POST['email'],$_POST['origem'] );


        // Fazer Login
        $current_user = get_user_by( 'id', $user_id );
        $secure_cookie = is_ssl() ? true : false;
        wp_set_auth_cookie( $user_id, true, $secure_cookie );     
        exit();
    }
    else {
    echo '<div class="error-message">'.$user_id->get_error_message().'</div>';
    }  


   
}

add_action('wp_ajax_addUser', 'addUser');
add_action('wp_ajax_nopriv_addUser', 'addUser');





function mysite_custom_define() {
    $custom_meta_fields = array();
    $custom_meta_fields['telefone'] = 'Telefone';
    $custom_meta_fields['estado'] = 'Estado';
    $custom_meta_fields['cidade'] = 'Cidade';
    $custom_meta_fields['origem'] = 'Origem';
    $custom_meta_fields['resultado'] = 'Resultado do teste';
    return $custom_meta_fields;
  }

  function mysite_columns($defaults) {
    $meta_number = 0;
    $custom_meta_fields = mysite_custom_define();
    foreach ($custom_meta_fields as $meta_field_name => $meta_disp_name) {
      $meta_number++;
      $defaults[('mysite-usercolumn-' . $meta_number . '')] = __($meta_disp_name, 'user-column');
    }
    return $defaults;
  }
  
  function mysite_custom_columns($value, $column_name, $id) {
    $meta_number = 0;
    $custom_meta_fields = mysite_custom_define();
    foreach ($custom_meta_fields as $meta_field_name => $meta_disp_name) {
      $meta_number++;
      if( $column_name == ('mysite-usercolumn-' . $meta_number . '') ) {
        return get_the_author_meta($meta_field_name, $id );
      }
    }
  }

  function mysite_show_extra_profile_fields($user) {
    print('<h3>Informações</h3>');
  
    print('<table class="form-table">');
  
    $meta_number = 0;
    $custom_meta_fields = mysite_custom_define();
    foreach ($custom_meta_fields as $meta_field_name => $meta_disp_name) {
      $meta_number++;
      print('<tr>');
      print('<th><label for="' . $meta_field_name . '">' . $meta_disp_name . '</label></th>');
      print('<td>');
      print('<input type="text" name="' . $meta_field_name . '" id="' . $meta_field_name . '" value="' . esc_attr( get_the_author_meta($meta_field_name, $user->ID ) ) . '" class="regular-text" /><br />');
      print('<span class="description"></span>');
      print('</td>');
      print('</tr>');
    }
    print('</table>');
  }

  function mysite_save_extra_profile_fields($user_id) {

    if (!current_user_can('edit_user', $user_id))
      return false;
  
    $meta_number = 0;
    $custom_meta_fields = mysite_custom_define();
    foreach ($custom_meta_fields as $meta_field_name => $meta_disp_name) {
      $meta_number++;
      update_usermeta( $user_id, $meta_field_name, $_POST[$meta_field_name] );
    }
  }

add_action('show_user_profile', 'mysite_show_extra_profile_fields');
add_action('edit_user_profile', 'mysite_show_extra_profile_fields');
add_action('personal_options_update', 'mysite_save_extra_profile_fields');
add_action('edit_user_profile_update', 'mysite_save_extra_profile_fields');
add_action('manage_users_custom_column', 'mysite_custom_columns', 15, 3);
add_filter('manage_users_columns', 'mysite_columns', 15, 1);    





//Mail
//Import PHPMailer classes into the global namespace
function phpMail($user = "", $telefone = "", $email = "", $local = "", $mensagem = "", $assunto = ""){

  if ($user == "" and $_POST['nome']){
    $user = $_POST['nome'];
  }

  if ($email == "" and $_POST['email']){
    $email = $_POST['email'];
  }

  if ($local == "" and $_POST['origem']){
    $local = $_POST['origem'];
  }  

  if ($assunto == "" and $_POST['assunto']){
    $assunto = 'Formulário de contato - '.$_POST['assunto'];
  }
  else{
    $assunto = 'Novo usuário cadastrado - '.$local;
  }

  if ($mensagem == "" and $_POST['mensagem']){
    $mensagem = 'Olá Houve um novo contato através do ' .$local.'.<br><br><strong>Dados para contato</strong> <br> Nome:'.$user.'<br> Assunto:'.$assunto.'<br> E-mail: '.$email.'<br> Mensagem:'.$_POST['mensagem'];
  }
  else{
    $mensagem = 'Olá Houve um novo cadastro através do formulario ' .$local.'.<br><br><strong>Dados para contato</strong> <br> Nome:'.$user.'<br> Telefone:'.$telefone.'<br> E-mail: '.$email.'<br><br> Mais informações poderão ser acessadas via painel administrativo';
  }



	include get_template_directory() . '/assets/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
	include get_template_directory() . '/assets/const/const.php';

	$mailer = new PHPMailer();
	$mailer->IsSMTP();
	$mailer->CharSet="UTF-8";
	$mailer->Debugoutput = 'html';
	
	//$mailer->SMTPDebug = 1;

	$mailer->Username = USERNAME; //Login de autenticação do SMTP
	$mailer->Password = PASSWORD; //Senha de autenticação do SMTP
	$mailer->FromName = 'Site Hub Vocacional'; //Nome que será exibido
	$mailer->From = 'contato@hubvocacional.com.br';
  $mailer->AddAddress(EMAILENVIO,'Admin');
  $mailer->AddCC('contato@hubvocacional.com.br', 'Copia Admin'); // Copia
  $mailer->AddBCC(EMAILCOPIA, 'Copia admin site');
	//Destinatários	
	$mailer->Subject = '=?UTF-8?B?'.base64_encode($assunto).'?=';
	$mailer->Body = $mensagem;
	$mailer->IsHTML(true); 
	if(!$mailer->Send())
	{
	  echo "Message was not sent";
    echo "Mailer Error: " . $mailer->ErrorInfo; exit;
  }
  elseif ($local == 'Formulário de contato'){
    echo 'Mensagem enviada com sucesso! entraremos em contato em breve.';
    exit();
  }
	
}
add_action('wp_ajax_phpMail', 'phpMail');
add_action('wp_ajax_nopriv_phpMail', 'phpMail');



function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}
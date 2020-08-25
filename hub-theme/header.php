<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title><?php wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class()?>>

    <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top ">
		<div class="container d-flex align-items-center justify-content-between">

			<h1 class="logo"><a href="index.html"><img src="wp-content/themes/hub-theme/assets/img/Logotipo Hub Vocacional positivo.png" alt=""
						srcset=""></a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->
			<!-- <a href="index.html" class="logo"><img src="wp-content/themes/hub-theme/assets/img/logo.png" alt="" class="img-fluid"></a>-->

			<nav class="nav-menu d-none d-lg-block">
				<ul>
					<li class="active"><a href="index.html">Home</a></li>
					<li><a href="#services">Emprego dos Sonhos</a></li>
					<li><a href="#cta">Teste Vocacional</a></li>
					<li><a href="#features">Nossos Cursos</a></li>
					<li><a href="#contact">Contato</a></li>
				</ul>
			</nav><!-- .nav-menu -->

			<?php 
			global $post;
			$post_slug = $post->post_name;
			
			if(!is_user_logged_in()){ ?>
			<a  class="get-started-btn scrollto" data-toggle="modal" data-target=".bd-example-modal-lg-login">Área do Aluno</a>
			<?php } elseif(is_user_logged_in() and $post_slug !="area-do-aluno"){?>
			<a href="<?=get_site_url()?>/area-do-aluno"  class="get-started-btn scrollto" >Área do Aluno</a>
			
			<?php } else{?>
				<a href="<?=get_site_url()?>/wp-admin/profile.php"  class="get-started-btn scrollto" >Editar Dados</a>
			<?php } ?>
		</div>
	</header><!-- End Header -->
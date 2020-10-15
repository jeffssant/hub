<?php 
// Template Name: Home

$page = get_page_by_path('home', OBJECT, 'page');
$id = $page->ID;

$fields = get_fields($id);

get_header(); 

?>
<section id="hero" class="d-flex align-items-center justify-content-center">
	<div class="container" data-aos="fade-up">

		<div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
			<div class="col-xl-6 col-lg-8">
				<h1>Comece bem sua vida universitaria<span>.</span></h1>
				<h2>Faça a escolha certa para seu futuro.</h2>
			</div>
		</div>

		<div class="row mt-5 justify-content-center text-white" id="cursos" data-aos="zoom-in" data-aos-delay="250">
			<?php
			$count = 0;
			$classe = "active";
			foreach($fields ["cursos"] as $curso){ 
			?>
			<div class=" col-md-4 mt-5 mt-md-0 mt-lg-0 ">
				<div class="icon-box">
					<i class="<?=$curso['icone']?>"></i>
					<h3><a href=""><?=$curso['titulo']?></a></h3>
					<p class="mb-3">R$<?=$curso['valor']?> mês</p>
					<a href="" class="get-started-btn scrollto curso-<?=$count?>" data-toggle="modal"
						data-target=".bd-example-modal-lg-cadastro">Inscreva-se</a>
					<a href="#tab-<?=$count?>" class="get-started-btn scrollto tab-<?=$count?>" data-toggle="tab">
						Saiba mais
					</a>
				</div>
			</div>
			<?php 
				$count++;
			} ?>
		</div>
	</div>
</section><!-- End Hero -->


<div class="modal fade bd-example-modal-lg-login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<?php echo do_shortcode( '[wp_login_form redirect="'.get_home_url(  ).'/area-do-aluno" label_username="Usuário ou E-mail"]' ); ?>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>


<?php if($fields['caixas_sonho']){ ?>
<main id="main">
	<!-- ======= Services Section ======= -->
	<section id="services" class="services">
		<div class="container" data-aos="fade-up">

			<div class="section-title">
				<h2>Conquiste seu</h2>
				<p>Emprego dos sonhos</p>
			</div>

			<div class="row">
				<?php 
				$counter = 0;
				foreach($fields['caixas_sonho'] as $caixa){ 	
				?>
				<div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100"
					data-toggle="modal" data-target=".bd-example-modal-lg-<?=$counter?>">
					<div class="icon-box">
						<div class="icon"><i class="<?= $caixa['icone']?>"></i></div>
						<h4><a><?= $caixa['titulo']?></a></h4>
						<p><?= $caixa['resumo']?></p>
					</div>
				</div>
				<?php
				$counter++;	
				}	
				?>
			</div>
		</div>
	</section><!-- End Services Section -->
	<?php } ?>


	<!-- ======= Cta Section ======= -->
	<section id="cta" class="cta">
		<div class="container" data-aos="zoom-in">
			<div class="row">
				<div class="col-md-7">
					<h3 class="mb-md-4">Teste Vocacional</h3>
					<?= $fields['texto_teste']?>
				</div>
				<div class="col-md-5 mx-auto px-md-4 mt-md-0 mt-lg-0 mt-4">
					<form action="" method="post" role="form" class="php-email-form teste-vocacional">
						<div class="form-row">
							<div class="col-12 form-group">
								<input type="text" name="name-teste" class="form-control" id="name-teste"
									placeholder="Nome" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validate"></div>
							</div>
							<div class="col-12 form-group">
								<input type="email" class="form-control" name="email-teste" id="email-teste"
									placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
								<div class="validate"></div>
							</div>
							<div class="col-12 form-group">
								<input type="tel" class="form-control" name="tel-teste" id="tel-teste"
									placeholder="Telefone" data-rule="telefone" data-msg="Please enter a valid tel" />
								<div class="validate"></div>
							</div>
							<div class="col-12 form-group">


								<select class="form-control" name="estado" id="estado-teste" placeholder="Estado"
									data-rule="estado" data-msg="Por favor selecione o estado">
								</select>
							</div>
							<div class="col-12 form-group">
								<select class="form-control" name="cidade" id="cidade-teste" placeholder="Cidade"
									data-rule="cidade" data-msg="Por favor selecione a cidade">
								</select>
							</div>
							<div class="col-12 form-group">
								<input type="password" class="form-control" name="password" id="password-teste"
									placeholder="Senha" data-rule="minlen:4"
									data-msg="Please enter at least 4 chars of subject" />
								<div class="validate"></div>
							</div>

							<div class="col-md-12 form-group text-center">
								<button id="cta-btn" type="submit" class="btn button cta-btn w-100">
									Fazer o teste
								</button>
							</div>
						</div>
					</form>
					<div class="mb-3 aviso" style="display: none;">
						<div class="loading">Carregando</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- End Cta Section -->
	<?php if($fields ["cursos"]){?>
	<!-- ======= Features Section ======= -->
	<section id="features" class="features">
		<div class="container" data-aos="fade-up">
			<div class="section-title mt-5">
				<h2>Conheça</h2>
				<p>Nossos Cursos</p>
			</div>

			<ul class="nav nav-tabs row d-flex mb-4 text-center">
				<?php 
				$count = 0;
				$classe = "active";
				foreach($fields ["cursos"] as $curso){ 
					if ($count > 0 ){$classe = "";}	?>
				<li class="nav-item col-4">
					<a class="nav-link tab-<?=$count?> <?=$classe?>" data-toggle="tab" href="#tab-<?=$count?>">
						<i class="<?=$curso['icone']?>"></i>
						<h4 class="d-none d-lg-block"><?=$curso['titulo']?></h4>
					</a>
				</li>
				<?php $count++;
				} ?>
			</ul>

			<div class="tab-content">
				<?php
				$count = 0;
				$classe = "active";
				foreach($fields ["cursos"] as $curso){ 
					if ($count > 0 ){$classe = "";}	?>
				<div class="tab-pane <?=$classe?>" id="tab-<?=$count?>">
					<div class="row">
						<div class="col-lg-11  mt-3">
							<?=$curso['texto']?>
							<a class="insc-btn curso-<?=$count?>" href="#" data-toggle="modal"
								data-target=".bd-example-modal-lg-cadastro">Inscreva-se</a>
						</div>
					</div>
				</div>
				<?php $count++;
				} ?>
			</div>
		</div>
	</section><!-- End Features Section -->
	<?php } ?>

	<!-- ======= Testimonials Section ======= -->
	<?php if($fields ["depoimentos"]){?>
	<section id="testimonials" class="testimonials">
		<div class="container" data-aos="zoom-in">
			<div class="owl-carousel testimonials-carousel">
				<?php foreach($fields["depoimentos"] as $depoimento){?>
				<div class="testimonial-item">
					<img src="<?=$depoimento['foto']?>" class="testimonial-img" alt="">
					<h3><?=$depoimento['nome']?></h3>
					<h4><?=$depoimento['cargo']?></h4>
					<p>
						<i class="bx bxs-quote-alt-left quote-icon-left"></i>
						<?=$depoimento['depoimento']?>
						<i class="bx bxs-quote-alt-right quote-icon-right"></i>
					</p>
				</div>
				<?php } ?>
			</div>
		</div>
	</section><!-- End Testimonials Section -->
	<?php } ?>

	<!-- ======= Contact Section ======= -->
	<section id="contact" class="contact">
		<div class="container" data-aos="fade-up">

			<div class="section-title">
				<h2>Fale conosco</h2>
				<p>Entre em contato</p>
			</div>
			<div class="row mt-5">
				<div class="col-lg-4">
					<div class="info">
						<?php foreach($fields["info"] as $info){ ?>
						<div class="mb-4">
							<i class="<?=$info['icone']?>"></i>
							<h4><?=$info['titulo']?></h4>
							<p><?=$info['texto']?></p>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="col-lg-8 mt-5 mt-lg-0">

					<form action="forms/contact.php" method="post" role="form" class="php-email-form" id="form-conta">
						<div class="form-row">
							<div class="col-md-6 form-group">
								<input type="text" class="form-control" id="name-contato" placeholder="Nome" />
							</div>
							<div class="col-md-6 form-group">
								<input type="email" class="form-control" id="email-contato" placeholder="Email"  />
							</div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="subject" placeholder="Assunto"/>
						</div>
						<div class="form-group">
							<textarea class="form-control mensagem"  rows="5"  placeholder="Mensagem"></textarea>
						</div>
						<div class="mb-3 aviso-contato" style="display: none;">
							<div class="loading">Carregando</div>
						</div>
						<div class="text-right"><button type="submit" id="contact-button">Enviar</button></div>
					</form>

				</div>

			</div>

		</div>
	</section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- Modal Sonhos -->
<?php 
$counter = 0;
foreach($fields['caixas_sonho'] as $caixa){ 	
?>
<div class="modal fade bd-example-modal-lg-<?=$counter?>" tabindex="-1" role="dialog"
	aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<div class="section-title">
					<h2>Desenvolvimento em</h2>
					<p><?= $caixa['titulo']?> <i class="<?= $caixa['icone']?>"></i></p>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= $caixa['texto']?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>
<?php
$counter++;
}
?>
<div class="modal fade bd-example-modal-lg-cadastro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute;
right: 6%;">
				<span aria-hidden="true">×</span>
			</button>
			<div class="section-title">
				<h2>Seja</h2>
				<p style="font-size:22px; margin-bottom:20px">Nosso aluno </p>
			</div>


			<div class="modal-footer">
				<form action="" method="post" role="form" class="php-email-form inscricao">
					<div class="form-row">
						<div class="col-12 form-group">
							<input type="text" class="form-control" id="name" placeholder="Nome" data-rule="minlen:4"
								data-msg="Please enter at least 4 chars" />
							<div class="validate"></div>
						</div>
						<div class="col-12 form-group">
							<input type="email" class="form-control" id="email" placeholder="Email" data-rule="email"
								data-msg="Please enter a valid email" />
							<div class="validate"></div>
						</div>
						<div class="col-12 form-group">
							<input type="tel" class="form-control" id="tel" placeholder="Telefone" data-rule="telefone"
								data-msg="Please enter a valid tel" />
							<div class="validate"></div>
						</div>
						<div class="col-12 form-group">


							<select class="form-control" id="estado" placeholder="Estado" data-rule="estado"
								data-msg="Por favor selecione o estado">
							</select>
						</div>
						<div class="col-12 form-group">
							<select class="form-control" id="cidade" placeholder="Cidade" data-rule="cidade"
								data-msg="Por favor selecione a cidade">
							</select>
						</div>
						<div class="col-12 form-group">
							<input type="password" class="form-control" id="password" placeholder="Senha"
								data-rule="minlen:4" data-msg="Please enter at least 4 chars of subject" />
							<div class="validate"></div>
						</div>


					</div>
					<div data-field-id="Curso" class="ur-field-item field-radio ">
						<div class="form-row validate-required" id="Curso_field" data-priority=""><label
								for="Fundamental" class="ur-label">Curso <abbr class="required"
									title="required">*</abbr></label>
							<ul>
								<li class="ur-radio-list"><input data-rules="" data-id="Curso" type="radio"
										class="input-radio ur-frontend-field  " value="Fundamental" name="Curso"
										id="Curso_Fundamental" required="required" data-label="Curso"> <label
										for="Curso_Fundamental" class="radio">Fundamental</label></li>
								<li class="ur-radio-list"><input data-rules="" data-id="Curso" type="radio"
										class="input-radio ur-frontend-field  " value="Intermediario" name="Curso"
										id="Curso_Intermediario" required="required" data-label="Curso"> <label
										for="Curso_Intermediario" class="radio">Intermediario</label></li>
								<li class="ur-radio-list"><input data-rules="" data-id="Curso" type="radio"
										class="input-radio ur-frontend-field  " value="Avançado" name="Curso"
										id="Curso_Avançado" required="required" data-label="Curso"> <label
										for="Curso_Avançado" class="radio">Avançado</label></li>
							</ul>
						</div>
					</div>
					<button type="submit" id="insc-btn" class="btn button ur-submit-button insc-btn w-100">
						<span></span>
						Solicitar inscrição </button>
				</form>
				<div class="mb-3 aviso-insc" style="display: none;">
						<div class="loading">Carregando</div>

					</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
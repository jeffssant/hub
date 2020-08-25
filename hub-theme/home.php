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
						<a href="" class="get-started-btn scrollto">Inscreva-se</a>
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



<div class="modal fade bd-example-modal-lg-login" tabindex="-1" role="dialog"
	aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
		<?php echo do_shortcode( '[wp_login_form redirect="http://localhost/hubtema/area-do-aluno" label_username="Usuário ou E-mail"]' ); ?>
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
					<form action="forms/contact.php" method="post" role="form" class="php-email-form">
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
								<input type="tel" class="form-control" name="tel-teste" id="tel" placeholder="Telefone"
									data-rule="email" data-msg="Please enter a valid email" />
								<div class="validate"></div>
							</div>
							<div class="col-12 form-group">

								<select class="form-control" name="estado" id="estado" placeholder="Estado"
									data-rule="estado" data-msg="Please enter a valid email">
									<option>Selecione o estado</option>
									<option value="AC">Acre</option>
									<option value="AL">Alagoas</option>
									<option value="AP">Amapá</option>
									<option value="AM">Amazonas</option>
									<option value="BA">Bahia</option>
									<option value="CE">Ceará</option>
									<option value="DF">Distrito Federal</option>
									<option value="ES">Espírito Santo</option>
									<option value="GO">Goiás</option>
									<option value="MA">Maranhão</option>
									<option value="MT">Mato Grosso</option>
									<option value="MS">Mato Grosso do Sul</option>
									<option value="MG">Minas Gerais</option>
									<option value="PA">Pará</option>
									<option value="PB">Paraíba</option>
									<option value="PR">Paraná</option>
									<option value="PE">Pernambuco</option>
									<option value="PI">Piauí</option>
									<option value="RJ">Rio de Janeiro</option>
									<option value="RN">Rio Grande do Norte</option>
									<option value="RS">Rio Grande do Sul</option>
									<option value="RO">Rondônia</option>
									<option value="RR">Roraima</option>
									<option value="SC">Santa Catarina</option>
									<option value="SP">São Paulo</option>
									<option value="SE">Sergipe</option>
									<option value="TO">Tocantins</option>
								</select>
							</div>
							<div class="col-12 form-group">
								<input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade"
									data-rule="cidade" data-msg="Please enter a valid email" disabled />
								<div class="validate"></div>
							</div>
							<div class="col-12 form-group">
								<input type="text" class="form-control" name="password" id="password"
									placeholder="Senha" data-rule="minlen:4"
									data-msg="Please enter at least 8 chars of subject" />
								<div class="validate"></div>
							</div>

							<div class="col-md-12 form-group text-center">
								<a class="cta-btn w-100" href="#">Fazer o teste</a>
							</div>
						</div>
				</div>


				<div class="mb-3" style="display: none;">
					<div class="loading">Loading</div>
					<div class="error-message"></div>
					<div class="sent-message">Your message has been sent. Thank you!</div>
				</div>

				</form>

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
							<a class="insc-btn curso-<?=$count?>" href="#">Inscreva-se</a>
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
						<img src="<?=$depoimento['foto']?>"
							class="testimonial-img" alt="">
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

					<form action="forms/contact.php" method="post" role="form" class="php-email-form">
						<div class="form-row">
							<div class="col-md-6 form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Nome"
									data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validate"></div>
							</div>
							<div class="col-md-6 form-group">
								<input type="email" class="form-control" name="email" id="email" placeholder="Email"
									data-rule="email" data-msg="Please enter a valid email" />
								<div class="validate"></div>
							</div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto"
								data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
							<div class="validate"></div>
						</div>
						<div class="form-group">
							<textarea class="form-control" name="message" rows="5" data-rule="required"
								data-msg="Please write something for us" placeholder="Mensagem"></textarea>
							<div class="validate"></div>
						</div>
						<div class="mb-3">
							<div class="loading">Loading</div>
							<div class="error-message"></div>
							<div class="sent-message">Your message has been sent. Thank you!</div>
						</div>
						<div class="text-right"><button type="submit">Enviar</button></div>
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

<?php get_footer(); ?>
<?php 
// Template Name: Aluno
if( is_user_logged_in() ) {
    $user = wp_get_current_user();
    $roles = ( array ) $user->roles;
   
    } else {
        echo '<script>window.location = "'.home_url( ).'"</script>';
        exit();
}

get_header(); 

$page = get_page_by_path('area-do-aluno', OBJECT, 'page');
$id = $page->ID;

$fields = get_fields($id);
$idUser = wp_get_current_user()->ID;
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$dt_atual		= date("Y-m-d"); // data atual
$timestamp_dt_atual 	= strtotime($dt_atual);



?>

<div class="bradcam_area breadcam_bg" id="hero">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h1>Área do Aluno</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="recent_event_area section__padding mt-5 ">
    <div class="container-fluid">
        <div class="row container-fluid">
            <div class="col-12 mb-4">
                <div class="section_title  mb-70">
                    <div class="section-title">
                        <h2>Nosso</h2>
                        <p>Cronograma</p>
                    </div>
                    <?php if($roles[0] == "geral" or $roles[0] == "administrator") { ?>
                    <p style="margin-top:-40px">
                        Para acessar o conteudo exclusivo de nossos alunos assinates por favor faça a solicitação do seu
                        upgrade
                        <a class="font-weight-bold " href="<?=get_home_url( )?>/#features">Aqui.</a> <br>
                        Caso ja tenha solicitado por favor aguarde, entraremos em contato em breve.
                    </p>
                    <?php } ?>
                </div>

            </div>
            <i class="ri-shield-user-line icon-r pl-3"></i>
            <h3 class="title-r mb-3"><a href="">Fundamental</a></h3>
            <div class="justify-content-left col-12 row mb-4">

                <?php 
               
                $eventos = $fields['evento'];
                //arsort($eventos);
              
                foreach( $eventos as $evento){
                    $confirm = false;
                    foreach ($evento["alunos"] as $aluno) {                                           
                        if ($aluno['aluno'] == $idUser) {                            
                            $confirm = true;
                            $dataAluno = $aluno['data'];
                            $exists = true;
                        }                        
                    }                    
                    if(!$confirm){continue;}
                    $mes= ucfirst(strftime('%B',strtotime($dataAluno)));             
                    $data = $mes.", ".date('Y', strtotime($dataAluno));
                    $hora = date('H:i', strtotime($dataAluno) ); 
                    
                    $classC = "";
                    if ($timestamp_dt_atual > strtotime($dataAluno)){ // true
                        $classC = 'preto';
                    }
                    
                    ?>
                <div class="col-md-2">
                    <div class="single_event  p-0 ">
                        <div class="date text-center <?=$classC?>">

                            <p class="font-weight-bold mb-1"><?= $evento['titulo']?></p>

                        </div>
                        <div class="event_info pt-2">

                            <p class="p-0 m-0 font-weight-bold ">
                                <?= date('d', strtotime($dataAluno) ).' de '.$data." ".$hora;?></p>
                            <p>

                                <?= $evento['descricao']?><br>
                                <?php foreach($evento['documentos'] as $documento){ ?>
                                <a href="<?=$documento['documento']?>" download><?=$documento['titulo']?></a><br>

                                <?php } ?>
                            </p>

                        </div>
                    </div>
                </div>

                <?php
                }?>
                <?php if(!$exists){?>
                    <div class="mb-3 pl-3"> Sem Cronograma cadastrado para esse perfil </div>
                <?php }?>
            </div>


            <i class="ri-shield-flash-line icon-r pl-3"></i>
            <h3 class="title-r mb-3"><a href="">Intermediario</a></h3>
            <div class="justify-content-left col-12 row mb-4">

                <?php 
               
                $eventosIntermediario = $fields['evento_intermediario'];
                //arsort($eventosIntermediario);
              
                foreach( $eventosIntermediario as $evento){
                    $confirm = false;
                    foreach ($evento["alunos"] as $aluno) {                                           
                        if ($aluno['aluno'] == $idUser) {                            
                            $confirm = true;
                            $dataAluno = $aluno['data'];
                            $existsInt = true;
                        }                        
                    }                    
                    if(!$confirm){continue;}
                    $mes= ucfirst(strftime('%B',strtotime($dataAluno)));             
                    $data = $mes.", ".date('Y', strtotime($dataAluno));
                    $hora = date('H:i', strtotime($dataAluno) ); 
                    
                    $classC = "";
                    if ($timestamp_dt_atual > strtotime($dataAluno)){ // true
                        $classC = 'preto';
                    }
                    
                    ?>
                <div class="col-md-2">
                    <div class="single_event  p-0 ">
                        <div class="date text-center <?=$classC?>">

                            <p class="font-weight-bold mb-1"><?= $evento['titulo']?></p>

                        </div>
                        <div class="event_info pt-2">

                            <p class="p-0 m-0 font-weight-bold ">
                                <?= date('d', strtotime($dataAluno) ).' de '.$data." ".$hora;?></p>
                            <p>

                                <?= $evento['descricao']?><br>
                                <?php foreach($evento['documentos'] as $documento){ ?>
                                <a href="<?=$documento['documento']?>" download><?=$documento['titulo']?></a><br>

                                <?php } ?>
                            </p>

                        </div>
                    </div>
                </div>

                <?php
                }?>
                <?php if(!$existsInt){?>
                    <div class="mb-3 pl-3"> Sem Cronograma cadastrado para esse perfil </div>
                <?php }?>
            </div>


            <i class="ri-shield-star-line icon-r pl-3"></i>
            <h3 class="title-r mb-3"><a href="">Avançado</a></h3>
            <div class="justify-content-left col-12 row">

                <?php 
               
                $eventosAvancado = $fields['evento_avancado'];
                //arsort($eventosAvancado);
              
                foreach( $eventosAvancado as $evento){
                    $confirm = false;
                    foreach ($evento["alunos"] as $aluno) {                                           
                        if ($aluno['aluno'] == $idUser) {                            
                            $confirm = true;
                            $dataAluno = $aluno['data'];
                            $existsAd = true;
                        }                        
                    }                    
                    if(!$confirm){continue;}
                    $mes= ucfirst(strftime('%B',strtotime($dataAluno)));             
                    $data = $mes.", ".date('Y', strtotime($dataAluno));
                    $hora = date('H:i', strtotime($dataAluno) ); 
                    
                    $classC = "";
                    if ($timestamp_dt_atual > strtotime($dataAluno)){ // true
                        $classC = 'preto';
                    }
                    
                    ?>
                <div class="col-md-2">
                    <div class="single_event  p-0 ">
                        <div class="date text-center <?=$classC?>">

                            <p class="font-weight-bold mb-1"><?= $evento['titulo']?></p>

                        </div>
                        <div class="event_info pt-2">

                            <p class="p-0 m-0 font-weight-bold ">
                                <?= date('d', strtotime($dataAluno) ).' de '.$data." ".$hora;?></p>
                            <p>

                                <?= $evento['descricao']?><br>
                                <?php foreach($evento['documentos'] as $documento){ ?>
                                <a href="<?=$documento['documento']?>" download><?=$documento['titulo']?></a><br>

                                <?php } ?>
                            </p>

                        </div>
                    </div>
                    
                </div>

                <?php
                }?>
                <?php if(!$existsAd){?>
                    <div class="mb-3 pl-3"> Sem Cronograma cadastrado para esse perfil </div>
                <?php }?>
            </div>
            <?php 
            /* Antiga área de documentos
            <div class="col-lg-3 course_details_left">

                <div class="content_wrapper">
                    <div class="section-title pb-0">
                        <p>Documentos</p>
                    </div>

                    <div class="content">
                        <ul class="course_list">
                            <?php   
                            foreach($fields['pdfs'] as $pdf){ 
                                 if($pdf['usuario']!= $idUser){
                                    continue;
                                }?>
            <li class="justify-content-between d-flex">
                <p><?=$pdf['titulo']?></p>
                <a class="primary-btn text-uppercase" href="<?=$pdf['pdf']?>" download>Baixar</a>
            </li>
            <?php
                            } ?>

            <?php   
                            foreach($fields['pdfs_gerais'] as $pdf){    
                                foreach($pdf['perfil'] as $perfil){
                                    if ($perfil->slug == wp_get_current_user()->roles[0] or $perfil->slug == 'geral') { ?>

            <li class="justify-content-between d-flex">
                <p><?=$pdf['titulo']?></p>
                <a class="primary-btn text-uppercase" href="<?=$pdf['pdf']?>" download>Baixar</a>
            </li>
            <?php 
                                    }
                                } 
                            }?>
            </ul>
        </div>
    </div>
</div>
*/ ?>
</div>
</div>
</div>

<?php get_footer(); ?>
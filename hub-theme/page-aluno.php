<?php 
// Template Name: Aluno
get_header(); 

$page = get_page_by_path('area-do-aluno', OBJECT, 'page');
$id = $page->ID;

$fields = get_fields($id);
$idUser = wp_get_current_user()->ID;
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

//var_dump(wp_get_current_user()->roles[0]);



$a = array('1.10', 12.4, 1.13);

if (in_array('1', $a, true)) {
    echo "'12.4' encontrado com checagem de tipo\n";
}
if (in_array(4, $a, true)) {
    echo "1.13 encontrado com checagem de tipo\n";
}


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
            <div class="col-8">
                <div class="section_title  mb-70">
                    <div class="section-title">
                        <h2>Nossos</h2>
                        <p>Proximos eventos</p>
                    </div>
                </div>
            </div>
            <div class="justify-content-center col-8">
                <?php 
                foreach($fields['evento'] as $evento){

                    if($evento['usuario']!= $idUser){
                        continue;
                    }
                    $mes= ucfirst(strftime('%B',strtotime($evento['data'])));             
                    $data = $mes.", ".date('Y', strtotime($evento['data']));
                    $hora = date('H:i', strtotime($evento['data']) ); ?>

                    <div class="single_event d-flex align-items-center">
                        <div class="date text-center">
                            <span><?= date('d', strtotime($evento['data']) );?></span>
                            <p><?=$data?></p>
                            <p><?=$hora?></p>
                        </div>
                        <div class="event_info">
                            <div class="title-a">
                                <h4><?= $evento['titulo']?></h4>
                            </div>
                            <p><?= $evento['descricao']?></p>
                        </div>
                    </div>

                <?php
                }?>
            </div>
            <div class="col-lg-4 course_details_left">

                <div class="content_wrapper">
                    <div class="section-title">
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
                                    <a class="primary-btn text-uppercase" href="<?=$pdf['pdf']?>">Baixar</a>
                                </li>
                                <?php
                            } ?>
                            
                            <?php   
                            foreach($fields['pdfs_gerais'] as $pdf){    
                                foreach($pdf['perfil'] as $perfil){
                                    if ($perfil->slug == wp_get_current_user()->roles[0] or $perfil->slug == 'geral') { ?>

                                        <li class="justify-content-between d-flex">
                                            <p><?=$pdf['titulo']?></p>
                                            <a class="primary-btn text-uppercase" href="<?=$pdf['pdf']?>">Baixar</a>
                                        </li>
                                        <?php 
                                    }
                                } 
                            }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
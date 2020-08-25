<?php
/**
 * Template Name: Quiz
 */
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Hub educacional</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons 
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">-->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">

  <?php wp_head(); ?>
</head>

<body <?php body_class()?>>

    <!--==========================
  Header
  ============================-->
    <header id="header" class="fixed-top">
        <div class="container">

            <div class="logo float-left">
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
                <a href="#intro" class="scrollto"><img src="<?=ASSETS?>img/logo.png" alt="" class="img-fluid"></a>
            </div>

            <nav class="main-nav float-right d-none d-lg-block">
                <ul>
                    <li class="active"><a href="http://hubvocacional.com.br/">Home</a></li>
                    
                </ul>
            </nav><!-- .main-nav -->

        </div>
    </header><!-- #header -->



<section id="quiz-container">
    <div class="container">
        <p id="pagecounter" class="text-secondary">Questão 
            <span id="page-cur">1</span> de <span id="page-last">22</span></p>
        <?php
            while(have_posts()) {
                the_post();
                the_content();
            }
        ?>
    </div>
</section>

<?php get_footer(); ?>

<?php
/**
 * Template Name: Quiz
 */
if( !is_user_logged_in() ) {
    echo '<script>window.location = "'.home_url( ).'"</script>';
        exit();   
} 
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Hub Vocacional</title>
    


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
 <?php get_header(); ?>



<section id="quiz-container">
    <div class="container">
     <input type="hidden" id="page-cur" value="1">
        
        <?php
        
            while(have_posts()) {
                the_post();
                the_content();
            }
        ?>
    </div>
</section>

<?php get_footer(); ?>

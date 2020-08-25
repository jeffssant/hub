<section id="result-section" class="col-md-12">
  <div class="container">
    <p> <img alt="Parabéns" src="<?php echo ASSETS . "img/parabens.png"; ?>" > </p>
    <p> A área do conhecimento que você mais se identifica é: </p>
    <span class="course-title-label"> CIÊNCIAS EXATAS E TECNOLÓGICAS </span>
    <p id="conheca-cursos"> Conheça os cursos que podem lhe atender <i class="fa fa-angle-double-down"></i> </p>
    <p> Aqui oferecemos o curso certo e a mobilidade de ensino que se encaixa melhor para você!</p>
  </div>
</section>
<section id="cursos-lista" class="col-md-12 lista-cursos-result ">
  <div class="row">
    <div class="column-cursos col-md-4">
      <h3>GRADUAÇÃO <br><span class="strong">PRESENCIAL</span></h3>
      <p> Para você que prefere ter interação diário com os professores e tem disponibilidade para frequentar aulas todos os dias. </p>
      <ul>
        <li><a href="" target="_blank">ANÁLISE E DESENVOLVIMENTO DE SISTEMAS</a></li>
        <li><a href="" target="_blank">ARQUITETURA E URBANISMO</a></li>
        <li><a href="" target="_blank">CIÊNCIA DA COMPUTAÇÃO</a></li>
        <li><a href="" target="_blank">DESIGN DE INTERIORES</a></li>
        <li><a href="" target="_blank">DESIGN GRÁFICO</a></li>
        <li><a href="" target="_blank">ENGENHARIA CIVIL</a></li>
        <li><a href="" target="_blank">ENGENHARIA DE PRODUÇÃO</a></li>
        <li><a href="" target="_blank">ENGENHARIA ELÉTRICA</a></li>
        <li><a href="" target="_blank">ENGENHARIA MECÂNICA</a></li>
        <li><a href="" target="_blank">JOGOS DIGITAIS</a></li>
        <li><a href="" target="_blank">MATEMÁTICA (Licenciatura)</a></li>
        <li><a href="" target="_blank">QUÍMICA (Bacharelado)</a></li>
        <li><a href="" target="_blank">QUÍMICA (Licenciatura)</a></li>
        <li><a href="" target="_blank">REDES DE COMPUTADORES</a></li>
      </ul>
    </div>
    <div class="column-cursos col-md-4">
      <h3>GRADUAÇÃO <br><span class="strong">SEMIPRESENCIAL</span></h3>
      <p> Para você que prefere ter interação diário com os professores e tem disponibilidade para frequentar aulas todos os dias. </p>
      <ul>
        <li><a href="" target="_blank">Cst em Análise e Desenvolvimento de Sistemas</a></li>
        <li><a href="" target="_blank">Engenharia Ambiental</a></li>
        <li><a href="" target="_blank">Engenharia Civil</a></li>
        <li><a href="" target="_blank">Engenharia Elétrica</a></li>
        <li><a href="" target="_blank">Engenharia Mecânica</a></li>
        <li><a href="" target="_blank">Engenharia da Computação</a></li>
        <li><a href="" target="_blank">Engenharia de Produção</a></li>
      </ul>
    </div>
    <div class="column-cursos col-md-4">
      <h3>GRADUAÇÃO <br><span class="strong">Á DISTÂNCIA</span></h3>
      <p> Para você que prefere ter interação diário com os professores e tem disponibilidade para frequentar aulas todos os dias. </p>
      <ul>
        <li><a href="" target="_blank">Cst em Análise e Desenvolvimento de Sistemas</a></li>
        <li><a href="" target="_blank">Cst em Banco de Dados</a></li>
        <li><a href="" target="_blank">Cst em Gestão Comercial</a></li>
        <li><a href="" target="_blank">Cst em Gestão de Ti</a></li>
        <li><a href="" target="_blank">Cst em Secretariado</a></li>
        <li><a href="" target="_blank">Engenharia Ambiental</a></li>
        <li><a href="" target="_blank">Engenharia de Produção</a></li>
        <li><a href="" target="_blank">Química (Licenciatura)</a></li>
      </ul>
    </div>
  </div>
  <div id="share-results">
    <div class="container">
      <a href="<?=home_url("/cursos/");?>" id="enviar-curso" class="btn btn-primary"> Inscreva-se </a>
      <p> Compartilhe seu resultado </p>
      <ul id="share-icon-position">
        <li onclick="shareResults('Ciências humanas e sociais','twitter')" class="share-icon twitter"> <i class="fa fa-twitter"></i> </li>
        <li onclick="shareResults('Ciências humanas e sociais','facebook')" class="share-icon facebook"> <i class="fa fa-facebook"></i> </li>
        <li onclick="shareResults('Ciências humanas e sociais','google')" class="share-icon google"> <i class="fa fa-google-plus"></i> </li>
      </ul>
    </div>
  </div>
</section>

<script type="text/javascript">
  (function(){
    $("#group-sections").css({paddingLeft:"0px",paddingRight:"0px" });
  })(jQuery);
</script>

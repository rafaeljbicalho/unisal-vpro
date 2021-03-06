<?php

// Always start this first
session_start();

include "dbconfig.php";

// set link to active
$isIndex = true;

// check user login
if (isset($_POST['fazerLogin']) && !empty($_POST['loginEmail']) && !empty($_POST['loginSenha'])) {

  $usuario = trim($_POST['loginEmail']);
  $senha   = trim($_POST['loginSenha']);

  $isLoginValid = $crud->verificaLogin($usuario,$senha);

  foreach ($isLoginValid as $user){

    $usarioLogado = $user['UserName'];
  }

  if (isset($isLoginValid) && !empty($isLoginValid)) {

    // Always start this first
    $_SESSION['user'] = $usarioLogado;
  }
}

?>

<!DOCTYPE html>
  <html>

    <?php
      include "head.php";
    ?>

<body style="background-color:#e3dfdb;">

  <?php
    // navbar
    include "navbar.php";
  ?>

  <div class="bem-vindo">
    <p>Bem-vindo</p>
  </div>

  <div class="missao" id="missao"> 
    <p style="font-size: 32px;"><u>Missão</u></p>
    Com a desigualdade social e as dificuldades de muitas famílias no mundo todo, foi desenvolvida a Sociedade de São Vicente de Paulo com objetivo
    de aliviar o sofrimento de pessoas vulneráveis, de modo que ajudasse também a fortalecer a fé de seus membros. O movimento tem origem católica e
    a maior parte das paróquias do mundo possui membros dos Vicentinos, um apelido carinhoso que o movimento é chamado atualmente. O nosso objetivo é auxiliar
    os membros dos Vicentinos da Paróquia Santa Bárbara, localizada em Sumaré-SP, com o gerenciamento de beneficiários e de tarefas que hoje são feitas manualmente,
    onde estão sujeitos a possíveis anotações errôneas e acabam não sendo do alcance de todos.
  </div>

  <hr class="hr">

  <div class="quemSomos" id="quemsomos"> 
    <p style="font-size: 32px;margin-left: 80%;"><u>Quem somos</u></p>
    Chama-se Sociedade de São Vicente de Paulo (SSVP), também conhecida por Conferências de São Vicente de Paulo ou Conferências Vicentinas, é um movimento católico de
    leigos que se dedica, sob o influxo da justiça e da caridade, à realização de iniciativas destinadas a aliviar o sofrimento do próximo, em particular dos economicamente
    mais desfavorecidos, mediante o trabalho coordenado de seus membros. 
  A Sociedade de São Vicente de Paulo foi criada em Paris, no ano de 1833, por um pequeno grupo de estudantes católicos liderados por Frédéric Ozanam. A pequena conferência de 
  caridade atua até os dias de hoje, a sociedade se desenvolveu pelo mundo, realizando assim o desejo de seu fundador. No início do século XIX, Paris estava envolta em agitações sociais e políticas, 
  onde a revolução de julho representou um golpe fatal para a antiga monarquia bubônica.
  A Sociedade passou por múltiplas provas, uma revolução, três guerras. De 1861 a 1870 a circular Persigny ordenava a “dissolução” dos Conselhos resultando em um adormecimento temporário da Sociedade na França. 
  O conflito mundial de 39-45 foi assassino, fazendo desaparecer as conferências. Nela foram expostas as ideologias anticristãs que forçaram os irmãos de alguns países a cessarem suas reuniões, consideradas como subversivas e entrar na clandestinidade. 
  Hoje em dia a sociedade continua sua expansão, principalmente nos países em desenvolvimento, que agora reúnem dois terços das conferências. Esta nova repartição faz da SSVP uma precursora na reflexão e na ação em favor do desenvolvimento com os parceiros do Terceiro-Mundo. 
  Segundo a SSPV Global (2019), 800.000 membros no mundo perpetuam o espírito de São Vicente de Paulo e a obra do Bem-aventurado Frédéric Ozanam e de seus amigos, continuando a ajudar os mais desfavorecidos e mantendo sempre viva a mensagem do Cristo.
  </div>

  <footer style="margin-top:12%;margin-top: 17%;background-color: white;padding: 14px;">
    <!-- <p>Telefone: (019)3333-3333</p>
    <p class="author">© 2020 Author: Rafael Bicalho <a href="mailto:rafaeljbicalho@gmail.com">rafaeljbicalho@gmail.com</a></p> -->
    <div class="row" style="width: 100%;">
      <div class="col-sm author" style="margin-top: 1.5%;" id="contato">
      Telefone: (019)98315-0499
      </div>
      <div class="col-sm author" style="margin-top: 1.5%;">
      © 2020 Author: Rafael Bicalho <a href="mailto:rafaeljbicalho@gmail.com">rafaeljbicalho@gmail.com</a>
      </div>
      <div class="col-sm" author>
        <a class="nav-link" target="_blank" href="https://facebook.com">
        <img border="0" alt="W3Schools" src="img/facebook.png" style="width: 30px;height: 30px;">
      </a>
      </div>
  </div>
  </footer>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  
 
  </body>
</html>
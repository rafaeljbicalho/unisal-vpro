<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: white !important;letter-spacing: .07rem;">
  <a class="navbar-brand" href="index.php">Página Inicial</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?#missao">Missão <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?#quemsomos">QuemSomos</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="cadastro.php">Cadastro</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" type="button" data-toggle="modal" data-target="#exampleModal">Acesso restrito</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="relatorio.php">Relatório</a>
      </li>
    
    </ul>
  </div>
</nav>

<?php
  // modal
  include "modal.php";
?>
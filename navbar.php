<nav class="navbar navbar-expand-md navbar-light bg-light" style="background-color: white !important;letter-spacing: .07rem;">
    <div  class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul id="myDIV" class="navbar-nav mr-auto">
            <?php
            if($isIndex) { ?>
              <li class="nav-item active">
            <?php } else { ?>
              <li class="nav-item">
            <?php } ?>
              <a class="nav-link" href="index.php">Página Inicial</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="?#missao">Missão <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="?#quemsomos">QuemSomos</a>
            </li>

            <?php
            if($isCadastro) { ?>
              <li id="cadastro" class="nav-item active">
            <?php } else { ?>
              <li id="cadastro" class="nav-item">
            <?php } ?>
              <a class="nav-link" href="cadastro.php">Cadastro</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="?#contato">Contato</a>
            </li>

            <?php
            if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>

            <?php
            if($isRelatorio) { ?>
              <li  class="nav-item active">
            <?php } else { ?>
              <li class="nav-item">
            <?php } ?>
              <a class="nav-link" href="relatorio.php">Relatório</a>
            </li>

            <?php } ?>
            
        </ul>
    </div>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#">Vicentinos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <?php
              if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>

                <li class="nav-item" style="margin-right: 0%;font-size: 10px;margin-top: 4%;margin-left: -22%;">
                  <?php echo "Bem-vindo, " . strstr($_SESSION['user'], '@gmail.com', true); ?>
                </li>
            <?php } else { ?>      

                <li class="nav-item">
                  <a class="nav-link" type="button" data-toggle="modal" data-target="#exampleModal">Acesso restrito</a>
                </li>          

            <?php } ?>      
            <li class="nav-item" style="margin-left: 14%;width: 100%;">
              <a class="nav-link" target="_blank" href="https://api.whatsapp.com/send?phone=5519983150499">
                <img border="0" alt="W3Schools" src="img/whatsapp.png" style="width: 30px;height: 30px;">
              </a>
            </li>  
        </ul>
    </div>
</nav>

<?php
  // modal
  include "modal.php";
?>

<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("nav-item");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script>
<<<<<<< HEAD
<?php

include "dbconfig.php";

?>

=======
>>>>>>> 693e746d1bb72dcb1ff717e6ebf30f1fde0b0d57
<!DOCTYPE html>
<html>
<head>
  <title>Unisal VPRO</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Rafael Bicalho">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css"

  <!-- Local CSS -->
  <link rel="stylesheet" href="css/local.css"
</head>

<?php 
// check submit from user
if (isset($_POST['enviarCadastro'])
      && !empty($_POST['nome'])
        && !empty($_POST['email'])
          && !empty($_POST['nascimento'])
            && !empty($_POST['cpf'])
              && !empty($_POST['celular'])
                && !empty($_POST['cep'])
                  && !empty($_POST['endereco'])
                    && !empty($_POST['numero'])
                      && !empty($_POST['bairro'])
                        && !empty($_POST['cidade'])
                          && !empty($_POST['estado'])
                            && !empty($_POST['pessoas'])) {
<<<<<<< HEAD
  
  $nome           = trim($_POST['nome']);
  $email          = trim($_POST['email']);
  $dataNascimento = trim($_POST['nascimento']);
  $cpf            = str_replace(".", "", $_POST['cpf']);
  $finalCPF       = str_replace("-", "", $cpf);
  $celular        = str_replace("(", "", $_POST['celular']);
  $celular2       = str_replace(")", "", $celular);
  $finalCelular   = str_replace("-", "", $celular2);
  $cep            = str_replace("-", "", $_POST['cep']);
  $endereco       = trim($_POST['endereco']);
  $numero         = trim($_POST['numero']);
  $bairro         = trim($_POST['bairro']);
  $cidade         = trim($_POST['cidade']);
  $estado         = trim($_POST['estado']);
  $qtdPessoas     = trim($_POST['pessoas']);
  
  // verificar se usuario clicou no checkbox de "Empregado"
  $empregado = false;
  if ( isset($_POST['empregado']) && $_POST['empregado'] == 'on' ) {

    $empregado = true;

  }

  $sobre = trim($_POST['sobre']);
  $criadoEm = date("Y-m-d H:i:s");

  $insertUser = $crud->cadastrarUsuario($nome,$email,$dataNascimento,$finalCPF,$finalCelular,$cep,$endereco,$numero,
    $bairro,$cidade,$estado,$qtdPessoas,$empregado,$sobre,$criadoEm);                             
=======

  echo "Lets insert";                             
>>>>>>> 693e746d1bb72dcb1ff717e6ebf30f1fde0b0d57

}

?>

<body style="background-color:#e3dfdb;">
  <?php
    include "navbar.php";
  ?>
<div class="cadastro">
  <p><u>Entre em contato conosco</u></p>
</div>

<div class="container" style="background-color: white;border-radius: 15px;padding: 5em;margin-top: 4%;">
  <form method="post">
  <!-- primeira linha -->
  <div class="form-row">
    <!-- Nome -->
    <div class="form-group col-md-6">
      <label for="nome">Nome</label>
      <input type="text" name="nome" class="form-control" id="nome" required>
    </div>
    <!-- Email -->
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" name="email" class="form-control" id="email" required>
    </div>
  </div>

  <!-- segunda linha -->
  <div class="form-row">
    <!-- Data Nascimento -->
    <div class="form-group col-md-4">
      <label for="nascimento">Data nascimento</label>
      <input type="date" name="nascimento" class="form-control" id="nascimento" required>
    </div>
    <!-- CPF -->
    <div class="form-group col-md-4">
      <label for="cpf">CPF</label>
      <input type="text" name="cpf" class="form-control" id="cpf" placeholder="Digite somente números" required>
    </div>

    <!-- telefone  -->
    <div class="form-group col-md-4">
      <label for="telefone">Celular</label>
      <input type="text" name="celular" class="form-control" id="telefone" placeholder="Digite somente números" required>
    </div>
  </div> 

  <!-- terceira linha -->
  <div class="form-row">
    <!-- CEP -->
    <div class="form-group col-md-2">
      <label for="cep">CEP</label>
      <input maxlength="8" name="cep" type="text" class="form-control" id="cep" onblur="pesquisacep(this.value);" required>
    </div>

    <!-- Rua  -->
    <div class="form-group col-md-8">
      <label for="rua">Endereço</label>
      <input type="text" name="endereco" class="form-control" id="rua" required>
    </div>

    <!-- Número  -->
    <div class="form-group col-md-2">
      <label for="numero">Número</label>
      <input type="number" name="numero" class="form-control" id="numero" min="0" max="99999">
    </div>
  </div>  

  <!-- quarta linha -->
  <div class="form-row">
    <!-- Bairro -->
    <div class="form-group col-md-4">
      <label for="bairro">Bairro</label>
      <input type="text" name="bairro" class="form-control" id="bairro" required>
    </div>

    <!-- Cidade  -->
    <div class="form-group col-md-4">
      <label for="cidade">Cidade</label>
      <input type="text" name="cidade" class="form-control" id="cidade" required>
    </div>

    <!-- Estado  -->
    <div class="form-group col-md-4">
      <label for="uf">Estado</label>
      <input type="text" name="estado" class="form-control" id="uf" required>
    </div>
  </div>

  <!-- quinta linha -->
  <div class="form-row">
    <!-- Pessoas na casa -->
    <div class="form-group col-md-3">
      <label for="pessoas">Qts. pessoas moram com você?</label>
      <input type="number" name="pessoas" class="form-control" id="pessoas" required>
    </div>

    <!-- Empregado  -->
    <div class="form-group col-md-4">
      <div class="form-check" style="margin-left: 11%;margin-top: 12%;">
        <input class="form-check-input" name="empregado" value="on" type="checkbox" id="empregado">
        <label class="form-check-label" for="empregado">
          Empregado
        </label>
      </div>
    </div>
  </div>

  <!-- sexta linha -->
  <div class="form-row">
    <div class="col-md-12">
      <label for="validationTextarea">Conte nos um pouco sobre você:</label>
      <textarea name="sobre" class="form-control" id="validationTextarea" required></textarea>
    </div>
  </div>


  
  <button type="submit" name="enviarCadastro" class="btn btn-outline-primary enviar">Enviar cadastro</button>
  </form>
</div>

<footer style="margin-top:12%;">
  <p class="author">Author: Rafael Bicalho</p>
  <p class="ano">Desenvolvido em 2020</p>
  <p class="mail"><a href="mailto:rafaeljbicalho@gmail.com">rafaeljbicalho@gmail.com</a></p>
</footer>

<!-- JS para buscar CEP -->
<script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>



  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

  <!-- mask -->
  <script src="js/mask.js"></script>
  <script src="js/mask_2.js"></script>

  <!-- mask CPF -->
  <script type="text/javascript">
    $(document).ready(function(){
      $("#cpf").mask("999.999.999-99");
    });
  </script>

  <!-- mask telefone -->
  <script type="text/javascript">
    $(document).ready(function(){
      $("#telefone").mask("(99)99999-9999");
    });
  </script>

  <!-- mask CPF -->
  <script type="text/javascript">
    $(document).ready(function(){
      $("#cep").mask("99999999");
    });
  </script>
  
</body>
</html>
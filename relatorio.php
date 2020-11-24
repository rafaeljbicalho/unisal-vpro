<?php

// Always start this first
session_start();

include "dbconfig.php";

$isRelatorio = true;

// select usuários
$usuariosArray = $crud->selectUsers(" SELECT * FROM Cadastro ORDER BY CriadoEm DESC");


// mask número celular
function masc_tel($TEL) {
  $tam = strlen(preg_replace("/[^0-9]/", "", $TEL));
    if ($tam == 13) { // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS e 9 dígitos
    return "+".substr($TEL,0,$tam-11)."(".substr($TEL,$tam-11,2).")".substr($TEL,$tam-9,5)."-".substr($TEL,-4);
    }
    if ($tam == 12) { // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS
    return "+".substr($TEL,0,$tam-10)."(".substr($TEL,$tam-10,2).")".substr($TEL,$tam-8,4)."-".substr($TEL,-4);
    }
    if ($tam == 11) { // COM CÓDIGO DE ÁREA NACIONAL e 9 dígitos
    return "(".substr($TEL,0,2).")".substr($TEL,2,5)."-".substr($TEL,7,11);
    }
    if ($tam == 10) { // COM CÓDIGO DE ÁREA NACIONAL
    return "(".substr($TEL,0,2).")".substr($TEL,2,4)."-".substr($TEL,6,10);
    }
    if ($tam <= 9) { // SEM CÓDIGO DE ÁREA
    return substr($TEL,0,$tam-4)."-".substr($TEL,-4);
    }
}

/*
   Por Phylipe Soares
   E-mail: phylipesoares@gmail.com
   Em: Março/ 2018

   Adiciona switch para CEP
   Por Rafael Bicalho
   Em: Novembro / 2020
*/

function formata_cpf_cnpj_cep($cpf_cnpj_cep){
  /*
      Pega qualquer CPF e CNPJ e formata

      CPF: 000.000.000-00
      CNPJ: 00.000.000/0000-00
  */

  ## Retirando tudo que não for número.
  $cpf_cnpj_cep = preg_replace("/[^0-9]/", "", $cpf_cnpj_cep);
  $tipo_dado = NULL;
  if(strlen($cpf_cnpj_cep)==11){
      $tipo_dado = "cpf";
  }
  if(strlen($cpf_cnpj_cep)==14){
      $tipo_dado = "cnpj";
  }
  if(strlen($cpf_cnpj_cep)==8){
    $tipo_dado = "cep";
  }

  switch($tipo_dado){
      default:
          $cpf_cnpj_formatado = "Não foi possível definir tipo de dado";
      break;

      case "cpf":
          $bloco_1 = substr($cpf_cnpj_cep,0,3);
          $bloco_2 = substr($cpf_cnpj_cep,3,3);
          $bloco_3 = substr($cpf_cnpj_cep,6,3);
          $dig_verificador = substr($cpf_cnpj_cep,-2);
          $cpf_cnpj_cep_formatado = $bloco_1.".".$bloco_2.".".$bloco_3."-".$dig_verificador;
      break;

      case "cep":
        $bloco_1 = substr($cpf_cnpj_cep,0,5);
        $dig_verificador = substr($cpf_cnpj_cep,-3);
        $cpf_cnpj_cep_formatado = $bloco_1."-".$dig_verificador;
    break;

      case "cnpj":
          $bloco_1 = substr($cpf_cnpj_cep,0,2);
          $bloco_2 = substr($cpf_cnpj_cep,2,3);
          $bloco_3 = substr($cpf_cnpj_cep,5,3);
          $bloco_4 = substr($cpf_cnpj_cep,8,4);
          $digito_verificador = substr($cpf_cnpj_cep,-2);
          $cpf_cnpj_cep_formatado = $bloco_1.".".$bloco_2.".".$bloco_3."/".$bloco_4."-".$digito_verificador;
      break;
  }
  return $cpf_cnpj_cep_formatado;
}


?>

<?php 
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
<!DOCTYPE html>
  <html>

    <?php
      include "head.php";
    ?>

    <body style="background-color:#e3dfdb;">

    <?php
      include "navbar.php";
    ?>

    <div class="relatorio">
      <p>Relatório</p>
    </div>

    <table class="table table-striped table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#               </th>
          <th scope="col">Nome            </th>
          <th scope="col">Email           </th>
          <th scope="col">Data nascimento </th>
          <th scope="col">CPF             </th>
          <th scope="col">Celular         </th>
          <th scope="col">CEP             </th>
          <th scope="col">Endereço        </th>
          <th scope="col">Número          </th>
          <th scope="col">Bairro          </th>
          <th scope="col">Cidade          </th>
          <th scope="col">Estado          </th>
          <th scope="col">Qtd. Pessoas    </th>
          <th scope="col">Empregado       </th>
          <th scope="col">Sobre           </th>
        </tr>
      </thead>
      <tbody>

      <?php
      $countUser = 0;
        foreach($usuariosArray as $users) : 

        $countUser = $countUser + 1;
        

        ?>
          <tr>
            <th scope="row"><?= $countUser;                       ?></th>
            <td><?= $users['Nome'];                               ?></td>
            <td><?= $users['Email'];                              ?></td>
            <td><?= $users['DataNascimento'];                     ?></td>
            <td><?= formata_cpf_cnpj_cep($users['CPF']);          ?></td>
            <td>
            <!-- whatsapp link -->
            WhatsApp link: <a target="_blank" href="https://api.whatsapp.com/send?phone=55<?= $users['Celular']; ?>"><?= masc_tel($users['Celular']); ?></a>
            </td>
            <td><?= formata_cpf_cnpj_cep($users['CEP']);          ?></td>
            <td><?= $users['Endereco'];                           ?></td>
            <td><?= $users['Numero'];                             ?></td>
            <td><?= $users['Bairro'];                             ?></td>
            <td><?= $users['Cidade'];                             ?></td>
            <td><?= $users['Estado'];                             ?></td>
            <td><?= $users['QtdPessoas'];                         ?></td>
            <td><?= ($users['Empregado'] == '1') ? 'sim' : 'não'; ?></td>
            <td><?= $users['Sobre'];                              ?></td>
          </tr>
      <?php endforeach ?>
      
      </tbody>
    </table>

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
  
</body>
</html>

<?php } else { ?>
  <script>
    alert("Você não possui permissão para acessar esta página");
  </script>
<?php } ?>
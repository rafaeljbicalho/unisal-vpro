<?php

include "dbconfig.php";

// select usuários
$usuariosArray = $crud->selectUsers(" SELECT * FROM Cadastro ORDER BY CriadoEm DESC");

// var_dump($usuariosArray);

?>

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
      <p><u>Relatório</u></p>
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
            <th scope="row"><?php echo $countUser; ?></th>
            <td><?= $users['Nome'];           ?></td>
            <td><?= $users['Email'];          ?></td>
            <td><?= $users['DataNascimento']; ?></td>
            <td><?= $users['CPF'];            ?></td>
            <td><?= $users['Celular'];        ?></td>
            <td><?= $users['CEP'];            ?></td>
            <td><?= $users['Endereco'];       ?></td>
            <td><?= $users['Numero'];         ?></td>
            <td><?= $users['Bairro'];         ?></td>
            <td><?= $users['Cidade'];         ?></td>
            <td><?= $users['Estado'];         ?></td>
            <td><?= $users['QtdPessoas'];     ?></td>
            <td><?= ($users['Empregado'] == '1') ? 'sim' : 'não'; ?></td>
            <td><?= $users['Sobre'];          ?></td>
          </tr>
      <?php endforeach ?>
      
      </tbody>
    </table>

<footer style="margin-top:12%;margin-top: 31%;background-color: white;padding: 14px;">
  <p class="author">© 2020 Author: Rafael Bicalho <a href="mailto:rafaeljbicalho@gmail.com">rafaeljbicalho@gmail.com</a></p>
</footer>
  
</body>
</html>
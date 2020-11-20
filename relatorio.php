<?php

include "dbconfig.php";

// select usuários
$usuariosArray = $crud->selectUsers(" SELECT * FROM Cadastro ORDER BY CriadoEm ASC");

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

    <div class="cadastro">
      <p><u>Relatório</u></p>
    </div>

    <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">Data nascimento</th>
          <th scope="col">CPF</th>
          <th scope="col">Celular</th>
          <th scope="col">CEP</th>
          <th scope="col">Endereço</th>
          <th scope="col">Endereço</th>
          <th scope="col">Número</th>
          <th scope="col">Bairro</th>
          <th scope="col">Cidade</th>
          <th scope="col">Estado</th>
          <th scope="col">Qtd. Pessoas</th>
          <th scope="col">Empregado</th>
          <th scope="col">Sobre</th>
        </tr>
      </thead>
      <tbody>

      <?php
      $countUser = 0;
        foreach($usuariosArray as $users) { 

        $countUser = $countUser + 1;

        ?>
          <tr>
            <th scope="row"><?php echo $countUser; ?></th>
            <td><?php echo $users['Nome']; ?></td>
            <td><?php echo $users['Email']; ?></td>
            <td><?php echo $users['DataNascimento']; ?></td>
            <td><?php echo $users['CPF']; ?></td>
            <td><?php echo $users['Celular']; ?></td>
            <td><?php echo $users['CEP']; ?></td>
            <td><?php echo $users['Endereco']; ?></td>
            <td><?php echo $users['Numero']; ?></td>
            <td><?php echo $users['Bairro']; ?></td>
            <td><?php echo $users['Cidade']; ?></td>
            <td><?php echo $users['Estado']; ?></td>
            <td><?php echo $users['QtdPessoas']; ?></td>
            <td><?php echo $users['Empregado']; ?></td>
            <td><?php echo $users['Sobre']; ?></td>
          </tr>
      <?php } ?>
      
      </tbody>
    </table>

<footer style="margin-top:12%;">
  <p class="author">Author: Rafael Bicalho</p>
  <p class="ano">Desenvolvido em 2020</p>
  <p class="mail"><a href="mailto:rafaeljbicalho@gmail.com">rafaeljbicalho@gmail.com</a></p>
</footer>
  
</body>
</html>
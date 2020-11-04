<?php
define('DB_HOST'        , "localhost");
define('DB_USER'        , "sa");
define('DB_PASSWORD'    , "Hahafdpvsf0@");
define('DB_NAME'        , "projeto");
define('DB_DRIVER'      , "sqlsrv");

require_once "conexao.php";

try{

    $Conexao    = Conexao::getConnection();
    $query      = $Conexao->query("SELECT LastName, FirstName, City FROM Persons");
    $produtos   = $query->fetchAll();

 }catch(Exception $e){

    echo $e->getMessage();
    exit;

 }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Conexão PDO SQL Server</title>
</head>
<body>
  <form>
        <table border=1>
            <tr>
               <td>LastName</td>
               <td>FirstName</td>
               <td>City</td>
            </tr>
            <?php
               foreach($produtos as $produto) {
            ?>
            <tr>
                <td><?php echo $produto['LastName']; ?></td>
                <td>R$ <?php echo $produto['FirstName']; ?></td>
                <td><?php echo $produto['City']; ?></td>
            </tr>
            <?php
               }
            ?>
        </table>
    </form>
</body>
</html>
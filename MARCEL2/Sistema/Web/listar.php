<?php



session_start();

if (empty($_SESSION['usuario'])) {
    echo "<script>alert('Usuario não logado!')</script>";
    echo "<meta http-equiv= 'refresh' content='0; URL../=index.php'/>"; 
}

$pdo = new PDO("mysql:host=localhost; dbname=exemplo","root","");
$sql = $pdo->prepare("SELECT profissional, dia, horario, unidade FROM `agendamento`");
$sql->execute(array());
$info = $sql->fetchAll(PDO::FETCH_ASSOC);


''
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>


<nav class="navbar bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="..\Recursos/dentista.png" alt="" width="150px"></a>
            <a class="btn btn-dark" href="logout.php">Sair</a>
        </div>
    </nav>

    <div class="container text-center">
        <h2>Lista de suas consultas</h2>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Profissional</th>
      <th scope="col">Dia</th>
      <th scope="col">Horário</th>
      <th scope="col">Unidade</th>
    </tr>
  </thead>
  <tbody>
    <?php

    foreach ($info as $key => $value) {
      echo"<tr>";
      echo "<th scope='row'>".$info[$key]['profissional']."</th>";
      echo "<td>".$info[$key]['dia']."</td>";
      echo "<td>".$info[$key]['horario']."</td>";
      echo "<td>@mdo</td>";
    echo"</tr>";
    }

  

    ?>
   
    
  </tbody>
</table>
       
    </div>



    <footer class="footer text-center fixed-bottom bg-dark py-3">
        <div class="container">
            <p class="text-light">Todos os direitos reservados. 2023</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>

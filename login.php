<?php
include('Conexao.class.php');

if (isset($_POST['txtnome'])) {

    $nome = $_POST['txtnome'];
    $senha = $_POST['txtsenha'];




    $sql_code = "SELECT * FROM usuario WHERE nomeUsu = '$nome' LIMIT 1";
    $sql_query = $db->query($sql_code) or die("Falha na execução do código SQL: " . $db->error);




    $usuario = $sql_query->fetch_assoc();

    $passwor_hash =  $usuario['senhaUsu'];


    if (password_verify($passwor_hash, $senha)) {
        

        if(!isset($_SESSION)) {
             session_start();
        }

        $_SESSION['idUsu'] = $usuario['idUsu'];
        $_SESSION['nomeUsu'] = $usuario['nomeUsu'];

        header("Location: inicial.php");

    } else {
        echo "Falha ao logar! nome ou senha incorretos";
        echo '<br>';

        
    }
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>titulo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">CLINICA IFRO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="#" href="cadUsuario.php">cadastro do usuario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="#" href="login.php">login</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>
    <main>

        <div class="container">
            <a>LOGIN</a>
            <br>
            <br>
            <br>
            <form class="row g-3" action="login.php" method="post" enctype="multipart/form-data">

                <div class="col-12">
                    <label for="txtnome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="txtnome" placeholder="Digite seu nome..." name="txtnome" value="" required>
                </div>
                <div class="col-md-6">
                    <label for="txtsenha" class="form-label">Senha</label>
                    <input type="text" class="form-control" id="txtsenha" name="txtsenha" value="" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="btnGravar">entrar</button>
                </div>
            </form>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
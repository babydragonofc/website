<?php session_start() ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>


    <meta charset="UTF-8" />
    <meta charset="viewport" content="width=device-width" />
    <title>BabyDragon</title>
    <link rel="stylesheet" href="index.css">
    <link rel="icon" type="image/x-icon" href="f1f01cc8-a11d-4b42-9784-6844a34991ac.png">

</head>

<body>
    <header class="h1">
        <img class="hi" src="bbdlogo.png" width="3%">
        <nav class="hn">
            <a href="index.html" class="hc">Inicio</a>
            <a href="projetos.html" class="hc">Projetos</a>
            <a class="hc">Hub</a>
            <a href="conta.php" class="hc">Conta</a>
        </nav>

    </header>

    <section class="cad">
        <div class="criarconta">
            <?php
            define("const", true);
            require_once "database.php";
            ?>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $username = htmlspecialchars(filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS));
                $email = htmlentities(filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS));
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_NUMBER_INT);

                $token = isset($_POST["token"]) ? $_POST["token"] : null;

                $usernameValid = !empty($username) && mb_strlen($username) >= 3;
                $passwordValid = !empty($password) && $password >= 6;

                if ($usernameValid && $passwordValid && !empty($email) && $token == $_SESSION["token"]) {
                    $data = $_SESSION["form1"];
                    $hash =  password_hash($password, PASSWORD_BCRYPT);

                    $table = "users";

                    $sql = $conn->prepare("INSERT INTO $table VALUES (null, :nome, :sobrenome, :idade, :username, :email, :senha)");

                    try {
                        $result = $sql->execute([
                            "nome" => $data["nome"],
                            "sobrenome" => $data["sobrenome"],
                            "idade" => $data["idade"],
                            "username" => $username,
                            "email" => $email,
                            "senha" => $hash
                        ]);

                        if ($result) {
                            unset($_SESSION["form1"]);
                            header("Location:success.php");
                        }
                    } catch (PDOException $err) {
                        // print_r($err->errorInfo);
                        // return;
                    }

                    echo 'ok';
                }
            }
            $_SESSION["token"] = sha1(rand());
            ?>
            <form method="POST">
                <a class="at">Nome de Usuario</a>
                <br>
                <input class="btn" name="username" type="text" required placeholder="Digite aqui...">
                <br><br>
                <a class="at">E-mail</a>
                <br>
                <input class="btn" name="email" type="email" placeholder="Digite aqui...">
                <br><br>
                <a class="at">Senha</a>
                <br>
                <input class="btn" name="password" type="password" placeholder="Digite aqui...">
                <br><br>
                <input class="btn" hidden name="token" type="text" value=<?= $_SESSION["token"] ?>>
                <button class="sbtn" type="submit">Próximo</button>
            </form>
        </div>
        <div class="cat">
            <h1 class="title">Vamos la</h1>
            <p class="par">Agora nos de algumas informações sobre sua conta<br><br></p>
            <p class="par2">lembre de que o seu nome de ussuario <br>é visivel para todos os ussuarios<br><br>
                LEMBRE de nunca compartilhar sua senha para ninguem</p>

        </div>

    </section>



</body>
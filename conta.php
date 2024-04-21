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
    <main>
        <section class="cad">
            <div class="cat">
                <h1 class="title">Crie sua conta BBD gratis!</h1>
                <p class="par">Para começar<br>nos de algumas informações basicas<br><br></p>
                <p class="par2">Ter uma conta BBD te dara maiis facilidade<br>em criar contas em todos nossos
                    seviços<br>
                    <br>Alem de conseguir exclusiva promoções na loja.
                </p>
            </div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome = htmlspecialchars(filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS));
                $sobrenome = htmlentities(filter_input(INPUT_POST, "sobrenome", FILTER_SANITIZE_SPECIAL_CHARS));
                $idade = filter_input(INPUT_POST, "idade", FILTER_SANITIZE_NUMBER_INT);

                $token = isset($_POST["token"]) ? $_POST["token"] : null;

                $nameValid = !empty($nome) && mb_strlen($nome) >= 3;
                $sobrenomeValid = !empty($sobrenome) && mb_strlen($sobrenome) >= 3;
                $idadeValid = !empty($idade) && $idade > 0;

                if ($nameValid && $sobrenomeValid && $idadeValid && $token == $_SESSION["token"]) {
                    //se os campos estiverem validos guarda os dados na sessão e redireciona para a página conta2.php
                    $_SESSION["form1"] = ["nome" => $nome, "sobrenome" => $sobrenome, "idade" => $idade];
                    header("Location:conta2.php");
                }
            }
            $_SESSION["token"] = sha1(rand());
            $data = isset($_SESSION["form1"]) ? $_SESSION["form1"] : ["nome" => "", "sobrenome" => "", "idade" => ""];
            ?>
            <div class="criarconta">
                <form method="POST">
                    <a class="at">Nome</a>
                    <br>
                    <input class="btn" name="nome" type="text" required placeholder="Nome" value=<?= $data["nome"] ?>>
                    <br><br>
                    <a class="at">Sobrenome</a>
                    <br>
                    <input class="btn" name="sobrenome" type="text" placeholder="Sobrenome" value=<?= $data["sobrenome"] ?>>
                    <br><br>
                    <a class="at">Idade</a>
                    <br>
                    <input class="btn" name="idade" type="number" placeholder="Idade" value=<?= $data["idade"] ?>>
                    <br><br>
                    <input class="btn" hidden name="token" type="text" value=<?= $_SESSION["token"]  ?>>
                    <button class="sbtn" type="submit">Próximo</button>
                </form>
            </div>
        </section>

    </main>


</body>
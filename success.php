<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Babydargon - Sua conta</title>
  <link rel="icon" type="image/x-icon" href="f1f01cc8-a11d-4b42-9784-6844a34991ac.png">
  <link rel="stylesheet" href="index.css">
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


    <main style="display: flex; justify-content: center; height: 100vh;">
   <div style="text-align: center;">
   <h1 class="c">Bem vindo(a) <?php echo $username; ?></h1>
      <div class="infos">
         <img class="imgp" width="10%" src="Null.png" style="margin: 0 auto;">
         <br><br>
         <a class="name"><?php echo $username; ?></a>
      </div>
   </div>
</main>
 

</body>

</html>

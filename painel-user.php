<?php
session_start();
if (isset($_SESSION['id_usuario'])){
    
    //$query = 'SELECT nome FROM users WHERE echo $_SESSION['id_user'] = id';
    $nome_user = mysqli_query($conectar, $query);
}
    else {
        header ("Location: Login.php");
        exit();
    }
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Conta do Usuario </title>
    <link rel="stylesheet" href="estilos-user.css">
    <script src="https://kit.fontawesome.com/331617f9bc.js" crossorigin="anonymous"> </script>
</head>

<body>
    <nav class="menu">
        <ul>
            <li> <a href="#"> Home </a></li>
            <li> <a href="#"> Dashboard </a></li>
            <li> <a href="#"> Minha Vida </a></li>
            <li> <a href="Sair.php"> Sair </a></li>
            <li class="perfil"> <a href="#"> <i class="fab fa-facebook-square"> <?php echo $nome_user ?> </i></a></li>
        </ul>
    </nav>

</body>
</html>
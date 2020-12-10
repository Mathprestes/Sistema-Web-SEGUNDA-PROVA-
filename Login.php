<?php
require_once 'classe/usuarios.php';
$u = new Usuario;
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Tela de Login </title>
    <link rel="stylesheet" href="css/estilos-log.css">
    <script src="https://kit.fontawesome.com/331617f9bc.js" crossorigin="anonymous"> </script>
</head>

<body>
    <div class="container">
        <div class="content first-content">
            <hr>
            <div class="primeira-coluna">        <!-- dividindo o quadrado em duas colunas-->
                <h2 class="title title-primeiro"> Seja bem Vindo ao meu primeiro site </h2>
                <p class="descriçao descriçao-primeiro"> Por favor logar com suas informaçoes pessoais </p>
            </div>
            
            <div class="segunda-coluna">                <!-- segunda coluna--> 
                <h2 class="title title-segundo"> Faça seu login aqui </h2>  
                <div class="redes-sociais">                           <!-- Redes sociais, icones-->
                    <ul class="list-social-media">
                        <li class="item-social"> <a href="https://www.facebook.com/matheus.prestes.7/"> <i class="fab fa-facebook-square"> </i> </a> </li>
                        <li class="item-social"> <a href="https://www.instagram.com/matheus.prestes.7/?hl=pt-br"> <i class="fab fa-instagram"> </i> </a> </li>
                        <li class="item-social"> <a href="https://www.linkedin.com/in/matheus-prestes-235833186/"> <i class="fab fa-linkedin"> </i> </a ></li>
                    </ul>
                </div>
                <p class="descriçao descriçao-segundo"> Redes Sociais da corporaçao </p>

                <form class="form" method="POST">
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                            <input type="email" placeholder="Email" name="email"> </label>
                    
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                            <input type="password" placeholder="Senha" name="senha"> </label>
                            <button class="btn btn-segundo"> Entrar </button>
                </form>
                    <a href="Cadastro.php" class="descriçao descriçao-segundo"> Ainda nao e inscrito? <strong> Cadastre-se </strong> </a>
            </div>
        </div>
    </div>

<?php
if (isset($_POST['email'])) {

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if (!empty($email) && !empty($senha)) {
        $u->conectar("tela_tcc","localhost","root","");

        if ($u->msgErro == "") {

            if ($u->logar($email, $senha)) {
                header("Location: painel-user.php");
        }

        else {
            ?>
            <div class="msg-erro">
            Email e/ou senha estao incorretos!
            </div>
            <?php
        }
    }
    
    else {
        ?>
        <div class="msg-erro">
        <?php echo "Erro: ".$u->msgErro; ?>
        </div>
        <?php
        }
    }

    else {
        ?>
        <div class="msg-erro">
        Preencha todos os dados!
        </div>
        <?php
    }
}
?>
</body>
</html>
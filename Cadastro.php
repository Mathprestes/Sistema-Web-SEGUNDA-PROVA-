<?php
require_once 'classe/usuarios.php';
$u = new Usuario;
?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Tela de Cadastro </title>
    <link rel="stylesheet" href="css/estilos-cad.css">
</head>

<body>
    <div class="container">
        <div class="content first-content">
            
            <div class="primeira-coluna">        <!-- dividindo o quadrado em duas colunas-->
                <h2 class="title title-primeiro"> Faça já o seu Cadastro !!! </h2>
                <p class="descriçao descriçao-primeiro"> Preencha com seus dados </p>

            <form class="form" method="POST">
                <label class="label-input" for="">
                <input type="text" name="nome" placeholder="Nome Completo" maxlength="30"> </label>

                <label class="label-input" for="">
                <input type="text" name="cpf" placeholder="CPF" maxlength="20"> </label>

                <label class="label-input" for="">
                <input type="text" name="telefone" placeholder="Telefone" maxlength="30"> </label>
                
                <label class="label-input" for="">
                <input type="email" name="email" placeholder="Email" maxlength="30"> </label>
                
                <label class="label-input" for="">
                <input type="text" name="endereco" placeholder="Endereço" maxlength="30"> </label>

                <label class="label-input" for="">
                <input type="password" name="senha" placeholder="Senha" maxlength="15"> </label>

                <label class="label-input" for="">
                <input type="password" name="senhaconf" placeholder="Confirmar Senha"> </label>
                
                <button class="btn btn-primeiro"> Cadastrar </button>
            </form>
                <a href="Login.php"> 
                    <button class="btn btn-primeiro"> Sair </button> 
                </a>
                
            </div>
        </div>
    </div>

<?php
//verificar se a pessoa clicou no botao
if (isset($_POST['nome'])) {

    $nome = addslashes($_POST['nome']);
    $cpf = addslashes($_POST['cpf']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $endereco = addslashes($_POST['endereco']);
    $senha = addslashes($_POST['senha']);
    $senhaconf = addslashes($_POST['senhaconf']);

    //verificando se esta preenchido
    if (!empty($nome) && !empty($cpf) && !empty($telefone) && !empty($email) && !empty($endereco) && !empty($senha) && !empty($senhaconf)) {
        $u->conectar("tela_tcc","localhost","root","");
        
        if ($u->msgErro == "") {  //se a variavel estiver vazia é pq nao deu nenhum erro e esta tudo certo
            
            if ($senha == $senhaconf){
                if ($u->cadastrar ($nome, $cpf, $telefone, $email, $endereco, $senha)) {
                    ?>
                    <div id="msg-sucesso">
                    Cadastrado com sucesso!
                    <a href="Login.php"> Clique aqui para Acessar </a>
                    </div>
                    <?php
                }
                else {
                    ?>
                    <div class="msg-erro">
                    Email ja cadastrado!
                    </div>
                    <?php
                }
            }

            else {
                ?>
                <div class="msg-erro">
                Senhas nao correspondem
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
        Preencha todos os campos
        </div>
        <?php
    }
}
?>
</body>
</html>

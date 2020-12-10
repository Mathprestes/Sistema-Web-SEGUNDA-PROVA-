<?php            /*tera 3 metodos */

Class Usuario {                       
    
    private $pdo; 
    public $msgErro = "";

    public function conectar ($nome, $host, $usuario, $senha) {            /* conetando ao banco de dados*/
        global $pdo;
        global $msgErro;
        try {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch (PDOException $e){
            $msgErro = $e->getMessage();
        }
    }

    public function cadastrar ($nome, $cpf, $telefone, $email, $endereco, $senha) {         /* enviar as informaçoes para o banco de dados na tela de cadastro */
        global $pdo;
        //verificando se ja existe um email cadastrado 
        $sql = $pdo->prepare ("SELECT id_usuario FROM users WHERE email = :e");
        $sql->bindValue (":e", $email);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {     //descubrindo se a pessoa esta cadastrada ou nao
            return false;               //ja esta cadastrada        
        }

        else {              //caso nao, cadastrar
            $sql = $pdo->prepare ("INSERT INTO users (nome, cpf, telefone, email, endereco, senha) VALUES (:n, :c, :t, :e, :d, :s)");
            $sql->bindValue (":n", $nome);
            $sql->bindValue (":c", $cpf);
            $sql->bindValue (":t", $telefone);
            $sql->bindValue (":e", $email);
            $sql->bindValue (":d", $endereco);
            $sql->bindValue (":s", md5($senha));    //clipitografando a senha com md5..
            $sql->execute();
            return true;
        }
    }

    public function logar ($email, $senha) {                /*verificar se a pessoa esta cadastrada ou nao no banco de dados */
        global $pdo;
        //verificar se o email e senha estao cadastrados, se sim 
        $sql = $pdo->prepare("SELECT id_usuario FROM users WHERE email = :e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));    //clipitografando a senha com md5...
        $sql->execute();

        if ($sql->rowCount() > 0) {
            //entrar no sistema(sessao)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true;     //logado com sucesso 
        }

        else {
            return false; //nao foi possivel logar
        }
    }
}
?>
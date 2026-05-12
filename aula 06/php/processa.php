<?php

$host = 'localhost';
$dbname = 'projeto_site';
$usuario = 'root';
$senha = '';

//tentativa de conexão utilizando PDO
try {
    //configura o PDO para mostrar erros
    $conexao = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    //para e mostra caso ocorra um erro
    die("erro ao se conectar com banco de dados: ". $e->getMessage());
}

//recebe os dados enviados pelo formulario
//o if garante que somente serão enviados dados após o 'submit'
if($_SERVER["REQUEST_METHOD"]=="POST") {

    $nome_recebido = $_POST['nome'];
    $email_recebido = $_POST['email'];
    $mensagem_recebida = $_POST['mensagem'];

    //prepara o comando sql para ser executado 
    //utiliza coringas :nome :email :mensagem
    $sql = "INSERT INTO contatos (nome, email, mensagem) values (:nome, :email, :mensagem)";
    $stmt = $conexao ->prepare($sql);

    //substitui os valores dos coringas pelos recebidos
    $stmt->bindParam(':nome',$nome_recebido);
    $stmt->bindParam(':email',$email_recebido);
    $stmt->bindParam(':mensagem',$mensagem_recebida);

    //verifica se deu certo!
    if($stmt->execute()){
    echo "<h1>Sucesso!</h1>";
    echo "<p>Dados salvos no banco de dados</p>";
    echo "<a href='index.html'>Voltar</a>";
    } else {
        echo" Erro ao tentar salvar dados.";
        }
}
?>
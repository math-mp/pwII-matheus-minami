<?php 
$host = 'localhost';
$dbname = 'projeto_site';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset( $_POST['id'] ,$_POST['nome'], $_POST['email'],$_POST['mensagem'])) {
    
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];

        $sql = "update contatos set nome = :nome, email = :email, mensagem = :mensagem where id = :id";

        $stmt = $conexao->prepare($sql);

        $stmt->bindParam(':nome', $nome) ;
        $stmt->bindParam(':email', $email) ;
        $stmt->bindParam(':mensagem', $mensagem) ;
        $stmt->bindParam(':id', $id,PDO::PARAM_INT) ;

        $stmt->execute();

        header("location: listar.php");
        exit();
    } else {
        echo "acesso invalido ou dados incompletos. ";
    }
}catch(PDOException $e) {
    die("Erro ao atualizar: " . $e->getMessage());
}
?>
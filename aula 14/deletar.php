<?php

$host = 'localhost';
$dbname = 'projeto_site';
$usuario = 'root';
$senha = '';

try{
    $conexao = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $conexao-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_GET['id'])){

        //verifica se o id foi passado pela URL
        $id = $_GET['id'];

        //comando SQL de exclusão (DELETE)
        $sql = "delete from contatos where id = :id";
        $stmt = $conexao->prepare($sql);    

        //passando o id de forma segura contra SQL injection
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    //redirecionamento pra lista após deletar
    header("location: listar.php");
    exit();
}catch(PDOException $e){
    die("erro ao tentar deletar: " . $e->getMessage());
}
?>
<?php

$host = 'localhost';
$dbname = 'projeto_site';
$usuario = 'root';
$senha = '';

try{
    $conexao = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $conexao-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    die("erro de conexão: " . $e->getMessage());
}

//comando sql de busca (select)
$sql = "select id, nome, email, mensagem from contatos";
$stmt = $conexao->prepare ($sql);
$stmt->execute();

//guardando o resultado
//FETCH_ASSOC transforma dados em arrays facilitando a leitura do php
$mensagens = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel de mensagens</title>
    <style>
        /*css para deixar a tabela organizada*/
        body{
            font-family: Arial, sans-serif, padding: 20px;
        }
        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td{
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th{
            background-color: #333; color: white;
        }
        tr:nth-child(even){
            background-color: #f9f9f9
        }
    </style>
</head>
<body>
    <h2>Mensagens interceptdadas (banco de dados)</h2>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nome/Sobrevivente</th>
            <th>E-mail de Contato</th>
            <th>Conteudo da mensagem</th>
        </tr>
        
        <?php foreach ($mensagens as $linha): ?>
        <tr>
            <td><?php echo $linha['id']; ?> </td>
            <td><?php echo $linha['nome']; ?> </td>
            <td><?php echo $linha['email']; ?> </td>
            <td><?php echo $linha['mensagem']; ?> </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href ="index.html">Voltar para o formulário</a>
</body>
</html>   
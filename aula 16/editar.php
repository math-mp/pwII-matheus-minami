<?php 
$host = 'localhost';
$dbname = 'projeto_site';
$usuario = 'root';
$senha = '';

try{
    $conexao = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_GET['id']) && is_numeric ($_GET['id'])){
        $id = $_GET['id'];

        $sql = "select * from contatos where id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $contato = $stmt->fetch(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e){
    die("Erro na conexão: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Mensagem</title>
</head>
<body>
    <h2>Editar Contato</h2>
    <?php if ($contato): ?>
        <form action="atualizar.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $contato['ID'];?>">
            
            <label>Nome: </label></form><br>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($contato['NOME']); ?>" required><br><br>
            
            <label>Nome: </label></form><br>
            <input type="email" name="email" value="<?php echo htmlspecialchars($contato['EMAIL']); ?>" required><br><br>

            <label>Nome: </label></form><br>
            <textarea name="mensagem" required><?php echo htmlspecialchars($contato['MENSAGEM']); ?></textarea><br><br>

            <button type="submit">Salvar Alterações</button>
        </form>
    <?php else: ?>
        <div style="color: red; border: 1px solid red; padding: 10px;">
            <strong>Atenção</strong> contato nao encontrado ou ID invalido. Verifique se a URL esta correta (ex: editar.php?id=1).
        </div>
    <?php endif; ?>

    <br>
    <a href="listar.php">Voltar para a lista</a>
</body>
</html>


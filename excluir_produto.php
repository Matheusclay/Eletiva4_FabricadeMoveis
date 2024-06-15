<?php include 'includes/cabecalho.php'; ?>
<?php include 'funcao.php'; ?>

<?php
$id = $_GET['id']; // Obtém o ID do produto a ser excluído

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Exclua primeiro todos os pedidos de materiais associados ao produto
    $stmt = $pdo->prepare("DELETE FROM pedidos_materiais WHERE produto_id = ?");
    $stmt->execute([$id]);

    // Exclua o produto
    $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->execute([$id]);

    header('Location: index.php');
} else {
    // Obtenha o produto atual para exibir os detalhes antes de excluir
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produto) {
        echo "<p>Produto não encontrado!</p>";
        include 'includes/rodape.php';
        exit;
    }
}
?>

<h2 class="mb-4">Excluir Produto</h2>
<p class="mb-4">Tem certeza que deseja excluir o produto <strong><?php echo $produto['nome']; ?></strong>?</p>
<form method="post">
    <button type="submit" class="btn btn-danger">Excluir</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php include 'includes/rodape.php'; ?>

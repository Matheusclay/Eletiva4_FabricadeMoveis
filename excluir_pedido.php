<?php include 'includes/cabecalho.php'; ?>
<?php include 'funcao.php'; ?>

<?php
$id = $_GET['id']; // Obtém o ID do pedido de materiais a ser excluído

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("DELETE FROM pedidos_materiais WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: index.php');
} else {
    // Obtenha o pedido atual para exibir os detalhes antes de excluir
    $stmt = $pdo->prepare("SELECT * FROM pedidos_materiais WHERE id = ?");
    $stmt->execute([$id]);
    $pedido = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$pedido) {
        echo "<p>Pedido de materiais não encontrado!</p>";
        include 'includes/rodape.php';
        exit;
    }
}
?>

<h2 class="mb-4">Excluir Pedido de Materiais</h2>
<p class="mb-4">Tem certeza que deseja excluir o pedido de materiais com ID <strong><?php echo $pedido['id']; ?></strong>?</p>
<form method="post">
    <button type="submit" class="btn btn-danger">Excluir</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php include 'includes/rodape.php'; ?>

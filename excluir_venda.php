<?php include 'includes/cabecalho.php'; ?>
<?php include 'funcao.php'; ?>

<?php
$id = $_GET['id']; // Obtém o ID da venda a ser excluída

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("DELETE FROM vendas WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: index.php');
} else {
    // Obtenha a venda atual para exibir os detalhes antes de excluir
    $stmt = $pdo->prepare("SELECT * FROM vendas WHERE id = ?");
    $stmt->execute([$id]);
    $venda = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$venda) {
        echo "<p>Venda não encontrada!</p>";
        include 'includes/rodape.php';
        exit;
    }
}
?>

<h2 class="mb-4">Excluir Venda</h2>
<p class="mb-4">Tem certeza que deseja excluir a venda do cliente <strong><?php echo $venda['cliente']; ?></strong> na data <strong><?php echo $venda['data_venda']; ?></strong>?</p>
<form method="post">
    <button type="submit" class="btn btn-danger">Excluir</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php include 'includes/rodape.php'; ?>

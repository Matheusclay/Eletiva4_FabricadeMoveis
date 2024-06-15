<?php include 'includes/cabecalho.php'; ?>
<?php include 'funcao.php'; ?>

<?php
$id = $_GET['id']; // Obtém o ID da venda a ser alterada

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data_venda = $_POST['data_venda'];
    $cliente = $_POST['cliente'];

    $stmt = $pdo->prepare("UPDATE vendas SET data_venda = ?, cliente = ? WHERE id = ?");
    $stmt->execute([$data_venda, $cliente, $id]);

    header('Location: index.php');
} else {
    // Obtenha a venda atual para exibir os detalhes antes de alterar
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

<h2 class="mb-4">Alterar Venda</h2>
<form method="post" class="mb-4">
    <div class="mb-3">
        <label class="form-label">Data da Venda:</label>
        <input type="date" name="data_venda" class="form-control" value="<?php echo $venda['data_venda']; ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Cliente:</label>
        <input type="text" name="cliente" class="form-control" value="<?php echo $venda['cliente']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Alterar</button>
</form>

<?php include 'includes/rodape.php'; ?>

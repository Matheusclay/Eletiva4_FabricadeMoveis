<?php include 'includes/cabecalho.php'; ?>
<?php include 'funcao.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data_venda = $_POST['data_venda'];
    $cliente = $_POST['cliente'];

    $stmt = $pdo->prepare("INSERT INTO vendas (data_venda, cliente) VALUES (?, ?)");
    $stmt->execute([$data_venda, $cliente]);

    header('Location: index.php');
}
?>

<h2 class="mb-4">Inserir Venda</h2>
<form method="post" class="mb-4">
    <div class="mb-3">
        <label class="form-label">Data da Venda:</label>
        <input type="date" name="data_venda" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Cliente:</label>
        <input type="text" name="cliente" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Inserir</button>
</form>

<?php include 'includes/rodape.php'; ?>

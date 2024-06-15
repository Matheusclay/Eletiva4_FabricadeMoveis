<?php include 'includes/cabecalho.php'; ?>
<?php include 'funcao.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data_pedido = $_POST['data_pedido'];
    $produto_id = $_POST['produto_id'];
    $quantidade = $_POST['quantidade'];

    $stmt = $pdo->prepare("INSERT INTO pedidos_materiais (data_pedido, produto_id, quantidade) VALUES (?, ?, ?)");
    $stmt->execute([$data_pedido, $produto_id, $quantidade]);

    header('Location: index.php');
}
?>

<h2 class="mb-4">Inserir Pedido</h2>
<form method="post" class="mb-4">
    <div class="mb-3">
        <label class="form-label">Data do Pedido:</label>
        <input type="date" name="data_pedido" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Produto:</label>
        <select name="produto_id" class="form-select" required>
            <option value="">Selecione um produto</option>
            <?php
            $produtos = buscarTodos('produtos');
            foreach ($produtos as $produto) {
                echo "<option value='{$produto['id']}'>{$produto['nome']} - {$produto['tipo']}</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Quantidade:</label>
        <input type="number" name="quantidade" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Inserir</button>
</form>

<?php include 'includes/rodape.php'; ?>

<?php include 'includes/cabecalho.php'; ?>
<?php include 'funcao.php'; ?>

<?php
$id = $_GET['id']; // Obtém o ID do pedido a ser alterado

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data_pedido = $_POST['data_pedido'];
    $produto_id = $_POST['produto_id'];
    $quantidade = $_POST['quantidade'];

    $stmt = $pdo->prepare("UPDATE pedidos_materiais SET data_pedido = ?, produto_id = ?, quantidade = ? WHERE id = ?");
    $stmt->execute([$data_pedido, $produto_id, $quantidade, $id]);

    header('Location: index.php');
} else {
    // Obtenha o pedido atual para exibir os detalhes antes de alterar
    $stmt = $pdo->prepare("SELECT * FROM pedidos_materiais WHERE id = ?");
    $stmt->execute([$id]);
    $pedido = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$pedido) {
        echo "<p>Pedido não encontrado!</p>";
        include 'includes/rodape.php';
        exit;
    }
}
?>

<h2 class="mb-4">Alterar Pedido de Materiais</h2>
<form method="post" class="mb-4">
    <div class="mb-3">
        <label class="form-label">Data do Pedido:</label>
        <input type="date" name="data_pedido" class="form-control" value="<?php echo $pedido['data_pedido']; ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Produto:</label>
        <select name="produto_id" class="form-select" required>
            <?php
            $produtos = buscarTodos('produtos');
            foreach ($produtos as $produto) {
                $selected = $produto['id'] == $pedido['produto_id'] ? 'selected' : '';
                echo "<option value='{$produto['id']}' $selected>{$produto['nome']} - {$produto['tipo']}</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Quantidade:</label>
        <input type="number" name="quantidade" class="form-control" value="<?php echo $pedido['quantidade']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Alterar</button>
</form>

<?php include 'includes/rodape.php'; ?>

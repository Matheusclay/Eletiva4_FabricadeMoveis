<?php include 'includes/cabecalho.php'; ?>
<?php include 'funcao.php'; ?>

<?php
$id = $_GET['id']; // Obtém o ID do produto a ser alterado

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'];

    $stmt = $pdo->prepare("UPDATE produtos SET nome = ?, tipo = ?, preco = ? WHERE id = ?");
    $stmt->execute([$nome, $tipo, $preco, $id]);

    header('Location: index.php');
} else {
    // Obtenha o produto atual para exibir os detalhes antes de alterar
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

<h2 class="mb-4">Alterar Produto</h2>
<form method="post" class="mb-4">
    <div class="mb-3">
        <label class="form-label">Nome:</label>
        <input type="text" name="nome" class="form-control" value="<?php echo $produto['nome']; ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Tipo:</label>
        <input type="text" name="tipo" class="form-control" value="<?php echo $produto['tipo']; ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Preço:</label>
        <input type="text" name="preco" class="form-control" value="<?php echo $produto['preco']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Alterar</button>
</form>

<?php include 'includes/rodape.php'; ?>

<?php include 'includes/cabecalho.php'; ?>
<?php include 'funcao.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'];

    $stmt = $pdo->prepare("INSERT INTO produtos (nome, tipo, preco) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $tipo, $preco]);

    header('Location: index.php');
}
?>

<h2 class="mb-4">Inserir Produto</h2>
<form method="post" class="mb-4">
    <div class="mb-3">
        <label class="form-label">Nome:</label>
        <input type="text" name="nome" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Tipo:</label>
        <input type="text" name="tipo" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Preço:</label>
        <input type="text" name="preco" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Inserir</button>
</form>

<?php include 'includes/rodape.php'; ?>

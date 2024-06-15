<?php include 'includes/cabecalho.php'; ?>
<?php include 'funcao.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    $endereco = $_POST['endereco'];

    $stmt = $pdo->prepare("INSERT INTO fornecedores (nome, contato, endereco) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $contato, $endereco]);

    header('Location: index.php');
}
?>

<h2 class="mb-4">Inserir Fornecedor</h2>
<form method="post" class="mb-4">
    <div class="mb-3">
        <label class="form-label">Nome:</label>
        <input type="text" name="nome" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Contato:</label>
        <input type="text" name="contato" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Endereço:</label>
        <textarea name="endereco" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Inserir</button>
</form>

<?php include 'includes/rodape.php'; ?>

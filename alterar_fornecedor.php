<?php include 'includes/cabecalho.php'; ?>
<?php include 'funcao.php'; ?>

<?php
$id = $_GET['id']; // Obtém o ID do fornecedor a ser alterado

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    $endereco = $_POST['endereco'];

    $stmt = $pdo->prepare("UPDATE fornecedores SET nome = ?, contato = ?, endereco = ? WHERE id = ?");
    $stmt->execute([$nome, $contato, $endereco, $id]);

    header('Location: index.php');
} else {
    // Obtenha o fornecedor atual para exibir os detalhes antes de alterar
    $stmt = $pdo->prepare("SELECT * FROM fornecedores WHERE id = ?");
    $stmt->execute([$id]);
    $fornecedor = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$fornecedor) {
        echo "<p>Fornecedor não encontrado!</p>";
        include 'includes/rodape.php';
        exit;
    }
}
?>

<h2 class="mb-4">Alterar Fornecedor</h2>
<form method="post" class="mb-4">
    <div class="mb-3">
        <label class="form-label">Nome:</label>
        <input type="text" name="nome" class="form-control" value="<?php echo $fornecedor['nome']; ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Contato:</label>
        <input type="text" name="contato" class="form-control" value="<?php echo $fornecedor['contato']; ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Endereço:</label>
        <textarea name="endereco" class="form-control" required><?php echo $fornecedor['endereco']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Alterar</button>
</form>

<?php include 'includes/rodape.php'; ?>

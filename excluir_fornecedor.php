<?php include 'includes/cabecalho.php'; ?>
<?php include 'funcao.php'; ?>

<?php
$id = $_GET['id']; // Obtém o ID do fornecedor a ser excluído

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("DELETE FROM fornecedores WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: index.php');
} else {
    // Obtenha o fornecedor atual para exibir os detalhes antes de excluir
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

<h2 class="mb-4">Excluir Fornecedor</h2>
<p class="mb-4">Tem certeza que deseja excluir o fornecedor <strong><?php echo $fornecedor['nome']; ?></strong>?</p>
<form method="post">
    <button type="submit" class="btn btn-danger">Excluir</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php include 'includes/rodape.php'; ?>

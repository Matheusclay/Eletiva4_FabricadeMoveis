<?php
$host = 'localhost';
$db = 'fabrica_moveis';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}

function buscarTodos($tabela) {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM $tabela");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarProduto($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function buscarFornecedor($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM fornecedores WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function buscarPedido($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM pedidos_materiais WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function buscarVenda($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM vendas WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

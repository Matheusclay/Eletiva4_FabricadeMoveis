<?php include 'includes/cabecalho.php'; ?>
<?php include 'funcao.php'; ?>

<div class="container">
    <h2 class="my-4">Sistema Fábrica de Móveis</h2>
    
    <div class="row mb-4">
        <div class="col">
            <a href="inserir_produto.php" class="btn btn-success">Inserir Produto</a>
            <a href="inserir_fornecedor.php" class="btn btn-success">Inserir Fornecedor</a>
            <a href="inserir_pedido.php" class="btn btn-success">Inserir Pedido</a>
            <a href="inserir_venda.php" class="btn btn-success">Inserir Venda</a>
        </div>
    </div>
    
    <h3 class="mb-4">Produtos</h3>
    <ul class="list-group mb-4">
        <?php
        $produtos = buscarTodos('produtos');
        foreach ($produtos as $produto) {
            echo "<li class='list-group-item'>{$produto['nome']} - {$produto['tipo']} - R$ {$produto['preco']}
            <a href='alterar_produto.php?id={$produto['id']}' class='btn btn-primary btn-sm mx-2'>Alterar</a>
            <a href='excluir_produto.php?id={$produto['id']}' class='btn btn-danger btn-sm'>Excluir</a>
            </li>";
        }
        ?>
    </ul>

    <h3 class="mb-4">Fornecedores</h3>
    <ul class="list-group mb-4">
        <?php
        $fornecedores = buscarTodos('fornecedores');
        foreach ($fornecedores as $fornecedor) {
            echo "<li class='list-group-item'>{$fornecedor['nome']} - {$fornecedor['contato']} - {$fornecedor['endereco']}
            <a href='alterar_fornecedor.php?id={$fornecedor['id']}' class='btn btn-primary btn-sm mx-2'>Alterar</a>
            <a href='excluir_fornecedor.php?id={$fornecedor['id']}' class='btn btn-danger btn-sm'>Excluir</a>
            </li>";
        }
        ?>
    </ul>

    <h3 class="mb-4">Pedidos de Materiais</h3>
    <ul class="list-group mb-4">
        <?php
        $pedidos = buscarTodos('pedidos_materiais');
        foreach ($pedidos as $pedido) {
            echo "<li class='list-group-item'>{$pedido['data_pedido']} - Produto ID: {$pedido['produto_id']} - Quantidade: {$pedido['quantidade']}
            <a href='alterar_pedido.php?id={$pedido['id']}' class='btn btn-primary btn-sm mx-2'>Alterar</a>
            <a href='excluir_pedido.php?id={$pedido['id']}' class='btn btn-danger btn-sm'>Excluir</a>
            </li>";
        }
        ?>
    </ul>

    <h3 class="mb-4">Vendas</h3>
    <ul class="list-group mb-4">
        <?php
        $vendas = buscarTodos('vendas');
        foreach ($vendas as $venda) {
            echo "<li class='list-group-item'>{$venda['data_venda']} - Cliente: {$venda['cliente']}
            <a href='alterar_venda.php?id={$venda['id']}' class='btn btn-primary btn-sm mx-2'>Alterar</a>
            <a href='excluir_venda.php?id={$venda['id']}' class='btn btn-danger btn-sm'>Excluir</a>
            </li>";
        }
        ?>
    </ul>
</div>

<?php include 'includes/rodape.php'; ?>

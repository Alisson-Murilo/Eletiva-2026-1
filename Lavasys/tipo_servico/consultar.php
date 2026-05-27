<?php
    require_once('../cabecalho.php');
    require_once('../conexao.php');
    try {
        $stmt = $pdo->prepare('SELECT * FROM tipo_servico WHERE id = ?');
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch(Exception $e) {
        echo "Erro: ".$e->getMessage();
    }
?>

<main class="container">
    <h1>Alterar dados do serviço</h1>
    <form method="post"
    action="editar.php?id=<?= $resultado['id'] ?>">
        <div class="mb-3">
            <label for="descricao" class="form-label">Informe a descrição</label>
            <input value="<?= $resultado['descricao'] ?>" type="text" id="descricao" name="descricao" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="preco_base" class="form-label">Informe o preço base do serviço</label>
            <input value="R$ <?= number_format($resultado['preco_base'], 2, ',', '.') ?>" type="number" id="preco_base" name="preco_base" class="form-control" readonly step="any">
        </div>
        <a href="listar.php" class="btn btn-primary">Voltar</a>
        <button onclick="confirmarExclusao()" type="button" class="btn btn-danger">Excluir</button>
    </form>
</main>
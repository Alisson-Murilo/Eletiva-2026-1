<?php
    require_once('../cabecalho.php');
    require_once('../conexao.php');
    try{
        $stmt = $pdo->query('SELECT * FROM tipo_servico');
        $resultado = $stmt->fetchAll();
    } catch(Exception $e) {
        echo "Erro: ".$e->getMessage();
    }
?>
<h1>Serviços</h1>
<a href="cadastrar.php">Cadastrar Tipo de Serviço</a>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($resultado as $r): ?>
            <tr>
                <td><?= $r['id'] ?></td>
                <td><?= $r['descricao'] ?></td>
                <td>R$ <?= number_format($r['preco_base'], 2, ',', '.') ?></td>
                <td class="d-flex gap-2">
                    <a href="editar.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="consultar.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-info">Consultar</a>
                </td>
            </tr>
            <?php endforeach; ?>   
        </tbody>
    </table>
    <a href="../principal.php" class="btn btn-secondary">Voltar</a>
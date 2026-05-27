<?php 
    require_once('../cabecalho.php');
    require_once('../conexao.php');
    try {
        $stmt = $pdo->query("SELECT * FROM cliente");
        $resultado = $stmt->fetchAll();
    } catch(Exception $e) {
        die("Erro: ".$e->getMessage());
    }
?>

<h1>Clientes</h1>
<a href="cadastrar.php">Cadastrar Novo cliente</a>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Endereco</th>
                <th>Data de Inclusão</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($resultado as $r): ?>
            <tr>
                <td><?= $r['id'] ?></td>
                <td><?= $r['nome'] ?></td>
                <td><?= $r['cpf'] ?></td>
                <td><?= $r['telefone'] ?></td>
                <td><?= $r['email'] ?></td>
                <td><?= $r['endereco'] ?></td>
                <td><?= $r['data_inclusao'] ?></td>
                <td class="d-flex gap-2">
                    <a href="editar.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="excluir.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-info">Consultar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

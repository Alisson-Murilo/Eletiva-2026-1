<?php
    require_once('../cabecalho.php');
    require_once('../conexao.php');
    try{
        $stmt = $pdo->prepare("SELECT * FROM cliente WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }

?>

<main class="container">
    <h1>Dados do cliente</h1>

    <form method="post"
        action="consultar.php?id=<?= $resultado['id'] ?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input value="<?= $resultado['nome'] ?>" type="text" id="nome" name="nome" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input value="<?= $resultado['cpf'] ?>" type="text" id="cpf" name="cpf" class="form-control" readonly>
        </div><div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input value="<?= $resultado['telefone'] ?>" type="text" id="telefone" name="telefone" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input value="<?= $resultado['email'] ?>" type="text" id="email" name="email" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input value="<?= $resultado['endereco'] ?>" type="text" id="endereco" name="endereco" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="data_inclusao" class="form-label">Data da inclusão</label>
            <input value="<?= $resultado['data_inclusao'] ?>" type="text" id="data_inclusao" name="data_inclusao" class="form-control" readonly>
        </div>
        <a href="listar.php" class="btn btn-primary">Voltar</a>
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
</main>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_GET['id'];
            try{
                $sql = "DELETE FROM cliente WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                if($stmt->execute([$id])){
                    header('Location: listar.php');
                } else{
                    echo "<p>Erro ao excluir!</p>";
                }
            } catch(Exception $e){
                echo "Erro: ".$e->getMessage();
            }
        }
    ?>

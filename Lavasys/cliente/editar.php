<?php
    require_once('../cabecalho.php');
    require_once('../conexao.php');
    $mensagem = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $id = $_GET['id'];
        try{
            $sql = "UPDATE cliente SET nome = ?, cpf = ?, telefone = ?, email = ?, endereco = ? WHERE id = ?";
            $stmt =  $pdo->prepare($sql);
            if($stmt->execute([$nome, $cpf, $telefone, $email, $endereco, $id])){
                $mensagem = "<p>Alteração realizada!</p>";
            } else {
                $mensagem = "<p>Erro ao alterar! Tente novamente.</p>";
            }
        } catch(Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
    try{
        $stmt = $pdo->prepare("SELECT * FROM cliente WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }

?>

<main class="container">
    <h1>Alterar dados do cliente</h1>

    <form method="post"
        action="editar.php?id=<?= $resultado['id'] ?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Informe o nome</label>
            <input value="<?= $resultado['nome'] ?>" type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">Informe o CPF</label>
            <input value="<?= $resultado['cpf'] ?>" type="text" id="cpf" name="cpf" class="form-control" required="">
        </div><div class="mb-3">
            <label for="telefone" class="form-label">Informe o telefone</label>
            <input value="<?= $resultado['telefone'] ?>" type="text" id="telefone" name="telefone" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Informe o e-mail</label>
            <input value="<?= $resultado['email'] ?>" type="text" id="email" name="email" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Informe o endereço</label>
            <input value="<?= $resultado['endereco'] ?>" type="text" id="endereco" name="endereco" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="data_inclusao" class="form-label">Data da inclusão</label>
            <input value="<?= $resultado['data_inclusao'] ?>" type="text" id="data_inclusao" name="data_inclusao" class="form-control" readonly disabled>
        </div>
        <a href="listar.php" class="btn btn-secondary">Voltar</a>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
        echo $mensagem;
    ?>
</main>

<?php
    require_once('../cabecalho.php');
    require_once('../conexao.php');
    $mensagem = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $descricao = $_POST['descricao'];
        $preco_base = $_POST['preco_base'];
        $id = $_GET['id'];
        try{
            $sql = "UPDATE tipo_servico SET descricao = ?, preco_base = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            if($stmt->execute([$descricao, $preco_base, $id])){
                $mensagem = "<p>Alteração realizada!</p>";
            } else{
                $mensagem = "<p>Erro ao alterar! Tente novamente.</p>";
            }
        } catch(Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
    try{
        $stmt = $pdo->prepare("SELECT * FROM tipo_servico WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>

<main class="container">
    <h1>Alterar dados do serviço</h1>
    <form method="post"
    action="editar.php?id=<?= $resultado['id'] ?>">
        <div class="mb-3">
            <label for="descricao" class="form-label">Informe a descrição</label>
            <input value="<?= $resultado['descricao'] ?>" type="text" id="descricao" name="descricao" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="preco_base" class="form-label">Informe o preço base do serviço</label>
            <input value="<?= $resultado['preco_base'] ?>" type="number" id="preco_base" name="preco_base" class="form-control" required="" step="any">
        </div>
        <a href="listar.php" class="btn btn-secondary">Voltar</a>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</main>
<?php 
    echo $mensagem;
?>

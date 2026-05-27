<?php
    require_once('../cabecalho.php');
    require_once('../conexao.php');
    $mensagem = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $descricao = $_POST['descricao'];
        $id = $_GET['id'];
        try{
            $sql = "UPDATE itens SET descricao = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            if($stmt->execute([$descricao, $id])){
                $mensagem = "<p>Alteração realizada!</p>";
            } else{
                $mensagem = "<p>Erro ao alterar! Tente novamente.</p>";
            }
        } catch(Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
    try{
        $stmt = $pdo->prepare("SELECT * FROM itens WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>

<main class="container">
    <h1>Alterar dados do item</h1>
    <form method="post"
    action="editar.php?id=<?= $resultado['id'] ?>">
        <div class="mb-3">
            <label for="descricao" class="form-label">Informe a descrição</label>
            <input value="<?= $resultado['descricao'] ?>" type="text" id="descricao" name="descricao" class="form-control" required="">
        </div>
        <a href="listar.php" class="btn btn-secondary">Voltar</a>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</main>
<?php
    echo $mensagem;
?>
<?php
    require_once('../cabecalho.php');
    require_once('../conexao.php');
    try{
        $stmt = $pdo->prepare("SELECT * FROM itens WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>

<main class="container">
    <h1>Dados do item</h1>
    <form method="post"
    id="formExcluir" action="consultar.php?id=<?= $resultado['id'] ?>">
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input value="<?= $resultado['descricao'] ?>" type="text" id="descricao" name="descricao" class="form-control" readonly>
        </div>
        <a href="listar.php" class="btn btn-primary">Voltar</a>
        <button onclick="confirmarExclusao()" type="button" class="btn btn-danger">Excluir</button>
    </form>
</main>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_GET['id'];
        try{
            $sql = "DELETE FROM itens WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            if($stmt->execute([$id])){
                header('Location: listar.php');
            } else {
                echo "<p>Erro ao excluir!</p>";
            }
        } catch(Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
    require_once('../rodape.php');
?>
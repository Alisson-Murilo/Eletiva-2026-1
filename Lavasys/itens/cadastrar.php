<?php
    require_once('../conexao.php');
    require_once('../cabecalho.php');
?>
<main class="container">
<h1>Cadastro de Itens</h1>
<form method="post">
    <div class="mb-3">
        <label for="descricao" class="form-label">Informe a descrição</label>
        <input type="text" id="descricao" name="descricao" class="form-control" required="">
    </div>
    <a href="listar.php" class="btn btn-secondary">Voltar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</main>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once('../conexao.php');
        $descricao = $_POST['descricao'];
        try{
            $stmt = $pdo->prepare("INSERT INTO itens (descricao) VALUES (?);");
            if($stmt->execute([$descricao])){
                echo "<p>Cadastro ralizado!</p>";
            } else{
                echo "<p>Erro ao cadastrar! Tente novamente.</p>";
            }
        } catch(Exception $e){  
            echo "Erro: ".$e->getMessage();
        }
    }
?>
<?php
    require_once('../conexao.php');
    require_once('../cabecalho.php');
?>
<main class="container">
<h1>Cadastro de Tipo de Serviço</h1>
<form method="post">
    <div class="mb-3">
        <label for="descricao" class="form-label">Informe a descrição</label>
        <input type="text" id="descricao" name="descricao" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="preco_base" class="form-label">Informe o preço base do serviço</label>
        <input type="number" id="preco_base" name="preco_base" class="form-control" required="" step="any">
    </div>
    <a href="listar.php" class="btn btn-secondary">Voltar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</main>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once('../conexao.php');
        $descricao = $_POST['descricao'];
        $preco_base = $_POST['preco_base'];
        try{
            $stmt = $pdo->prepare("INSERT INTO tipo_servico (descricao, preco_base) VALUES (?, ?);");
            if($stmt->execute([$descricao, $preco_base])){
                echo "<p>Cadastro Realizado!</p>";
            } else {
                echo "<p>Erro ao cadastrar! Tente novamente.</p>";
            }
        } catch(Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
?>
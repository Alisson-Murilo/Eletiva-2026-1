<?php 
require_once('../conexao.php');
require_once('../cabecalho.php');
?>

<main class="container">
    <h1>Novo Cliente</h1>

    <form method="post">
    <div class="mb-3">
        <label for="nome" class="form-label">Informe o nome</label>
        <input type="text" id="nome" name="nome" class="form-control" required="">
        </div><div class="mb-3">
        <label for="cpf" class="form-label">Informe o CPF</label>
        <input type="text" id="cpf" name="cpf" class="form-control" required="">
        </div><div class="mb-3">
        <label for="telefone" class="form-label">Informe o telefone</label>
        <input type="text" id="telefone" name="telefone" class="form-control" required="">
        </div><div class="mb-3">
        <label for="email" class="form-label">Informe o e-mail</label>
        <input type="text" id="email" name="email" class="form-control" required="">
        </div><div class="mb-3">
        <label for="endereco" class="form-label">Informe o endereço</label>
        <input type="text" id="endereco" name="endereco" class="form-control" required="">
        </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</main>
</form>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once('../conexao.php');
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        try{
            $stmt = $pdo->prepare('INSERT INTO cliente (nome, cpf, telefone, email, endereco) VALUES (?, ?, ?, ?, ?);');
            if($stmt->execute([$nome, $cpf, $telefone, $email, $endereco])){
                echo "<p>Cadastro realizado!</p>";
            } else {
                echo "<p>Erro ao cadastrar! Tente novamente.</p>";
            }
        } catch(Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
?>

<?php 
require_once('../rodape.php');
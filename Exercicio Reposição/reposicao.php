<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício para Recomposição da Aprendizagem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercício para Recomposição da Aprendizagem</h1>
        <form method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Informe o nome: </label>
                <input type="text" id="nome" name="nome" class="form-control">
            </div>
            <div class="mb-3">
                <label for="numero1" class="form-label">Informe o primeiro número: </label>
                <input type="number" id="numero1" name="numero1" class="form-control">
            </div>
            <div class="mb-3">
                <label for="numero2" class="form-label">Informe o segundo número: </label>
                <input type="number" id="numero2" name="numero2" class="form-control">
            </div>
            <div class="mb-3">
                <label for="frase" class="form-label">Informe uma frase: </label>
                <input type="text" id="frase" name="frase" class="form-control">
            </div>
            <div class="mb-3">
                <label for="op" class="form-label">Selecione a Operação: </label>
                <select id="op" name="op" class="form-select" required="">
                    <option value="Soma">Soma</option>
                    <option value="Média">Média</option>
                    <option value="Tabuada">Tabuada</option>
                    <option value="Verificar Palíndromo">Verificar Palíndromo</option>
                    <option value="Cadastrar Produto">Cadastrar Produto</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $op = $_POST['op'];
                if($op == 'Soma') {
                    $numero1 = $_POST['numero1'];
                    $numero2 = $_POST['numero2'];
                    $soma = $numero1 + $numero2;
                    echo "<p>A soma dos dois números é $soma</p>";
                } 
                
                elseif ($op == 'Média'){
                    $numero1 = $_POST['numero1'];
                    $numero2 = $_POST['numero2'];
                    $media = ($numero1 + $numero2) / 2 ;
                    echo "<p>A média dos dois números é $media</p>";
                } 
                
                elseif ($op == 'Tabuada'){
                    $numero1 = $_POST['numero1'];
                    echo "<p>Tabuada do Número $numero1 !!!</p>";
                    for($i=1;$i<11;$i++){
                        $resultado = $numero1 * $i;
                        echo "<p>$numero1 x $i = $resultado</p>";
                    }
                } 
                
                elseif ($op == 'Verificar Palíndromo'){
                    $frase = $_POST['frase'];
                    $reverso = strrev($frase);
                    
                    if($reverso == $frase)
                        echo "<p>$frase --> É Palindromo!</p>";
                    else
                        echo "<p>$frase --> Não é Palindromo!</p>";
                } 
                
                elseif ($op == 'Cadastrar Produto') {
                    $cod = [1015, 1033, 1101];
                    $nome = ["Mochila", "Estojo", "Caderno"];
                    $preco = [120, 50, 30];
                    $produtos = [];

                    for($i=0;$i<3;$i++){
                        $produtos[$cod[$i]] = [$nome[$i], $preco[$i]];
                    }

                    uasort($produtos, function($a, $b) {
                        return $a[0] <=> $b[0];
                    });
                    
                    echo "<p>- - - - - - Produtos Cadastrados - - - - - -</p>";
                    foreach($produtos as $chave => $valor){
                        echo "<p>Código: $chave | Nome: {$valor[0]} | Preço: R$ {$valor[1]}</p>";
                    }
                }
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>
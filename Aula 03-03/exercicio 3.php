<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1></h1>
        <form method="post">
            <div class="mb-3">
                <label for="a" class="form-label">Inofrme o valor A: </label>
                <input type="number" id="valor1" name="a" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="b" class="form-label">Informe o valor B: </label>
                <input type="number" id="valor2" name="b" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $a = $_POST['a'];
                $b = $_POST['b'];

                if ($a > $b)
                    echo "Valor A: $a <br> Valor b: $b";
                elseif($b > $a)
                    echo "Valor B: $b <br> Valor a: $a";
                else
                    echo "Valores iguais: $a";
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>
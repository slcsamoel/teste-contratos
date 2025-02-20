<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet">
    <title>Contratos</title>
</head>

<body>


    <div class="container">

        <h2 class="mt-4">Contratos</h2>
        <div class="row mb-3 text-center">
            <div class="col-md-8 themed-grid-col" id="criar-contrato">
                <a href="<?= APP_URL ?>contratos/create" class="btn btn-primary" id="btn-create-contrato">Criar Contrato</a>
            </div>
        </div>

        <div class="b-example-divider"></div>

        <div class="row mb-3 text-center">
            <div class="col-md-8 themed-grid-col">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#Codigo</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Prazo</th>
                            <th scope="col">Verba</th>
                            <th scope="col">Banco</th>
                            <th scope="col">Data Inclusão</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <?php foreach ($relacao as $key => $value): ?>
                            <tr>
                                <th scope="col"><?= $value['codigo_contrato']; ?></th>
                                <th scope="col"><?= $value['valor']; ?></th>
                                <th scope="col"><?= $value['prazo']; ?></th>
                                <th scope="col"><?= $value['verba']; ?></th>
                                <th scope="col"><?= $value['nome']; ?></th>
                                <th scope="col"><?= date('d/m/Y \- H:i', strtotime($value['data_inclusao'])); ?></th>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>
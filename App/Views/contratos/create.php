<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet">
    <title>Criando um Contrato</title>
</head>

<body>
    <div class="container">
        <h2 class="mt-4">Criando um Contrato</h2>
        <div class="row mb-3 text-center">
            <div class="col-md-8 themed-grid-col" id="criar-contrato">
                <a href="<?= APP_URL ?>" class="btn btn-primary" id="btn-create-contrato">Home Contratos</a>
            </div>
        </div>
        <div class="row mb-3 text-center">
            <div class="col-md-8 themed-grid-col" id="dados-user">
                <p class="lead">Dados do Contrato</p>
                <form id="form-contrato" class="row g-3" action="<?= APP_URL ?>contratos/store" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="prazo" class="form-label">prazo</label>
                            <input type="text" class="form-control" id="prazo" name="prazo" placeholder="prazo">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label">valor</label>
                            <input type="text" class="form-control" id="valor" name="valor" placeholder="valor">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label">Convenio Serviço</label>

                            <select class="form-select" aria-label="Default select example" id="convenio_servico" name="convenio_servico">
                                <option selected>Selecione</option>
                                <?php foreach ($conveniosContratos as $key => $value) : ?>
                                    <option value="<?= $value->getCodigo() ?>"><?= $value->getServico() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" id="btn-create-contrato">Criar Contrato</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>
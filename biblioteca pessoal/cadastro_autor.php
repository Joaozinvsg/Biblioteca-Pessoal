<?php
include 'protecao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                
                <div class="card shadow">
                    <div class="card-header bg-warning text-dark"> <h4 class="mb-0">✍️ Novo Autor</h4>
                    </div>
                    
                    <div class="card-body p-4">
                        <form action="salvar_autor.php" method="POST">
                            
                            <div class="mb-3">
                                <label class="form-label">Nome do Autor</label>
                                <input type="text" name="nome" class="form-control" placeholder="Ex: Machado de Assis" required>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="cadastro_livro.php" class="btn btn-secondary me-md-2">Cancelar</a>
                                <button type="submit" class="btn btn-warning">Salvar Autor</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
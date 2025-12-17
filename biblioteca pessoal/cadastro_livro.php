<?php
include 'protecao.php';
$host = 'localhost';
$db   = 'biblioteca_pessoal';
$user = 'root';
$pass = 'Z2liKsAkDw8g3lys'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) { die("Erro: " . $e->getMessage()); }

$query = $pdo->query("SELECT id, nome FROM autores");
$autores = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">📖 Novo Livro</h4>
                    </div>
                    
                    <div class="card-body p-4">
                        <form action="salvar_livro.php" method="POST">
                            
                            <div class="mb-3">
                                <label class="form-label">Título do Livro</label>
                                <input type="text" name="titulo" class="form-control" placeholder="Ex: O Pequeno Príncipe" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gênero</label>
                                <input type="text" name="genero" class="form-control" placeholder="Ex: Clássico">
                            </div>

                            <div class="mb-3">
    <label class="form-label">Autor</label>
    
    <div class="input-group">
        <select name="autor_id" class="form-select" required>
            <option value="" selected disabled>Selecione um autor...</option>
            <?php foreach($autores as $autor): ?>
                <option value="<?= $autor['id']; ?>">
                    <?= $autor['nome']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <a href="cadastro_autor.php" class="btn btn-outline-secondary">
            + Novo Autor
        </a>
    </div>
    
    <div class="form-text">Não achou? Clique no botão ao lado para adicionar.</div>
</div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="listar_livros.php" class="btn btn-secondary me-md-2">Cancelar</a>
                                <button type="submit" class="btn btn-success">Salvar Livro</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
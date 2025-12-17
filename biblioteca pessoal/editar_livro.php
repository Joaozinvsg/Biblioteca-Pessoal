<?php
include 'protecao.php';
$host = 'localhost'; $db = 'biblioteca_pessoal'; $user = 'root'; $pass = 'Z2liKsAkDw8g3lys';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) { die("Erro: " . $e->getMessage()); }

if (!isset($_GET['id'])) { die("ID não fornecido!"); }
$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM livros WHERE id = ?");
$stmt->execute([$id]);
$livro = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$livro) { die("Livro não encontrado!"); }

$autores = $pdo->query("SELECT * FROM autores")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">✏️ Editar Livro</h4>
                    </div>
                    
                    <div class="card-body p-4">
                        <form action="atualizar_livro.php" method="POST">
                            
                            <input type="hidden" name="id" value="<?= $livro['id']; ?>">

                            <div class="mb-3">
                                <label class="form-label">Título do Livro</label>
                                <input type="text" name="titulo" class="form-control" 
                                       value="<?= $livro['titulo']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gênero</label>
                                <input type="text" name="genero" class="form-control" 
                                       value="<?= $livro['genero']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Autor</label>
                                <select name="autor_id" class="form-select" required>
                                    <?php foreach($autores as $autor): ?>
                                        <option value="<?= $autor['id']; ?>"
                                            <?= ($autor['id'] == $livro['autor_id']) ? 'selected' : ''; ?> >
                                            <?= $autor['nome']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="listar_livros.php" class="btn btn-secondary me-md-2">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
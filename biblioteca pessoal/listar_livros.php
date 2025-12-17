<?php
include 'protecao.php';

$host = 'localhost'; $db = 'biblioteca_pessoal'; $user = 'root'; $pass = 'Z2liKsAkDw8g3lys';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) { die("Erro: " . $e->getMessage()); }

$sql = "SELECT livros.id, livros.titulo, livros.genero, autores.nome AS nome_autor 
        FROM livros INNER JOIN autores ON livros.autor_id = autores.id";
$stmt = $pdo->query($sql);
$lista_livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minha Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        
        <div class="d-flex justify-content-end mb-3">
            <span class="me-3 align-self-center">Olá, <strong><?= $_SESSION['usuario_nome']; ?></strong></span>
            <a href="logout.php" class="btn btn-outline-danger btn-sm">Sair</a>
        </div>

        <div class="row mb-4">
            <div class="col-md-8">
                <h1 class="display-6">📚 Minha Biblioteca</h1>
            </div>
            <div class="col-md-4 text-end">
                <a href="cadastro_livro.php" class="btn btn-success btn-lg">
                    + Novo Livro
                </a>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Gênero</th>
                            <th>Autor</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($lista_livros as $livro): ?>
                            <tr>
                                <td><?= $livro['id']; ?></td>
                                <td class="fw-bold"><?= $livro['titulo']; ?></td>
                                <td><span class="badge bg-secondary"><?= $livro['genero']; ?></span></td>
                                <td><?= $livro['nome_autor']; ?></td>
                                <td class="text-center">
                                    <a href="editar_livro.php?id=<?= $livro['id']; ?>" class="btn btn-primary btn-sm">
                                        ✏️ Editar
                                    </a>
                                    
                                    <a href="excluir_livro.php?id=<?= $livro['id']; ?>" 
                                       onclick="return confirm('Tem certeza?');" 
                                       class="btn btn-danger btn-sm">
                                       🗑️ Excluir
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
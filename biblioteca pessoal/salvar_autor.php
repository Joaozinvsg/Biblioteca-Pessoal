<?php
include 'protecao.php';

$host = 'localhost'; $db = 'biblioteca_pessoal'; $user = 'root'; $pass = 'Z2liKsAkDw8g3lys'; ;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];

        $sql = "INSERT INTO autores (nome) VALUES (?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome]);

        header("Location: cadastro_livro.php");
        exit;
    }

} catch (PDOException $e) {
    die("Erro ao salvar autor: " . $e->getMessage());
}
?>
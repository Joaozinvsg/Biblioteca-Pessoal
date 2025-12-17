<?php
include 'protecao.php';
$host = 'localhost'; $db = 'biblioteca_pessoal'; $user = 'root'; $pass = 'Z2liKsAkDw8g3lys';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) { die("Erro: " . $e->getMessage()); }

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM livros WHERE id = ?";
    
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$id]);
        
        header("Location: listar_livros.php");
        exit; 
        
    } catch (PDOException $e) {
        echo "Erro ao excluir: " . $e->getMessage();
    }
} else {
    header("Location: listar_livros.php");
    exit;
}
?>
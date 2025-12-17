<?php

$host = 'localhost'; $db = 'biblioteca_pessoal'; $user = 'root'; $pass = 'Z2liKsAkDw8g3lys';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) { die("Erro: " . $e->getMessage()); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id = $_POST['id'];          
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $autor_id = $_POST['autor_id'];

    $sql = "UPDATE livros SET titulo = ?, genero = ?, autor_id = ? WHERE id = ?";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$titulo, $genero, $autor_id, $id]);

        
        header("Location: listar_livros.php");
        exit;
        
    } catch (PDOException $e) {
        echo "Erro ao atualizar: " . $e->getMessage();
    }
}
?>
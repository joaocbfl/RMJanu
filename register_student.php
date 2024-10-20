<?php
$servername = "localhost";
$username = "root"; // Usuário padrão do XAMPP
$password = ""; // Senha padrão do XAMPP (geralmente em branco)
$dbname = "estudantes_db";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome_do_estudante"];

    $sql = "INSERT INTO Estudantes (nome_do_estudante) VALUES ('$nome')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo estudante registrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

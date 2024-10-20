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
    $search_nome = $_POST["search_nome"];

    $sql = "SELECT * FROM Estudantes WHERE nome_do_estudante LIKE '%$search_nome%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - Nome: " . $row["nome_do_estudante"]. "<br>";
        }
    } else {
        echo "Nenhum estudante encontrado com esse nome.";
    }
}

$conn->close();
?>

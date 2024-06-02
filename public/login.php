<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_database";

// Crearea conexiunii
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificarea conexiunii
if ($conn->connect_error) {
    die("Conexiunea a eșuat: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    
    // Verificarea username-ului
    $sql = "SELECT id, password FROM users WHERE username='$user'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Verificarea parolei
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            echo "Autentificare reușită.";
        } else {
            echo "Parolă incorectă.";
        }
    } else {
        echo "Username-ul nu există.";
    }
}

$conn->close();
?>

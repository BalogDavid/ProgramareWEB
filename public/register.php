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
    
    // Verificarea dacă username-ul există deja
    $sql = "SELECT id FROM users WHERE username='$user'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "Acest username a fost deja luat.";
    } else {
        // Hashing parola
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
        
        // Inserarea noului utilizator în baza de date
        $sql = "INSERT INTO users (username, password) VALUES ('$user', '$hashed_pass')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Înregistrare reușită.";
        } else {
            echo "Eroare: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<?php
function connexionDB()
{
    $host = "localhost";
    $dbname = "chartprojet";
    $username = "root";
    $password = "";

    $conn = new mysqli($host, $username, $password) or die("Impossible de se connecter au serveur");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Accès OK";
}

?>
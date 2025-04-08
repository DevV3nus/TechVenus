<?php
// Parametri di connessione al database
$host = 'localhost';
$db_name = 'techvenus_db';
$username = 'root';
$password = 'Chicco2006';

try {
    // Creazione della connessione PDO
    $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    
    // Imposta modalità di errore PDO su exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    // In caso di errore di connessione
    echo "Errore di connessione: " . $e->getMessage();
    die();
}
?>
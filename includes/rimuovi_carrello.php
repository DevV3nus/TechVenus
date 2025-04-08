<?php
session_start();
require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['index'])) {
    $index = (int) sanitizeInput($_POST['index']);
    
    // Rimuovi l'elemento dal carrello
    rimuoviDalCarrello($index);
    
    // Imposta un messaggio di conferma
    $_SESSION['messaggio'] = "Prodotto rimosso dal carrello!";
    
    // Reindirizza alla pagina del carrello
    header("Location: ../index.php?page=carrello");
    exit();
} else {
    // Se non è una richiesta POST o manca l'indice, reindirizza alla home
    header("Location: ../index.php");
    exit();
}
?>
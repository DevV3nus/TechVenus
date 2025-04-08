<?php
session_start();
require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati dal form
    $tipo = sanitizeInput($_POST['tipo']);
    $id = (int) sanitizeInput($_POST['id']);
    $nome = sanitizeInput($_POST['nome']);
    $prezzo = (float) sanitizeInput($_POST['prezzo']);
    $descrizione = isset($_POST['descrizione']) ? sanitizeInput($_POST['descrizione']) : '';
    $specifiche = isset($_POST['specifiche']) ? sanitizeInput($_POST['specifiche']) : '';
    $immagine = isset($_POST['immagine']) ? sanitizeInput($_POST['immagine']) : '';
    
    // Crea l'item da aggiungere al carrello
    $item = [
        'tipo' => $tipo,
        'id' => $id,
        'nome' => $nome,
        'prezzo' => $prezzo,
        'descrizione' => $descrizione,
        'specifiche' => $specifiche,
        'immagine' => $immagine
    ];
    
    // Aggiungi al carrello
    aggiungiAlCarrello($item);
    
    // Imposta un messaggio di conferma
    $_SESSION['messaggio'] = "Prodotto aggiunto al carrello!";
    
    // Reindirizza alla pagina precedente
    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
    header("Location: $referer");
    exit();
} else {
    // Se non è una richiesta POST, reindirizza alla home
    header("Location: ../index.php");
    exit();
}
?>
<?php
// Avvio della sessione per gestione utenti
session_start();

// Connessione al database
require_once 'includes/db_connect.php';

// Funzioni di utilità
require_once 'includes/functions.php';

// Header del sito
include 'includes/header.php';

// Contenuto principale basato sulla pagina richiesta
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch($page) {
    case 'servizi':
        include 'pages/servizi.php';
        break;
    case 'pc-preassemblati':
        include 'pages/preassemblati.php';
        break;
    case 'configuratore':
        include 'pages/configuratore.php';
        break;
    case 'sviluppo':
        include 'pages/sviluppo.php';
        break;
    case 'contatti':
        include 'pages/contatti.php';
        break;
    case 'carrello':
        include 'pages/carrello.php';
        break;
    default:
        include 'pages/home.php';
        break;
}

// Footer del sito
include 'includes/footer.php';
?>
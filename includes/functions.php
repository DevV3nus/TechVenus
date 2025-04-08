<?php
// Funzione per recuperare tutti i servizi dal database
function getServizi() {
    global $conn;
    
    try {
        $stmt = $conn->prepare("SELECT * FROM servizi ORDER BY id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        // Dati di fallback in caso di errore database
        return [
            ['id' => 1, 'nome' => 'Configurazione Audio-Warzone', 'prezzo' => 43.00, 'descrizione' => 'Ottimizzazione audio per migliorare la consapevolezza nei giochi come Warzone, rilevando passi e spari.', 'icona' => 'fa-volume-up'],
            ['id' => 2, 'nome' => 'Overclock del Controller', 'prezzo' => 20.00, 'descrizione' => 'Riduzione dell\'input lag per controller, aumentando reattività e precisione in Warzone e altri giochi.', 'icona' => 'fa-gamepad'],
            ['id' => 3, 'nome' => 'Configurazione OBS', 'prezzo' => 50.00, 'descrizione' => 'Ottimizzazione OBS per migliorare qualità streaming, grafiche leggere, e separazione tracce audio.', 'icona' => 'fa-video'],
            ['id' => 4, 'nome' => 'Windows Fire', 'prezzo' => 60.00, 'descrizione' => 'Pulizia completa del PC da file e servizi obsoleti per migliorare prestazioni e velocità del sistema.', 'icona' => 'fa-fire'],
            ['id' => 5, 'nome' => 'Ottimizzazione per Warzone', 'prezzo' => 30.00, 'descrizione' => 'Ottimizzazione di Windows per ridurre input lag, aumentare FPS e migliorare stabilità durante Warzone.', 'icona' => 'fa-tachometer-alt'],
            ['id' => 6, 'nome' => 'Configurazione Server Discord', 'prezzo' => 45.00, 'descrizione' => 'Personalizzazione completa del server Discord: design, bot, ruoli, canali e sistema ticket.', 'icona' => 'fa-discord'],
            ['id' => 7, 'nome' => 'Consulenza PC Personalizzata', 'prezzo' => 15.00, 'descrizione' => 'Consulenza per aggiornamenti o costruzione PC, con suggerimenti su componenti e configurazione.', 'icona' => 'fa-desktop'],
            ['id' => 8, 'nome' => 'Formattazione Assistita', 'prezzo' => 40.00, 'descrizione' => 'Formattazione con chiave originale Windows 10 Pro, per un setup pulito e ottimizzato.', 'icona' => 'fa-cogs'],
            ['id' => 9, 'nome' => 'Consulenza Informatica', 'prezzo' => 20.00, 'descrizione' => 'Supporto remoto per problemi software o hardware e ottimizzazione del PC. (30 min)', 'icona' => 'fa-headset'],
            ['id' => 10, 'nome' => 'Chiave Windows 10 Pro', 'prezzo' => 30.00, 'descrizione' => 'Chiave originale di Windows 10 Pro per attivazione sicura del sistema.', 'icona' => 'fa-key'],
            ['id' => 11, 'nome' => 'Installazione Driver Semplice', 'prezzo' => 15.00, 'descrizione' => 'Installazione dei driver più recenti per migliorare prestazioni e compatibilità.', 'icona' => 'fa-download'],
            ['id' => 12, 'nome' => 'Installazione Driver Pulita', 'prezzo' => 30.00, 'descrizione' => 'Rimozione dei vecchi driver e installazione pulita per migliorare la stabilità.', 'icona' => 'fa-broom'],
            ['id' => 13, 'nome' => 'Apertura Porte Modem', 'prezzo' => 40.00, 'descrizione' => 'Configurazione port forwarding per ridurre il lag e migliorare la connessione di rete.', 'icona' => 'fa-network-wired'],
        ];
    }
}

// Funzione per recuperare tutti i PC preassemblati dal database
function getPCPreassemblati() {
    global $conn;
    
    try {
        $stmt = $conn->prepare("SELECT * FROM pc_preassemblati ORDER BY prezzo");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        // Dati di fallback in caso di errore database
        return [
            ['id' => 1, 'nome' => 'PC Gaming Base', 'prezzo' => 899.99, 'specifiche' => 'AMD Ryzen 5 5600X, 16GB DDR4 3200MHz, NVIDIA RTX 3060, 512GB NVMe SSD', 'immagine' => 'img/starter-pc.png'],
            ['id' => 2, 'nome' => 'PC Gaming Avanzato', 'prezzo' => 1499.99, 'specifiche' => 'AMD Ryzen 7 5800X, 32GB DDR4 3600MHz, NVIDIA RTX 3070, 1TB NVMe SSD + 2TB HDD', 'immagine' => 'img/advanced-pc.png'],
            ['id' => 3, 'nome' => 'PC Gaming Pro', 'prezzo' => 2299.99, 'specifiche' => 'AMD Ryzen 9 5900X, 64GB DDR4 3600MHz, NVIDIA RTX 3080, 2TB NVMe SSD + 4TB HDD', 'immagine' => 'img/pro-pc.png']
        ];
    }
}

// Funzione per recuperare tutti i componenti PC dal database
function getComponentiPC($tipo) {
    global $conn;
    
    try {
        $stmt = $conn->prepare("SELECT * FROM componenti_pc WHERE tipo = :tipo ORDER BY prezzo");
        $stmt->bindParam(':tipo', $tipo);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        // Dati di fallback in base al tipo di componente richiesto
        switch($tipo) {
            case 'cpu':
                return [
                    ['id' => 1, 'nome' => 'AMD Ryzen 5 5600X', 'prezzo' => 229.99, 'codice' => 'r5-5600x'],
                    ['id' => 2, 'nome' => 'AMD Ryzen 7 5800X', 'prezzo' => 349.99, 'codice' => 'r7-5800x'],
                    ['id' => 3, 'nome' => 'AMD Ryzen 9 5900X', 'prezzo' => 499.99, 'codice' => 'r9-5900x'],
                    ['id' => 4, 'nome' => 'Intel Core i5-12600K', 'prezzo' => 269.99, 'codice' => 'i5-12600k'],
                    ['id' => 5, 'nome' => 'Intel Core i7-12700K', 'prezzo' => 399.99, 'codice' => 'i7-12700k'],
                    ['id' => 6, 'nome' => 'Intel Core i9-12900K', 'prezzo' => 579.99, 'codice' => 'i9-12900k']
                ];
            case 'gpu':
                return [
                    ['id' => 7, 'nome' => 'NVIDIA RTX 3060', 'prezzo' => 399.99, 'codice' => 'rtx3060'],
                    ['id' => 8, 'nome' => 'NVIDIA RTX 3070', 'prezzo' => 599.99, 'codice' => 'rtx3070'],
                    ['id' => 9, 'nome' => 'NVIDIA RTX 3080', 'prezzo' => 899.99, 'codice' => 'rtx3080'],
                    ['id' => 10, 'nome' => 'NVIDIA RTX 3090', 'prezzo' => 1499.99, 'codice' => 'rtx3090'],
                    ['id' => 11, 'nome' => 'AMD RX 6600 XT', 'prezzo' => 379.99, 'codice' => 'rx6600xt'],
                    ['id' => 12, 'nome' => 'AMD RX 6700 XT', 'prezzo' => 549.99, 'codice' => 'rx6700xt'],
                    ['id' => 13, 'nome' => 'AMD RX 6800 XT', 'prezzo' => 749.99, 'codice' => 'rx6800xt']
                ];
            // Altri casi per ram, storage, case, psu...
            default:
                return [];
        }
    }
}

// Funzione per recuperare i servizi di sviluppo
function getServiziSviluppo() {
    global $conn;
    
    try {
        $stmt = $conn->prepare("SELECT * FROM servizi_sviluppo ORDER BY id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        // Dati di fallback in caso di errore database
        return [
            ['id' => 1, 'nome' => 'Bot Discord', 'prezzo' => 49.99, 'descrizione' => 'Script Python personalizzati per automazione Discord, moderazione e gestione del server', 'icona' => 'fa-discord'],
            ['id' => 2, 'nome' => 'Sviluppo Siti Web', 'prezzo' => 299.99, 'descrizione' => 'Creazione di siti web professionali con design responsive e funzionalità moderne', 'icona' => 'fa-globe'],
            ['id' => 3, 'nome' => 'Progetti Personalizzati', 'prezzo' => 0, 'descrizione' => 'Soluzioni di sviluppo su misura per le tue esigenze specifiche', 'icona' => 'fa-code']
        ];
    }
}

// Formatta il prezzo in formato euro
function formatPrezzo($prezzo) {
    return '€' . number_format($prezzo, 2, ',', '.');
}

// Sanitizza input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Funzione per il carrello
function getCarrello() {
    if (!isset($_SESSION['carrello'])) {
        $_SESSION['carrello'] = [];
    }
    return $_SESSION['carrello'];
}

// Aggiunge un elemento al carrello
function aggiungiAlCarrello($item) {
    if (!isset($_SESSION['carrello'])) {
        $_SESSION['carrello'] = [];
    }
    $_SESSION['carrello'][] = $item;
}

// Rimuove un elemento dal carrello
function rimuoviDalCarrello($index) {
    if (isset($_SESSION['carrello'][$index])) {
        unset($_SESSION['carrello'][$index]);
        $_SESSION['carrello'] = array_values($_SESSION['carrello']); // Reindex array
    }
}

// Ottiene il totale del carrello
function getTotaleCarrello() {
    $totale = 0;
    if (isset($_SESSION['carrello'])) {
        foreach ($_SESSION['carrello'] as $item) {
            $totale += $item['prezzo'];
        }
    }
    return $totale;
}
?>
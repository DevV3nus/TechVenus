<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechVenus - Servizi Informatici Professionali</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="js/main.js" defer></script>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="index.php"><span>Tech</span>Venus</a>
            </div>
            <ul class="nav-links">
                <li><a href="index.php?page=servizi">Servizi</a></li>
                <li><a href="index.php?page=pc-preassemblati">PC Preassemblati</a></li>
                <li><a href="index.php?page=configuratore">Configura PC</a></li>
                <li><a href="index.php?page=sviluppo">Sviluppo</a></li>
                <li><a href="index.php?page=contatti">Contatti</a></li>
            </ul>
            <div class="cart">
                <a href="index.php?page=carrello"><i class="fas fa-shopping-cart"></i> <span id="cart-count">
                    <?php echo count(getCarrello()); ?>
                </span></a>
            </div>
            <div class="hamburger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
    </header>

    <main>
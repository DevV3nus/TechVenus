<section class="hero">
    <div class="hero-content">
        <h1>Benvenuti su TechVenus</h1>
        <p>Servizi informatici professionali per tutte le tue esigenze tecnologiche</p>
        <div class="hero-buttons">
            <a href="index.php?page=servizi" class="btn primary">Vedi Tutti i Servizi</a>
            <a href="index.php?page=configuratore" class="btn secondary">Configura il Tuo PC</a>
        </div>
    </div>
</section>

<section class="services-preview">
    <div class="section-header">
        <h2>Servizi</h2>
        <p>Soluzioni professionali per ottimizzare e migliorare le tue esperienze digitali</p>
    </div>
    <div class="services-grid">
        <?php
        $servizi = getServizi();
        foreach ($servizi as $servizio) {
            echo '<div class="service-card">';
            echo '<i class="service-icon fas ' . $servizio['icona'] . '"></i>';
            echo '<h3>' . $servizio['nome'] . '</h3>';
            echo '<p>' . $servizio['descrizione'] . '</p>';
            echo '<button class="btn secondary service-btn" data-service="' . $servizio['id'] . '">Scopri di Più</button>';
            echo '</div>';
        }
        ?>
    </div>
    <div class="view-all-button">
        <a href="index.php?page=servizi" class="btn primary">Vedi Tutti i Servizi</a>
    </div>
</section>

<section class="prebuilt-preview">
    <div class="section-header">
        <h2>PC Gaming Preassemblati</h2>
        <p>Configurazioni personalizzate pronte all'uso per ogni esigenza</p>
    </div>
    <div class="prebuilt-grid">
        <?php
        $pcs = getPCPreassemblati();
        foreach ($pcs as $pc) {
            echo '<div class="pc-card">';
            echo '<div class="pc-image"><img src="' . $pc['immagine'] . '" alt="' . $pc['nome'] . '"></div>';
            echo '<div class="pc-info">';
            echo '<h3>' . $pc['nome'] . '</h3>';
            echo '<ul class="specs">';
            $specs = explode(',', $pc['specifiche']);
            foreach ($specs as $spec) {
                echo '<li><i class="fas fa-check-circle"></i>' . $spec . '</li>';
            }
            echo '</ul>';
            echo '<div class="price">' . formatPrezzo($pc['prezzo']) . '</div>';
            echo '<button class="btn primary pc-btn" data-pc="' . $pc['id'] . '">Aggiungi al Carrello</button>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</section>

<section class="contact">
    <div class="contact-container">
        <div class="contact-info">
            <h2>Hai bisogno di assistenza?</h2>
            <p>Contattaci per una consulenza personalizzata sui tuoi progetti</p>
            <a href="index.php?page=contatti" class="btn primary">Contattaci Ora</a>
        </div>
    </div>
</section>
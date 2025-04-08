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
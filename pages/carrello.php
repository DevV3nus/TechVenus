<!-- Sezione Carrello -->
<section class="cart-page">
    <div class="section-header">
        <h2>Il Tuo Carrello</h2>
        <p>Rivedi i tuoi prodotti e servizi selezionati</p>
    </div>

    <div class="cart-container">
        <?php
        $carrello = getCarrello();
        if (empty($carrello)) {
            echo '<div class="empty-cart">
                    <div class="empty-cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3>Il tuo carrello è vuoto</h3>
                    <p>Aggiungi prodotti o servizi al tuo carrello per procedere</p>
                    <a href="index.php?page=servizi" class="btn primary">Esplora Servizi</a>
                  </div>';
        } else {
        ?>
        <div class="cart-items">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Prodotto</th>
                        <th>Descrizione</th>
                        <th>Prezzo</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($carrello as $index => $item) {
                        $immagine = !empty($item['immagine']) ? $item['immagine'] : 'img/service-icon.png';
                        $descrizione = !empty($item['specifiche']) ? $item['specifiche'] : $item['descrizione'];
                    ?>
                    <tr>
                        <td class="product-cell">
                            <img src="<?php echo $immagine; ?>" alt="<?php echo $item['nome']; ?>" class="cart-item-image">
                            <h3><?php echo $item['nome']; ?></h3>
                        </td>
                        <td><?php echo $descrizione; ?></td>
                        <td class="price-cell"><?php echo formatPrezzo($item['prezzo']); ?></td>
                        <td class="actions-cell">
                            <form method="post" action="includes/rimuovi_carrello.php">
                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                <button type="submit" class="remove-btn"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="total-label">Totale</td>
                        <td colspan="2" class="total-value"><?php echo formatPrezzo(getTotaleCarrello()); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        
        <div class="cart-actions">
            <a href="index.php" class="btn secondary">Continua lo Shopping</a>
            <a href="index.php?page=checkout" class="btn primary">Procedi al Pagamento</a>
        </div>
        <?php } ?>
    </div>
</section>
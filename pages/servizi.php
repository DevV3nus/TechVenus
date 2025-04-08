<!-- Sezione Servizi Completa -->
<section id="servizi" class="services-full">
    <div class="section-header">
        <h2>I Nostri Servizi</h2>
        <p>Soluzioni professionali per migliorare la tua esperienza informatica</p>
    </div>
    
    <div class="services-grid">
        <?php
        $servizi = getServizi();
        foreach ($servizi as $servizio) {
        ?>
            <div class="service-card" data-aos="fade-up">
                <div class="service-icon">
                    <i class="fas <?php echo $servizio['icona']; ?>"></i>
                </div>
                <h3><?php echo $servizio['nome']; ?></h3>
                <p><?php echo $servizio['descrizione']; ?></p>
                <form method="post" action="includes/aggiungi_carrello.php">
                    <input type="hidden" name="tipo" value="servizio">
                    <input type="hidden" name="id" value="<?php echo $servizio['id']; ?>">
                    <input type="hidden" name="nome" value="<?php echo $servizio['nome']; ?>">
                    <input type="hidden" name="prezzo" value="<?php echo $servizio['prezzo']; ?>">
                    <input type="hidden" name="descrizione" value="<?php echo $servizio['descrizione']; ?>">
                    <button type="submit" class="btn service-btn"><?php echo formatPrezzo($servizio['prezzo']); ?></button>
                </form>
            </div>
        <?php } ?>
    </div>
</section>

<!-- Sezione FAQ -->
<section class="faq-section">
    <div class="section-header">
        <h2>Domande Frequenti</h2>
        <p>Risposte alle domande più comuni sui nostri servizi</p>
    </div>

    <div class="faq-container">
        <div class="faq-item" data-aos="fade-up">
            <div class="faq-question">
                <h3>Come funziona l'ottimizzazione audio per Warzone?</h3>
                <span class="faq-toggle"><i class="fas fa-plus"></i></span>
            </div>
            <div class="faq-answer">
                <p>Il nostro servizio di ottimizzazione audio per Warzone include la regolazione dei profili audio, l'ottimizzazione dell'equalizzatore e la configurazione di software specializzati per migliorare la rilevazione di passi e spari. Il processo è personalizzato in base al tuo hardware e alle tue preferenze.</p>
            </div>
        </div>

        <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
            <div class="faq-question">
                <h3>Cosa include il servizio Windows Fire?</h3>
                <span class="faq-toggle"><i class="fas fa-plus"></i></span>
            </div>
            <div class="faq-answer">
                <p>Windows Fire include una pulizia approfondita del sistema operativo con rimozione di file temporanei, ottimizzazione del registro di sistema, disabilitazione di servizi non necessari, configurazione delle impostazioni di Windows per le prestazioni e ottimizzazione della rete. Il risultato è un PC più veloce e reattivo.</p>
            </div>
        </div>

        <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
            <div class="faq-question">
                <h3>Le chiavi Windows offerte sono originali?</h3>
                <span class="faq-toggle"><i class="fas fa-plus"></i></span>
            </div>
            <div class="faq-answer">
                <p>Sì, tutte le nostre chiavi Windows 10 Pro sono originali e legittime. Forniamo anche assistenza completa durante il processo di attivazione per garantire che tutto funzioni correttamente.</p>
            </div>
        </div>

        <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
            <div class="faq-question">
                <h3>Come si svolge la consulenza informatica?</h3>
                <span class="faq-toggle"><i class="fas fa-plus"></i></span>
            </div>
            <div class="faq-answer">
                <p>La consulenza informatica viene svolta tramite una sessione di assistenza remota di 30 minuti. Durante questo tempo, posso aiutarti con problemi software, ottimizzazioni del sistema, configurazioni hardware e rispondere a qualsiasi domanda tecnica. Se necessario, è possibile estendere la sessione con una tariffa oraria.</p>
            </div>
        </div>
    </div>
</section>
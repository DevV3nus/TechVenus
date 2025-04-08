<!-- Sezione Configuratore PC -->
<section id="configuratore" class="custom-pc">
    <div class="section-header">
        <h2>Configura il Tuo PC</h2>
        <p>Crea il sistema perfetto con il nostro configuratore guidato</p>
    </div>

    <div class="custom-builder">
        <div class="pc-preview">
            <div id="pc-case-3d">
                <!-- Il modello 3D sarà renderizzato qui con WebGL/Three.js -->
            </div>
            <div id="pc-case-fallback">
                <img src="img/custom-pc-case.png" alt="Case PC" class="pc-case-image">
                <div class="component-highlights" id="component-highlights">
                    <!-- Qui verranno mostrati i dettagli sui componenti selezionati -->
                </div>
            </div>
        </div>
        
        <div class="component-selector">
            <h3>Seleziona i Componenti</h3>
            <form id="custom-pc-form" method="post" action="includes/aggiungi_carrello.php">
                <input type="hidden" name="tipo" value="pc_custom">
                <input type="hidden" name="nome" value="PC Personalizzato">
                <input type="hidden" id="pc-total-hidden" name="prezzo" value="0">
                <input type="hidden" id="pc-specs-hidden" name="specifiche" value="">
                <input type="hidden" name="immagine" value="img/custom-pc.png">
                
                <div class="component-group">
                    <label for="cpu">Processore (CPU)</label>
                    <select id="cpu" name="cpu" class="component-select" required>
                        <option value="">Scegli un processore</option>
                        <?php
                        $cpus = getComponentiPC('cpu');
                        foreach ($cpus as $cpu) {
                            echo '<option value="' . $cpu['codice'] . '" data-price="' . $cpu['prezzo'] . '" data-name="' . $cpu['nome'] . '">' . $cpu['nome'] . ' - ' . formatPrezzo($cpu['prezzo']) . '</option>';
                        }
                        ?>
                    </select>
                </div>
                
                <div class="component-group">
                    <label for="gpu">Scheda Grafica (GPU)</label>
                    <select id="gpu" name="gpu" class="component-select" required>
                        <option value="">Scegli una scheda grafica</option>
                        <?php
                        $gpus = getComponentiPC('gpu');
                        foreach ($gpus as $gpu) {
                            echo '<option value="' . $gpu['codice'] . '" data-price="' . $gpu['prezzo'] . '" data-name="' . $gpu['nome'] . '">' . $gpu['nome'] . ' - ' . formatPrezzo($gpu['prezzo']) . '</option>';
                        }
                        ?>
                    </select>
                </div>
                
                <div class="component-group">
                    <label for="ram">Memoria (RAM)</label>
                    <select id="ram" name="ram" class="component-select" required>
                        <option value="">Scegli la RAM</option>
                        <option value="16gb-3200" data-price="89.99" data-name="16GB DDR4 3200MHz">16GB DDR4 3200MHz - €89,99</option>
                        <option value="32gb-3200" data-price="169.99" data-name="32GB DDR4 3200MHz">32GB DDR4 3200MHz - €169,99</option>
                        <option value="32gb-3600" data-price="199.99" data-name="32GB DDR4 3600MHz">32GB DDR4 3600MHz - €199,99</option>
                        <option value="64gb-3600" data-price="349.99" data-name="64GB DDR4 3600MHz">64GB DDR4 3600MHz - €349,99</option>
                    </select>
                </div>
                
                <div class="component-group">
                    <label for="storage">Archiviazione</label>
                    <select id="storage" name="storage" class="component-select" required>
                        <option value="">Scegli l'archiviazione</option>
                        <option value="500gb-nvme" data-price="79.99" data-name="500GB NVMe SSD">500GB NVMe SSD - €79,99</option>
                        <option value="1tb-nvme" data-price="129.99" data-name="1TB NVMe SSD">1TB NVMe SSD - €129,99</option>
                        <option value="2tb-nvme" data-price="229.99" data-name="2TB NVMe SSD">2TB NVMe SSD - €229,99</option>
                        <option value="combo1" data-price="179.99" data-name="1TB NVMe + 2TB HDD">1TB NVMe + 2TB HDD - €179,99</option>
                        <option value="combo2" data-price="329.99" data-name="2TB NVMe + 4TB HDD">2TB NVMe + 4TB HDD - €329,99</option>
                    </select>
                </div>
                
                <div class="component-group">
                    <label for="case">Case</label>
                    <select id="case" name="case" class="component-select" required>
                        <option value="">Scegli un case</option>
                        <option value="corsair-4000d" data-price="99.99" data-name="Corsair 4000D Airflow">Corsair 4000D Airflow - €99,99</option>
                        <option value="nzxt-h510" data-price="79.99" data-name="NZXT H510">NZXT H510 - €79,99</option>
                        <option value="lian-li-o11" data-price="149.99" data-name="Lian Li O11 Dynamic">Lian Li O11 Dynamic - €149,99</option>
                        <option value="phanteks-p500a" data-price="109.99" data-name="Phanteks P500A">Phanteks P500A - €109,99</option>
                    </select>
                </div>
                
                <div class="component-group">
                    <label for="psu">Alimentatore (PSU)</label>
                    <select id="psu" name="psu" class="component-select" required>
                        <option value="">Scegli un alimentatore</option>
                        <option value="650w-gold" data-price="89.99" data-name="650W 80+ Gold">650W 80+ Gold - €89,99</option>
                        <option value="750w-gold" data-price="109.99" data-name="750W 80+ Gold">750W 80+ Gold - €109,99</option>
                        <option value="850w-gold" data-price="139.99" data-name="850W 80+ Gold">850W 80+ Gold - €139,99</option>
                        <option value="1000w-plat" data-price="199.99" data-name="1000W 80+ Platinum">1000W 80+ Platinum - €199,99</option>
                    </select>
                </div>
                
                <div class="total-price">
                    <h3>Totale: <span id="pc-total-price">€0,00</span></h3>
                    <button type="submit" class="btn primary" id="add-custom-pc">Aggiungi al Carrello</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Sezione Consigli -->
<section class="pc-tips">
    <div class="section-header">
        <h2>Consigli per la Configurazione</h2>
        <p>Indicazioni utili per assemblare il PC perfetto</p>
    </div>

    <div class="tips-grid">
        <div class="tip-card" data-aos="fade-up">
            <div class="tip-icon">
                <i class="fas fa-gamepad"></i>
            </div>
            <h3>Gaming</h3>
            <p>Per il gaming, concentrarsi su una GPU potente e un processore con prestazioni elevate in single-core. 16GB di RAM sono sufficienti per la maggior parte dei giochi moderni.</p>
        </div>

        <div class="tip-card" data-aos="fade-up" data-aos-delay="100">
            <div class="tip-icon">
                <i class="fas fa-video"></i>
            </div>
            <h3>Streaming</h3>
            <p>Per lo streaming, è consigliabile un processore con molti core, almeno 32GB di RAM e un'ottima connessione di rete. Una GPU NVIDIA per sfruttare l'encoder NVENC è un vantaggio.</p>
        </div>

        <div class="tip-card" data-aos="fade-up" data-aos-delay="200">
            <div class="tip-icon">
                <i class="fas fa-laptop-code"></i>
            </div>
            <h3>Produttività</h3>
            <p>Per lavori creativi e sviluppo, optare per più memoria RAM, storage veloce e un processore multi-core. Valutare anche una scheda grafica professionale se necessario.</p>
        </div>
    </div>
</section>

<!-- Script per la visualizzazione 3D del case e dei componenti -->
<script type="module">
    import * as THREE from 'https://cdn.jsdelivr.net/npm/three@0.132.2/build/three.module.js';
    import { OrbitControls } from 'https://cdn.jsdelivr.net/npm/three@0.132.2/examples/jsm/controls/OrbitControls.js';
    import { GLTFLoader } from 'https://cdn.jsdelivr.net/npm/three@0.132.2/examples/jsm/loaders/GLTFLoader.js';

    // Inizializza la scena 3D
    function initPC3D() {
        // Contenitore per la scena
        const container = document.getElementById('pc-case-3d');
        
        // Crea la scena, la camera e il renderer
        const scene = new THREE.Scene();
        scene.background = new THREE.Color(0xf6f6f6);
        
        const camera = new THREE.PerspectiveCamera(45, container.clientWidth / container.clientHeight, 0.1, 1000);
        camera.position.set(0, 0.5, 2);
        
        const renderer = new THREE.WebGLRenderer({ antialias: true });
        renderer.setSize(container.clientWidth, container.clientHeight);
        renderer.setPixelRatio(window.devicePixelRatio);
        renderer.outputEncoding = THREE.sRGBEncoding;
        container.appendChild(renderer.domElement);
        
        // Aggiungi i controlli per orbita
        const controls = new OrbitControls(camera, renderer.domElement);
        controls.enableDamping = true;
        controls.dampingFactor = 0.05;
        controls.minDistance = 1.5;
        controls.maxDistance = 4;
        
        // Aggiungi la luce
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
        scene.add(ambientLight);
        
        const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
        directionalLight.position.set(1, 1, 1);
        scene.add(directionalLight);
        
        // Carica il modello 3D del case
        const loader = new GLTFLoader();
        let pcCase;
        
        try {
            // Prova a caricare il modello 3D
            loader.load(
                'models/pc_case.glb',
                function(gltf) {
                    pcCase = gltf.scene;
                    pcCase.scale.set(1, 1, 1);
                    scene.add(pcCase);
                    
                    // Nascondi il fallback immagine
                    document.getElementById('pc-case-fallback').style.display = 'none';
                },
                undefined,
                function(error) {
                    console.error('Errore nel caricamento del modello 3D:', error);
                    // Mostra il fallback
                    document.getElementById('pc-case-fallback').style.display = 'flex';
                    document.getElementById('pc-case-3d').style.display = 'none';
                }
            );
        } catch (error) {
            console.error('Errore nell\'inizializzazione 3D:', error);
            // Mostra il fallback
            document.getElementById('pc-case-fallback').style.display = 'flex';
            document.getElementById('pc-case-3d').style.display = 'none';
        }
        
        // Funzione di animazione
        function animate() {
            requestAnimationFrame(animate);
            controls.update();
            renderer.render(scene, camera);
        }
        
        animate();
        
        // Gestisci il ridimensionamento della finestra
        window.addEventListener('resize', onWindowResize);
        
        function onWindowResize() {
            camera.aspect = container.clientWidth / container.clientHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(container.clientWidth, container.clientHeight);
        }
    }

    // Inizializza la scena 3D o mostra il fallback
    try {
        initPC3D();
    } catch (error) {
        console.error('Impossibile inizializzare la visualizzazione 3D:', error);
        document.getElementById('pc-case-fallback').style.display = 'flex';
        document.getElementById('pc-case-3d').style.display = 'none';
    }
</script>

<script>
    // Script per il calcolatore del prezzo totale e la gestione del componente selezionato
    document.addEventListener('DOMContentLoaded', function() {
        const componentSelects = document.querySelectorAll('.component-select');
        const pcTotalPrice = document.getElementById('pc-total-price');
        const pcTotalHidden = document.getElementById('pc-total-hidden');
        const pcSpecsHidden = document.getElementById('pc-specs-hidden');
        const componentHighlights = document.getElementById('component-highlights');
        
        let pcComponents = {
            cpu: { name: '', price: 0 },
            gpu: { name: '', price: 0 },
            ram: { name: '', price: 0 },
            storage: { name: '', price: 0 },
            case: { name: '', price: 0 },
            psu: { name: '', price: 0 }
        };
        
        componentSelects.forEach(select => {
            select.addEventListener('change', () => {
                const componentType = select.id;
                const selectedOption = select.options[select.selectedIndex];
                
                if (selectedOption.value) {
                    pcComponents[componentType] = {
                        name: selectedOption.getAttribute('data-name'),
                        price: parseFloat(selectedOption.getAttribute('data-price'))
                    };
                } else {
                    pcComponents[componentType] = { name: '', price: 0 };
                }
                
                updateTotalPrice();
                updateComponentHighlights();
                updateHiddenFields();
            });
        });
        
        function updateTotalPrice() {
            let total = 0;
            for (const key in pcComponents) {
                total += pcComponents[key].price;
            }
            pcTotalPrice.textContent = formatPrice(total);
            pcTotalHidden.value = total.toFixed(2);
        }
        
        function updateComponentHighlights() {
            let html = '';
            
            for (const key in pcComponents) {
                if (pcComponents[key].name) {
                    let icon;
                    switch(key) {
                        case 'cpu': icon = 'fa-microchip'; break;
                        case 'gpu': icon = 'fa-tv'; break;
                        case 'ram': icon = 'fa-memory'; break;
                        case 'storage': icon = 'fa-hdd'; break;
                        case 'case': icon = 'fa-desktop'; break;
                        case 'psu': icon = 'fa-bolt'; break;
                        default: icon = 'fa-cog';
                    }
                    
                    html += `<div class="component-highlight">
                                <i class="fas ${icon}"></i>
                                <span>${pcComponents[key].name}</span>
                            </div>`;
                }
            }
            
            componentHighlights.innerHTML = html;
        }
        
        function updateHiddenFields() {
            let specs = [];
            for (const key in pcComponents) {
                if (pcComponents[key].name) {
                    specs.push(pcComponents[key].name);
                }
            }
            pcSpecsHidden.value = specs.join(', ');
        }
        
        function formatPrice(price) {
            return '€' + price.toFixed(2).replace('.', ',');
        }
    });
</script>
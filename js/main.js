// DOM Elements
const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');
const navbar = document.querySelector('.navbar');
const cartModal = document.getElementById('cart-modal');
const closeModal = document.querySelector('.close-modal');
const cartLink = document.querySelector('.cart a');
const serviceBtns = document.querySelectorAll('.service-btn');
const pcBtns = document.querySelectorAll('.pc-btn');
const addCustomPcBtn = document.getElementById('add-custom-pc');
const cartItemsContainer = document.getElementById('cart-items-container');
const cartCount = document.getElementById('cart-count');
const cartTotalPrice = document.getElementById('cart-total-price');
const contactForm = document.querySelector('.contact-form');
const componentSelects = document.querySelectorAll('.component-select');
const pcTotalPrice = document.getElementById('pc-total-price');

// Global Variables
let cart = [];
let pcComponents = {
    cpu: { name: '', price: 0 },
    gpu: { name: '', price: 0 },
    ram: { name: '', price: 0 },
    storage: { name: '', price: 0 },
    case: { name: '', price: 0 },
    psu: { name: '', price: 0 }
};

// Navbar Functionality
hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    hamburger.classList.toggle('active');
});

window.addEventListener('scroll', () => {
    if (window.scrollY > 10) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Service Data
const services = {
    'formatting': {
        name: 'Formattazione Assistita',
        price: 40.00,
        description: 'Formattazione con chiave originale Windows 10 Pro, per un setup pulito e ottimizzato.',
        icon: 'fa-cogs'
    },
    'fps-boost': {
        name: 'Overclock del Controller',
        price: 20.00,
        description: 'Riduzione dell\'input lag per controller, aumentando reattività e precisione in Warzone e altri giochi.',
        icon: 'fa-tachometer-alt'
    },
    'windows-opt': {
        name: 'Windows Fire',
        price: 60.00,
        description: 'Pulizia completa del PC da file e servizi obsoleti per migliorare prestazioni e velocità del sistema.',
        icon: 'fa-fire'
    },
    'latency': {
        name: 'Ottimizzazione per Warzone',
        price: 30.00,
        description: 'Ottimizzazione di Windows per ridurre input lag, aumentare FPS e migliorare stabilità durante Warzone.',
        icon: 'fa-tachometer-alt'
    },
    'windows-keys': {
        name: 'Chiave Windows 10 Pro',
        price: 30.00,
        description: 'Chiave originale di Windows 10 Pro per attivazione sicura del sistema.',
        icon: 'fa-key'
    }
};

// PC Data
const prebuiltPCs = {
    'starter': {
        name: 'PC Gaming Base',
        price: 899.99,
        specs: 'AMD Ryzen 5 5600X, 16GB RAM, RTX 3060, 512GB SSD',
        image: 'img/starter-pc.png'
    },
    'advanced': {
        name: 'PC Gaming Avanzato',
        price: 1499.99,
        specs: 'AMD Ryzen 7 5800X, 32GB RAM, RTX 3070, 1TB SSD + 2TB HDD',
        image: 'img/advanced-pc.png'
    },
    'pro': {
        name: 'PC Gaming Pro',
        price: 2299.99,
        specs: 'AMD Ryzen 9 5900X, 64GB RAM, RTX 3080, 2TB SSD + 4TB HDD',
        image: 'img/pro-pc.png'
    }
};

// Component Data
const componentData = {
    cpu: {
        'r5-5600x': { name: 'AMD Ryzen 5 5600X', price: 229.99 },
        'r7-5800x': { name: 'AMD Ryzen 7 5800X', price: 349.99 },
        'r9-5900x': { name: 'AMD Ryzen 9 5900X', price: 499.99 },
        'i5-12600k': { name: 'Intel Core i5-12600K', price: 269.99 },
        'i7-12700k': { name: 'Intel Core i7-12700K', price: 399.99 },
        'i9-12900k': { name: 'Intel Core i9-12900K', price: 579.99 }
    },
    gpu: {
        'rtx3060': { name: 'NVIDIA RTX 3060', price: 399.99 },
        'rtx3070': { name: 'NVIDIA RTX 3070', price: 599.99 },
        'rtx3080': { name: 'NVIDIA RTX 3080', price: 899.99 },
        'rtx3090': { name: 'NVIDIA RTX 3090', price: 1499.99 },
        'rx6600xt': { name: 'AMD RX 6600 XT', price: 379.99 },
        'rx6700xt': { name: 'AMD RX 6700 XT', price: 549.99 },
        'rx6800xt': { name: 'AMD RX 6800 XT', price: 749.99 }
    },
    ram: {
        '16gb-3200': { name: '16GB DDR4 3200MHz', price: 89.99 },
        '32gb-3200': { name: '32GB DDR4 3200MHz', price: 169.99 },
        '32gb-3600': { name: '32GB DDR4 3600MHz', price: 199.99 },
        '64gb-3600': { name: '64GB DDR4 3600MHz', price: 349.99 }
    },
    storage: {
        '500gb-nvme': { name: '500GB NVMe SSD', price: 79.99 },
        '1tb-nvme': { name: '1TB NVMe SSD', price: 129.99 },
        '2tb-nvme': { name: '2TB NVMe SSD', price: 229.99 },
        'combo1': { name: '1TB NVMe + 2TB HDD', price: 179.99 },
        'combo2': { name: '2TB NVMe + 4TB HDD', price: 329.99 }
    },
    case: {
        'corsair-4000d': { name: 'Corsair 4000D Airflow', price: 99.99 },
        'nzxt-h510': { name: 'NZXT H510', price: 79.99 },
        'lian-li-o11': { name: 'Lian Li O11 Dynamic', price: 149.99 },
        'phanteks-p500a': { name: 'Phanteks P500A', price: 109.99 }
    },
    psu: {
        '650w-gold': { name: '650W 80+ Gold', price: 89.99 },
        '750w-gold': { name: '750W 80+ Gold', price: 109.99 },
        '850w-gold': { name: '850W 80+ Gold', price: 139.99 },
        '1000w-plat': { name: '1000W 80+ Platinum', price: 199.99 }
    }
};

// Cart Functionality
function openCart() {
    cartModal.style.display = 'block';
    document.body.style.overflow = 'hidden';
    updateCartDisplay();
}

function closeCart() {
    cartModal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

cartLink.addEventListener('click', (e) => {
    e.preventDefault();
    openCart();
});

closeModal.addEventListener('click', closeCart);

window.addEventListener('click', (e) => {
    if (e.target === cartModal) {
        closeCart();
    }
});

function addToCart(item) {
    cart.push(item);
    updateCartCount();
    updateCartDisplay();
    
    // Show feedback
    showNotification(`${item.name} aggiunto al carrello!`);
}

function removeFromCart(index) {
    cart.splice(index, 1);
    updateCartCount();
    updateCartDisplay();
}

function updateCartCount() {
    cartCount.textContent = cart.length;
}

function updateCartDisplay() {
    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p class="empty-cart-message">Il tuo carrello è vuoto</p>';
        cartTotalPrice.textContent = '€0.00';
        return;
    }

    let cartHTML = '';
    let total = 0;

    cart.forEach((item, index) => {
        cartHTML += `
            <div class="cart-item">
                <img src="${item.image || 'img/service-icon.png'}" alt="${item.name}" class="cart-item-image">
                <div class="cart-item-details">
                    <h3>${item.name}</h3>
                    <p>${item.description || item.specs || ''}</p>
                    <span class="remove-item" data-index="${index}">Rimuovi</span>
                </div>
                <div class="cart-item-price">€${item.price.toFixed(2)}</div>
            </div>
        `;
        total += item.price;
    });

    cartItemsContainer.innerHTML = cartHTML;
    cartTotalPrice.textContent = `€${total.toFixed(2)}`;

    // Add remove functionality
    const removeButtons = document.querySelectorAll('.remove-item');
    removeButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const index = parseInt(btn.dataset.index);
            removeFromCart(index);
        });
    });
}

// Service Buttons
serviceBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        const serviceId = btn.dataset.service;
        const service = services[serviceId];
        
        if (service) {
            addToCart({
                name: service.name,
                price: service.price,
                description: service.description,
                image: 'img/service-icon.png'
            });
        }
    });
});

// Prebuilt PC Buttons
pcBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        const pcId = btn.dataset.pc;
        const pc = prebuiltPCs[pcId];
        
        if (pc) {
            addToCart({
                name: pc.name,
                price: pc.price,
                specs: pc.specs,
                image: pc.image
            });
        }
    });
});

// Custom PC Builder
componentSelects.forEach(select => {
    select.addEventListener('change', () => {
        const componentType = select.id;
        const selectedValue = select.value;
        
        if (selectedValue && componentData[componentType] && componentData[componentType][selectedValue]) {
            const component = componentData[componentType][selectedValue];
            pcComponents[componentType] = { 
                name: component.name, 
                price: component.price 
            };
        } else {
            pcComponents[componentType] = { name: '', price: 0 };
        }
        
        updateCustomPCTotal();
        updatePC3DModel();
    });
});

function updateCustomPCTotal() {
    let total = 0;
    for (const key in pcComponents) {
        total += pcComponents[key].price;
    }
    pcTotalPrice.textContent = `€${total.toFixed(2)}`;
}

// Add custom PC to cart
addCustomPcBtn.addEventListener('click', (e) => {
    e.preventDefault();
    
    // Check if all components are selected
    let allComponentsSelected = true;
    let missingComponents = [];
    
    for (const key in pcComponents) {
        if (!pcComponents[key].name) {
            allComponentsSelected = false;
            missingComponents.push(key.toUpperCase());
        }
    }
    
    if (!allComponentsSelected) {
        alert(`Seleziona tutti i componenti. Mancano: ${missingComponents.join(', ')}`);
        return;
    }
    
    // Calculate total price
    let totalPrice = 0;
    let specs = [];
    
    for (const key in pcComponents) {
        totalPrice += pcComponents[key].price;
        specs.push(pcComponents[key].name);
    }
    
    // Add to cart
    addToCart({
        name: 'PC Personalizzato',
        price: totalPrice,
        specs: specs.join(', '),
        image: 'img/custom-pc.png'
    });
});

// Update 3D PC Model (placeholder for Three.js implementation)
function updatePC3DModel() {
    // This would be implemented with Three.js to show a 3D model
    console.log('3D model would update with:', pcComponents);
}

// Contact Form
contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;
    
    if (name && email && message) {
        // In a real app, this would send the form data to a server
        alert('Grazie per il tuo messaggio! Ti risponderemo al più presto.');
        contactForm.reset();
    } else {
        alert('Compila tutti i campi obbligatori.');
    }
});

// Notification System
function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-check-circle"></i>
            <p>${message}</p>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Add styles dynamically
    notification.style.position = 'fixed';
    notification.style.top = '20px';
    notification.style.right = '20px';
    notification.style.backgroundColor = '#4CAF50';
    notification.style.color = '#fff';
    notification.style.padding = '10px 20px';
    notification.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.1)';
    notification.style.borderRadius = '5px';
    notification.style.zIndex = '1000';
    
    // Remove notification after 3 seconds
    setTimeout(() => {
        notification.remove();
    }, 3000);
}
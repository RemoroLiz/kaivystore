// Fungsi utama untuk render website
async function renderWebsiteData() {
    try {
        // Load semua data secara paralel
        const [sesi, info, produk, footer] = await Promise.all([
            db.loadSesi(),
            db.loadInfo(),
            db.loadProduk(),
            db.loadFooter()
        ]);

        // Update metadata dan judul
        updatePageMetadata(sesi);
        
        // Render komponen
        renderNavigation();
        renderInfoSection(info);
        renderProdukSection(produk);
        renderFooter(footer);
        
    } catch (error) {
        console.error('Error rendering website:', error);
        showErrorState();
    }
}

function updatePageMetadata(sesi) {
    if (sesi.website_title) {
        document.title = sesi.website_title;
        document.getElementById('pageTitle').textContent = sesi.website_title;
        document.getElementById('metaTitle').setAttribute('content', sesi.website_title);
    }
    if (sesi.website_desc) {
        document.getElementById('metaDescription').setAttribute('content', sesi.website_desc);
    }
}

function renderInfoSection(infoData) {
    const container = document.getElementById('infoContainer');
    if (!container || !infoData.length) return;

    let html = '';
    infoData.forEach(item => {
        if (!item.nama || !item.link) return;
        
        html += `
            <div class="col-lg-6 col-12 mt-3">
                <div class="card bg-dark shadow rounded" style="max-width: 540px">
                    <div class="row g-0">
                        <div class="col-4 ps-4 m-0 mb-2">
                            <img src="${item.logo_link || 'assets/img/default-logo.png'}" 
                                 class="rounded-img-buy size-img-buy-v mt-2" 
                                 alt="${item.nama}-icon"
                                 onerror="this.src='assets/img/default-logo.png'" />
                        </div>
                        <div class="col">
                            <div class="card-body text-start">
                                <small class="text-sm">${item.nama}</small>
                                <br />
                                <small class="text-sm text-muted">${item.deskripsi || ''}</small>
                            </div>
                        </div>
                        <div class="col justify-content-center my-auto">
                            <a class="btn btn-topup float-end rounded-pill m-2 btn-sm" 
                               href="${item.link}" target="_blank">
                                ${item.nama.includes('WhatsApp') ? 'Admin 1' : 'View'}
                            </a>
                            ${item.link2 ? `
                            <a class="btn btn-topup float-end rounded-pill m-2 btn-sm" 
                               href="${item.link2}" target="_blank">
                                Admin 2
                            </a>` : ''}
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    container.innerHTML = html;
}

function renderProdukSection(produkData) {
    const container = document.getElementById('productsContainer');
    if (!container || !produkData.length) return;

    let html = '';
    produkData.forEach(item => {
        if (!item.nama) return;
        
        const slug = item.slug || item.nama.toLowerCase().replace(/\s+/g, '-');
        const logoUrl = item.logo_link || 'assets/img/default-product.png';
        
        html += `
            <div class="col mt-5 mb-5">
                <div class="card bg-dark shadow h-100 rounded product-card" 
                     style="max-width: 100%; cursor: pointer" 
                     data-slug="${slug}">
                    <img src="${logoUrl}" 
                         class="card-img-top rounded-img-buy size-img-buy position-absolute top-4 start-50 translate-middle" 
                         alt="${item.nama}-icon"
                         onerror="this.src='assets/img/default-product.png'" />
                    <div class="card-body text-center mt-5 mb-0">
                        <small class="text-sm" style="font-size: 12px"><b>${item.nama}</b></small><br />
                        <small class="text-sm text-muted" style="font-size: 11px">${item.deskripsi || ''}</small>
                    </div>
                    <div class="justify-content-center">
                        <button class="btn btn-topup float-end rounded-pill m-2 btn-sm order-btn" 
                                data-product="${item.nama}" 
                                data-slug="${slug}">
                            Top Up
                        </button>
                    </div>
                </div>
            </div>
        `;
    });

    container.innerHTML = html;
    
    // Add event listeners
    attachProductEventListeners();
}

function attachProductEventListeners() {
    // Product card click
    document.querySelectorAll('.product-card').forEach(card => {
        card.addEventListener('click', function(e) {
            if (!e.target.classList.contains('order-btn')) {
                const slug = this.getAttribute('data-slug');
                window.location.href = `product.html?game=${slug}`;
            }
        });
    });
    
    // Order button click
    document.querySelectorAll('.order-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const product = this.getAttribute('data-product');
            const slug = this.getAttribute('data-slug');
            openOrderModal(product, slug);
        });
    });
}

function renderFooter(footerData) {
    const footer = document.getElementById('footerContainer');
    if (!footer || !footerData.nama_toko) return;

    const logoUrl = footerData.logo_link || 'assets/img/settings/logokaivy.png';
    
    footer.innerHTML = `
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <img src="${logoUrl}" alt="LOGO" 
                         style="float: left; margin-left: 2%; height: 40px; width: 40px" 
                         class="bi me-2"
                         onerror="this.src='assets/img/settings/logokaivy.png'" />
                    <h5 class="text-uppercase mt-2" style="margin: 0">${footerData.nama_toko}</h5>
                    <div class="mt-2">
                        <p>${footerData.deskripsi || ''}</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h5 class="mt-2">Menu</h5>
                    <div class="mt-2">
                        <ul class="nav flex-column">
                            <li class="nav-item"><a href="index.html" class="nav-link text-white active"><i class="fas fa-angle-right text-yellow"></i> Home</a></li>
                            <li class="nav-item"><a href="price-list.html" class="nav-link text-white"><i class="fas fa-angle-right text-yellow"></i> Price List</a></li>
                            <li class="nav-item"><a href="contact.html" class="nav-link text-white"><i class="fas fa-angle-right text-yellow"></i> Contact us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-2">
            <div class="row" id="footer-credit" style="background: #181b1f">
                <div class="col">
                    <div class="container mt-2 mb-2 text-center">
                        <small>Copyright &copy; by <a href="index.html" class="text-white">${footerData.nama_toko}</a></small>
                    </div>
                </div>
            </div>
        </div>
    `;
}

function showErrorState() {
    const containers = ['infoContainer', 'productsContainer', 'footerContainer'];
    containers.forEach(containerId => {
        const container = document.getElementById(containerId);
        if (container) {
            container.innerHTML = '<div class="alert alert-warning text-center">Data sedang tidak dapat diakses. Silakan refresh halaman.</div>';
        }
    });
}

// Order Modal Function
function openOrderModal(productName, productSlug) {
    // Implementasi modal order akan dijelaskan di bagian berikutnya
    console.log('Order for:', productName, productSlug);
    alert(`Fitur order untuk ${productName} akan segera tersedia!`);
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    renderWebsiteData();
    
    // Refresh data every 5 minutes
    setInterval(renderWebsiteData, 300000);
});

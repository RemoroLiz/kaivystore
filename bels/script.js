// Fungsi untuk memformat angka ke Rupiah
function formatRupiah(angka) {
  if (!angka) return "Rp 0";
  const number_string = angka.toString();
  const split = number_string.split(",");
  const sisa = split[0].length % 3;
  let rupiah = split[0].substr(0, sisa);
  const ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  if (ribuan) {
    const separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] !== undefined ? rupiah + "," + split[1] : rupiah;
  return "Rp " + rupiah;
}

// Fungsi untuk memproses URL gambar dari berbagai sumber
function processImageUrl(url) {
  if (!url)
    return "https://via.placeholder.com/300x200?text=Gambar+Tidak+Tersedia";

  // Jika URL Google Drive (berisi /file/d/ atau /open?id=)
  if (url.includes("drive.google.com")) {
    // Format 1: https://drive.google.com/file/d/FILE_ID/view
    // Format 2: https://drive.google.com/open?id=FILE_ID
    const match = url.match(/\/d\/([^\/]+)/) || url.match(/id=([^&]+)/);
    if (match && match[1]) {
      return `https://drive.google.com/thumbnail?id=${match[1]}&sz=w500`;
    }
  }

  // Jika URL sudah langsung ke gambar
  if (url.match(/\.(jpeg|jpg|gif|png|webp)$/)) {
    return url;
  }

  // Default placeholder
  return "https://via.placeholder.com/300x200?text=Gambar+Tidak+Tersedia";
}

// Fungsi untuk mengambil data dari Google Sheets
async function fetchSheetData(sheetGid) {
  try {
    const url = `${SHEETS_BASE_URL}&tqx=out:json&gid=${sheetGid}`;
    const response = await fetch(url);
    const text = await response.text();

    // Parse response dari Google Sheets
    const data = JSON.parse(text.substring(47).slice(0, -2));

    return data.table.rows.map((row) => {
      return row.c.map((cell) =>
        cell ? (cell.v !== null && cell.v !== undefined ? cell.v : "") : ""
      );
    });
  } catch (error) {
    console.error("Error fetching sheet data:", error);
    return [];
  }
}

// Fungsi untuk mengirim pesan WhatsApp
function sendWhatsAppMessage(product) {
  // Dapatkan nomor WhatsApp dari footer
  const whatsappLink = document.getElementById("whatsapp-link");
  let whatsappUrl = "#";

  if (
    whatsappLink &&
    whatsappLink.href &&
    whatsappLink.href !== "#" &&
    whatsappLink.href !== ""
  ) {
    whatsappUrl = whatsappLink.href;
  } else {
    // Fallback: coba ekstrak dari teks jika format berbeda
    const phoneElement = document.getElementById("footer-phone");
    if (phoneElement) {
      const phoneNumber = phoneElement.textContent.replace(/\D/g, "");
      whatsappUrl = `https://wa.me/${phoneNumber}`;
    }
  }

  if (whatsappUrl === "#") {
    alert("Nomor WhatsApp tidak ditemukan. Silakan hubungi admin.");
    return;
  }

  // Format pesan
  const message = `Halo min, saya ingin pesan produk:\n\nNama: ${
    product.name
  }\nDeskripsi: ${product.description}\nHarga: ${formatRupiah(product.price)}`;

  // Encode pesan untuk URL
  const encodedMessage = encodeURIComponent(message);

  // Redirect ke WhatsApp
  window.open(`${whatsappUrl}?text=${encodedMessage}`, "_blank");
}

// Fungsi untuk memuat data header
async function loadHeaderData() {
  const data = await fetchSheetData(HEADER_SHEET_GID);
  console.log("Header data:", data);

  if (data.length > 1) {
    // Lewati baris header (asumsi baris pertama adalah header)
    const headerData = data[1];
    if (headerData.length >= 3) {
      document.getElementById("logo").src = processImageUrl(
        headerData[1] || ""
      );
      document.getElementById("logo").alt = headerData[2] || "Logo";
      document.getElementById("store-name").textContent =
        headerData[2] || "Nama Toko";
    }
  }
}

// Fungsi untuk memuat data produk dan kategori
async function loadProductsAndCategories() {
  const data = await fetchSheetData(BODY_SHEET_GID);
  console.log("Body data:", data);

  if (data.length <= 1) {
    document.getElementById("product-catalog").innerHTML =
      '<p class="text-center">Tidak ada produk yang ditemukan.</p>';
    return;
  }

  // Ekstrak produk dari data
  const products = [];

  // Lewati baris header (asumsi baris pertama adalah header)
  for (let i = 1; i < data.length; i++) {
    const row = data[i];
    if (row.length >= 5) {
      products.push({
        id: row[0] || "",
        name: row[1] || "",
        description: row[2] || "",
        price: row[3] || 0,
        image: processImageUrl(row[4] || ""),
      });
    }
  }

  // Render produk dengan pagination
  renderProductsWithPagination(products);
}

// Fungsi untuk merender produk dengan pagination
function renderProductsWithPagination(products, page = 1, itemsPerPage = 12) {
  const productCatalog = document.getElementById("product-catalog");
  const paginationContainer = document.getElementById("pagination-container");
  const pagination = document.getElementById("pagination");

  // Simpan produk di localStorage untuk filtering
  localStorage.setItem("allProducts", JSON.stringify(products));

  // Hitung total halaman
  const totalPages = Math.ceil(products.length / itemsPerPage);

  // Jika hanya ada 1 halaman, sembunyikan pagination
  if (totalPages <= 1) {
    paginationContainer.classList.add("d-none");
  } else {
    paginationContainer.classList.remove("d-none");
    renderPagination(totalPages, page);
  }

  // Tampilkan produk untuk halaman saat ini
  const startIndex = (page - 1) * itemsPerPage;
  const endIndex = startIndex + itemsPerPage;
  const productsToShow = products.slice(startIndex, endIndex);

  renderProducts(productsToShow);
}

// Fungsi untuk merender produk
function renderProducts(products) {
  const productCatalog = document.getElementById("product-catalog");

  if (products.length === 0) {
    productCatalog.innerHTML =
      '<p class="text-center">Tidak ada produk yang ditemukan.</p>';
    return;
  }

  let html = "";

  products.forEach((product) => {
    html += `
            <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-3">
                <div class="card h-100 product-card">
                    <div class="card-img-container">
                        <img src="${product.image}" class="card-img-top" alt="${
      product.name
    }" onerror="this.src='https://via.placeholder.com/300x200?text=Gambar+Tidak+Tersedia'">
                    </div>
                    <div class="card-body d-flex flex-column p-2 p-md-3">
                        <h5 class="card-title fs-6">${product.name}</h5>
                        <p class="card-text flex-grow-1 small">${
                          product.description
                        }</p>
                        <p class="price fw-bold mb-2">${formatRupiah(
                          product.price
                        )}</p>
                        <button class="btn btn-primary btn-sm mt-auto order-btn" data-product='${JSON.stringify(
                          product
                        )}'>
                            <i class="fab fa-whatsapp me-1"></i> Pesan
                        </button>
                    </div>
                </div>
            </div>
        `;
  });

  productCatalog.innerHTML = html;

  // Tambahkan event listener untuk tombol pesan
  document.querySelectorAll(".order-btn").forEach((button) => {
    button.addEventListener("click", function () {
      const productData = JSON.parse(this.getAttribute("data-product"));
      sendWhatsAppMessage(productData);
    });
  });
}

// Fungsi untuk merender pagination
function renderPagination(totalPages, currentPage) {
  const pagination = document.getElementById("pagination");
  let html = "";

  // Tombol Previous
  html += `
        <li class="page-item ${currentPage === 1 ? "disabled" : ""}">
            <a class="page-link" href="#" data-page="${
              currentPage - 1
            }">Previous</a>
        </li>
    `;

  // Halaman
  for (let i = 1; i <= totalPages; i++) {
    html += `
            <li class="page-item ${i === currentPage ? "active" : ""}">
                <a class="page-link" href="#" data-page="${i}">${i}</a>
            </li>
        `;
  }

  // Tombol Next
  html += `
        <li class="page-item ${currentPage === totalPages ? "disabled" : ""}">
            <a class="page-link" href="#" data-page="${
              currentPage + 1
            }">Next</a>
        </li>
    `;

  pagination.innerHTML = html;

  // Tambahkan event listener untuk pagination
  document.querySelectorAll(".page-link").forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const page = parseInt(this.getAttribute("data-page"));
      if (!isNaN(page)) {
        const allProducts = JSON.parse(
          localStorage.getItem("allProducts") || "[]"
        );
        renderProductsWithPagination(allProducts, page);
      }
    });
  });
}

// Fungsi untuk memuat data footer dengan mapping kolom yang benar
async function loadFooterData() {
  const data = await fetchSheetData(FOOTER_SHEET_GID);
  console.log("Footer data:", data);

  if (data.length <= 1) {
    console.error("Data footer tidak ditemukan atau kosong");
    return;
  }

  // Mapping kolom berdasarkan nama header yang diberikan
  const columnMap = {
    id_footer: 0,
    "footer-store-name": 1,
    deskripsi: 2,
    address: 3,
    phone_number: 4,
    email: 5,
    instagram_footer: 6,
    tiktok_footer: 7,
    url_whatsapp: 8,
  };

  // Fungsi untuk mendapatkan nilai dari kolom tertentu
  const getColumnValue = (columnName) => {
    const index = columnMap[columnName];
    return index !== undefined && data[1][index] !== undefined
      ? data[1][index]
      : "";
  };

  // Isi data footer berdasarkan mapping kolom
  document.getElementById("footer-store-name").textContent =
    getColumnValue("footer-store-name") || "Nama Toko";
  document.getElementById("footer-description").textContent =
    getColumnValue("deskripsi") || "Deskripsi toko";
  document.getElementById("footer-address").textContent =
    getColumnValue("address") || "Alamat toko";
  document.getElementById("footer-phone").textContent =
    getColumnValue("phone_number") || "Nomor telepon";
  document.getElementById("footer-email").textContent =
    getColumnValue("email") || "Email toko";

  // Fungsi untuk memformat URL sosial media
  const formatSocialUrl = (url, platform) => {
    if (!url || url === "#" || url === "" || url === null || url === undefined)
      return "#";

    // Jika URL sudah lengkap
    if (url.startsWith("http://") || url.startsWith("https://")) {
      return url;
    }

    // Format khusus untuk WhatsApp
    if (platform === "whatsapp") {
      // Jika hanya berisi angka, format menjadi link WhatsApp
      if (url.match(/^\d/)) {
        const cleanNumber = url.replace(/\D/g, "");
        return `https://wa.me/${cleanNumber}`;
      }
    }

    // Format untuk Instagram
    if (platform === "instagram") {
      if (url.startsWith("@")) {
        return `https://instagram.com/${url.substring(1)}`;
      }
      return `https://instagram.com/${url}`;
    }

    // Format untuk TikTok
    if (platform === "tiktok") {
      if (url.startsWith("@")) {
        return `https://tiktok.com/@${url.substring(1)}`;
      }
      return `https://tiktok.com/@${url}`;
    }

    return "#";
  };

  // Social media links - PASTIKAN menggunakan kolom yang benar
  const instagramUrl = formatSocialUrl(
    getColumnValue("instagram_footer"),
    "instagram"
  );
  const tiktokUrl = formatSocialUrl(getColumnValue("tiktok_footer"), "tiktok");
  const whatsappUrl = formatSocialUrl(
    getColumnValue("url_whatsapp"),
    "whatsapp"
  );

  console.log("Social media URLs:", {
    instagram: instagramUrl,
    tiktok: tiktokUrl,
    whatsapp: whatsappUrl,
  });

  // Set href untuk link sosial media - PASTIKAN ID yang benar
  document.getElementById("instagram-link").href = instagramUrl;
  document.getElementById("tiktok-link").href = tiktokUrl;
  document.getElementById("whatsapp-link").href = whatsappUrl;

  // Copyright
  document.getElementById("copyright-name").textContent =
    getColumnValue("footer-store-name") || "Nama Toko";
}

// Fungsi untuk menginisialisasi website
async function initializeWebsite() {
  try {
    await Promise.all([
      loadHeaderData(),
      loadProductsAndCategories(),
      loadFooterData(),
    ]);
  } catch (error) {
    console.error("Error initializing website:", error);
  }
}

// Efek scroll untuk navbar
window.addEventListener("scroll", function () {
  const navbar = document.getElementById("main-navbar");
  if (window.scrollY > 50) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
});

// Jalankan inisialisasi saat halaman dimuat
document.addEventListener("DOMContentLoaded", initializeWebsite);

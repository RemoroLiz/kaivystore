// Konfigurasi Google Sheets
const SHEET_ID = 'YOUR_GOOGLE_SHEETS_ID_HERE'; // Ganti dengan ID spreadsheet Anda
const API_KEY = 'YOUR_GOOGLE_API_KEY_HERE'; // Dapatkan dari Google Cloud Console

class SheetsDatabase {
    constructor() {
        this.baseUrl = 'https://sheets.googleapis.com/v4/spreadsheets';
        this.cache = {};
    }

    // Fungsi untuk mengambil data dari sheet tertentu
    async loadSheetData(sheetName, range = 'A:Z') {
        try {
            // Check cache first
            if (this.cache[sheetName] && (Date.now() - this.cache[sheetName].timestamp) < 300000) {
                return this.cache[sheetName].data;
            }

            const url = `${this.baseUrl}/${SHEET_ID}/values/${sheetName}!${range}?key=${API_KEY}`;
            const response = await fetch(url);
            
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            const data = await response.json();
            
            if (data.values && data.values.length > 1) {
                const parsedData = this.parseSheetData(data.values);
                // Cache the data
                this.cache[sheetName] = {
                    data: parsedData,
                    timestamp: Date.now()
                };
                return parsedData;
            }
            return [];
        } catch (error) {
            console.error('Error loading sheet data:', error);
            // Return cached data if available, even if stale
            if (this.cache[sheetName]) {
                return this.cache[sheetName].data;
            }
            return [];
        }
    }

    // Parse data dari array ke object
    parseSheetData(data) {
        const headers = data[0].map(header => header.toLowerCase().replace(/\s+/g, '_'));
        const rows = data.slice(1);
        
        return rows.map(row => {
            const obj = {};
            headers.forEach((header, index) => {
                obj[header] = row[index] || '';
            });
            return obj;
        });
    }

    // Load data sesi/konfigurasi
    async loadSesi() {
        const data = await this.loadSheetData('sesi');
        const sesi = {};
        data.forEach(item => {
            if (item.judul && item.value) {
                sesi[item.judul] = item.value;
            }
        });
        return sesi;
    }

    // Load data info sosial media
    async loadInfo() {
        return await this.loadSheetData('info');
    }

    // Load data produk
    async loadProduk() {
        return await this.loadSheetData('produk');
    }

    // Load data footer
    async loadFooter() {
        const data = await this.loadSheetData('footer');
        return data.length > 0 ? data[0] : {};
    }

    // Save order data
    async saveOrder(orderData) {
        // This would require Google Apps Script for write operations
        console.log('Order data to save:', orderData);
        // Implementasi penyimpanan order akan dijelaskan di bagian berikutnya
    }
}

// Inisialisasi database global
const db = new SheetsDatabase();

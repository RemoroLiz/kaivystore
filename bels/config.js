// Konfigurasi Spreadsheet
// Ganti dengan ID spreadsheet Anda
const SPREADSHEET_ID = "1JoH3ICCWTAeB0uZX502SH_emIpheZYNPWHj2qGlH7Uw";

// GID untuk setiap sheet (dapat ditemukan di URL saat membuka sheet tertentu)
const HEADER_SHEET_GID = "1753523053";
const BODY_SHEET_GID = "1517605894";
const FOOTER_SHEET_GID = "2084838744";

// Base URL untuk mengambil data dari Google Sheets
const SHEETS_BASE_URL = `https://docs.google.com/spreadsheets/d/${SPREADSHEET_ID}/gviz/tq?`;

// Untuk keamanan tambahan, Anda dapat menggunakan proxy server
// const PROXY_URL = 'https://yourproxy.com/api/sheets?gid=';
// Dan mengganti SHEETS_BASE_URL dengan PROXY_URL

// Catatan: Untuk lingkungan production, pertimbangkan untuk menggunakan
// server-side code untuk menyembunyikan ID spreadsheet Anda

document
  .getElementById("submitBtn")
  .addEventListener("click", function (event) {
    // Get the selected radio button
    var selectedRadio = document.querySelector(
      'input[name="inlineRadioOptions"]:checked'
    );
    var metodePembayaran = document.getElementById("metodepembayaran").value;

    // Check if a nominal is selected
    if (!selectedRadio) {
      alert("Anda belum memilih jumlah Diamond!");
      event.preventDefault(); // Prevent form submission
      return;
    }

    // Check if payment method is selected
    if (metodePembayaran === "") {
      alert("Silakan pilih metode pembayaran sebelum mengirimkan pesanan.");
      event.preventDefault(); // Prevent form submission
      return;
    }

    // Get the values
    var nominal = selectedRadio.value;
    var productName = document.getElementById("product_name").value;
    var userName = document.getElementById("username_ff").value;
    var userID = document.getElementById("userid_ff").value;
    var tanggalPembelian = document.getElementById("tanggalpembelian").value;

    // Retrieve the selected price from the radio button data attribute
    var selectedPrice = selectedRadio.getAttribute("data-price");

    // Check if userid_ff has at least 4 digits
    if (userID.length < 4) {
      alert("Silakan isi User ID dengan benar.");
      event.preventDefault(); // Prevent form submission
      return;
    }

    // Format harga
    var formattedPrice = formatPrice(selectedPrice); // Use the selectedPrice for formatting

    // Construct the WhatsApp message
    var whatsappMessage =
      "*Halo, saya ingin memesan Diamond " + productName + "*\n\n";
    whatsappMessage += "*Detail Pemesanan* :\n\n";
    whatsappMessage += "*Username* : " + userName + "\n";
    whatsappMessage += "*User ID* : " + userID + "\n";
    whatsappMessage += "*Diamonds* : " + nominal + " Diamonds\n";
    whatsappMessage += "*Harga* : " + formattedPrice + "\n"; // "Rp. " added here
    whatsappMessage += "*Metode Pembayaran* : " + metodePembayaran + "\n";
    whatsappMessage += "*Waktu Pemesanan* : " + tanggalPembelian;

    // Encode the message for URL
    var encodedMessage = encodeURIComponent(whatsappMessage);

    // Open WhatsApp with the message
    window.open("https://wa.me/+6285156321023/?text=" + encodedMessage);

    // Redirect to payment.php after submitting
    window.location.href = "";
  });

// Function to format price
function formatPrice(price) {
  // Format the price to have dot as thousand separator and add "Rp." and ",-" at the beginning and end, respectively
  var formattedPrice =
    "Rp. " + price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ",-";
  return formattedPrice;
}

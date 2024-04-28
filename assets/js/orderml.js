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
      alert("Lu Belum Milih DM Cuyy!");
      event.preventDefault(); // Prevent form submission
      return;
    }

    // Check if payment method is selected
    if (metodePembayaran === "") {
      alert("Please select a payment method before submitting.");
      event.preventDefault(); // Prevent form submission
      return;
    }

    // Get the values
    var nominal = selectedRadio.value;
    var productName = document.getElementById("product_name").value;
    var userName = document.getElementById("username_ml").value;
    var userID = document.getElementById("userid_ml").value;
    var serverID = document.getElementById("serverid_ml").value;
    var tanggalPembelian = document.getElementById("tanggalpembelian").value;

    // Retrieve the selected price from the radio button data attribute
    var selectedPrice = selectedRadio.getAttribute("data-price");

    // Check if userid_ml has at least 4 digits
    if (userID.length < 4) {
      alert("Yang Bener Ngisinya Ego!");
      event.preventDefault(); // Prevent form submission
      return;
    }
    // Format harga
    var formattedPrice = formatPrice(selectedPrice); // Use the selectedPrice for formatting

    // Construct the WhatsApp message
    var whatsappMessage =
      "*Halo saya ingin order diamond " + productName + "*\n\n";
    whatsappMessage += "*Format Order* :\n\n";
    whatsappMessage += "*Username* : " + userName + "\n";
    whatsappMessage += "*User ID* : " + userID + "\n";
    whatsappMessage += "*Server ID* : " + serverID + "\n";
    whatsappMessage += "*Diamonds* : " + nominal + " Diamonds\n";
    whatsappMessage += "*Harga* : " + formattedPrice + "\n";
    whatsappMessage += "*Payment* : " + metodePembayaran + "\n";
    whatsappMessage += "*Waktu Order* : " + tanggalPembelian;

    // Encode the message for URL
    var encodedMessage = encodeURIComponent(whatsappMessage);

    // Open WhatsApp with the message
    window.open("https://wa.me/+6285156321023/?text=" + encodedMessage);

    // Redirect to payment.php after submitting
    window.location.href = "";
  });

// Function to format price
function formatPrice(price) {
  // Format the price to have dot as thousand separator
  var formattedPrice = price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  // Add the dash and comma at the end
  formattedPrice += ",-";
  return formattedPrice;
}

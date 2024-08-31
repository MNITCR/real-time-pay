$(document).ready(function () {
  $("#profileBtn").click(function (e) {
    e.preventDefault();
    var profile = $("#profile-modal");
    profile.removeClass("hidden");

    $.ajax({
      url: "./php/FetchAccUser.php",
      method: "GET",
      success: function (response) {
        var data = response;
        var decodedJsonData = decodeURIComponent(data[0]['qrcode']);
        var jsonData = JSON.parse(decodedJsonData);

        // Convert JSON data to string
        var jsonString = JSON.stringify(jsonData);

        // Create QR code
        var qr = new QRious({
          element: document.getElementById("image-qr-code-profile"),
          value: jsonString,
          size: 250, // Adjust the size of the QR code as needed
        });
        $('#first_name').val(data[0]['first_name']);
        $('#last_name').val(data[0]['last_name']);
        $('#phone').val(data[0]['phone']);
        $('#email').val(data[0]['email']);

      },
      error: function (xhr, status, error) {
        console.log(xhr, status, error);
      },
    });
  });

  $("#hideFormProfile").click(function (e) {
    e.preventDefault();
    var profile = $("#profile-modal");
    profile.addClass("hidden");
  });

  // Function to trigger download of QR code image
  $("#download_qrCode").click(function () {
    var qrImageSrc = $("#image-qr-code-profile").attr("src");
    console.log(qrImageSrc);
    var link = document.createElement("a");
    link.href = qrImageSrc;
    link.download = "qr_code.png";
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  });
});

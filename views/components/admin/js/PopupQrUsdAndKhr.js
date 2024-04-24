$(document).ready(function () {
  // ==========> Create scan qr code usd <==========
  $("#PopUpQrEG").click(function () {
    $("#qrDollar-modal").removeClass("hidden");
    $("#ScanQrDollar-modal").addClass("hidden");
    $.ajax({
      url: "./php/FetchAccNameAndBalance.php",
      method: "GET",
      success: function (response) {
        if (Array.isArray(response) && response.length > 0) {
          $("#qr-token-usd-khr").text(response[0]["token"]);
          $("#qr-id-user-usd-khr").text(response[0]["user_id"]);
          $("#qr-user-first-name").text(response[0]["first_name"]);
          $("#qr-user-last-name").text(response[0]["last_name"]);
          $("#qr-user-path-img").text(response[0]["image_path"]);

          var userData = response[0];
          var username =
            response[0]["last_name"] + " " + response[0]["first_name"];
          $("#qr-user-full-name").text(username);

          // check type of money
          var check = $("#PopUpQrEG").data("type-money") ? "UseOrKhr" : "";
          if (check == "UseOrKhr") {
            $("#type-of-money").text("៛");
            var number_of_balance = response[0]["account_number_kh"].replace(
              /(\d)(?=(\d{3})+(?!\d))/g,
              "$1 "
            );
            $("#qr-number-of-balance").text(number_of_balance);
            $("#qr-sign").text("KHR");
          } else {
            $("#type-of-money").text("$");
            var number_of_balance = response[0]["account_number_eg"].replace(
              /(\d)(?=(\d{3})+(?!\d))/g,
              "$1 "
            );

            $("#qr-balance-usd").text(response[0]["account_number_eg"]);
            $("#qr-balance-khr").text(response[0]["account_number_kh"]);
            $("#qr-number-of-balance").text(number_of_balance);
            $("#qr-sign").text("USD");
          }

          var jsonString = JSON.stringify(userData);

          // Create QR code
          var qr = new QRious({
            element: document.getElementById("image-qr-code-usd"),
            value: jsonString,
            size: 250, // Adjust the size of the QR code as needed
          });
        } else {
          console.error("Error: Empty or invalid response");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });
  // ==========> End create scan qr code usd <==========

  // ==========> Create scan qr code khmer <==========
  $("#PopUpQrKH").click(function () {
    $("#qrDollar-modal").removeClass("hidden");
    $("#ScanQrDollar-modal").addClass("hidden");

    $.ajax({
      url: "./php/FetchAccNameAndBalance.php",
      method: "GET",
      success: function (response) {
        if (Array.isArray(response) && response.length > 0) {
          $("#qr-token-usd-khr").text(response[0]["token"]);
          $("#qr-id-user-usd-khr").text(response[0]["user_id"]);
          $("#qr-user-first-name").text(response[0]["first_name"]);
          $("#qr-user-last-name").text(response[0]["last_name"]);
          $("#qr-user-path-img").text(response[0]["image_path"]);

          var userData = response[0];
          var username =
            response[0]["last_name"] + " " + response[0]["first_name"];
          $("#qr-user-full-name").text(username);

          // check type of money
          var check = $("#PopUpQrKH").data("type-money") ? "UseOrKhr" : "";
          if (check == "UseOrKhr") {
            $("#type-of-money").text("៛");
            var number_of_balance = response[0]["account_number_kh"].replace(
              /(\d)(?=(\d{3})+(?!\d))/g,
              "$1 "
            );

            $("#qr-balance-usd").text(response[0]["account_number_eg"]);
            $("#qr-balance-khr").text(response[0]["account_number_kh"]);
            $("#qr-number-of-balance").text(number_of_balance);
            $("#qr-sign").text("KHR");
          } else {
            $("#type-of-money").text("$");
            var number_of_balance = response[0]["account_number_eg"].replace(
              /(\d)(?=(\d{3})+(?!\d))/g,
              "$1 "
            );
            $("#qr-number-of-balance").text(number_of_balance);
            $("#qr-sign").text("USD");
          }

          var jsonString = JSON.stringify(userData);

          // Create QR code
          var qr = new QRious({
            element: document.getElementById("image-qr-code-usd"),
            value: jsonString,
            size: 250, // Adjust the size of the QR code as needed
          });
        } else {
          console.error("Error: Empty or invalid response");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });
  // ==========> End create scan qr code khmer <==========

  // hide qr modal
  $("#HideQrDollar").click(function () {
    $("#qrDollar-modal").addClass("hidden");
  });

  // ==========> Create copy link qr code <==========
  $("#send-link-qr-usd-khr").click(function () {
    var qrUrlData = {
      k2Cvblrl2v3: $("#qr-id-user-usd-khr").text(),
      jsbweiui235: $("#qr-sign").text(),
      oi0oi34hsdf: $("#qr-user-first-name").text(),
      kjhkfwro23v: $("#qr-user-last-name").text(),
      mv23redefnv: $("#qr-balance-usd").text(),
      kjswoirnv5v: $("#qr-balance-khr").text(),
      loj232ovnje: $("#qr-token-usd-khr").text(),
      jhy234nvskw: $("#qr-user-path-img").text(),
    };

    // Convert data to JSON string
    var qrUrlDataString = JSON.stringify(qrUrlData);
    console.log(qrUrlDataString);
    // Construct the message
    var message =
      "Hello! Here is my account information:\n\n" +
      "Account holder name: " +
      $("#qr-user-full-name").text() +
      "\n" +
      "Account number: " +
      $("#qr-number-of-balance").text() +
      "\n\n" +
      "Or click the link below to make a payment:\n" +
      `http://localhost/real-time-pay?data=${encodeURIComponent(
        qrUrlDataString
      )}`;

    console.log(message);

    // Copy the message to the clipboard
    navigator.clipboard
      .writeText(message)
      .then(function () {
        console.log("Message copied to clipboard successfully!");
      })
      .catch(function (error) {
        console.error("Unable to copy message: ", error);
      });
  });
  // ==========> End create copy link qr code <==========
});

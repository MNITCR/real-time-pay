$(document).ready(function () {
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

  // pop up khmer qr code
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

  // hide qr modal
  $("#HideQrDollar").click(function () {
    $("#qrDollar-modal").addClass("hidden");
  });

  // Add a click event listener to the button
  $("#send-link-qr-usd-khr").click(function () {
    var qrUrlData = {
      user_id: $("#qr-id-user-usd-khr").text(),
      sign_money: $("#qr-sign").text(),
      first_name: $("#qr-user-first-name").text(),
      last_name: $("#qr-user-last-name").text(),
      balance_usd: $("#qr-balance-usd").text(),
      balance_khr: $("#qr-balance-khr").text(),
      token: $("#qr-token-usd-khr").text(),
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
      `http://localhost/real-time-pay?data=${encodeURIComponent(qrUrlDataString)}`;

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

    // Check if the app is available, then open it, otherwise open a browser
  });
});

$(document).ready(function () {
  $.ajax({
    url: "./php/FetchAccNumAndBalance.php",
    type: "GET",
    dataType: "json",
    success: function (data) {
      var checkUsdOrKhr = $("#scan-qr-sign").text();
      var storeDataFetch = $("#dataFetch-scan-ar");

      if (checkUsdOrKhr == "KHR") {
        storeDataFetch.val(data[0]["balance_kh"]);
        $("#scan-qr-number-of-balance").text(
          data[0]["account_number_kh"].replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ")
        );
      } else {
        storeDataFetch.val(data[0]["balance_eg"]);
        $("#scan-qr-number-of-balance").text(
          data[0]["account_number_eg"].replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ")
        );
      }
    },
    error: function (xhr, status, error) {
      console.log(xhr.responseText);
    },
  });

  // ==========> Create scan qr code usd <==========
  $("#PopUpQrEG").click(function () {
    $("#qrDollar-modal").removeClass("hidden");
    $("#ScanQrDollar-modal").addClass("hidden");
    $("#main-download-qrcode-modal").removeClass("hidden");

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
          $(".user-first-name").text(response[0]["first_name"]);
          $(".user-last-name").text(response[0]["last_name"]);

          var userData = response[0];

          var username =
            response[0]["last_name"] + " " + response[0]["first_name"];
          $("#qr-user-full-name").text(username);

          // check type of money
          var check = $("#PopUpQrEG").data("type-money") ? "UseOrKhr" : "";
          if (check == "UseOrKhr") {
            $("#type-of-money").text("៛");
            $("#type-of-money").addClass("text-[30px]");
            var number_of_balance = response[0]["account_number_kh"].replace(
              /(\d)(?=(\d{3})+(?!\d))/g,
              "$1 "
            );
            $("#qr-number-of-balance").text(number_of_balance);
            $("#qr-sign").text("KHR");
            $("#qr-balance-khr").text(response[0]["balance_kh"]);
          } else {
            $("#type-of-money").text("$");
            $("#type-of-money").removeClass("text-[30px]");
            var number_of_balance = response[0]["account_number_eg"].replace(
              /(\d)(?=(\d{3})+(?!\d))/g,
              "$1 "
            );

            $("#qr-balance-usd").text(response[0]["balance_eg"]);
            $("#qr-number-of-balance").text(number_of_balance);
            $("#qr-sign").text("USD");
          }

          var qrSignValue = $("#qr-sign").text();
          userData["qr-sign"] = qrSignValue;
          var jsonString = JSON.stringify(userData);

          // Create QR code
          var qrUSD = new QRious({
            element: document.getElementById("image-qr-code-usd"),
            value: jsonString,
            size: 250, // Adjust the size of the QR code as needed
          });

          // Clone the QR code for image-qr-code-usd
          var qrUsdImage = qrUSD.toDataURL();

          // Set the src attribute of image-qr-code-download
          document
            .getElementById("image-qr-code-download")
            .setAttribute("src", qrUsdImage);
        } else {
          console.error("Error: Empty or invalid response");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });

    // get ipv4 WIFI
    $.ajax({
      url: "./php/getIPV4WIFI.php",
      type: "GET",
      dataType: "json",
      success: function (data) {
        if (data.success) {
          $("#ipV4WIFI").text(data.success);
        } else {
          alert(data.message);
        }
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      },
    });
  });
  // ==========> End create scan qr code usd <==========

  // ==========> Create scan qr code khmer <==========
  $("#PopUpQrKH").click(function () {
    $("#qrDollar-modal").removeClass("hidden");
    $("#ScanQrDollar-modal").addClass("hidden");
    $("#main-download-qrcode-modal").removeClass("hidden");

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
          $(".user-first-name").text(response[0]["first_name"]);
          $(".user-last-name").text(response[0]["last_name"]);

          var userData = response[0];
          var username =
            response[0]["last_name"] + " " + response[0]["first_name"];
          $("#qr-user-full-name").text(username);

          // check type of money
          var check = $("#PopUpQrKH").data("type-money") ? "UseOrKhr" : "";
          if (check == "UseOrKhr") {
            $("#type-of-money").text("៛");
            $("#type-of-money").addClass("text-[30px]");
            var number_of_balance = response[0]["account_number_kh"].replace(
              /(\d)(?=(\d{3})+(?!\d))/g,
              "$1 "
            );

            $("#qr-balance-khr").text(response[0]["balance_kh"]);
            $("#qr-number-of-balance").text(number_of_balance);
            $("#qr-sign").text("KHR");
          } else {
            $("#type-of-money").text("$");
            $("#type-of-money").removeClass("text-[30px]");
            var number_of_balance = response[0]["account_number_eg"].replace(
              /(\d)(?=(\d{3})+(?!\d))/g,
              "$1 "
            );
            $("#qr-number-of-balance").text(number_of_balance);
            $("#qr-sign").text("USD");
            $("#qr-balance-usd").text(response[0]["balance_eg"]);
          }

          var qrSignValue = $("#qr-sign").text();
          userData["qr-sign"] = qrSignValue;
          var jsonString = JSON.stringify(userData);

          // Create QR code
          var qrKHR = new QRious({
            element: document.getElementById("image-qr-code-usd"),
            value: jsonString,
            size: 250, // Adjust the size of the QR code as needed
          });

          // Clone the QR code for image-qr-code-usd
          var qrKHRImage = qrKHR.toDataURL();

          // Set the src attribute of image-qr-code-download
          document
            .getElementById("image-qr-code-download")
            .setAttribute("src", qrKHRImage);
        } else {
          console.error("Error: Empty or invalid response");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });

    // get ipv4 WIFI
    $.ajax({
      url: "./php/getIPV4WIFI.php",
      type: "GET",
      dataType: "json",
      success: function (data) {
        if (data.success) {
          $("#ipV4WIFI").text(data.success);
        } else {
          alert(data.message);
        }
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      },
    });
  });
  // ==========> End create scan qr code khmer <==========

  // hide qr modal
  $("#HideQrDollar").click(function () {
    $("#qrDollar-modal").addClass("hidden");
    $("#main-download-qrcode-modal").addClass("hidden");
  });

  // ==========> Create copy link qr code <==========
  $("#send-link-qr-usd-khr").click(function () {
    if ($("qr-sign").text() == "USD") {
      accountNumber = $("#scan-qr-number-of-balance").text();
    } else {
      accountNumber = $("#scan-qr-number-of-balance").text();
    }

    var qrUrlData = {
      k2Cvblrl2v3: $("#qr-id-user-usd-khr").text(),
      jsbweiui235: $("#qr-sign").text(),
      oi0oi34hsdf: $("#qr-user-first-name").text(),
      kjhkfwro23v: $("#qr-user-last-name").text(),
      mv23redefnv: accountNumber,
      kjswoirnv5v: $("#qr-number-of-balance").text(),
      loj232ovnje: $("#qr-token-usd-khr").text(),
      jhy234nvskw: $("#qr-user-path-img").text(),
    };

    // Convert data to JSON string
    var qrUrlDataString = JSON.stringify(qrUrlData);

    // get wifi ipv4 address
    var WIFIIPV4 = $("#ipV4WIFI").text();

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
      `http://${WIFIIPV4}/real-time-pay?data=${encodeURIComponent(
        qrUrlDataString
      )}`;

    // Copy the message to the clipboard
    navigator.clipboard
      .writeText(message)
      .then(function () {
        const tooltip = document.getElementById("tooltip-copy-link");

        tooltip.classList.remove("opacity-0");
        tooltip.classList.add("opacity-1");

        setTimeout(() => {
          tooltip.classList.remove("opacity-1");
          tooltip.classList.add("opacity-0");
        }, 2000);
      })
      .catch(function (error) {
        console.error("Unable to copy message: ", error);
      });
  });
  // ==========> End create copy link qr code <==========
});

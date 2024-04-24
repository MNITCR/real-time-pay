$(document).ready(function () {
  $("#scan-qr-balance-value").on("input", function () {
    var sanitizedValue = $(this)
      .val()
      .replace(/[^0-9.,]/g, ""); // Remove any characters that are not numbers, dots, or commas
    $(this).val(sanitizedValue); // Set the input value to the sanitized value
  });

  $("#scan-qr-balance-value").on("keypress", function (event) {
    var charCode = event.which ? event.which : event.keyCode; // Get the character code
    // Allow numbers (48-57), dot (46), comma (44), and backspace (8)
    if (
      charCode != 46 &&
      charCode != 44 &&
      charCode > 31 &&
      (charCode < 48 || charCode > 57)
    ) {
      event.preventDefault(); // Prevent the default action
    }
  });

  // Disable keyboard input on the input field
  $("#scan-qr-balance-value").on("keypress keydown keyup", function (e) {
    e.preventDefault();
  });

  // btn submit payment by qr code
  $("#submit-scan-qr-payment").click(function () {
    $(".btn-final-scan-qr").prop("id", "confirm-password-four-final-pay");
    $(".HideConfirmFourPassword-modal").prop("id", "HideConfirmFourPassword");

    var checkUsdOrKhr = $("#scan-qr-sign").text();
    var mainValue = $("#scan-qr-balance-value").val();

    // Remove commas from the string
    var mainValueWithoutCommas = mainValue.replace(/,/g, "");

    if (checkUsdOrKhr === "KHR" && mainValueWithoutCommas < 10000) {
      // Add tremble effect to the button
      $("#ConfirmFourPassword-modal").addClass("tremble");

      // Remove the tremble effect after 1 seconds
      setTimeout(function () {
        $("#ConfirmFourPassword-modal").removeClass("tremble");
        $("#wrong-password-four").removeClass("-top-20");
        $("#wrong-password-four").addClass("top-[-2px]");
        $("#wrong-password-four-text").text("Khmer up to 10000៛");
      }, 1000);

      setTimeout(function () {
        $("#wrong-password-four").addClass("-top-20");
        $("#wrong-password-four").removeClass("top-[-2px]");
      }, 3000);
    } else if (checkUsdOrKhr === "USD" && mainValueWithoutCommas < 1) {
      // Add tremble effect to the button
      $("#ConfirmFourPassword-modal").addClass("tremble");

      // Remove the tremble effect after 5 seconds
      setTimeout(function () {
        $("#ConfirmFourPassword-modal").removeClass("tremble");
        $("#wrong-password-four").removeClass("-top-20");
        $("#wrong-password-four").addClass("top-[-2px]");
        $("#wrong-password-four-text").text("USD up to 1$");
      }, 1000);

      setTimeout(function () {
        $("#wrong-password-four").addClass("-top-20");
        $("#wrong-password-four").removeClass("top-[-2px]");
      }, 3000);
    } else {
      var storeDataFetch = parseFloat($("#dataFetch-scan-ar").val());
      var currentData = $("#scan-qr-balance-value").val();
      var mainValueWithoutCommas = currentData.replace(/,/g, "");

      if(mainValueWithoutCommas > storeDataFetch){
        return;
      }else{
        $("#ConfirmFourPassword-modal").removeClass("hidden");
        $("#ScanQrDollar-modal").addClass("hidden");
      }
    }
  });

  // hide pop up show confirm password
  $(document).on("click", "#HideConfirmFourPassword", function () {
    $("#ConfirmFourPassword-modal").addClass("hidden");
    $("#ScanQrDollar-modal").removeClass("hidden");
    $('input[type="radio"]').prop("checked", false);
    $("#inputDisplay").val("");
  });
});

// =============> Create validation on input balance <=============
$.ajax({
  url: "./php/FetchAccNumAndBalance.php", // PHP script URL
  type: "GET",
  dataType: "json",
  success: function (data) {
    var checkUsdOrKhr = $("#scan-qr-sign").text();
    var storeDataFetch = $("#dataFetch-scan-ar");
    if (checkUsdOrKhr === "KHR") {
      storeDataFetch.val(data[0]["balance_kh"]);
      $("#scan-qr-number-of-balance").text(data[0]["account_number_kh"].replace(
        /(\d)(?=(\d{3})+(?!\d))/g,
        "$1 "
      ));
      console.log(data[0]["balance_kh"]);
      console.log("KHR");
    } else {
      storeDataFetch.val(data[0]["balance_eg"]);
      $("#scan-qr-number-of-balance").text(data[0]["account_number_eg"].replace(
        /(\d)(?=(\d{3})+(?!\d))/g,
        "$1 "
      ));
      console.log(data[0]["balance_eg"]);
      console.log("USD");
    }
  },
  error: function (xhr, status, error) {
    console.log(xhr.responseText);
  },
});

const checkBalanceAndShowTooltip = (inputValue, balance) => {
  const tooltip = $("#tooltip-default");
  if (parseFloat(balance) < parseFloat(inputValue.replace(/,/g, ""))) {
    tooltip.css("opacity", 1);
  } else {
    tooltip.css("opacity", 0);
  }
};

const updateInputValue = (newValue) => {
  var storeDataFetch = parseFloat($("#dataFetch-scan-ar").val());
  var mainValueWithoutCommas = newValue.replace(/,/g, "");
  console.log("main", mainValueWithoutCommas);
  console.log("store", storeDataFetch);

  checkBalanceAndShowTooltip(mainValueWithoutCommas, storeDataFetch);
  console.log("new", newValue);
  document.getElementById("scan-qr-balance-value").value = newValue;
};

const updateBalanceValue = (event) => {
  const input = event.target.value;
  let currentValue = document.getElementById("scan-qr-balance-value").value;
  if (currentValue === "0") {
    currentValue = ""; // Remove leading zero if input is 0
  }

  // Check if the input is a dot
  if (input === ".") {
    if (currentValue.length >= 12) {
      return;
    } else {
      // Allow max length 6 after dot
      const dotIndex = currentValue.indexOf(".");
      if (dotIndex !== -1 && currentValue.substring(dotIndex).length >= 6) {
        return;
      }
    }
  } else {
    // If input is longer than 3 and does not contain a dot yet, add commas
    if (currentValue.length > 3 && currentValue.indexOf(".") === -1) {
      // Allow max length 12
      if (currentValue.length >= 12) {
        return;
      } else {
        // Add comma
        const valueWithoutComma = currentValue.replace(/,/g, "");
        const newValue = parseFloat(valueWithoutComma + input).toLocaleString(
          "en-US"
        ); // Format with commas
        updateInputValue(newValue);
        return;
      }
    }
    // If input contains a dot, allow max 6 digits after the dot
    const dotIndex = currentValue.indexOf(".");
    if (dotIndex !== -1 && currentValue.substring(dotIndex).length >= 3) {
      return;
    }
  }

  // Update the input value
  currentValue += input;
  updateInputValue(currentValue);
};

const clearBalanceValue = () => {
  let currentValue = document.getElementById("scan-qr-balance-value").value;
  if (currentValue.length > 0) {
    currentValue = currentValue.slice(0, -1);
    updateInputValue(currentValue);
  }
  if (currentValue.length === 0) {
    $("#scan-qr-balance-value").focus();
    return;
  }
};

const buttons = document.querySelectorAll(".updateBalanceValue");
buttons.forEach((button) => {
  button.addEventListener("click", updateBalanceValue);
});

// =============> End Create validation on input balance <=============

// ===============> hide and show note and get value on p <===============
$("#scan-qr-icon-pan-note").click(function (event) {
  var noteInput = $("#scan-qr-note");
  var mainNote = $("#scan-qr-main-note");
  var inputNot = $("#scan-qr-input-note");

  // Hide the note input and show the main note
  noteInput.addClass("hidden");
  mainNote.removeClass("hidden");
  inputNot.val("");
});

$("#scan-qr-click-show-note").click(function () {
  var noteInput = $("#scan-qr-note");
  var mainNote = $("#scan-qr-main-note");

  // Toggle visibility
  noteInput.toggleClass("hidden");
  mainNote.toggleClass("hidden");

  // If note input is visible, focus it
  if (!noteInput.hasClass("hidden")) {
    $("#scan-qr-input-note").focus();
  }
});

$("#scan-qr-main-note .text-note-scan-qr").click(function () {
  // Show the note input
  $("#scan-qr-note").removeClass("hidden");
  $("#scan-qr-main-note").addClass("hidden");

  // Set value of input field to the clicked paragraph's text content
  $("#scan-qr-input-note").val($(this).text().trim());
});
// ===============> end hide and show note and get value on p <===============


// =============> Submit scan qr pay <=============
$(document).ready(function() {
  var checkedValues = [];

  // Button final payment
  $(document).on("click", "#confirm-password-four-final-pay", function() {
      // Get all checked radio values
      var checkedValues = [];

      $('input[type="radio"]').each(function() {
          if ($(this).is(':checked')) {
              checkedValues.push($(this).val());
          }
      });

      // Check if none of the radio inputs are checked
      if (checkedValues.length !== 4) {
          console.log(checkedValues.length);
          // Add tremble effect to the button
          $("#ConfirmFourPassword-modal").addClass("tremble");

          // Remove the tremble effect after 5 seconds
          setTimeout(function() {
              $("#ConfirmFourPassword-modal").removeClass("tremble");
              $(".wrong-password-four").removeClass("-top-20");
              $(".wrong-password-four").addClass("top-[-2px]");
              $(".wrong-password-four-text").text("Please enter your password!");
          }, 1000);

          setTimeout(function() {
              $(".wrong-password-four").addClass("-top-20");
              $(".wrong-password-four").removeClass("top-[-2px]");
          }, 3000);

      } else {
          var password = $("#inputDisplay").val();

          var VerifyPassword = new FormData();
          VerifyPassword.append("password", password);

          $.ajax({
              type: "POST",
              url: "./php/VerifyPasswordPayment.php",
              data: VerifyPassword,
              processData: false,
              contentType: false,
              dataType: "json",
              success: function(response) {
                  if (response.message === "error") {
                      // Add tremble effect to the button
                      $("#ConfirmFourPassword-modal").addClass("tremble");

                      // Remove the tremble effect after 5 seconds
                      setTimeout(function() {
                          $("#ConfirmFourPassword-modal").removeClass("tremble");
                          $(".wrong-password-four").removeClass("-top-20");
                          $(".wrong-password-four").addClass("top-[-2px]");
                          $(".wrong-password-four-text").text("Password not correct!");
                      }, 1000);

                      setTimeout(function() {
                          $(".wrong-password-four").addClass("-top-20");
                          $(".wrong-password-four").removeClass("top-[-2px]");
                      }, 3000);
                  } else {
                      var signUsdOrKhr;
                      var amount = $("#scan-qr-balance-value").val();
                      var mainValueWithoutCommas = amount.replace(/,/g, "");

                      // var user_name = $("#scan-qr-user-first-name").text() + $("#scan-qr-user-last-name").text();
                      // var user_id = $("#user_id_scan_qr").text();
                      var receiveAccountNumber = $("#balance-scan-qr-khr-or-usd").text();
                      var senderAccountNumber = $("#scan-qr-number-of-balance").text();
                      var RemoveSpacesSenderAccountNumber = senderAccountNumber.replace(/\s/g, "");


                      var checkUsdOrKhr = $("#scan-qr-sign").text();
                      var description = $("#scan-qr-input-note").val();
                      if (checkUsdOrKhr === "KHR") {
                          signUsdOrKhr = "false";
                      } else {
                          signUsdOrKhr = "true";
                      }
                      // checkUsdOrKhr === "KHR" ? signUsdOrKhr = "true" : signUsdOrKhr = "false";

                      var formData = new FormData();
                      formData.append("accountNumber", receiveAccountNumber);
                      formData.append("balance", RemoveSpacesSenderAccountNumber);
                      formData.append("amount", mainValueWithoutCommas);
                      formData.append("description", description);
                      formData.append("check", signUsdOrKhr);

                      $.ajax({
                          type: "POST",
                          url: "./php/SubmitPaymentMoney.php",
                          data: formData,
                          processData: false,
                          contentType: false,
                          dataType: "json",
                          success: function(response) {
                              // FetchAccNumAndBalance();
                              if (response.message === "You can't transfer to your own account.") {
                                  // Add tremble effect to the button
                                  $("#ConfirmFourPassword-modal").addClass("tremble");

                                  // Remove the tremble effect after 5 seconds
                                  setTimeout(function() {
                                      $("#ConfirmFourPassword-modal").removeClass("tremble");
                                      $(".wrong-password-four").removeClass("-top-20");
                                      $(".wrong-password-four").addClass("top-[-2px]");
                                      $(".wrong-password-four-text").text("Can't transfer to your own account!");
                                  }, 1000);

                                  setTimeout(function() {
                                      $(".wrong-password-four").addClass("-top-20");
                                      $(".wrong-password-four").removeClass("top-[-2px]");
                                  }, 3000);


                              } else {
                                  $('input[type="radio"]').prop("checked", false);
                                  $("#inputDisplay").val("");
                                  // Remove the tremble effect if previously added
                                  $("#ConfirmFourPassword-modal").removeClass("tremble");
                                  alert(response.message);
                              }


                          },
                          error: function(xhr, status, error) {
                              console.error(xhr.responseText);
                          },
                      });


                  }
              },
              error: function(xhr, status, error) {
                  console.error(xhr.responseText);
              },
          });


      }
  });

  // Attach click event to number buttons
  $('.number-button').click(function() {
      var clickedValue = $(this).val();

      // Get the current value of the input display
      var currentValue = $('#inputDisplay').val();

      // Check if the length of the current value + clicked value is greater than 4
      if (currentValue.length + clickedValue.length > 4) {
          return; // Do nothing if length exceeds 4
      } else {
          // Update the value and display it
          $('#inputDisplay').val(currentValue + clickedValue);

          // Update the checked values
          updateValueCheck(clickedValue);
      }
  });

  // Attach click event to radio inputs
  $('input[type="radio"]').click(function(event) {
      event.preventDefault();
      updateCheckedValues();
  });

  function updateCheckedValues() {
      checkedValues = [];
      $('input[type="radio"]').each(function() {
          if ($(this).is(':checked')) {
              checkedValues.push($(this).val());
          }
      });

      if (checkedValues.length === 4) {

      }
  }

  // Function to update value check
  function updateValueCheck(value) {
      $('input[type="radio"]').each(function() {
          if (!$(this).is(':checked')) {
              $(this).prop('checked', true);
              updateCheckedValues();
              return false;
          }
      });
  }

  // Function to clear all checked values
  $(".clearAllValueCheck").click(() => {
      $('input[type="radio"]').prop('checked', false);
      $('#inputDisplay').val('');
      checkedValues = [];
  });

  // Clear radio values and input values
  $(".clearBalanceValueOne").click(function() {
      // Find the last checked radio button and uncheck it
      var lastChecked = $('input[type="radio"]:checked:last');
      lastChecked.prop('checked', false);

      // Get the current value of the input
      var currentValue = $('#inputDisplay').val();

      // Remove the last character from the value
      var newValue = currentValue.slice(0, -1);

      // Update the input value with the new value
      $('#inputDisplay').val(newValue);
      // Update the checked values array
      updateCheckedValues();
  });

});
// =============> End submit scan qr pay <=============

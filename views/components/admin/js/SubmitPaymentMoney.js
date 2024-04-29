$(document).ready(function () {
  var accountNumberTimer;
  var amountTimer;

  $("#balance").change(function () {
    var selectedOption = $(this).find("option:selected");
    var dataPayment = selectedOption.data("payment");
    getSelectedAccount = dataPayment;
  });

  // Function balance
  function validateBalance() {
    var balance = parseFloat($("#balance").val());
    if (isNaN(balance) || balance < 1.0) {
      $(".balanceER").text(
        "Balance must be a valid number and at least $1.00 Or ៛10000."
      );
      $("#balance").addClass("border-red-500");
      $("#balance").removeClass("border-green-500");
      return false;
    } else {
      $(".balanceER").text("");
      $("#balance").addClass("border-green-500");
      $("#balance").removeClass("border-red-500");
      return true;
    }
  }

  // Function to validate account number
  $("#accountNumber").on("input", function () {
    clearTimeout(accountNumberTimer);
    accountNumberTimer = setTimeout(function () {
      validateAccountNumber();
    }, 300);
  });

  function validateAccountNumber() {
    var accountNumber = $("#accountNumber").val();
    var accountNumberError = "";
    if (!/^\d{9}$|^\d{12}$/.test(accountNumber)) {
      accountNumberError = "Account number must be 9 or 12 digits long.";
      $("#accountNumber").addClass("border-red-500");
      $("#accountNumber").removeClass("border-green-500");
      $("#accountNumberER").text(accountNumberError);
      return false;
    } else {
      $("#accountNumber").removeClass("border-red-500");
      $("#accountNumber").addClass("border-green-500");
      $("#accountNumberER").text("");
      return true;
    }
  }

  function validateAmount() {
    var amountStr = $("#amount").val().trim();
    var amount = parseFloat($("#amount").val());
    var balance = parseFloat($("#balance").val());
    var isKhmerBalance =
      $("#balance").find("option:selected").data("payment") === false;

    var amountError = "";
    if (isNaN(amount) || amount <= 0 || amount.length > 12 || amount === "") {
      amountError = "Amount must be a number and maximum 12 digits long.";
      $("#amount").addClass("border-red-500");
      $("#amount").removeClass("border-green-500");
      $("#amountER").text(amountError);
      return false;
    } else if (isKhmerBalance && amount < 10000) {
      amountError = "Amount must be greater than or equal to 10000.";
      $("#amount").addClass("border-red-500");
      $("#amount").removeClass("border-green-500");
      $("#amountER").text(amountError);
      return false;
    } else if (amount > balance) {
      amountError = "Amount cannot exceed the selected balance.";
      $("#amount").addClass("border-red-500");
      $("#amount").removeClass("border-green-500");
      $("#amountER").text(amountError);
      return false;
    } else {
      var decimalIndex = amountStr.indexOf("."); // Get the index of the decimal point
      if (
        decimalIndex !== -1 &&
        amountStr.substring(decimalIndex + 1).length > 1
      ) {
        // Check if decimal part has more than 2 digits
        amountError = "Decimal part cannot have more than 2 digits.";
        $("#amount").addClass("border-red-500");
        $("#amount").removeClass("border-green-500");
        $("#amountER").text(amountError);
        return false;
      } else {
        $("#amount").removeClass("border-red-500");
        $("#amount").addClass("border-green-500");
        $("#amountER").text("");
        return true;
      }
    }
  }

  // Function to validate amount
  $("#amount").on("input", function () {
    clearTimeout(amountTimer);
    amountTimer = setTimeout(function () {
      validateAmount();
    }, 300);
  });

  // Clear error message and border on input focus
  $("#accountNumber, #amount, #accountNumberER").focus(function () {
    $(this).removeClass("border-red-500");
    $("#accountNumberER, #amountER, #accountNumberER").text("");
  });

  // Clear error message
  function clearErrorMessage() {
    $("#accountNumberER").text("");
    $("#amountER").text("");
    $("#accountNumberER").text("");
  }

  // Function to format balance with proper separators
  function formatBalance(balance) {
    return balance
      .toString()
      .replace(/\./g, "")
      .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }

  function FetchAccNumAndBalance() {
    $.ajax({
      type: "GET",
      url: "./php/FetchAccNumAndBalance.php",
      dataType: "json",
      success: function (AccNumBalance) {
        $("#select_balance").empty();
        if (AccNumBalance[0]["balance_kh"] == 0) {
          $("#balances_kh").text(AccNumBalance[0]["balance_kh"] + ".00");
        } else {
          $("#balances_kh").text(formatBalance(AccNumBalance[0]["balance_kh"]));
        }

        if (AccNumBalance[0]["balance_eg"] == 0) {
          $("#balances_eg").text(AccNumBalance[0]["balance_eg"] + ".00");
        } else {
          $("#balances_eg").text(formatBalance(AccNumBalance[0]["balance_eg"]));
        }

        $("#account_number_kh_balance").text(
          AccNumBalance[0]["account_number_kh"]
        );
        $("#account_number_eg_balance").text(
          AccNumBalance[0]["account_number_eg"]
        );

        if (AccNumBalance.length > 0) {
          // Get the URL parameters
          const urlParams = new URLSearchParams(window.location.search);
          var AccNumBL =
            '<label for="balance" class="dark:text-gray-900 block text-sm font-medium leading-6 text-gray-900">Choose Balance</label>';
          AccNumBL += '<div class="mt-2">';
          AccNumBL +=
            '<select id="balance" name="balance" required class="px-2 block w-full rounded-md py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 border-2 placeholder:text-gray-400 sm:text-sm sm:leading-6">';
          AccNumBL +=
            '<option value="' +
            AccNumBalance[0]["balance_eg"] +
            '" data-payment="true"' +
            (urlParams.has("selected_kh") ? "" : "selected") +
            ">" +
            AccNumBalance[0]["account_number_eg"] +
            " : $ " +
            AccNumBalance[0]["balance_eg"] +
            "</option>";
          AccNumBL +=
            '<option value="' +
            AccNumBalance[0]["balance_kh"] +
            '" data-payment="false"' +
            (urlParams.has("selected_kh") ? "selected" : "") +
            ">" +
            AccNumBalance[0]["account_number_kh"] +
            " : ៛ " +
            AccNumBalance[0]["balance_kh"] +
            "</option>";
          AccNumBL += "</select>";
          AccNumBL += "</div>";
          AccNumBL +=
            '<p class="text-red-500 text-xs mt-1 balanceER" id="balanceER"></p>';

          $("#select_balance").append(AccNumBL);
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  }

  // Validate fields on submit
  $("#submitTransferMoney").click(function (e) {
    e.preventDefault();
    clearErrorMessage();

    $(".HideConfirmFourPassword-modal").prop("id", "HideConfirmFourPasswords");
    $(".btn-final-scan-qr").prop("id", "btn-final-qr");
    // Change the ID of the button
    $("#HideConfirmFourPasswords").click(function () {
      $("#ConfirmFourPassword-modal").addClass("hidden");
      $(".HideConfirmFourPassword-modal").prop("id", "");
      $(".btn-final-scan-qr").prop("id", "");
    });
    var accountNumber = $("#accountNumber").val();
    var amount = $("#amount").val();
    var description = $("#description").val();
    var balance = $("#balance").val();
    var getSelectedAccount =
      $("#balance").find("option:selected").data("payment") === true;

    var formData = new FormData();
    formData.append("accountNumber", accountNumber);
    formData.append("balance", balance);
    formData.append("amount", amount);
    formData.append("description", description);
    formData.append("check", getSelectedAccount);

    // Validate all fields
    var isAccountNumberValid = validateAccountNumber();
    var isAmountValid = validateAmount();
    var isBalanceValid = validateBalance();

    if (isAccountNumberValid && isAmountValid && isBalanceValid) {
      $("#ConfirmFourPassword-modal").removeClass("hidden");
      $("#btn-final-qr").click(function () {
        // Get all checked radio values
        var checkedValues = [];

        $('input[type="radio"]').each(function () {
          if ($(this).is(":checked")) {
            checkedValues.push($(this).val());
          }
        });

        // Check if none of the radio inputs are checked
        if (checkedValues.length !== 4) {
          // Add tremble effect to the button
          $("#ConfirmFourPassword-modal").addClass("tremble");

          // Remove the tremble effect after 5 seconds
          setTimeout(function () {
            $("#ConfirmFourPassword-modal").removeClass("tremble");
            $(".wrong-password-four").removeClass("-top-20");
            $(".wrong-password-four").addClass("top-[-2px]");
            $(".wrong-password-four-text").text("Please enter your password!");
          }, 1000);

          setTimeout(function () {
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
            success: function (response) {
              if (response.message === "error") {
                // Add tremble effect to the button
                $("#ConfirmFourPassword-modal").addClass("tremble");

                // Remove the tremble effect after 5 seconds
                setTimeout(function () {
                  $("#ConfirmFourPassword-modal").removeClass("tremble");
                  $(".wrong-password-four").removeClass("-top-20");
                  $(".wrong-password-four").addClass("top-[-2px]");
                  $(".wrong-password-four-text").text("Password not correct!");
                }, 1000);

                setTimeout(function () {
                  $(".wrong-password-four").addClass("-top-20");
                  $(".wrong-password-four").removeClass("top-[-2px]");
                }, 3000);
              } else {
                $.ajax({
                  type: "POST",
                  url: "./php/SubmitPaymentMoney.php",
                  data: formData,
                  processData: false,
                  contentType: false,
                  dataType: "json",
                  success: function (response) {
                    FetchAccNumAndBalance();
                    alert(response.message);
                    $('input[type="radio"]').prop("checked", false);
                    $("#inputDisplay").val("");
                    $("#ConfirmFourPassword-modal").addClass("hidden");
                  },
                  error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                  },
                });
              }
            },
            error: function (xhr, status, error) {
              console.error(xhr.responseText);
            },
          });
          // Remove the tremble effect if previously added
          $("#ConfirmFourPassword-modal").removeClass("tremble");
        }
      });
    } else {
      alert("One or more fields are invalid");
    }
  });
});

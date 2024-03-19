$(document).ready(function () {
  $("#submit-login").click(function (event) {
    event.preventDefault(); // Prevent default button click behavior

    // Manually trigger the form submission
    $("#login-form").submit();
  });

  // Form submit event handler
  $("#login-form").submit(function (event) {
    event.preventDefault(); // Prevent default form submission
    var phone = $("#phone-number").val();
    var password = $("#password").val();
    var remember = $("#remember").prop("checked");

    var formData = new FormData();
    formData.append("phone", phone);
    formData.append("password", password);
    formData.append("remember", remember);

    // Validate phone number
    if (!$("#Message_Error_PhoneNumber").hasClass("hidden")) {
      $("#Message_Error_PhoneNumber").removeClass("hidden");
      return;
    }

    // Validate password
    if (!$("#Message_Error_Password").hasClass("hidden")) {
      $("#Message_Error_Password").removeClass("hidden");
      return;
    }

    if (phone == "") {
      alert("Please enter phone number");
    } else if (password == "") {
      alert("Please enter password");
    } else {
      $.ajax({
        url: "./php/login.php",
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          if (response == "success") {
            location.replace("./");
          }
          if (response == "false") {
            alert("Invalid phone number or password.");
          }
        },
        error: function (xhr, status, error) {
          console.log(xhr, status, error);
        },
      });
    }
  });
});

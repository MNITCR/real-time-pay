$(document).ready(function () {
  // Event handler for button click
  $("#submit_signup").click(function (event) {
    event.preventDefault(); // Prevent default button click behavior

    // Manually trigger the form submission
    $("#registration-form").submit();
  });

  $("#registration-form").submit(function (event) {
    event.preventDefault(); // Prevent default form submission

    // Perform client-side validation
    var firstName = $("#first_name").val();
    var lastName = $("#last_name").val();
    var phone = $("#phone").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var confirmPassword = $("#confirm_password").val();
    var imageFile = $("#dropzone-file")[0].files[0]; // Get the first file from input

    if (
      firstName === "" ||
      lastName === "" ||
      phone === "" ||
      email === "" ||
      password === "" ||
      confirmPassword === ""
    ) {
      alert("All fields including image are required.");
    } else {
      // Create FormData object to store form data including the image file
      var formData = new FormData();
      formData.append("first_name", firstName);
      formData.append("last_name", lastName);
      formData.append("phone", phone);
      formData.append("email", email);
      formData.append("password", password);
      formData.append("image", imageFile);

      // Send AJAX request to the server
      $.ajax({
        url: "./php/register.php",
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          if (response === "success") {
            alert("Registration successful!");
            location.replace("./login");
          }else{
            alert(response);
          }
        },
        error: function (xhr, status, error) {
          // Handle error response
          console.error("Error:", error);
          alert("An error occurred. Please try again later.");
        },
      });
    }
  });
});

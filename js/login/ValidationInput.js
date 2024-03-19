$(document).ready(function () {
  // Function to set styles for an element
  function setStyles(element, styles) {
    element.attr("class", styles.join(" "));
  }

  // Phone number input validation
  $("#phone-number").on("input", function () {
    var phoneNumber = $(this).val();
    var isValidPhoneNumber =
      /^(\+?(\d{1,3}))?([- ]?\d{3}[- ]?)\d{3}[- ]?\d{4}$/.test(phoneNumber);

    // Add or remove classes based on validation result
    if (isValidPhoneNumber && phoneNumber.length <= 10) {
      $("#Message_Error_PhoneNumber").addClass("hidden");
      // Add styles for invalid input
      setStyles($("#phone-number"), [
        "ps-10",
        "outline-none",
        "focus:outline-green-600",
        "bg-green-50",
        "border-green-500",
        "text-gray-200",
        "dark:text-gray-900",
        "placeholder-green-700",
        "dark:placeholder-green-500",
        "text-sm",
        "rounded-lg",
        "focus:ring-green-500",
        "focus:border-green-500",
        "block",
        "w-full",
        "p-2",
        "dark:bg-white",
        "dark:border-green-500",
      ]);
    } else if (phoneNumber === "") {
      // Corrected condition
      $("#Message_Error_PhoneNumber").addClass("hidden");
      // Add styles for empty input
      setStyles($("#phone-number"), [
        "ps-10",
        "bg-gray-50",
        "border",
        "border-gray-300",
        "text-gray-900",
        "text-sm",
        "rounded-lg",
        "focus:ring-blue-500",
        "focus:border-blue-500",
        "block",
        "w-full",
        "p-2",
        "dark:bg-white",
        "dark:border-gray-600",
        "dark:placeholder-gray-400",
        "dark:text-white",
        "dark:focus:ring-blue-500",
        "dark:focus:border-blue-500",
      ]);
    } else {
      $("#Message_Error_PhoneNumber").removeClass("hidden");
      // Add styles for valid input
      setStyles($("#phone-number"), [
        "ps-10",
        "outline-none",
        "focus:outline-red-600",
        "bg-red-50",
        "border",
        "border-red-500",
        "text-gray-900",
        "dark:text-gray-900",
        "placeholder-red-700",
        "dark:placeholder-red-500",
        "text-sm",
        "rounded-lg",
        "focus:ring-red-500",
        "focus:border-red-500",
        "block",
        "w-full",
        "p-2",
        "dark:bg-white",
        "dark:border-red-500",
        "dark:text-red-500",
      ]);
    }
  });

  // Password input validation
  $("#password").on("input", function () {
    var password = $(this).val();
    var isValidPassword =
      /^(?=.*[a-zA-Z0-9@\$!%*?&])[\w@\#$!%*?&]{1,}$/.test(password) &&
      password.length >= 9;

    if (isValidPassword) {
      $("#Message_Error_Password").addClass("hidden");
      // Add styles for valid input
      setStyles($("#password"), [
        "ps-10",
        "outline-none",
        "focus:outline-green-600",
        "bg-green-50",
        "border-green-500",
        "text-gray-200",
        "dark:text-gray-900",
        "placeholder-green-700",
        "dark:placeholder-green-500",
        "text-sm",
        "rounded-lg",
        "focus:ring-green-500",
        "focus:border-green-500",
        "block",
        "w-full",
        "p-2",
        "dark:bg-white",
        "dark:border-green-500",
      ]);
    } else if (password === "") {
      $("#Message_Error_Password").addClass("hidden");

      // Add styles for empty input
      setStyles($("#password"), [
        "ps-10",
        "bg-gray-50",
        "border",
        "border-gray-300",
        "text-gray-900",
        "text-sm",
        "rounded-lg",
        "focus:ring-blue-500",
        "focus:border-blue-500",
        "block",
        "w-full",
        "p-2",
        "dark:bg-white",
        "dark:border-gray-600",
        "dark:placeholder-gray-400",
        "dark:text-white",
        "dark:focus:ring-blue-500",
        "dark:focus:border-blue-500",
      ]);
    } else {
      $("#Message_Error_Password").removeClass("hidden");
      setStyles($("#password"), [
        "ps-10",
        "outline-none",
        "focus:outline-red-600",
        "bg-red-50",
        "border",
        "border-red-500",
        "text-gray-900",
        "dark:text-gray-900",
        "dark:placeholder-red-700",
        "dark:placeholder-red-500",
        "text-sm",
        "rounded-lg",
        "focus:ring-red-500",
        "focus:border-red-500",
        "block",
        "w-full",
        "p-2",
        "dark:bg-white",
        "dark:border-red-500",
        "dark:text-red-500",
      ]);
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const firstNameInput = document.getElementById("first_name");
  const lastNameInput = document.getElementById("last_name");
  const phoneInput = document.getElementById("phone");
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");
  const confirmPasswordInput = document.getElementById("confirm_password");

  // get id all error messages
  const MSEFirstName = document.getElementById("Message_Error_FirstName");
  const MSELastName = document.getElementById("Message_Error_LastName");
  const MSEPhonenumber = document.getElementById("Message_Error_PhoneNumber");
  const MSEEmail = document.getElementById("Message_Error_Email");
  const MSEPassword = document.getElementById("Message_Error_Password");
  const MSECPassword = document.getElementById("Message_Error_ConfirmPassword");

  // function handle all input
  function setStyles(inputElement, classes) {
    inputElement.className = classes.join(" ");
  }

  // first name
  firstNameInput.addEventListener("input", function (event) {
    const inputValue = event.target.value;
    const isOnlyLetters = /^[A-Za-z]+$/.test(inputValue);

    setStyles(
      firstNameInput,
      isOnlyLetters
        ? [
            "outline-none",
            "focus:outline-green-600",
            "bg-green-50",
            "border",
            "border-green-500",
            "text-gray-200",
            "dark:text-gray-200",
            "placeholder-green-700",
            "dark:placeholder-green-500",
            "text-sm",
            "rounded-lg",
            "focus:ring-green-500",
            "focus:border-green-500",
            "block",
            "w-full",
            "p-2.5",
            "dark:bg-gray-700",
            "dark:border-green-500",
          ]
        : inputValue === "" || inputValue === null
        ? [
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
            "p-2.5",
            "dark:bg-gray-700",
            "dark:border-gray-600",
            "dark:placeholder-gray-400",
            "dark:text-white",
            "dark:focus:ring-blue-500",
            "dark:focus:border-blue-500",
          ]
        : [
            "outline-none",
            "focus:outline-red-600",
            "bg-red-50",
            "border",
            "border-red-500",
            "text-gray-200",
            "dark:text-gray-200",
            "placeholder-red-700",
            "dark:placeholder-red-500",
            "text-sm",
            "rounded-lg",
            "focus:ring-red-500",
            "focus:border-red-500",
            "block",
            "w-full",
            "p-2.5",
            "dark:bg-gray-700",
            "dark:border-red-500",
            "dark:text-red-500",
          ]
    );

    // Message error
    MSEFirstName.classList.toggle(
      "hidden",
      inputValue === "" || inputValue === null || isOnlyLetters
    );
  });

  // last name
  lastNameInput.addEventListener("input", function (event) {
    const inputValue = event.target.value;
    const isOnlyLetters = /^[A-Za-z]+$/.test(inputValue);

    setStyles(
      lastNameInput,
      isOnlyLetters
        ? [
            "outline-none",
            "focus:outline-green-600",
            "bg-green-50",
            "border",
            "border-green-500",
            "text-gray-200",
            "dark:text-gray-200",
            "placeholder-green-700",
            "dark:placeholder-green-500",
            "text-sm",
            "rounded-lg",
            "focus:ring-green-500",
            "focus:border-green-500",
            "block",
            "w-full",
            "p-2.5",
            "dark:bg-gray-700",
            "dark:border-green-500",
          ]
        : inputValue === "" || inputValue === null
        ? [
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
            "p-2.5",
            "dark:bg-gray-700",
            "dark:border-gray-600",
            "dark:placeholder-gray-400",
            "dark:text-white",
            "dark:focus:ring-blue-500",
            "dark:focus:border-blue-500",
          ]
        : [
            "outline-none",
            "focus:outline-red-600",
            "bg-red-50",
            "border",
            "border-red-500",
            "text-gray-200",
            "dark:text-gray-200",
            "placeholder-red-700",
            "dark:placeholder-red-500",
            "text-sm",
            "rounded-lg",
            "focus:ring-red-500",
            "focus:border-red-500",
            "block",
            "w-full",
            "p-2.5",
            "dark:bg-gray-700",
            "dark:border-red-500",
            "dark:text-red-500",
          ]
    );

    // Message error
    MSELastName.classList.toggle(
      "hidden",
      inputValue === "" || inputValue === null || isOnlyLetters
    );
  });

  // phone number
  phoneInput.addEventListener("input", function (event) {
    const inputValue = event.target.value;
    const isOnlyNumbers = /^[0-9]+$/.test(inputValue);

    setStyles(
      phoneInput,
      isOnlyNumbers && inputValue.length == 10
        ? [
            "ps-10",
            "outline-none",
            "focus:outline-green-600",
            "bg-green-50",
            "border",
            "border-green-500",
            "text-gray-200",
            "dark:text-gray-200",
            "placeholder-green-700",
            "dark:placeholder-green-500",
            "text-sm",
            "rounded-lg",
            "focus:ring-green-500",
            "focus:border-green-500",
            "block",
            "w-full",
            "p-2.5",
            "dark:bg-gray-700",
            "dark:border-green-500",
          ]
        : inputValue === "" || inputValue === null
        ? [
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
            "p-2.5",
            "dark:bg-gray-700",
            "dark:border-gray-600",
            "dark:placeholder-gray-400",
            "dark:text-white",
            "dark:focus:ring-blue-500",
            "dark:focus:border-blue-500",
          ]
        : [
            "ps-10",
            "outline-none",
            "focus:outline-red-600",
            "bg-red-50",
            "border",
            "border-red-500",
            "text-gray-200",
            "dark:text-gray-200",
            "placeholder-red-700",
            "dark:placeholder-red-500",
            "text-sm",
            "rounded-lg",
            "focus:ring-red-500",
            "focus:border-red-500",
            "block",
            "w-full",
            "p-2.5",
            "dark:bg-gray-700",
            "dark:border-red-500",
            "dark:text-red-500",
          ]
    );

    // Message error
    MSEPhonenumber.classList.toggle(
      "hidden",
      inputValue === "" || inputValue === null || isOnlyNumbers
    );
  });

  // email
  emailInput.addEventListener("input", function (event) {
    const inputValue = event.target.value;
    const validDomains = ["gmail.com", "yahoo.com", "outlook.com"];

    const isValidDomain = validDomains.some((domain) =>
      inputValue.endsWith(`@${domain}`)
    );

    setStyles(
      emailInput,
      isValidDomain
        ? [
            "ps-10",
            "outline-none",
            "focus:outline-green-600",
            "bg-green-50",
            "border",
            "border-green-500",
            "text-gray-200",
            "dark:text-gray-200",
            "placeholder-green-700",
            "dark:placeholder-green-500",
            "text-sm",
            "rounded-lg",
            "focus:ring-green-500",
            "focus:border-green-500",
            "block",
            "w-full",
            "p-2.5",
            "dark:bg-gray-700",
            "dark:border-green-500",
          ]
        : inputValue === "" || inputValue === null
        ? [
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
            "p-2.5",
            "dark:bg-gray-700",
            "dark:border-gray-600",
            "dark:placeholder-gray-400",
            "dark:text-white",
            "dark:focus:ring-blue-500",
            "dark:focus:border-blue-500",
          ]
        : [
            "ps-10",
            "outline-none",
            "focus:outline-red-600",
            "bg-red-50",
            "border",
            "border-red-500",
            "text-gray-200",
            "dark:text-gray-200",
            "placeholder-red-700",
            "dark:placeholder-red-500",
            "text-sm",
            "rounded-lg",
            "focus:ring-red-500",
            "focus:border-red-500",
            "block",
            "w-full",
            "p-2.5",
            "dark:bg-gray-700",
            "dark:border-red-500",
            "dark:text-red-500",
          ]
    );

    // Message Error
    MSEEmail.classList.toggle(
      "hidden",
      inputValue === "" || inputValue === null || isValidDomain
    );
  });

  function validatePassword() {
    validateConfirmPassword();
    const inputValue = passwordInput.value;

    // Use a regular expression to check if the password meets the criteria
    const isStrongPassword = /^(?=.*[A-Z])(?=.*[0-9!@#$%^&*])(.{10,})$/.test(
      inputValue
    );

    // Update styles based on the password strength
    setStyles(
      passwordInput,
      isStrongPassword
        ? [
            "ps-10",
            "outline-none",
            "focus:outline-green-600",
            "bg-green-50",
            "border",
            "border-green-500",
            "text-gray-200",
            "dark:text-gray-200",
            "placeholder-green-700",
            "dark:placeholder-green-500",
            "text-sm",
            "rounded-lg",
            "focus:ring-green-500",
            "focus:border-green-500",
            "block",
            "w-full",
            "p-2.5",
            "dark:bg-gray-700",
            "dark:border-green-500",
          ]
        : inputValue === "" || inputValue === null
        ? [
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
            "p-2.5",
            "dark:bg-gray-700",
            "dark:border-gray-600",
            "dark:placeholder-gray-400",
            "dark:text-white",
            "dark:focus:ring-blue-500",
            "dark:focus:border-blue-500",
          ]
        : [
            "ps-10",
            "outline-none",
            "focus:outline-red-600",
            "bg-red-50",
            "border",
            "border-red-500",
            "text-gray-200",
            "dark:text-gray-200",
            "placeholder-red-700",
            "dark:placeholder-red-500",
            "text-sm",
            "rounded-lg",
            "focus:ring-red-500",
            "focus:border-red-500",
            "block",
            "w-full",
            "p-2.5",
            "dark:bg-gray-700",
            "dark:border-red-500",
            "dark:text-red-500",
          ]
    );

    // Message Error
    MSEPassword.classList.toggle(
      "hidden",
      inputValue === "" || inputValue === null || isStrongPassword
    );
  }

  function validateConfirmPassword() {
    const passwordValue = passwordInput.value;
    const confirmValue = confirmPasswordInput.value;
    const confirm = confirmValue === passwordValue;
    const isStrongPassword = /^(?=.*[A-Z])(?=.*[0-9!@#$%^&*])(.{10,})$/.test(
      confirmValue
    );

    setStyles(
      confirmPasswordInput,
      confirm && confirmValue.length > 0
        ? isStrongPassword
          ? [
              "ps-10",
              "outline-none",
              "focus:outline-green-600",
              "bg-green-50",
              "border",
              "border-green-500",
              "text-gray-200",
              "dark:text-gray-200",
              "placeholder-green-700",
              "dark:placeholder-green-500",
              "text-sm",
              "rounded-lg",
              "focus:ring-green-500",
              "focus:border-green-500",
              "block",
              "w-full",
              "p-2.5",
              "dark:bg-gray-700",
              "dark:border-green-500",
            ]
          : [
              "ps-10",
              "outline-none",
              "focus:outline-red-600",
              "bg-red-50",
              "border",
              "border-red-500",
              "text-gray-200",
              "dark:text-gray-200",
              "placeholder-red-700",
              "dark:placeholder-red-500",
              "text-sm",
              "rounded-lg",
              "focus:ring-red-500",
              "focus:border-red-500",
              "block",
              "w-full",
              "p-2.5",
              "dark:bg-gray-700",
              "dark:border-red-500",
              "dark:text-red-500",
            ]
        : confirmValue === "" || confirmValue === null
        ? [
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
            "p-2.5",
            "dark:bg-gray-700",
            "dark:border-gray-600",
            "dark:placeholder-gray-400",
            "dark:text-white",
            "dark:focus:ring-blue-500",
            "dark:focus:border-blue-500",
          ]
        : [
            "ps-10",
            "outline-none",
            "focus:outline-red-600",
            "bg-red-50",
            "border",
            "border-red-500",
            "text-gray-200",
            "dark:text-gray-200",
            "placeholder-red-700",
            "dark:placeholder-red-500",
            "text-sm",
            "rounded-lg",
            "focus:ring-red-500",
            "focus:border-red-500",
            "block",
            "w-full",
            "p-2.5",
            "dark:bg-gray-700",
            "dark:border-red-500",
            "dark:text-red-500",
          ]
    );

    // Message error
    MSECPassword.classList.toggle(
      "hidden",
      confirmValue === "" ||
        confirmValue === null ||
        (confirm && confirmValue.length > 0)
    );
  }

  // Event listeners
  passwordInput.addEventListener("input", validatePassword);
  confirmPasswordInput.addEventListener("input", validateConfirmPassword);

  // ===================> BTN SING UP <==================
  const btnSignUp = document.getElementById("submit_signup");
  const messageAlert = document.getElementById("text-success");
  btnSignUp.addEventListener("click", function (e) {
    e.preventDefault(); // Prevent the default form submission

    // Get input values
    const firstNameValue = firstNameInput.value;
    const lastNameValue = lastNameInput.value;
    const emailValue = emailInput.value;
    const phoneValue = phoneInput.value;
    const passwordValue = passwordInput.value;
    const confirmPasswordValue = confirmPasswordInput.value;

    // Validate input fields
    if (!validateName(firstNameValue)) {
      showSuccessAlert();
      messageAlert.innerHTML = "Please enter a valid first name.";
      return;
    }

    if (!validateName(lastNameValue)) {
      showSuccessAlert();
      messageAlert.innerHTML = "Please enter a valid last name.";
      return;
    }

    if (!validatePhoneNumber(phoneValue)) {
      showSuccessAlert();
      messageAlert.innerHTML = "Please enter a valid phone number (10 digits).";
      return;
    }

    if (!validateEmail(emailValue)) {
      showSuccessAlert();
      messageAlert.innerHTML =
        "Please enter a valid email address with a supported domain (gmail.com, yahoo.com, outlook.com).";
      return;
    }

    if (!ValidatePassword(passwordValue)) {
      showSuccessAlert();
      messageAlert.innerHTML =
        "Please enter a valid password (at least 10 characters, including an uppercase letter and a number or special character).";
      return;
    }

    if (passwordValue !== confirmPasswordValue) {
      showSuccessAlert();
      messageAlert.innerHTML =
        "Passwords do not match. Please re-enter your password.";
      return;
    }
  });

  // Function to validate name
  function validateName(name) {
    return /^[A-Za-z]+$/.test(name);
  }

  // Function to validate phone number
  function validatePhoneNumber(phone) {
    return /^\d{10}$/.test(phone);
  }

  // Function to validate password
  function ValidatePassword(password) {
    // Adjusted the regular expression to ensure at least one digit and one special character
    return /^(?=.*[A-Z])(?=.*[0-9!@#$%^&*]).{10,}$/.test(password);
  }

  // Function to validate email address with specific valid domains
  function validateEmail(email) {
    const validDomains = ["gmail.com", "yahoo.com", "outlook.com"];
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {
      return false;
    }

    const domain = email.split("@")[1];
    return validDomains.includes(domain.toLowerCase());
  }
});

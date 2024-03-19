<!-- Change title page -->
<?php $title = "Sing in"; ?>

<?php require("views/components/head.components.php") ?>
<div class="dark:bg-slate-800 flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 h-[100vh]">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
        <h2 class="mt-10 text-center dark:text-white text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-5" id="login-form" method="post">

            <!-- input phone number -->
            <div>
                <label for="phone-number" class="dark:text-white block text-sm font-medium leading-6 text-gray-900">Phone number</label>

                <div class="flex relative items-center divide-x divide-gray-600 mt-2">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-gray-500 dark:text-slate-800">
                            <path d="M21 16.42V19.9561C21 20.4811 20.5941 20.9167 20.0705 20.9537C19.6331 20.9846 19.2763 21 19 21C10.1634 21 3 13.8366 3 5C3 4.72371 3.01545 4.36687 3.04635 3.9295C3.08337 3.40588 3.51894 3 4.04386 3H7.5801C7.83678 3 8.05176 3.19442 8.07753 3.4498C8.10067 3.67907 8.12218 3.86314 8.14207 4.00202C8.34435 5.41472 8.75753 6.75936 9.3487 8.00303C9.44359 8.20265 9.38171 8.44159 9.20185 8.57006L7.04355 10.1118C8.35752 13.1811 10.8189 15.6425 13.8882 16.9565L15.4271 14.8019C15.5572 14.6199 15.799 14.5573 16.001 14.6532C17.2446 15.2439 18.5891 15.6566 20.0016 15.8584C20.1396 15.8782 20.3225 15.8995 20.5502 15.9225C20.8056 15.9483 21 16.1633 21 16.42Z"></path>
                        </svg>
                    </div>

                    <input id="phone-number" name="phone-number" type="text" required class="ps-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php if (isset($_COOKIE["phone_number"])) {
                                                                                                                                                                                                                                                                                                                                                echo $_COOKIE["phone_number"];
                                                                                                                                                                                                                                                                                                                                            } ?>" placeholder="096-90-80-686">
                </div>

                <!-- Message Error -->
                <p id="Message_Error_PhoneNumber" class="hidden mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">Oh, snapp!</span> Can't insert text
                </p>
            </div>

            <!-- Input password -->
            <div>
                <label for="password" class="mb-2 dark:text-white block text-sm font-medium leading-6 text-gray-900">Password</label>
                <div class="flex relative items-center divide-x divide-gray-600">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-slate-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7 10H20C20.5523 10 21 10.4477 21 11V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V11C3 10.4477 3.44772 10 4 10H5V9C5 5.13401 8.13401 2 12 2C14.7405 2 17.1131 3.5748 18.2624 5.86882L16.4731 6.76344C15.6522 5.12486 13.9575 4 12 4C9.23858 4 7 6.23858 7 9V10ZM10 15V17H14V15H10Z"></path>
                        </svg>
                    </div>

                    <input id="password" name="password" type="password" required class="ps-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php if (isset($_COOKIE["user_password"])) {
                                                                                                                                                                                                                                                                                                                                            echo $_COOKIE["user_password"];
                                                                                                                                                                                                                                                                                                                                        } ?>" placeholder="example@#$123">

                    <div class="right-0 absolute">
                        <button id="btn_toggle_password" type="button" class="dark:bg-gray-700 hover:cursor-pointer active:bg-slate-700 inline-flex items-center p-[9px] text-sm text-gray-900 rounded-e-lg rounded-s-0 dark:text-gray-400 dark:border-gray-200" id="copyUserId">
                            <svg id="eyeIcon" class="w-[18px] h-5 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Message Error -->
                <p id="Message_Error_Password" class="hidden mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">Oh, snapp!</span> Can't without uppercase , number , special .
                </p>
            </div>

            <!-- remember me -->
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input name="remember" id="remember" type="checkbox" class="cursor-pointer w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" <?php if (isset($_COOKIE["user_password"])) {
                                                                                                                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                                                                                                                    } ?>>
                </div>
                <div class="ml-3 text-sm">
                    <label for="terms" class="cursor-pointer font-light text-gray-500 dark:text-gray-300 font-medium">Remember me</label>
                </div>
            </div>

            <!-- button login in -->
            <div>
                <button type="submit" id="submit-login" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
            </div>
        </form>

        <p class="mt-4 text-center text-sm text-gray-500">
            Not have account yet?
            <a href="./register" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Start create account</a>
        </p>

        <!-- Login by scanner -->
        <div class="w-full mt-3">
            <button id="login-by-scanner" py-2 class="w-full text-white bg-sky-800 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-semibold rounded-lg text-sm py-2 flex justify-center items-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800 transition-all" type="button">
                Login by Scanner
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-4.5 ml-3 mt-1 text-white" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17 9.2L22.2133 5.55071C22.4395 5.39235 22.7513 5.44737 22.9096 5.6736C22.9684 5.75764 23 5.85774 23 5.96033V18.0397C23 18.3158 22.7761 18.5397 22.5 18.5397C22.3974 18.5397 22.2973 18.5081 22.2133 18.4493L17 14.8V19C17 19.5523 16.5523 20 16 20H2C1.44772 20 1 19.5523 1 19V5C1 4.44772 1.44772 4 2 4H16C16.5523 4 17 4.44772 17 5V9.2Z"></path>
                </svg>
            </button>
        </div>
    </div>
</div>

<!-- script show and hide password -->
<script src="./js/login/ShowAndHide.js"></script>

<!-- script validation -->
<script src="./js/login/ValidationInput.js"></script>

<!-- script submit login -->
<script src="./js/login/SubmitLogin.js"></script>

<!-- script dropdown login -->
<script src="./js/login/LoginByScan.js"></script>

<!-- alert login or not -->
<script>
    $(document).ready(function() {
        $("#login-by-scanner").click(function() {
            const scan = confirm("Do you want to login by scanning");

            if (scan) {
                location.replace("./login-by-scanner");
            }
        });
    });
</script>

<?php require("views/components/footer.components.php") ?>

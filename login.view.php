<!-- Change title page -->
<?php $title = "Sing in";?>

<?php require("Test/views/components/head.components.php") ?>

    <div class="dark:bg-slate-800 flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 h-[100vh]">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
            <h2 class="mt-10 text-center dark:text-white text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-5" action="#" method="POST">

                <!-- input name -->
                <div>
                    <label for="name" class="dark:text-white block text-sm font-medium leading-6 text-gray-900">Full name</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" required class="px-1 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>">
                    </div>
                </div>

                <!-- Input password -->
                <div>
                    <label for="password" class="dark:text-white block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="px-1 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>">
                    </div>
                </div>

                <!-- remember me -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input name="remember" id="terms" aria-describedby="terms" type="checkbox" class="cursor-pointer w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" >
                    </div>
                    <div class="ml-3 text-sm" >
                        <label for="terms" class="cursor-pointer font-light text-gray-500 dark:text-gray-300 font-medium">Remember me</label>
                    </div>
                </div>

                <!-- button sing in -->
                <div>
                    <button type="submit" name="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>
            </form>

            <p class="mt-4 text-center text-sm text-gray-500">
            Not account?
            <a href="./singup.view.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Start create account</a>
            </p>
        </div>
    </div>




<?php require("Test/views/components/footer.components.php") ?>

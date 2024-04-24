<style>
    @keyframes tremble {
        0% {
            transform: rotate(-1deg);
        }

        50% {
            transform: rotate(1deg);
        }

        100% {
            transform: rotate(-1deg);
        }
    }

    .tremble {
        animation: tremble 0.1s ease infinite;
    }
</style>

<!-- pop up history account transfer -->
<div id="ConfirmFourPassword-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative sm:mx-auto sm:w-full sm:max-w-sm lg:max-w-sm">
        <!-- Modal content -->
        <div class="relative bg-cyan-700 rounded-lg shadow dark:bg-cyan-800" style="background: linear-gradient(217deg, rgb(22 78 99), rgb(14 116 144) 80.71%),
            linear-gradient(127deg, rgb(14 116 144), rgb(22 78 99) 90.71%);">
            <button type="button" class="HideConfirmFourPassword-modal absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-200/10 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <div class="px-6 py-6 lg:px-8">
                <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm lg:max-w-xl">
                    <!-- profile -->
                    <div class="bg-cyan-500 mt-8 flex justify-center items-center w-[60px] h-[60px] rounded-full m-auto text-white border-2 border-emerald-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18 8H20C20.5523 8 21 8.44772 21 9V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V9C3 8.44772 3.44772 8 4 8H6V7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7V8ZM5 10V20H19V10H5ZM11 14H13V16H11V14ZM7 14H9V16H7V14ZM15 14H17V16H15V14ZM16 8V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V8H16Z"></path>
                        </svg>
                    </div>

                    <!-- text -->
                    <div class="mt-3 mb-8 text-lg text-white text-center">
                        <p>Enter password to confirm</p>
                    </div>

                    <!-- show password input -->
                    <div class="mb-8 flex gap-4 justify-center items-center">
                        <input type="radio" name="password1" id="password1" class="h-[20px] w-[20px]">
                        <input type="radio" name="password2" id="password2" class="h-[20px] w-[20px]">
                        <input type="radio" name="password3" id="password3" class="h-[20px] w-[20px]">
                        <input type="radio" name="password4" id="password4" class="h-[20px] w-[20px]">
                        <input type="text" class="hidden" id="inputDisplay">
                    </div>

                    <!-- button input number -->
                    <div class="mb-8 grid grid-cols-3 gap-[1.8rem] text-white m-auto">
                        <input type="button" value="1" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer number-button">
                        <input type="button" value="2" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer number-button">
                        <input type="button" value="3" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer number-button">
                        <input type="button" value="4" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer number-button">
                        <input type="button" value="5" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer number-button">
                        <input type="button" value="6" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer number-button">
                        <input type="button" value="7" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer number-button">
                        <input type="button" value="8" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer number-button">
                        <input type="button" value="9" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer number-button">
                        <input type="button" value="C" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer text-[13.1px] clearAllValueCheck">
                        <input type="button" value="0" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer number-button">
                        <button type="button" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer clearBalanceValueOne"><i class="ri-delete-back-2-fill"></i></button>
                    </div>

                    <!-- confirm password 4 -->
                    <button type="submit" class="btn-final-scan-qr uppercase w-full text-white bg-cyan-600 hover:bg-cyan-350 dark:hover:bg-cyan-100/10 focus:ring-2 focus:outline-none focus:ring-cyan-600 transition-all ease-in-out font-medium rounded-lg text-sm px-5 py-2.5 text-center active:text-gray-300">Confirm</button>
                </div>
            </div>

            <div id="wrong-password-four" class="wrong-password-four bg-red-500 transition-all ease-out-in absolute -top-20 w-full text-center  p-1 rounded-tl-md rounded-tr-md">
                <p id="wrong-password-four-text" class="wrong-password-four-text text-white text-lg" style="letter-spacing: 1px;">Wrong password!</p>
            </div>
        </div>
    </div>
</div>

<!-- pop up history account transfer -->
<div id="ScanQrDollar-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative sm:mx-auto sm:w-full sm:max-w-sm lg:max-w-sm">
        <!-- Modal content -->
        <div class="relative bg-gray-700 rounded-lg shadow dark:bg-gray-700">
            <button type="button" id="HideQrDollar" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                    K D M V , SCAN
                </h3>

                <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm lg:max-w-xl">
                    <!-- profile -->
                    <div class="flex justify-center items-center w-[60px] h-[60px] bg-green-500  rounded-full m-auto text-white border-2 border-gray-200">
                        <h2 class="text-xl"><span id="first_name_one_character"></span><span id="last_name_one_character"></span></h2>
                    </div>

                    <!-- user name -->
                    <div class="mt-2 flex items-center w-full justify-center gap-2">
                        <div class="ms-[45px]">
                            <h2 class="text-center text-white uppercase" id="scan-qr-code-usd-khr"></h2>
                        </div>
                        <div class="border-2 bg-red-600 px-2 text-white rounded-md">
                            <p class="text-[12px]" id="main-scan-qr-sign"></p>
                        </div>
                    </div>

                    <!-- input value -->
                    <div class="flex items-center justify-center">
                        <input type="text" value="0" class="w-[70%] text-white text-3xl text-center bg-transparent border-transparent focus:outline-none">
                    </div>


                    <!-- send to -->
                    <div class="mb-3 text-center">
                        <p class="text-white"><span class="relative bottom-[1px]">Pay from :</span> <span class="text-cyan-500" id="scan-qr-number-of-balance"></span> <span class="text-cyan-500 relative bottom-[1.3px]">|</span> <span class="text-cyan-500" id="scan-qr-sign"></span></p>
                    </div>

                    <!-- button payment -->
                    <button type="submit" class="uppercase w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Pay now</button>
                </div>
            </div>
        </div>
    </div>
</div>

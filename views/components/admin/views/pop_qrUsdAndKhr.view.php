<!-- pop up history account transfer -->
<div id="qrDollar-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
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
                    K D M V , QR
                </h3>

                <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm lg:max-w-xl">
                    <div class="mb-4">
                        <p class="text-white w-full">Use this qr for receive money form friend or transfer to another bank <i class="ri-error-warning-line cursor-pointer text-cyan-500 active:text-cyan-600 transition-all ease-in-out text-[18px]"></i></p>
                    </div>
                    <div class="bg-red-700 rounded-tl-[10px] rounded-tr-[10px] p-2">
                        <p class="text-white text-center text-2xl">K H Q R</p>
                    </div>

                    <!-- user name and qr -->
                    <div class="mb-2 bg-gray-600 rounded-bl-[10px] rounded-br-[10px] relative">
                        <div class="px-6 pt-2">
                            <p class="text-white text-lg" id="qr-user-full-name"></p>
                            <p class="text-white text-lg hidden" id="qr-user-first-name"></p>
                            <p class="text-white text-lg hidden" id="qr-user-last-name"></p>
                            <p class="text-white text-lg hidden" id="qr-balance-usd"></p>
                            <p class="text-white text-lg hidden" id="qr-balance-khr"></p>

                            <h2 class="text-white text-2xl font-bold"><span id="type-of-money"></span> <span id="value-of-money">0</span></h2>
                        </div>
                        <div class="text-gray-300 overflow-x-hidden text-nowrap text-center">. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</div>
                        <div class="px-6 pt-3 pb-4 flex items-center justify-center">
                            <img src="" id="image-qr-code-usd" alt="QRUSDANDKHR" srcset="">
                        </div>
                        <div class="absolute h-8 top-0 right-0" style="border-right: 40px solid rgb(185 28 28);;
                        border-left: 40px solid transparent;
                        border-bottom: 40px solid transparent;">
                        </div>
                    </div>

                    <!-- Top up money -->
                    <div class="mb-2 text-center w-full active:bg-gray-300/10 transition-all ease-in-out bg-gray-500/10 p-1 mt-2 text-cyan-500 rounded-md">
                        <p class="flex items-center justify-center flex-row gap-2 cursor-pointer"><i class="ri-add-circle-line text-[19px] mt-1"></i> Top up</p>
                    </div>

                    <!-- send to -->
                    <div class="mb-3 text-center">
                        <p class="text-white"><span class="relative bottom-[1px]">Receive to :</span> <span class="text-cyan-500" id="qr-number-of-balance"></span> <span class="text-cyan-500 relative bottom-[1.3px]">|</span> <span class="text-cyan-500" id="qr-sign"></span></p>
                    </div>

                    <!-- button -->
                    <div class="flex items-center justify-center flex-row gap-6">
                        <!-- button download -->
                        <div class="flex items-center justify-center flex-col">
                            <div id="download-qr-usd-khr" class="active:bg-gray-400/10 transition-all ease-in-out cursor-pointer mb-2 text-white bg-gray-600 w-[45px] h-[45px] flex items-center justify-center rounded-full">
                                <i class="ri-download-2-line text-[18px]"></i>
                            </div>
                            <p class="text-white text-[14px]">Download</p>
                        </div>

                        <!-- button screen short -->
                        <div class="flex items-center justify-center flex-col">
                            <div id="screen-short-qr-usd-khr" class="active:bg-gray-400/10 transition-all ease-in-out cursor-pointer mb-2 text-white bg-gray-600 w-[45px] h-[45px] flex items-center justify-center rounded-full">
                                <i class="ri-screenshot-fill text-[18px] mt-1"></i>
                            </div>
                            <p class="text-white text-[14px]">Screen Short</p>
                        </div>

                        <!-- button send link -->
                        <div class="flex items-center justify-center flex-col">
                            <div id="send-link-qr-usd-khr" class="active:bg-gray-400/10 transition-all ease-in-out cursor-pointer mb-2 text-white bg-gray-600 w-[45px] h-[45px] flex items-center justify-center rounded-full">
                                <i class="ri-link-m text-[18px]"></i>
                            </div>
                            <p id='qr-token-usd-khr' class="hidden"></p>
                            <p id="qr-id-user-usd-khr" class="hidden"></p>
                            <p class="text-white text-[14px]">Send link</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- pop up history account transfer -->
<?php
$dataParam = isset($_GET['data']) ? '' :null;
// var_dump($decodedData["kjswoirnv5v"]);
if (isset($dataParam)) {
    $decodedData = json_decode(urldecode($dataParam), true);
    $stmt = $conn->prepare("SELECT token,user_id FROM user_tbl WHERE token = ? AND user_id = ?");
    $stmt->execute([$decodedData["loj232ovnje"], $decodedData["k2Cvblrl2v3"]]);
    $user = $stmt->fetch();

    if ($user) {
        echo '
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var check_usd_or_khr = "' . (isset($decodedData["jsbweiui235"]) ? $decodedData["jsbweiui235"] : "") . '";

                if (check_usd_or_khr === "KHR") {
                    console.log(check_usd_or_khr);
                    $("#scan-qr-sign").text("KHR");
                    $("#main-scan-qr-sign").text("KHR");
                    $("#balance-scan-qr-khr-or-usd").text("' . $decodedData["kjswoirnv5v"] . '");
                } else {
                    $("#main-scan-qr-sign").text("USD");
                    $("#scan-qr-sign").text("USD");
                    $("#balance-scan-qr-khr-or-usd").text("' . $decodedData["mv23redefnv"] . '");
                }
            });
        </script>';
    }
}
?>



<div id="ScanQrDollar-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative sm:mx-auto sm:w-full sm:max-w-sm lg:max-w-sm">
        <!-- Modal content -->
        <div class="relative bg-cyan-700 rounded-lg shadow dark:bg-cyan-800" style="background: linear-gradient(217deg, rgb(22 78 99), rgb(14 116 144) 95.71%),
            linear-gradient(127deg, rgb(14 116 144), rgb(22 78 99) 80.71%);">
            <a href="/real-time-pay/" class="dark:active:bg-gray-50/10 absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-400/10 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                    <path d="M12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM12 20C16.42 20 20 16.42 20 12C20 7.58 16.42 4 12 4C7.58 4 4 7.58 4 12C4 16.42 7.58 20 12 20ZM12 11H16V13H12V16L8 12L12 8V11Z"></path>
                </svg>
            </a>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                    M N C R , SCAN
                </h3>

                <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm lg:max-w-xl">
                    <!-- profile -->
                    <div id="scan-qr-profile" class="relative flex justify-center items-center w-[70px] h-[70px] rounded-full m-auto text-white border-2 border-gray-200">
                        <!-- <h2 class="text-xl absolute"  style="filter: blur(0px);"><span id="first_name_one_character" style="filter: blur(0px);
                        -webkit-filter: blur(0px);"></span><span id="last_name_one_character"></span></h2> -->
                    </div>

                    <div class="absolute z-30 m-auto w-full top-[5.5rem] left-[0.3px]">
                        <h2 class="text-xl text-center text-white" style="text-shadow: 1px 1px rgb(14 116 144);">
                            <span id="last_name_one_character"></span><span id="first_name_one_character"></span>
                        </h2>
                    </div>

                    <!-- user name -->
                    <div class="mt-2 flex items-center w-full justify-center gap-2">
                        <div class="ms-[45px]">
                            <h2 class="text-center text-white uppercase text-xl text-nowrap" id="scan-qr-code-usd-khr"></h2>
                        </div>
                        <p id="balance-scan-qr-khr-or-usd" class="hidden"></p>
                        <p id="scan-qr-user-first-name" class="hidden"></p>
                        <p id="scan-qr-user-last-name" class="hidden"></p>
                        <div class="mt-1 border-2 bg-red-600 px-2 text-white rounded-md">
                            <p class="text-[12px]" id="main-scan-qr-sign"></p>
                        </div>
                    </div>

                    <!-- input value balance -->
                    <div class="relative mt-1 flex items-center justify-center">
                        <input id="scan-qr-balance-value" type="text" value="" class="w-[70%] text-white text-3xl text-center bg-transparent border-transparent focus:outline-none">
                        <!-- tooltip -->
                        <div id="tooltip-default" role="tooltip" class="absolute z-10 inline-block px-3 py-[5px] text-sm font-medium text-white transition-opacity opacity-0 duration-300 bg-red-500 rounded-md shadow-sm tooltip top-[-36px]">
                            Pleas check your balance
                            <div style="
                                width: 0;
                                height: 0;
                                border-style: solid;
                                border-width: 5px 5px 0 5px;
                                border-color: rgb(239 68 68) transparent transparent transparent;
                                position: absolute;
                                bottom: -5px;
                                left: 50%;
                                transform: translateX(-50%);
                            ">
                            </div>
                        </div>
                    </div>


                    <!-- send to -->
                    <div class="mb-4 mt-4 text-center">
                        <p class="text-white text-[17px]"><span class="relative bottom-[1px]">Pay from :</span> <span class="text-cyan-500" id="scan-qr-number-of-balance"></span> <span class="text-cyan-500 relative bottom-[1.3px]">|</span> <span class="text-cyan-500" id="scan-qr-sign"></span></p>
                    </div>

                    <!-- note -->
                    <div class="mb-4">
                        <div class="flex hidden relative" id="scan-qr-note">
                            <span id="scan-qr-icon-pan-note" class="active:bg-cyan-500/10 transition-all ease-in-out cursor-pointer inline-flex items-center px-3 text-sm text-cyan-500 border rounded-e-0 border-cyan-300 border-e-0 rounded-s-md">
                                <i class="ri-pencil-line "></i>
                            </span>
                            <input type="text" id="scan-qr-input-note" class="outline-none rounded-none focus:border-s-transparent border-s-transparent rounded-e-lg bg-transparent border text-white focus:ring-cyan-500 focus:border-cyan-500 block flex-1 min-w-0 w-full text-sm border-cyan-300 p-[5px] lg:p-1.5 sm:p-2 md:p-2">
                        </div>

                        <div class="w-full" id="scan-qr-main-note">
                            <p class="mb-2 ms-1 text-white text-[15px]">Note :</p>
                            <div class="flex gap-2 justify-center items-center text-cyan-500 overflow-x-auto overflow-y-auto w-full text-[12.5px]">
                                <p class="border-[1px] active:bg-cyan-500/10 transition-all ease-in-out border-cyan-500 px-2 rounded-full text-nowrap cursor-pointer" id="scan-qr-click-show-note"><span><i class="ri-pencil-line text-[12px]"></i></span></p>
                                <p class="border-[1px] active:bg-cyan-500/10 transition-all ease-in-out border-cyan-500 px-2 rounded-full text-note-scan-qr cursor-pointer">Thanks</p>
                                <p class="border-[1px] active:bg-cyan-500/10 transition-all ease-in-out border-cyan-500 px-2 rounded-full text-note-scan-qr cursor-pointer">Lunch</p>
                                <p class="border-[1px] active:bg-cyan-500/10 transition-all ease-in-out border-cyan-500 px-2 rounded-full text-note-scan-qr cursor-pointer">Coffee</p>
                                <p class="border-[1px] active:bg-cyan-500/10 transition-all ease-in-out border-cyan-500 px-2 rounded-full text-note-scan-qr cursor-pointer">Shopping</p>
                            </div>
                        </div>
                    </div>

                    <!-- button input number -->
                    <div class="mb-4 grid grid-cols-3 gap-3 text-white m-auto">
                        <input type="button" value="1" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer updateBalanceValue">
                        <input type="button" value="2" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer updateBalanceValue">
                        <input type="button" value="3" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer updateBalanceValue">
                        <input type="button" value="4" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer updateBalanceValue">
                        <input type="button" value="5" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer updateBalanceValue">
                        <input type="button" value="6" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer updateBalanceValue">
                        <input type="button" value="7" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer updateBalanceValue">
                        <input type="button" value="8" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer updateBalanceValue">
                        <input type="button" value="9" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer updateBalanceValue">
                        <input type="button" value="." class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer font-bold updateBalanceValue">
                        <input type="button" value="0" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer updateBalanceValue">
                        <button type="button" class="active:bg-gray-400/10 active:text-gray-600/10 transition-all ease-in-out py-1 rounded-md text-[23px] cursor-pointer" onclick="clearBalanceValue()"><i class="ri-delete-back-2-fill"></i></button>
                    </div>

                    <!-- button payment -->
                    <input type="text" id="dataFetch-scan-ar" value="" class="hidden">
                    <button type="submit" id="submit-scan-qr-payment" class="uppercase w-full text-white bg-red-600 hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:hover:bg-red-700 dark:focus:ring-red-800">Pay now</button>
                </div>
            </div>

            <div id="wrong-password-four" class="bg-red-500 transition-all ease-out-in absolute -top-20 w-full text-center  p-1 rounded-tl-md rounded-tr-md">
                <p id="wrong-password-four-text" class="text-white text-lg" style="letter-spacing: 1px;">Wrong password!</p>
            </div>


        </div>
    </div>
</div>

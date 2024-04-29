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
                    M N C R , QR
                </h3>

                <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm lg:max-w-xl">
                    <div class="mb-4">
                        <p class="text-white w-full">Use this qr for receive money form friend or transfer to another bank <i class="ri-error-warning-line cursor-pointer text-cyan-500 active:text-cyan-600 transition-all ease-in-out text-[18px]"></i></p>
                    </div>

                    <div id="screenshot-container" class="bg-gray-700">
                        <div class="bg-red-700 rounded-tl-[10px] rounded-tr-[10px]">
                            <h2 class="text-white text-center pt-2 pb-2 text-2xl change-position">K H Q R</h2>
                            <p id="ipV4WIFI" class="hidden"></p>
                        </div>

                        <!-- user name and qr -->
                        <div class="mb-2 bg-gray-600 rounded-bl-[10px] rounded-br-[10px] relative">
                            <div class="px-6 pt-2">
                                <p class="text-white text-lg" id="qr-user-full-name"></p>
                                <h2 class="text-white text-2xl font-bold flex gap-1 items-center"><span id="type-of-money"></span> <span id="value-of-money">0</span></h2>
                            </div>
                            <div class="text-gray-300 overflow-x-hidden text-nowrap text-center">. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</div>
                            <div class="px-6 pt-3 pb-4 flex items-center justify-center">
                                <img src="" id="image-qr-code-usd" alt="QRUSDANDKHR" srcset="">
                                <p class="hidden" id="qr-user-last-name"></p>
                            </div>
                            <div class="absolute h-8 top-0 right-0" style="border-right: 40px solid rgb(185 28 28);;
                            border-left: 40px solid transparent;
                            border-bottom: 40px solid transparent;">
                                <p class="hidden" id="qr-balance-usd"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Top up money -->
                    <div class="mb-2 text-center w-full active:bg-gray-300/10 transition-all ease-in-out bg-gray-500/10 p-1 mt-2 text-cyan-500 rounded-md">
                        <p class="flex items-center justify-center flex-row gap-2 cursor-pointer"><i class="ri-add-circle-line text-[19px] mt-1"></i> Top up</p>
                        <p class="hidden" id="qr-user-first-name"></p>
                        <p id="user_id_scan_qr"></p>
                    </div>

                    <!-- send to -->
                    <div class="mb-3 text-center">
                        <p class="text-white"><span class="relative bottom-[1px]">Receive to :</span> <span class="text-cyan-500" id="qr-number-of-balance"></span> <span class="text-cyan-500 relative bottom-[1.3px]">|</span> <span class="text-cyan-500" id="qr-sign"></span></p>
                    </div>

                    <!-- button -->
                    <div class="flex items-center justify-center flex-row gap-6">
                        <!-- button download -->
                        <div class="flex items-center justify-center flex-col relative">
                            <div id="download-qr-usd-khr" class="active:bg-gray-400/10 transition-all ease-in-out cursor-pointer mb-2 text-white bg-gray-600 w-[45px] h-[45px] flex items-center justify-center rounded-full">
                                <i class="ri-download-2-line text-[18px]"></i>
                                <p class="hidden" id="qr-balance-khr"></p>
                            </div>
                            <p id='qr-token-usd-khr' class="hidden"></p>
                            <p class="text-white text-[14px]">Download</p>

                            <!-- tooltip -->
                            <div id="tooltip-download" role="tooltip" class="absolute z-10 inline-block px-3 py-[5px] text-sm font-medium text-white transition-opacity opacity-0 duration-300 bg-cyan-600 rounded-md shadow-sm tooltip top-[-40px]">
                                Download
                                <div style="
                                    width: 0;
                                    height: 0;
                                    border-style: solid;
                                    border-width: 5px 5px 0 5px;
                                    border-color: rgb(8 145 178) transparent transparent transparent;
                                    position: absolute;
                                    bottom: -5px;
                                    left: 50%;
                                    transform: translateX(-50%);
                                ">
                                </div>
                            </div>
                        </div>

                        <!-- button screen short -->
                        <div class="flex items-center justify-center flex-col relative">
                            <div id="screen-short-qr-usd-khr" class="active:bg-gray-400/10 transition-all ease-in-out cursor-pointer mb-2 text-white bg-gray-600 w-[45px] h-[45px] flex items-center justify-center rounded-full">
                                <i class="ri-screenshot-fill text-[18px] mt-1"></i>
                            </div>
                            <p class="hidden" id="qr-user-path-img"></p>
                            <p class="text-white text-[14px]">Screen Short</p>

                            <!-- tooltip -->
                            <div id="tooltip-sree-short" role="tooltip" class="text-nowrap absolute z-10 inline-block px-3 py-[5px] text-sm font-medium text-white transition-opacity opacity-0 duration-300 bg-cyan-600 rounded-md shadow-sm tooltip top-[-40px]">
                                Screen Short
                                <div style="
                                    width: 0;
                                    height: 0;
                                    border-style: solid;
                                    border-width: 5px 5px 0 5px;
                                    border-color: rgb(8 145 178) transparent transparent transparent;
                                    position: absolute;
                                    bottom: -5px;
                                    left: 50%;
                                    transform: translateX(-50%);
                                ">
                                </div>
                            </div>
                        </div>

                        <!-- button copy link -->
                        <div class="flex items-center justify-center flex-col relative">
                            <div id="send-link-qr-usd-khr" class="active:bg-gray-400/10 transition-all ease-in-out cursor-pointer mb-2 text-white bg-gray-600 w-[45px] h-[45px] flex items-center justify-center rounded-full">
                                <i class="ri-link-m text-[18px]"></i>
                            </div>
                            <p id="qr-id-user-usd-khr" class="hidden"></p>
                            <p class="text-white text-[14px]">Copy link</p>

                            <!-- tooltip -->
                            <div id="tooltip-copy-link" role="tooltip" class="absolute z-30 inline-block px-3 py-[5px] text-sm font-medium text-white transition-opacity opacity-0 duration-300 bg-cyan-600 rounded-md shadow-sm tooltip top-[-40px]">
                                Copy
                                <div style="
                                    width: 0;
                                    height: 0;
                                    border-style: solid;
                                    border-width: 5px 5px 0 5px;
                                    border-color: rgb(8 145 178) transparent transparent transparent;
                                    position: absolute;
                                    bottom: -5px;
                                    left: 50%;
                                    transform: translateX(-50%);
                                ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // sree shot image qr code
    document.getElementById('screen-short-qr-usd-khr').addEventListener('click', function() {
        // Select the HTML elements
        const element = document.getElementById('screenshot-container');
        const h2 = document.querySelector(".change-position");

        const tooltip = document.getElementById("tooltip-sree-short");

        tooltip.classList.remove("opacity-0");
        tooltip.classList.add("opacity-1");

        setTimeout(() => {
          tooltip.classList.remove("opacity-1");
          tooltip.classList.add("opacity-0");
        }, 2000);

        h2.style.position = "relative";
        h2.style.top = "-11px";

        // Use html2canvas to capture the element with specified styles
        html2canvas(element).then(function(canvas) {
            const imageDataURL = canvas.toDataURL();
            const screenshotImage = new Image();
            screenshotImage.src = imageDataURL;
            document.body.appendChild(screenshotImage);

            const downloadLink = document.createElement('a');
            downloadLink.href = imageDataURL;
            downloadLink.download = 'MNIT_SCREENSHOT_QR.png';
            downloadLink.click();
        });

        h2.style.position = "";
        h2.style.top = "";
    });




    // download image qr code
    const buttonDownload = document.getElementById("download-qr-usd-khr");
    buttonDownload.addEventListener("click", function() {
        downloadContentAsPNG()
    });

    // Function to download the content of qrDollar-modal as PNG
    function downloadContentAsPNG() {
        const tooltip = document.getElementById("tooltip-download");

        tooltip.classList.remove("opacity-0");
        tooltip.classList.add("opacity-1");

        setTimeout(() => {
          tooltip.classList.remove("opacity-1");
          tooltip.classList.add("opacity-0");
        }, 2000);

        // Select the modal content
        const modalContent = document.getElementById("download-qrcode-modal");

        // Use html2canvas to capture the modal content as an image
        html2canvas(modalContent).then((canvas) => {
            // Get the canvas context
            const ctx = canvas.getContext("2d");

            // Draw border corners onto the canvas
            const cornerSize = 50; // Adjust as needed
            const cornerColor = "#000"; // Adjust as needed
            ctx.fillStyle = cornerColor;
            ctx.fillRect(0, 0, cornerSize, cornerSize);
            ctx.fillRect(canvas.width - cornerSize, 0, cornerSize, cornerSize);
            ctx.fillRect(0, canvas.height - cornerSize, cornerSize, cornerSize);
            ctx.fillRect(
                canvas.width - cornerSize,
                canvas.height - cornerSize,
                cornerSize,
                cornerSize
            );

            // Convert the canvas to a data URL representing a PNG image
            const dataURL = canvas.toDataURL("image/png");

            // Create a temporary link element
            const link = document.createElement("a");
            link.href = dataURL;
            link.download = "MNITKHQR_QR.png";

            // Append the link to the body and trigger the click event
            document.body.appendChild(link);
            link.click();

            // Remove the link from the body
            document.body.removeChild(link);
        });
    }
</script>

<!-- pop up download qr code -->
<div id="main-download-qrcode-modal" tabindex="-1" aria-hidden="true" class="hidden absolute mt-[-1000px] top-[-10rem] left-0 right-0 z-30 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div id="download-qrcode-modal" class="relative w-[370px]">
        <!-- Modal content -->
        <div class="relative bg-gray-700 dark:bg-gray-700 overflow-hidden">
            <div class="px-0 py-0 lg:px-0">
                <div class="sm:mx-auto sm:max-w-sm sm:max-w-sm lg:max-w-xl">
                    <div class="bg-cyan-800 p-[10px]"></div>

                    <div class="bg-gray-600 relative">
                        <div class="absolute h-8 top-[-12px]" style="
                        border-right: 20px solid transparent;
                        border-bottom: 20px solid transparent;
                        border-left: 20px solid rgb(21 94 117);
                    "></div>
                    </div>

                    <div class="bg-white p-4">
                        <p class="text-center text-3xl mt-3" style="letter-spacing: 2px">
                            <span class="text-cyan-800 font-bold">MNIT</span><span class="text-red-600 font-bold">'</span><span class="text-cyan-600 font-bold">PAY</span>
                        </p>
                        <p class="font-medium text-md text-center mt-4 mb-6">
                            Scan. Pay. Done.
                        </p>

                        <div class="corner">
                            <img id="image-qr-code-download" src="" alt="" class="h-[200px] m-auto" />
                        </div>

                        <h2 class="text-center text-lg font-medium mt-3 uppercase">
                            <span class="user-first-name"></span> <span class="user-last-name"></span>
                        </h2>
                        <p class="text-[10px] mt-10">Member of</p>
                        <h3 class="text-red-600 font-bold">KHQR</h3>
                    </div>

                    <div class="bg-cyan-800  p-[10px]"></div>

                    <div class="bg-red-600 absolute p-9 rounded-[30px] right-[-60px] bottom-[-110px]" style="transform: rotate(20deg)">
                        <div class="bg-white p-6 rounded-[20px]">
                            <div class="bg-red-600 p-8 rounded-[10px]"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .styled-scan {
        --s: 40px;
        /* the size on the corner */
        --t: 3px;
        /* the thickness of the border */
        --g: 5px;
        /* the gap between the border and image */

        padding: calc(var(--g) + var(--t));
        outline: var(--t) solid rgb(16 185 129);
        /* the color here */
        outline-offset: calc(-1 * var(--t));
        mask: conic-gradient(at var(--s) var(--s), #0000 75%, #000 0) 0 0 / calc(100% - var(--s)) calc(100% - var(--s)),
            linear-gradient(#000 0 0) content-box;
        transition: 0.4s;
        overflow: hidden;
        position: relative;
    }

    .styled-scan::after {
        content: "";
        background: rgb(16, 185, 129);
        width: 100%;
        height: 3px;
        display: block;
        position: absolute;
        top: 4%;
        animation: scan-qr 5s linear infinite alternate;
        box-shadow: 0px 4px 7px rgb(16, 185, 129);
        opacity: 0.6;
        overflow: hidden;
    }

    @keyframes scan-qr {
        0% {
            box-shadow: 0px 4px 7px rgb(16, 185, 129);
            top: 4%;
        }

        50% {
            top: 96%;
        }

        100% {
            box-shadow: 0px 4px -7px rgb(16, 185, 129);
            top: 4%;
        }
    }

    video {
        width: 100%;
        max-width: 640px;
        height: auto;
    }
</style>

<!-- pop up scan qr -->
<div id="ScanQrNav-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative sm:mx-auto sm:w-full sm:max-w-sm lg:max-w-sm">
        <!-- Modal content -->
        <div class="relative bg-cyan-700 rounded-lg shadow dark:bg-cyan-800" style="
            background: linear-gradient(
                217deg,
                rgb(22 78 99),
                rgb(14 116 144) 95.71%
              ),
              linear-gradient(127deg, rgb(14 116 144), rgb(22 78 99) 80.71%);
          ">
            <button type="button" id="HideScanQrNav-modal" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-200/10 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-6 text-xl font-medium text-white">
                    M N C R<span class="text-red-500">'</span> SCAN
                </h3>

                <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm lg:max-w-xl">
                    <!-- Title Scan -->
                    <div class="mb-6">
                        <h2 class="text-white text-2xl uppercase text-center">
                            Scan QR
                        </h2>
                        <p class="text-white text-center">
                            Place the qr on the camera screen to scan
                        </p>
                    </div>

                    <!-- open camera for scan qr code-->
                    <div class="mb-6">
                        <p id="account_number_eg-Nav"></p>

                        <div class="styled-scan w-64 h-full m-auto" id="video-container">
                            <!-- <video id="video" playsinline width="100%" height="100%" ></video> -->
                        </div>
                    </div>

                    <!-- button action -->
                    <div class="flex justify-center items-center gap-6">
                        <!-- Button Flash -->
                        <div class="flex flex-col justify-center items-center">
                            <div class="m-auto hover:bg-gray-400/10 p-2 transition ease-in-out bg-gray-200/10 rounded-full cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="25px" height="25px" class="text-white m-auto">
                                    <path d="M9.97308 18H14.0269C14.1589 16.7984 14.7721 15.8065 15.7676 14.7226C15.8797 14.6006 16.5988 13.8564 16.6841 13.7501C17.5318 12.6931 18 11.385 18 10C18 6.68629 15.3137 4 12 4C8.68629 4 6 6.68629 6 10C6 11.3843 6.46774 12.6917 7.31462 13.7484C7.40004 13.855 8.12081 14.6012 8.23154 14.7218C9.22766 15.8064 9.84103 16.7984 9.97308 18ZM14 20H10V21H14V20ZM5.75395 14.9992C4.65645 13.6297 4 11.8915 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10C20 11.8925 19.3428 13.6315 18.2443 15.0014C17.624 15.7748 16 17 16 18.5V21C16 22.1046 15.1046 23 14 23H10C8.89543 23 8 22.1046 8 21V18.5C8 17 6.37458 15.7736 5.75395 14.9992ZM13 10.0048H15.5L11 16.0048V12.0048H8.5L13 6V10.0048Z"></path>
                                </svg>
                            </div>
                            <span class="text-white text-[14px] mt-1">Flash</span>
                        </div>

                        <!-- Button QR -->
                        <div class="flex flex-col justify-center items-center">
                            <div class="hover:bg-gray-400/10 transition ease-in-out bg-gray-200/10 p-2 rounded-full cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="25px" height="25px" class="text-white">
                                    <path d="M16 17V16H13V13H16V15H18V17H17V19H15V21H13V18H15V17H16ZM21 21H17V19H19V17H21V21ZM3 3H11V11H3V3ZM5 5V9H9V5H5ZM13 3H21V11H13V3ZM15 5V9H19V5H15ZM3 13H11V21H3V13ZM5 15V19H9V15H5ZM18 13H21V15H18V13ZM6 6H8V8H6V6ZM6 16H8V18H6V16ZM16 6H18V8H16V6Z"></path>
                                </svg>
                            </div>
                            <span class="text-white text-[14px] mt-1">Open QR</span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="result"></div>

            <div id="wrong-password-four" class="bg-red-500 transition-all ease-out-in absolute -top-20 w-full text-center p-1 rounded-tl-md rounded-tr-md">
                <p id="wrong-password-four-text" class="text-white text-lg" style="letter-spacing: 1px">
                    Wrong password!
                </p>
            </div>
        </div>
    </div>
</div>

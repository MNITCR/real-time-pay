<!-- Change title page -->
<?php $title = "Login By Scan"; ?>

<?php require("views/components/head.components.php") ?>

<style>
    #qr-video {
        width: 100%;
        max-width: 300px;
        margin: 0 auto;
    }
</style>



<body onload="load()">
    <div id="mainbody" class="w-ful">
        <div class="dark:bg-slate-800 w-full min-h-full h-[100vh] items-center flex flex-col justify-center relative">

            <!-- Video feed will be displayed here -->
            <video id="qr-video" autoplay playsinline width="800" height="600"></video>

            <div id="result" class="text-white"></div>

            <!-- back to login -->
            <div class="w-[150px] h-[150px] absolute right-20 bottom-0">
                <div class="flex justify-center items-center flex gap-2">
                    <div class=" w-[50px] rounded-full" title="back to login">
                        <a href="./login" class="bg-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(139,61,235,1)">
                                <path d="M12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM12 20C16.42 20 20 16.42 20 12C20 7.58 16.42 4 12 4C7.58 4 4 7.58 4 12C4 16.42 7.58 20 12 20ZM12 11H16V13H12V16L8 12L12 8V11Z"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="w-[50px] rounded-full" title="login by face">
                        <a href="./login-by-face">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-[2.5rem]" viewBox="0 0 24 24" fill="rgba(213,212,253,1)">
                                <path d="M4 16V20H8V22H2V16H4ZM22 16V22H16V20H20V16H22ZM7.5 7C7.5 9.1416 8.99603 10.9338 11 11.3885L11 17H13L13.001 11.3883C15.0045 10.9332 16.5 9.14125 16.5 7H18.5C18.5 9.50729 17.0804 11.683 15.0011 12.7672L15 19H9L8.99992 12.7677C6.92007 11.6837 5.5 9.50769 5.5 7H7.5ZM12 5C13.3807 5 14.5 6.11929 14.5 7.5C14.5 8.88071 13.3807 10 12 10C10.6193 10 9.5 8.88071 9.5 7.5C9.5 6.11929 10.6193 5 12 5ZM8 2V4L4 3.999V8H2V2H8ZM22 2V8H20V4H16V2H22Z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<!-- script dropdown login -->
<script src="./js/login/LoginByScan.js"></script>

<?php require("views/components/footer.components.php") ?>

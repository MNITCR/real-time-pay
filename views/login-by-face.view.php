<!-- Change title page -->
<?php $title = "Login By Face"; ?>

<?php require("views/components/head.components.php") ?>
<!-- Include TensorFlow.js -->
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
<!-- Include Face-API.js -->
<script src="https://cdn.jsdelivr.net/npm/@vladmandic/face-api@1/dist/face-api.js"></script>

<div id="mainbody" class="w-ful">
    <div class="dark:bg-slate-800 w-full min-h-full h-[100vh] items-center flex flex-col justify-center relative">
        <h1 class="text-3xl text-white mb-6">Face Recognition</h1>

        <!-- Video feed will be displayed here -->
        <video id="video" width="440" autoplay playsinline></video>
        <div id="matchedImageName" class="mt-3 text-white"></div>
        <p id="result" class="mt-3 text-white"></p>

        <!-- back to login -->
        <div class="w-[50px] h-[50px] absolute right-20 bottom-20" title="back to login">
            <a href="./login" class="bg-red-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(139,61,235,1)">
                    <path d="M12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM12 20C16.42 20 20 16.42 20 12C20 7.58 16.42 4 12 4C7.58 4 4 7.58 4 12C4 16.42 7.58 20 12 20ZM12 11H16V13H12V16L8 12L12 8V11Z"></path>
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- script dropdown login -->
<script src="./js/login/LoginByScanFace.js"></script>

<?php require("views/components/footer.components.php") ?>

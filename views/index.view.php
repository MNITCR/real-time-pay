<?php
// Change title page
if ($_SERVER["REQUEST_URI"] === "/real-time-pay/") {
    $title = "Dashboard";
}
if ($_SERVER["REQUEST_URI"] === "/real-time-pay/transfer" || "/real-time-pay/transfer?selected_kh=selected") {
    $title = "Transfer";
}

if (!session_id()) {
    session_start();
}

// Function to generate expiration date (30 days from now)
function generateExpirationDate()
{
    return date('Y-m-d', strtotime('+30 days'));
}

// Generate expiration date
$tokenExp = generateExpirationDate();

require_once("./php/conn.php");

if ($_SESSION["token"]) {
    $tokenKey = $_SESSION["token"];

    $stmt = $conn->prepare("SELECT token,tokenExp FROM user_tbl WHERE token = ?");
    $stmt->execute([$tokenKey]);
    $user = $stmt->fetch();

    $now = date('Y-m-d');

    if ($user["tokenExp"] == $now) {
        $stmt = $conn->prepare("UPDATE user_tbl SET tokenExp = ? WHERE token = ?");
        $stmt->execute([$tokenExp, $tokenKey]);
        echo "<script>
            alert('Your token is expired!');
            location.replace('login');
        </script>";
    }
} else {
    echo "<script>
        alert('Your do't have token pleas login!');
        location.replace('login');
    </script>";
}

if ($_SESSION['logged_in'] != true) {
    echo '
    <script>
    	alert("You don\'t have authorized to access data");
    	location.replace("login");
    </script>';
}

?>


<?php require("views/components/head.components.php") ?>
<link rel="stylesheet" href="views/components/admin/css/style.css">

<!--sidenav -->
<?php include_once 'components/admin/views/sidenav.view.php'; ?>
<!--end sidenav -->

<main class="relative w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
    <!-- navbar -->
    <div class="py-2 px-6 bg-[#f8f4f3] flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
        <button type="button" class="text-lg text-gray-900 font-semibold sidebar-toggle">
            <i class="ri-menu-line"></i>
        </button>

        <ul class="ml-auto flex items-center">

            <!-- search -->
            <li class="mr-1 dropdown">
                <button type="button" class="dropdown-toggle text-gray-400 mr-4 w-8 h-8 rounded flex items-center justify-center  hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24" style="fill: gray;">
                        <path d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path>
                    </svg>
                </button>
                <div class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                    <form action="" class="p-4 border-b border-b-gray-100">
                        <div class="relative w-full">
                            <input type="text" class="py-2 pr-4 pl-10 bg-gray-50 w-full outline-none border border-gray-100 rounded-md text-sm focus:border-blue-500" placeholder="Search...">
                            <i class="ri-search-line absolute top-1/2 left-4 -translate-y-1/2 text-gray-900"></i>
                        </div>
                    </form>
                </div>
            </li>

            <!-- notification -->
            <li class="dropdown">
                <button type="button" class="dropdown-toggle text-gray-400 mr-4 w-8 h-8 rounded flex items-center justify-center  hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24" style="fill: gray;">
                        <path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z"></path>
                    </svg>
                </button>
                <div class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                    <div class="flex items-center px-4 pt-4 border-b border-b-gray-100 notification-tab">
                        <button type="button" data-tab="notification" data-tab-page="notifications" class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1 active">Notifications</button>
                        <button type="button" data-tab="notification" data-tab-page="messages" class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1">Messages</button>
                    </div>
                    <div class="my-2">
                        <ul class="max-h-64 overflow-y-auto" data-tab-for="notification" data-page="notifications">
                            <li>
                                <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                    <div class="ml-2">
                                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">New order</div>
                                        <div class="text-[11px] text-gray-400">from a user</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                    <div class="ml-2">
                                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">New order</div>
                                        <div class="text-[11px] text-gray-400">from a user</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                    <div class="ml-2">
                                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">New order</div>
                                        <div class="text-[11px] text-gray-400">from a user</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                    <div class="ml-2">
                                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">New order</div>
                                        <div class="text-[11px] text-gray-400">from a user</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                    <div class="ml-2">
                                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">New order</div>
                                        <div class="text-[11px] text-gray-400">from a user</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <ul class="max-h-64 overflow-y-auto hidden" data-tab-for="notification" data-page="messages">
                            <li>
                                <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                    <div class="ml-2">
                                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">John Doe</div>
                                        <div class="text-[11px] text-gray-400">Hello there!</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                    <div class="ml-2">
                                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">John Doe</div>
                                        <div class="text-[11px] text-gray-400">Hello there!</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                    <div class="ml-2">
                                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">John Doe</div>
                                        <div class="text-[11px] text-gray-400">Hello there!</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                    <div class="ml-2">
                                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">John Doe</div>
                                        <div class="text-[11px] text-gray-400">Hello there!</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                    <div class="ml-2">
                                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">John Doe</div>
                                        <div class="text-[11px] text-gray-400">Hello there!</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            <!-- full screen -->
            <button id="fullscreen-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24" style="fill: gray;">
                    <path d="M5 5h5V3H3v7h2zm5 14H5v-5H3v7h7zm11-5h-2v5h-5v2h7zm-2-4h2V3h-7v2h5z"></path>
                </svg>
            </button>
            <script>
                const fullscreenButton = document.getElementById('fullscreen-button');

                fullscreenButton.addEventListener('click', toggleFullscreen);

                function toggleFullscreen() {
                    if (document.fullscreenElement) {
                        // If already in fullscreen, exit fullscreen
                        document.exitFullscreen();
                    } else {
                        // If not in fullscreen, request fullscreen
                        document.documentElement.requestFullscreen();
                    }
                }
            </script>

            <!-- profile -->
            <li class="dropdown ml-3">
                <button type="button" class="dropdown-toggle flex items-center">
                    <div class="flex-shrink-0 w-10 h-10 relative">
                        <div class="p-1 bg-white rounded-full focus:outline-none focus:ring">
                            <img class="w-8 h-8 rounded-full" src="https://laravelui.spruko.com/tailwind/ynex/build/assets/images/faces/9.jpg" alt="" />
                            <div class="top-0 left-7 absolute w-3 h-3 bg-lime-400 border-2 border-white rounded-full animate-ping"></div>
                            <div class="top-0 left-7 absolute w-3 h-3 bg-lime-500 border-2 border-white rounded-full"></div>
                        </div>
                    </div>
                    <div class="p-2 md:block text-left">
                        <h2 class="text-sm font-semibold text-gray-800">John Doe</h2>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                </button>
                <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                    <li>
                        <a href="#" id="profileBtn" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Profile</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Settings</a>
                    </li>
                    <li>
                        <form method="POST" action="./php/logout.php">
                            <a role="menuitem" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50 cursor-pointer" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                Log Out
                            </a>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- end navbar -->

    <!-- Content -->
    <div class="p-6">
        <?php
        // Home page content
        if ($_SERVER["REQUEST_URI"] === "/real-time-pay/") {
            include_once 'components/admin/views/balance.view.php';
            include_once 'components/admin/views/history.view.php';
        }
        // Home page content


        // payment form
        elseif ($_SERVER["REQUEST_URI"] === "/real-time-pay/transfer") {
            include_once 'components/admin/views/payment.view.php';
        }
        // end payment form


        // payment form select khmer balance
        elseif ($_SERVER["REQUEST_URI"] === "/real-time-pay/transfer?selected_kh=selected") {
            include_once 'components/admin/views/payment.view.php';
        }
        // end payment form select khmer balance

        // scan payment by qr code
        elseif ($dataParam = $_GET['data'] ?? null) {
            $decodedData = json_decode(urldecode($dataParam), true);
            $stmt = $conn->prepare("SELECT token,user_id FROM user_tbl WHERE token = ? AND user_id = ?");
            $stmt->execute([$decodedData["loj232ovnje"], $decodedData["k2Cvblrl2v3"]]);
            $user = $stmt->fetch();

            if ($user) {
                $imgUrl = ltrim($decodedData["jhy234nvskw"], '.');
                echo '
                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    $("#ScanQrDollar-modal").removeClass("hidden");
                    $("#scan-qr-balance-value").val(0);

                    $("#scan-qr-user-first-name").text("' . $decodedData["oi0oi34hsdf"] . ' ");
                    $("#scan-qr-user-last-name").text("' . $decodedData["kjhkfwro23v"] . ' ");

                    var full_name_scan_user = "' . $decodedData["kjhkfwro23v"] . ' " + "' . $decodedData["oi0oi34hsdf"] . '";
                    $("#scan-qr-code-usd-khr").text(full_name_scan_user);

                    var check_usd_or_khr = "' . $decodedData["jsbweiui235"] . '";
                    $("#last_name_one_character").text("' . $decodedData["kjhkfwro23v"][0] . '");
                    $("#first_name_one_character").text("' . $decodedData["oi0oi34hsdf"][0] . '");
                    $("#user_id_scan_qr").text("' . $decodedData["k2Cvblrl2v3"] . '");

                    $("#scan-qr-profile").css({
                        "background-image": "url(\'.' . $imgUrl . '\')",
                        "background-position": "center",
                        "background-repeat": "no-repeat",
                        "background-size": "cover",
                        "filter": "blur(1px)",
                        "-webkit-filter": "blur(1px)"
                    });


                    if (check_usd_or_khr == "KHR"){
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
                include_once 'components/admin/views/balance.view.php';
                include_once 'components/admin/views/history.view.php';
            }
            // Page not found
            else {
                include_once '404.view.php';
            }
            // End page not found
        }
        // scan payment by qr code


        // Page not found
        else {
            include_once '404.view.php';
        }
        // End page not found

        ?>

    </div>
    <!-- End Content -->


    <!-- pop up profile -->
    <?php include_once "components/admin/views/pop_profile.view.php" ?>
    <!--end pop up profile -->

    <!-- pop up profile -->
    <?php include_once "components/admin/views/pop_historyAcc.view.php" ?>
    <!--end pop up profile -->

    <!-- pop up qr code usd and khr -->
    <?php include_once "components/admin/views/pop_qrUsdAndKhr.view.php" ?>
    <!--end pop up qr code usd and khr -->

    <!-- pop up scan qr code usd and khr -->
    <?php include_once "components/admin/views/pop_ScanQrUsdAndKhr.view.php" ?>
    <!--end pop up scan qr code usd and khr -->

    <!-- pop up confirm password 4 -->
    <?php include_once "components/admin/views/pop_ConfirmFourPassword.view.php" ?>
    <!-- end pop up confirm password 4 -->


</main>


<script src="views/components/admin/js/adminJs.js"></script>

<!-- script pop up form profile -->
<script src="views/components/admin/js/PopupFormProfile.js"></script>

<!-- script pop up form history account -->
<script src="views/components/admin/js/PopupFormHistoryAccount.js"></script>

<!-- script delete history pop up account -->
<script src="views/components/admin/js/deleteHistoryAccNum.js"></script>

<!-- script submit transfer data to db -->
<script src="views/components/admin/js/SubmitPaymentMoney.js"></script>

<!-- script pop qr usd and khr -->
<script src="views/components/admin/js/PopupQrUsdAndKhr.js"></script>

<!-- script scan pop qr usd and khr -->
<script src="views/components/admin/js/PopupScanQrUsdAndKhr.js"></script>

<?php require("views/components/footer.components.php") ?>

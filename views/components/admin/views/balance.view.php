<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6" id="container">
    <!-- balance english -->
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5 draggable" draggable="true" id="main_balance_english">
        <div class="flex justify-between mb-6">
            <div>
                <div class="flex items-center mb-1 main_balances_eg">
                    <div class="text-2xl font-semibold flex items-center gap-1 blur-[3.8px]" id="blur_balance_eg"><span class="text-[21px]">$</span> <span id="balances_eg" class="balance"></span></div>
                    <div class="p-1 rounded bg-cyan-500/10 text-cyan-500 text-[18px] font-semibold leading-none ml-2"><i class="ri-eye-off-fill cursor-pointer" id="show_blur_eg"></i></div>
                </div>
                <div class="flex gap-2 items-center">
                    <div class="text-[12px] font-medium text-gray-100 bg-cyan-800 rounded p-1.5 text-center">Base Account</div>
                    <div class="text-[15px] font-medium text-cyan-800 border-2 border-cyan-800 rounded p-[2.5px] px-2 text-center cursor-pointer" id="hide_show_account_number_eg" title="Double click copy"><span id="account_number_eg_balance"></span></div>
                </div>

            </div>
            <div class="dropdown">
                <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[170px]">
                    <li>
                        <p class="flex items-center text-[13px] py-1 px-4 text-gray-600 hover:text-cyan-500 cursor-pointer transition-all" id="btn_hide_show_acc_eg">Hide Account Number</p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="flex items-center gap-10">
            <a href="#" id="PopUpQrEG" class="font-medium text-sm text-green-500 hover:text-green-700 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[23px] border-2 border-green-600 rounded-full p-1 text-green-700 font-bold" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M9 13.589L17.6066 4.98242L19.0208 6.39664L10.4142 15.0032H18V17.0032H7V6.00324H9V13.589Z"></path>
                </svg>
                Receive money
            </a>
            <a href="/real-time-pay/transfer" class="text-red-500 font-medium text-sm hover:text-red-700 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[23px] border-2 border-red-600 rounded-full p-1 text-red-700 font-bold" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path>
                </svg>
                Send money
            </a>
        </div>
    </div>
    <!-- end balance english -->

    <!-- balance khmer -->
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5 draggable" draggable="true" id="main_balance_khmer">
        <div class="flex justify-between mb-6">
            <div>
                <div class="flex items-center mb-1 main_balances_kh">
                    <div class="text-2xl font-semibold flex items-center gap-1 blur-[3.8px]" id="blur_balance_kh"><span class="text-[28px]">៛</span> <span id="balances_kh"></span></div>
                    <div class="p-1 rounded bg-emerald-500/10 text-emerald-500 text-[18px] font-semibold leading-none ml-2"><i class="ri-eye-off-fill cursor-pointer" id="show_blur_kh"></i></div>
                </div>
                <div class="flex gap-2 items-center">
                    <div class="text-[12px] font-medium text-gray-100 bg-emerald-500 rounded p-1.5 text-center">Savings Account</div>
                    <div class="text-[15px] font-medium text-emerald-500 border-2 border-emerald-500 rounded p-[2.5px] px-2 text-center cursor-pointer" id="hide_show_account_number_kh" title="Double click copy"><span id="account_number_kh_balance"></span></div>
                </div>

            </div>
            <div class="dropdown">
                <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[170px]">
                    <li>
                        <p class="flex items-center text-[13px] py-1 px-4 text-gray-600 hover:text-emerald-500 cursor-pointer transition-all" id="btn_hide_show_acc_kh">Hide Account Number</p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="flex items-center gap-10">
            <a href="#" id="PopUpQrKH" data-type-money="UseOrKhr" class="font-medium text-sm text-green-500 hover:text-green-700 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[23px] border-2 border-green-600 rounded-full p-1 text-green-700 font-bold" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M9 13.589L17.6066 4.98242L19.0208 6.39664L10.4142 15.0032H18V17.0032H7V6.00324H9V13.589Z"></path>
                </svg>
                Receive money
            </a>
            <a href="/real-time-pay/transfer?selected_kh=selected" class="text-red-500 font-medium text-sm hover:text-red-700 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[23px] border-2 border-red-600 rounded-full p-1 text-red-700 font-bold" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path>
                </svg>
                Send money
            </a>
        </div>
    </div>
    <!-- end balance khmer -->

    <!-- total transition -->
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5 draggable" draggable="true" id="main_total_transition">
        <div class="flex justify-between">
            <div>
                <img src="" class="w-full rounded" id="image-qr-code" />

                <!-- <div class="flex items-center mb-1">
                    <div class="text-2xl font-semibold flex items-center gap-1 blur-[3.8px]" id="blur_balance_eg"><span class="text-[21px]">$</span> <?= $rows[0]['balance_eg'] ?></div>
                    <div class="p-1 rounded bg-cyan-500/10 text-cyan-500 text-[18px] font-semibold leading-none ml-2"><i class="ri-eye-off-fill cursor-pointer" id="show_blur_eg"></i></div>
                </div>
                <div class="flex gap-2 items-center">
                    <div class="text-[12px] font-medium text-gray-100 bg-cyan-800 rounded p-1.5 text-center">Base Account</div>
                    <div class="text-[15px] font-medium text-cyan-800 border-2 border-cyan-800 rounded p-[2.5px] px-2 text-center" id="hide_show_account_number_eg"><?= $rows[0]['account_number_eg'] ?></div>
                </div> -->
                <!-- <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http%3A%2F%2Flocalhost%2Freal-time-pay%2Fpayment%2F&choe=UTF-8" title="Link to form payment" /> -->
                <!-- <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=http%3A%2F%2Flocalhost/real-time-pay/payment%2F&choe=UTF-8" title="Link to form payment" /> -->
                <!-- <div class="text-2xl font-semibold mb-1">100</div> -->
                <!-- <div class="text-sm font-medium text-gray-400">Blogs</div> -->
            </div>
            <div class="dropdown">
                <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                    <li>
                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end total transition -->
</div>


<script>
    $(document).ready(function() {

        // ==========> Copy Text <==========

        // Function to handle double-click on balance elements
        function handleDoubleClick() {
            var balance = $(this).text();
            copyToClipboard(balance);
            alert("Copied: " + balance);
        }

        // Function to copy text to clipboard
        function copyToClipboard(text) {
            var textarea = document.createElement("textarea");
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand("copy");
            document.body.removeChild(textarea);
        }

        // Double click event listener for balances_kh
        $("#account_number_kh_balance").on("dblclick", handleDoubleClick);

        // Double click event listener for balances_eg
        $("#account_number_eg_balance").on("dblclick", handleDoubleClick);

        // ==========> End Copy Text <==========


        // ==========> Hide Amount <==========


        // ==========> End Hide Amount <==========


        // Function to fetch and update balance
        function updateBalance() {
            $.ajax({
                type: "GET",
                url: "./php/FetchAccNumAndBalance.php",
                dataType: "json",
                success: function(data) {
                    // Format balance for Khmer currency
                    var balance_kh = parseFloat(data[0]["balance_kh"]); // Convert balance_kh to a float
                    $("#balances_kh").text(formatBalance(balance_kh));

                    // Format balance for English currency
                    var balance_eg = parseFloat(data[0]["balance_eg"]); // Convert balance_eg to a float
                    $("#balances_eg").text(formatBalance(balance_eg));

                    $("#account_number_kh_balance").text(data[0]["account_number_kh"]);
                    $("#account_number_eg_balance").text(data[0]["account_number_eg"]);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Function to format balance with proper separators
        function formatBalance(balance) {
            if (isNaN(balance)) { // Check if balance is not a number
                return "Invalid balance";
            } else {
                var formattedBalance = balance.toLocaleString(undefined, {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }); // Format balance with commas for thousands and two digits after the decimal point
                return formattedBalance;
                var balance_str = balance.toString(); // Convert balance to a string
                if (balance_str.indexOf('.') === -1) { // Check if balance has a decimal point
                    return balance.toFixed(2); // Append .00 if it doesn't have a decimal point
                } else {
                    var decimalIndex = balance_str.indexOf('.'); // Get the index of the decimal point
                    var digitsAfterDecimal = balance_str.length - decimalIndex - 1; // Calculate the number of digits after the decimal point
                    if (digitsAfterDecimal === 1) { // If there is only one digit after the decimal point
                        return balance.toFixed(2); // Append a trailing zero
                    } else {
                        return balance_str; // Leave balance unchanged if it already has two or more digits after the decimal point
                    }
                }
            }
        }

        updateBalance();

        // Update balance every 5 seconds
        setInterval(updateBalance, 5000);

        let egClick = true;
        let khClick = true;

        // Retrieve stored preferences
        if (localStorage.getItem('egBlur') === 'false') {
            $('#blur_balance_eg').removeClass('blur-[3.8px]');
            $('#show_blur_eg').removeClass('ri-eye-off-fill').addClass('ri-eye-fill');
            egClick = false;
        }

        if (localStorage.getItem('khBlur') === 'false') {
            $('#blur_balance_kh').removeClass('blur-[3.8px]');
            $('#show_blur_kh').removeClass('ri-eye-off-fill').addClass('ri-eye-fill');
            khClick = false;
        }

        // balance english
        $("#show_blur_eg").click(function() {
            if (egClick) {
                $('#blur_balance_eg').removeClass('blur-[3.8px]');
                $("#show_blur_eg").removeClass('ri-eye-off-fill');
                $("#show_blur_eg").addClass('ri-eye-fill');
                egClick = false;
                localStorage.setItem('egBlur', 'false');
            } else {
                $('#blur_balance_eg').addClass('blur-[3.8px]');
                $("#show_blur_eg").removeClass('ri-eye-fill');
                $("#show_blur_eg").addClass('ri-eye-off-fill');
                egClick = true;
                localStorage.setItem('egBlur', 'true');
            }
        });

        // balance khmer
        $("#show_blur_kh").click(function() {
            if (khClick) {
                $('#blur_balance_kh').removeClass('blur-[3.8px]');
                $("#show_blur_kh").removeClass('ri-eye-off-fill');
                $("#show_blur_kh").addClass('ri-eye-fill');
                khClick = false;
                localStorage.setItem('khBlur', 'false');
            } else {
                $('#blur_balance_kh').addClass('blur-[3.8px]');
                $("#show_blur_kh").removeClass('ri-eye-fill');
                $("#show_blur_kh").addClass('ri-eye-off-fill');
                khClick = true;
                localStorage.setItem('khBlur', 'true');
            }
        });


        // hide and show number account kh and eg
        let AccKh = true;
        let AccEg = true;

        // data local storage
        if (localStorage.getItem('AccEg') === 'false') {
            $("#hide_show_account_number_eg").addClass("hidden");
            $("#btn_hide_show_acc_eg").text("Show Account Number");
            AccEg = false;
        }

        if (localStorage.getItem('AccKh') === 'false') {
            $("#hide_show_account_number_kh").addClass("hidden");
            $("#btn_hide_show_acc_kh").text("Show Account Number");
            AccKh = false;
        }

        // add event to button eg
        $("#btn_hide_show_acc_eg").click(function() {
            if (AccEg) {
                $("#hide_show_account_number_eg").addClass("hidden");
                $("#btn_hide_show_acc_eg").text("Show Account Number");
                AccEg = false;
                localStorage.setItem('AccEg', 'false');

            } else {
                $("#hide_show_account_number_eg").removeClass("hidden");
                $("#btn_hide_show_acc_eg").text("Hide Account Number");
                AccEg = true;
                localStorage.setItem('AccEg', 'true');
            }
        });

        // add event to button kh
        $("#btn_hide_show_acc_kh").click(function() {
            if (AccKh) {
                $("#hide_show_account_number_kh").addClass("hidden");
                $("#btn_hide_show_acc_kh").text("Show Account Number");
                AccKh = false;
                localStorage.setItem('AccKh', 'false');
            } else {
                $("#hide_show_account_number_kh").removeClass("hidden");
                $("#btn_hide_show_acc_kh").text("Hide Account Number");
                AccKh = true;
                localStorage.setItem('AccKh', 'true');
            }
        });

    });


    // drag drop all balance items
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('container');

        // Load the stored order from local storage
        const storedOrder = JSON.parse(localStorage.getItem('draggedOrder'));
        if (storedOrder) {
            // Reorder the elements according to the stored order
            storedOrder.forEach(id => {
                const element = document.getElementById(id);
                container.appendChild(element);
            });
        }

        let dragStartIndex;
        let draggingElement;

        container.addEventListener('dragstart', (e) => {
            draggingElement = e.target;
            dragStartIndex = Array.from(container.children).indexOf(draggingElement);
            setTimeout(() => {
                draggingElement.classList.add('hidden');
            }, 0);
        });

        container.addEventListener('dragend', () => {
            draggingElement.classList.remove('hidden');

            // Save the order to local storage after drag and drop
            const draggableElements = document.querySelectorAll('.draggable');
            const newOrder = Array.from(draggableElements).map(el => el.id);
            localStorage.setItem('draggedOrder', JSON.stringify(newOrder));
        });

        container.addEventListener('dragover', (e) => {
            e.preventDefault();
            const dragOverIndex = getDragOverIndex(container, e.clientY);
            const draggableElements = document.querySelectorAll('.draggable');
            const dragEndElement = draggableElements[dragStartIndex];

            if (dragOverIndex === null) {
                container.appendChild(dragEndElement);
            } else {
                const dragOverElement = draggableElements[dragOverIndex];
                if (dragStartIndex < dragOverIndex) {
                    container.insertBefore(dragEndElement, dragOverElement.nextSibling);
                } else {
                    container.insertBefore(dragEndElement, dragOverElement);
                }
            }
        });

        function getDragOverIndex(container, y) {
            const draggableElements = document.querySelectorAll('.draggable:not(.hidden)');
            return Array.from(draggableElements).reduce((closestIndex, child, index) => {
                const box = child.getBoundingClientRect();
                const offset = y - box.top - box.height / 2;
                if (offset < 0 && offset > closestIndex.offset) {
                    return {
                        offset: offset,
                        index: index
                    };
                } else {
                    return closestIndex;
                }
            }, {
                offset: Number.NEGATIVE_INFINITY
            }).index;
        }
    });
</script>

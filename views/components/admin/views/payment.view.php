<body onload="reloadTableData()">
    <div class="relative dark:bg-white flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 h-[85vh]">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="w-full items-center justify-center flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[50px] bg-green-600 text-white rounded-full p-3" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M16.0503 12.0498L21 16.9996L16.0503 21.9493L14.636 20.5351L17.172 17.9988L4 17.9996V15.9996L17.172 15.9988L14.636 13.464L16.0503 12.0498ZM7.94975 2.0498L9.36396 3.46402L6.828 5.9988L20 5.99955V7.99955L6.828 7.9988L9.36396 10.5351L7.94975 11.9493L3 6.99955L7.94975 2.0498Z"></path>
                </svg>
            </div>
            <h2 class="mt-4 text-center dark:text-gray-900 text-2xl font-bold leading-9 tracking-tight text-gray-900">Transfer to any account</h2>
        </div>

        <div class="mt-7 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-5" id="paymentForm">

                <!-- input account number -->
                <div>
                    <label for="account-number" class="dark:text-gray-900 block text-sm font-medium leading-6 text-gray-900">Account Number</label>
                    <div class="relative items-center">
                        <div class="relative mt-2">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                                    <path d="M3 4.99509C3 3.89323 3.89262 3 4.99509 3H19.0049C20.1068 3 21 3.89262 21 4.99509V19.0049C21 20.1068 20.1074 21 19.0049 21H4.99509C3.89323 21 3 20.1074 3 19.0049V4.99509ZM6.35687 18H17.8475C16.5825 16.1865 14.4809 15 12.1022 15C9.72344 15 7.62182 16.1865 6.35687 18ZM12 13C13.933 13 15.5 11.433 15.5 9.5C15.5 7.567 13.933 6 12 6C10.067 6 8.5 7.567 8.5 9.5C8.5 11.433 10.067 13 12 13Z"></path>
                                </svg>
                            </div>
                            <div class="absolute right-[10px] top-[9px]">
                                <button type="button" id="history-account">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" fill="currentColor">
                                        <path d="M3 4.99509C3 3.89323 3.89262 3 4.99509 3H19.0049C20.1068 3 21 3.89262 21 4.99509V19.0049C21 20.1068 20.1074 21 19.0049 21H4.99509C3.89323 21 3 20.1074 3 19.0049V4.99509ZM5 5V19H19V5H5ZM7.97216 18.1808C7.35347 17.9129 6.76719 17.5843 6.22083 17.2024C7.46773 15.2753 9.63602 14 12.1022 14C14.5015 14 16.6189 15.2071 17.8801 17.0472C17.3438 17.4436 16.7664 17.7877 16.1555 18.0718C15.2472 16.8166 13.77 16 12.1022 16C10.3865 16 8.87271 16.8641 7.97216 18.1808ZM12 13C10.067 13 8.5 11.433 8.5 9.5C8.5 7.567 10.067 6 12 6C13.933 6 15.5 7.567 15.5 9.5C15.5 11.433 13.933 13 12 13ZM12 11C12.8284 11 13.5 10.3284 13.5 9.5C13.5 8.67157 12.8284 8 12 8C11.1716 8 10.5 8.67157 10.5 9.5C10.5 10.3284 11.1716 11 12 11Z"></path>
                                    </svg>
                                </button>
                            </div>
                            <input id="accountNumber" name="account-number" type="text" required placeholder="Account number" class="accountNumber ps-10 block w-full rounded-md py-1.5 text-gray-900 shadow-sm border-2 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <p class="text-red-500 text-xs mt-1" id="accountNumberER"></p>
                </div>

                <!-- select balance -->
                <div id="select_balance">

                </div>

                <!-- input Amount -->
                <div>
                    <label for="amount" class="dark:gray-900 block text-sm font-medium leading-6 text-gray-900">Amount</label>
                    <div class="relative mt-2">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                                <path d="M12.0049 22.0027C6.48204 22.0027 2.00488 17.5256 2.00488 12.0027C2.00488 6.4799 6.48204 2.00275 12.0049 2.00275C17.5277 2.00275 22.0049 6.4799 22.0049 12.0027C22.0049 17.5256 17.5277 22.0027 12.0049 22.0027ZM8.50488 14.0027V16.0027H11.0049V18.0027H13.0049V16.0027H14.0049C15.3856 16.0027 16.5049 14.8835 16.5049 13.5027C16.5049 12.122 15.3856 11.0027 14.0049 11.0027H10.0049C9.72874 11.0027 9.50488 10.7789 9.50488 10.5027C9.50488 10.2266 9.72874 10.0027 10.0049 10.0027H15.5049V8.00275H13.0049V6.00275H11.0049V8.00275H10.0049C8.62417 8.00275 7.50488 9.12203 7.50488 10.5027C7.50488 11.8835 8.62417 13.0027 10.0049 13.0027H14.0049C14.281 13.0027 14.5049 13.2266 14.5049 13.5027C14.5049 13.7789 14.281 14.0027 14.0049 14.0027H8.50488Z"></path>
                            </svg>
                        </div>
                        <input id="amount" name="amount" type="number" placeholder="Amount" required class="pr-2 ps-10 block w-full rounded-md py-1.5 text-gray-900 border-2 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                    </div>
                    <p class="text-red-500 text-xs mt-1" id="amountER"></p>
                </div>

                <!-- input description -->
                <div>
                    <label for="description" class="dark:gray-900 block text-sm font-medium leading-6 text-gray-900">Description (Optional)</label>
                    <div class="mt-2">
                        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-2 border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                    </div>
                </div>

                <!-- button payment -->
                <div class="flex justify-center items-center gap-3">
                    <div class="w-full">
                        <button type="submit" id="submitTransferMoney" style="background-color: #2568EB;hover{background-color: #4F46E4;}" class="cursor-pointer flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                    </div>
                    <div class="w-full">
                        <a href="./" class="flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                    </div>
                </div>
            </form>

            <div id="paymentResult"></div>

        </div>

    </div>
</body>

<script>
    function reloadTableData() {
        $.ajax({
            type: "GET",
            url: "./php/FetchAccNumAndBalance.php",
            dataType: "json",
            success: function(AccNumBalance) {
                $("#select_balance").empty();
                if (AccNumBalance.length > 0) {
                    var AccNumBL = '<label for="balance" class="dark:text-gray-900 block text-sm font-medium leading-6 text-gray-900">Choose Balance</label>';
                    AccNumBL += '<div class="mt-2">'
                    AccNumBL += '<select id="balance" name="balance" required class="px-2 block w-full rounded-md py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 border-2 placeholder:text-gray-400 sm:text-sm sm:leading-6">';
                    AccNumBL += '<option value="' + AccNumBalance[0]['balance_eg'] + '" data-payment="true">' + AccNumBalance[0]['account_number_eg'] + ' : $ ' + AccNumBalance[0]['balance_eg'] + '</option>';
                    AccNumBL += '<option value="' + AccNumBalance[0]['balance_kh'] + '" data-payment="false">' + AccNumBalance[0]['account_number_kh'] + ' : ៛ ' + AccNumBalance[0]['balance_kh'] + '</option>';
                    AccNumBL += '</select>';
                    AccNumBL += '</div>';
                    AccNumBL += '<p class="text-red-500 text-xs mt-1 balanceER" id="balanceER"></p>';

                    $("#select_balance").append(AccNumBL);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            },
        });

        $.ajax({
            type: "GET",
            url: "./php/FetchDataHistoryAccNum.php",
            dataType: "json",
            success: function(data) {
                $(".account-data-row").empty();
                if (data.length > 0) {
                    $(".not-found-data").addClass("hidden");

                    data.forEach(function(item) {
                        // Generate HTML for a table row
                        var rowHtml =
                            '<tr class="border-b bg-gray-700 border-gray-500 data-history-found">';
                        rowHtml +=
                            '<th scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white hover:underline cursor-pointer account_number_history_account">';
                        rowHtml += item["account_number"];
                        rowHtml += "</th>";
                        rowHtml +=
                            '<td class="px-4 py-4 text-gray-100 text-nowrap user_name">';
                        rowHtml += item["user_name"];
                        rowHtml += "</td>";
                        rowHtml +=
                            '<td class="px-4 py-4 text-gray-100 text-nowrap history_accNum_date">';
                        rowHtml += item["history_accNum_date"];
                        rowHtml += "</td>";
                        rowHtml += '<td class="px-4 py-4 flex items-center text-center">';
                        rowHtml +=
                            '<svg xmlns="http://www.w3.org/2000/svg" class="text-red-500 hover:text-red-400 transition-all cursor-pointer delete-historyAcc-icon" viewBox="0 0 24 24" width="20" height="20" fill="currentColor" data-account-history-id="' +
                            item["history_accNum_id"] +
                            '">';
                        rowHtml +=
                            '<path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 10.5858L9.17157 7.75736L7.75736 9.17157L10.5858 12L7.75736 14.8284L9.17157 16.2426L12 13.4142L14.8284 16.2426L16.2426 14.8284L13.4142 12L16.2426 9.17157L14.8284 7.75736L12 10.5858Z"></path>';
                        rowHtml += "</svg>";
                        rowHtml += "</td>";
                        rowHtml += "</tr>";

                        // Append the row to the table
                        $(".account-data-row").append(rowHtml);
                    });
                } else {
                    // Show the "Not Found" message if no data is found
                    var notFoundHtml =
                        '<tr class="border-b bg-gray-700 border-gray-500 not-found-data">';
                    notFoundHtml +=
                        '<td colspan="4" class="px-4 py-4 text-red-500 text-nowrap text-center">';
                    notFoundHtml += "Not Found";
                    notFoundHtml += "</td>";
                    notFoundHtml += "</tr>";

                    // Append the "Not Found" message to the table
                    $(".account-data-row").append(notFoundHtml);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    }
</script>

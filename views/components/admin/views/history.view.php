<?php


$stmt = $conn->prepare("SELECT user_id, balance_r_d, sender, receiver, amount, description, status FROM payment_tbl WHERE user_id  = ? LIMIT 7");
$stmt->execute([$_SESSION["user_id"]]);

// Number of rows per page

if ($stmt) {
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Calculate total pages
$totalRows = count($rows);
$rowsPerPage = 7; // Adjust as needed
$totalPages = ceil($totalRows / $rowsPerPage);
?>

<div class="grid grid-cols-1 gap-6 mb-6">
    <div class="bg-white border border-gray-100 shadow-md shadow-black/5 rounded-md">
        <div class="flex justify-between mb-4 items-start ps-6 pt-6 pr-6">
            <div class="font-medium">History</div>
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
        <div class="overflow-x-auto ps-2 pr-2 pb-6">
            <table class="w-full min-w-[460px] ">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">receiver name</th>
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 px-4 text-left rounded-tl-md rounded-bl-md">sender name</th>
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left">amount</th>
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left">description</th>
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tr-md rounded-br-md">Status</th>
                    </tr>
                </thead>
                <tbody id="pagination-data">
                    <?php if (empty($rows)) : ?>
                        <tr class="text-center">
                            <td class="border-b border-b-gray-50 text-center pt-2" colspan="5">
                                <span class="inline-block p-1 rounded bg-red-500/10 text-red-500 font-medium text-[12px] leading-none">Not Found</span>
                            </td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($rows as $row) : ?>
                            <?php
                            $check = ($row["balance_r_d"] == "balance_kh") ? "៛" : "$";
                            ?>

                            <tr>
                                <td class="px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                        <span class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate"><?= $row["receiver"] ?></span>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-gray-600 text-sm font-medium hover:text-blue-500"><?= $row["sender"] ?></span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-emerald-500"><?= $row["amount"] . " " . $check ?></span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-emerald-500"><?= $row["description"] ?></span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none"><?= $row["status"] ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- pagination -->
        <div id="pagination" class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
            <!-- Menu navigation -->
            <div class="flex-1 items-center justify-between sm:flex">
                <div>
                    <p class="text-sm text-gray-700">
                        Showing
                        <span class="font-medium">1</span>
                        to
                        <span class="font-medium">10</span>
                        of
                        <span class="font-medium">97</span>
                        results
                    </p>
                </div>
                <div>
                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                        <!-- Previous button -->
                        <button type="button" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Page buttons -->
                        <a href="#" aria-current="page" class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">2</a>
                        <!-- Additional page buttons (hidden on small screen -->
                        <a href="#" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">3</a>
                        <!-- Placeholder for ellipsis -->
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>
                        <!-- Additional page buttons (hidden on small screens) -->
                        <a href="#" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">8</a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">9</a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">10</a>

                        <!-- Next button -->
                        <button type="button" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var currentPage = 1;
    var totalPages = <?php echo $totalPages; ?>;
    var rowsdata = <?php echo $rowsPerPage; ?>;
    var totalRows = <?php echo $totalRows; ?>;

    function showPagination() {
        var paginationDiv = document.getElementById('pagination');
        if (totalPages > 1) {
            paginationDiv.classList.remove('hidden');
        } else {
            paginationDiv.classList.add('hidden');
        }
    }

    function renderPagination() {
        var paginationDiv = document.getElementById('pagination');
        paginationDiv.innerHTML = '';

        for (var i = 1; i <= totalPages; i++) {
            var link = document.createElement('a');
            link.href = '#';
            link.innerText = i;
            link.classList.add('relative', 'inline-flex', 'items-center', 'px-4', 'py-2', 'text-sm', 'font-semibold', 'text-gray-900', 'ring-1', 'ring-inset', 'ring-gray-300', 'hover:bg-gray-50', 'focus:z-20', 'focus:outline-offset-0');
            link.addEventListener('click', function(event) {
                event.preventDefault();
                currentPage = parseInt(this.innerText);
                fetchData();
            });
            paginationDiv.appendChild(link);
        }
    }

    function fetchData() {
        var startIndex = (currentPage - 1) * rowsdata;
        var endIndex = Math.min(startIndex + rowsdata, totalRows);

        // Fetch data via AJAX or simply update the table content
        // Here, we'll just update the table content without AJAX
        $.ajax({
            url: "./php/FetchDataHistory.php",
            method: "GET",
            success: function(response) {
                console.log("Response:", response);
                // Assuming your response is a JSON array containing the data
                var rows = response;

                // Now populate the table with the received data
                var tableBody = document.getElementById('pagination-data');
                tableBody.innerHTML = '';

                for (var i = 0; i < rows.length; i++) {
                    var row = rows[i];
                    var check = row["balance_r_d"] == "balance_kh" ? "៛" : "$";
                    var tr = document.createElement('tr');
                    tr.innerHTML = `
                <td class="px-4 border-b border-b-gray-50">
                    <div class="flex items-center">
                        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                        <span class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">${row["receiver"]}</span>
                    </div>
                </td>
                <td class="py-2 px-4 border-b border-b-gray-50">
                    <span class="text-gray-600 text-sm font-medium hover:text-blue-500">${row["sender"]}</span>
                </td>
                <td class="py-2 px-4 border-b border-b-gray-50">
                    <span class="text-[13px] font-medium text-emerald-500">${row["amount"]} ${check}</span>
                </td>
                <td class="py-2 px-4 border-b border-b-gray-50">
                    <span class="text-[13px] font-medium text-emerald-500">${row["description"]}</span>
                </td>
                <td class="py-2 px-4 border-b border-b-gray-50">
                    <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">${row["status"]}</span>
                </td>
            `;
                    tableBody.appendChild(tr);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr, status, error);
            }
        });

    }

    $(document).ready(function() {
        showPagination();
        renderPagination();
        fetchData();
    });
</script>

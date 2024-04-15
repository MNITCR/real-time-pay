<?php include_once './views/components/head.components.php'; ?>
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

                </tbody>
            </table>
        </div>

        <!-- pagination -->
        <div id="pagination" class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
            <!-- Menu navigation -->
            <div class="flex-1 items-center justify-between sm:flex">
                <div id="pageInfo">

                </div>
                <div>
                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                        <!-- Previous button -->
                        <button type="button" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Previous</span>
                            <svg id="previous_btn" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Page buttons -->
                        <a id="currentPage" class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>
                        <span id="ellipsis" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-gray-300 focus:outline-offset-0">...</span>
                        <a id="totalCurrentPage" class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>

                        <!-- Next button -->
                        <button type="button" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Next</span>
                            <svg id="next_btn" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
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
    document.addEventListener("DOMContentLoaded", function() {
        const paginationData = document.getElementById("pagination-data");
        const previousBtn = document.getElementById("previous_btn");
        const nextBtn = document.getElementById("next_btn");
        const pageInfoElement = document.getElementById("pageInfo");
        const currentPageBtn = document.getElementById("currentPage");
        const totalCurrentPageBtn = document.getElementById("totalCurrentPage");
        const ellipsisSpan = document.getElementById("ellipsis");

        let currentPage = 1;
        let totalItems = 0;
        let totalPages = 1;
        let itemsPerPage = 7;
        let totalCurrentPage = 1;
        let data = [];

        function fetchData() {
            fetch(`./php/FetchDataHistory.php`)
                .then(response => response.json())
                .then(allData => {
                    data = allData;
                    totalItems = data.length;
                    // Calculate total current page
                    totalCurrentPage = Math.ceil(totalItems / itemsPerPage);
                    displayData();
                });
        }

        function displayData() {
            // Clear previous data
            paginationData.innerHTML = "";

            // Calculate start and end index for current page
            const startIndex = (currentPage - 1) * 7;
            const endIndex = Math.min(startIndex + 7, totalItems);
            const tr = document.createElement("tr");

            if (data.length === 0) {
                tr.innerHTML = `
                    <tr class="text-center">
                        <td class="border-b border-b-gray-50 text-center pt-2" colspan="5">
                            <span class="inline-block p-1 rounded bg-red-500/10 text-red-500 font-medium text-[12px] leading-none">Not Found</span>
                        </td>
                    </tr>`;
                paginationData.append(tr);
            } else {
                // Append new data
                for (let i = startIndex; i < endIndex; i++) {
                    const row = data[i];
                    const tr = document.createElement("tr");

                    var check = row["balance_r_d"] == "balance_kh" ? "៛" : "$";

                    tr.innerHTML = `
                    <td class="px-4 border-b border-b-gray-50">
                        <div class="flex items-center">
                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                            <span class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">${row.receiver}</span>
                        </div>
                    </td>
                    <td class="py-2 px-4 border-b border-b-gray-50">
                        <span class="text-gray-600 text-sm font-medium hover:text-blue-500">${row.sender}</span>
                    </td>
                    <td class="py-2 px-4 border-b border-b-gray-50">
                        <span class="text-[13px] font-medium text-emerald-500">${row.amount} ${" "} ${check}</span>
                    </td>
                    <td class="py-2 px-4 border-b border-b-gray-50">
                        <span class="text-[13px] font-medium text-emerald-500">${row.description}</span>
                    </td>
                    <td class="py-2 px-4 border-b border-b-gray-50">
                        <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">${row.status}</span>
                    </td>
                `;
                    paginationData.append(tr);
                }
            }

            // Update page info
            updatePageInfo();

            // Enable/disable pagination buttons
            updatePaginationButtons();
        }

        function updatePageInfo() {
            const startItem = (currentPage - 1) * 7 + 1;
            const endItem = Math.min(currentPage * 7, totalItems);

            // Update total current page button
            totalCurrentPageBtn.textContent = totalCurrentPage;

            // Show/hide ellipsis
            console.log(totalCurrentPage);
            if (totalCurrentPage > 3) {
                if (totalCurrentPage > 2) {
                    ellipsisSpan.removeClass = "hidden";
                } else {
                    ellipsisSpan.addClass = "hidden";
                }
            } else {
                ellipsisSpan.addClass = "hidden";
            }

            // Update current page button
            currentPageBtn.textContent = currentPage;
            pageInfoElement.innerHTML = `
            <p class="text-sm text-gray-700">
                Showing
                <span class="font-medium">${startItem}</span>
                to
                <span class="font-medium">${endItem}</span>
                of
                <span class="font-medium">${totalItems}</span>
                results
            </p>
        `;
        }

        function updatePaginationButtons() {
            previousBtn.disabled = currentPage === 1;
            nextBtn.disabled = currentPage * 7 >= totalItems;
        }

        // Initial data fetch
        fetchData();

        // Event listeners for pagination buttons
        previousBtn.addEventListener("click", () => {
            if (currentPage > 1) {
                currentPage--;
                displayData();
            }
        });

        nextBtn.addEventListener("click", () => {
            if (currentPage * 7 < totalItems) {
                currentPage++;
                displayData();
            }
        });
    });
</script>
<?php include_once './views/components/footer.components.php'; ?>

<!-- pop up history account transfer -->
<div id="historyAcc-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative sm:mx-auto sm:w-full sm:max-w-sm lg:max-w-xl">
        <!-- Modal content -->
        <div class="relative bg-gray-700 rounded-lg shadow dark:bg-gray-700">
            <button type="button" id="hideFormHistoryAccount" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                    Your profile account
                </h3>

                <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm lg:max-w-xl">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3 text-nowrap">
                                        Account Number
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Date
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="account-data-row">

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

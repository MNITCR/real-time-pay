$(document).ready(function () {
  function reloadTableData() {
    $.ajax({
      type: "GET",
      url: "./php/FetchDataHistoryAccNum.php",
      dataType: "json",
      success: function (data) {
        $(".account-data-row").empty();
        if (data.length > 0) {
          $(".not-found-data").addClass("hidden");

          data.forEach(function (item) {
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
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  }

  // $(".delete-historyAcc-icon").click(function () {
  //   if (confirm("Are you sure you want to delete ?")) {
  //     var accountId = $(this).data("account-history-id");

  //     // AJAX call to delete the record
  //     $.ajax({
  //       type: "POST",
  //       url: "./php/deleteHistoryAccNum.php",
  //       data: { accountId: accountId },
  //       dataType: "json",
  //       success: function (response) {
  //         alert(response.message);
  //         $("#historyAcc-modal").addClass("hidden");
  //         reloadTableData();
  //       },
  //       error: function (xhr, status, error) {
  //         // Handle error
  //         console.error(xhr.responseText);
  //       },
  //     });
  //   }
  // });

  $(document).on("click", ".delete-historyAcc-icon", function () {
    if (confirm("Are you sure you want to delete ?")) {
      var accountId = $(this).data("account-history-id");

      $.ajax({
        type: "POST",
        url: "./php/deleteHistoryAccNum.php",
        data: { accountId: accountId },
        dataType: "json",
        success: function (response) {
          alert(response.message);
          $("#historyAcc-modal").addClass("hidden");
          reloadTableData();
        },
        error: function (xhr, status, error) {
          // Handle error
          console.error(xhr.responseText);
        },
      });
    }
  });
});

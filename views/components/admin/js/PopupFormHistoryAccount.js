$(document).ready(function () {
  $("#history-account").click(function () {
    $("#historyAcc-modal").removeClass("hidden");
  });

  $("#hideFormHistoryAccount").click(function () {
    $("#historyAcc-modal").addClass("hidden");
  });

  $(document).on("click", ".account_number_history_account", function (e) {
    var value = $(this).text().trim();
    $(".accountNumber").val(value);
    $("#historyAcc-modal").addClass("hidden");
  });
});

"use strict";
new DataTable("#example");
$("#example tbody").on("click", "button.delete-btn", function () {
  var row = $(this).closest("tr");
  table.row(row).remove().draw();
});

$(document).ready(function() {
  $("#searchInput").keyup(function() {
    var searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "./includes/handlers/action.php",
        method: "POST",
        data: { query: searchText },
        success: function(response) {
          $("#postContainer").html(response);
        }
      });
    } else {
      $.ajax({
        url: "./includes/handlers/action.php",
        method: "POST",
        data: { query: "" },
        success: function(response) {
          $("#postContainer").html(response);
        }
      });
    }
  });
});

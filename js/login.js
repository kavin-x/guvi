$(document).ready(function () {
  $("#but_submit").click(function () {
    var username = $("#txt_uname").val().trim();
    var password = $("#txt_pwd").val().trim();
    if (username != "" && password != "") {
      $.ajax({
        url: "http://localhost:3000/php/login.php",
        crossDomain: true,
        type: "POST",
        data: { username: username, password: password },
        success: function (response) {
          alert(response);
        },
      });
    }
  });
});

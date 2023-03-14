$(document).ready(function () {
  let userData = JSON.parse(localStorage.getItem("userdetails"));
  if (userData) {
    console.log(userData.username);
    var username = userData.username;
    var password = userData.password;
    console.log(username);
    if (username != "" && password != "") {
      $.ajax({
        url: "http://localhost:3000/php/profile.php",
        crossDomain: true,
        type: "POST",
        data: { username: username, password: password },
        success: function (response) {
          let data = $.parseJSON(response);
          console.log(data);
          if (data.status == 200) {
            $("#user_name").text(data.name);
            $("#user_email").text("test");
            $("#user_dob").text("test");
            $("#user_contact").text("test");
          } else {
            alert(response);
          }
        },
      });
    }
  }
});

function onSignIn(googleUser) {
  let profile = googleUser.getBasicProfile();
  auth("login", profile);
}

function signOut() {
  //gapi.auth2.getAuthInstance().disconnect();

  let auth2 = gapi.auth2.getAuthInstance();
  auth2.signOut().then(function () {
    auth("logout");
    window.location.href = "http://opss.com/iniciar_sesion.php";
  });
}

function auth(action, profile = null) {
  let data = { UserAction: action };

  if (profile) {
    data = {
      UserName: profile.getGivenName(),
      UserLastName: profile.getFamilyName(),
      UserEmail: profile.getEmail(),
      UserAction: action,
    };
  }

  $.ajax({
    type: "POST",
    url: "http://opss.com/user.php",
    data: data,
    success: function (data) {
      let user = JSON.parse(data);
      console.log(data);
      if (user.logged) {
        $("#user_given_name").text(profile.getGivenName());
        $("#user_last_name").text(profile.getFamilyName());
        $("#user_email").text(profile.getEmail());
        $("#user_profile").attr("src", profile.getImageUrl());

        if (document.URL === "http://opss.com/iniciar_sesion.php") {
          window.location.href = "http://opss.com/index.html";
        }
      } else {
        alert("La cuenta no esta registrada");
        signOut();
      }
    },
  });
}

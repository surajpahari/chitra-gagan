// const site = "http://localhost/Chitra-Gagan/";
// const profile = "http://localhost/profile/";
var navProfile = document.getElementById("navProfile");
var $userid = parseInt(navProfile.alt);

function fetchProfileData($uid) {
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let response = JSON.parse(this.responseText);
      console.log(response);
      navProfile.src=profile+response[0].profile;
    }
  };
  xhttp.open("POST", site + "images/get_profile/" + $uid, true);
  xhttp.send();
}
fetchProfileData($userid);

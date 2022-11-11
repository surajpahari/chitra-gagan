 const visitProfile = (currentUploaderId) => {
    console.log("hello");
    console.log(currentUploaderId);

  if (currentUploaderId != undefined) {
    let profile_trigger = document.getElementsByClassName("uploader");
    for (i = 0; i < profile_trigger.length; i++) {
      profile_trigger[i].onclick = function () {
        window.location = site + "users/visit_profile/"+currentUploaderId;
        console.log(currentUploaderId);
      };
    }
  }
};

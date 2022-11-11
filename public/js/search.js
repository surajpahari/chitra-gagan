var searchedProfileImages = document.getElementsByClassName("searchedProfile");
var profileTrigger = document.getElementsByClassName("uploader")
for (i = 0; i < profileTrigger.length; i++) {
var alt =  document.getElementById("searchedProfileImage"+i).alt;
profileTrigger[i].addEventListener('click',function(){
  let profileId = extract_info(alt);
  window.location = site + "users/visit_profile/"+profileId;
}); 
}
function extract_info(alt) {
  var alt_array = alt.split("X:");
  return  alt_array[1];
}
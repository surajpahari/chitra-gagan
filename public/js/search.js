var searchedProfileImages = document.getElementsByClassName("searchedProfile");
var profileTrigger = document.getElementsByClassName("searchedUploader")
for (i = 0; i < profileTrigger.length; i++) {
var alt =  document.getElementById("searchedProfileImage"+i).alt;
profileTrigger[i].addEventListener('click',function(){
  let profileId = extract_userid(alt);
  window.location = site + "users/visit_profile/"+profileId;
}); 
}
function extract_userid(alt){
$userid = alt.split('X:')
// return $userid;
return ($userid[1]);
}
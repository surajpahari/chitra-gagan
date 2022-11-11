// const site = "http://localhost/Chitra-Gagan/";
var currentalt;
var currentlikes;
var currentUploaderId;
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var images = document.getElementsByClassName("display-image");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
var downloadLink = document.getElementById("downloadLink");
var currentImageFile;
var noice = "haha";
console.log(downloadLink);

for (i = 0; i < images.length; i++) {
  images[i].onclick = function () {
    let no = i;
    this.info = this;
    modal.style.display = "flex";
    modalImg.src = this.src;
    console.log(this.src);
    captionText.innerHTML = this.alt;
    let requestFor = extract_info(this.alt);
    console.log(extract_info);
    currentalt = this.alt;
    fetchImageData(requestFor.image_id);
    fetchCreatorData(requestFor.id);
    visitProfile(requestFor.id);
    let source = this.src;
    checkIfLiked(this.alt);
    // visitProfile();
    // console.log(mesg);
    // console.log("haha");
  };
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// console.log(span);
// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
};

function extract_info(alt) {
  var alt_array = alt.split("X:", 3);
  return { id: alt_array[0], image_id: alt_array[1], title: alt_array[2] };
}

function fetchImageData(imageId) {
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let response = JSON.parse(this.responseText);
      console.log(response);
      setImageInfo(response);
      setDownloadLink(response);
     }
  };
  xhttp.open(
    "POST",
    site + "images/get_image_info/" + extract_info(currentalt).image_id,
    true
  );
  xhttp.send();
}

function fetchCreatorData(userId) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let response = JSON.parse(this.responseText);
      console.log(response);
      setUserInfo(response);
    }
  };
  xhttp.open(
    "POST",
    site + "images/get_creator_info/" + extract_info(currentalt).id,
    false
  );
  xhttp.send();
}
function getImageProperty(file){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // let response = JSON.parse(this.responseText);
      console.log(this.responseText);
     }
  };
  xhttp.open(
    "POST",
    site + "images/get_image_property/"+file,
    false
  );
  xhttp.send();
}
function setUserInfo(userInfo) {
  console.log('username is '+ userInfo.username)
  console.log('username is '+ userInfo.profile)
  document.getElementById("modalUsername").innerHTML = userInfo.username;
  // let profileSource = document.getElementById('modalProfile').src.split('X:');
    document.getElementById("modalProfile").src = profile + userInfo.profile;
}

function setImageInfo(imageInfo) {
  console.log(imageInfo);
  currentlikes = imageInfo.likes;
  document.getElementById("likeCount").innerHTML = imageInfo.likes;
  getImageProperty(imageInfo.location);
}

//for like
const likeBtnId = "likeButton";
var likeButtonStatus = 0;
var likeButton = document.getElementById(likeBtnId);
var likeCount = document.getElementById("likeCount");

// console.log(likeButton);
likeButton.addEventListener("click", () => {
  if (likeButtonStatus == 0) {
    setLiked();
    likePlus(currentalt);
  } else {
    unsetLiked();
    likeSub(currentalt);
  }
  // console.log(likeButtonStatus);
});

function setLiked() {
  likeButtonStatus = 1;
  likeButton.innerHTML = '<i class="uil uil-thumbs-up"></i>';
  likeButton.style.color = "red";
}
function unsetLiked() {
  likeButtonStatus = 0;
  likeButton.innerHTML = '<i class="uil uil-thumbs-up"></i>';
  likeButton.style.color = "white";
}
function likePlus(alt) {
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "1") {
        currentlikes++;
        document.getElementById("likeCount").innerHTML = currentlikes;
      }
    }
  };
  xhttp.open("POST", site + "images/add_like/" + alt, true);
  xhttp.send();
}

function likeSub(alt) {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "1") {
        document.getElementById("likeCount").innerHTML = currentlikes - 1;
        currentlikes--;
      }
    }
  };
  request.open("POST", site + "images/sub_like/" + alt, false);
  request.send();
}

function checkIfLiked(alt) {
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "1") {
        setLiked();
      } else {
        unsetLiked();
      }
    }
  };
  xhttp.open("POST", site + "images/check_like/" + alt, true);
  xhttp.send();
}
function setDownloadLink(imageInfo) {
  // console.log(imageInfo.location);
  downloadLink.addEventListener("click", function () {
    downloadFile(imageInfo.location);
      // console.log(imageInfo.location);
    // console.log("here01  ".imageInfo.location);
  });
}
function downloadFile(file) {
  window.location = site + "images/downloads_file/" + file;
}
 
var visitProfile = (currentUploaderId) => {
  var triggerClass = "uploader";
 if (currentUploaderId != undefined) {
   let profile_trigger = document.getElementsByClassName(triggerClass);
   for (i = 0; i < profile_trigger.length; i++) {
     profile_trigger[i].onclick = function () {
       window.location = site + "users/visit_profile/"+currentUploaderId;
       console.log(currentUploaderId);
     };
   }
 }
};
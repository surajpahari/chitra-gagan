const site = "http://localhost/Chitra-Gagan/";

// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var images = document.getElementsByClassName("display-image");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

for (i = 0; i < images.length; i++) {
  images[i].onclick = function () {
    let no = i;
    this.info = this;
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
    let requestFor = extract_info(this.alt);
    fetchImageData(requestFor.image_id);
    fetchCreatorData(requestFor.id);
    // console.log(mesg);
    console.log("haha");
  };
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
console.log(span);
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
    }
  };
  xhttp.open("POST", site + "images/get_image_info/33", true);
  xhttp.send();
}
function fetchCreatorData(userId) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        let response = JSON.parse(this.responseText)
        console.log(response);
    }
  };
  xhttp.open("POST", site + "images/get_creator_info/5", false);
  xhttp.send();
}

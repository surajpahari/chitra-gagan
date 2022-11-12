var searchValue =  document.getElementById("searchInput");
var searchButton =  document.getElementById("searchSubmit");
if(searchValue.value == ""){
    searchButton.disabled = true;
}
searchValue.addEventListener("input", function(){
    searchButton.disabled = (onlySpaces(this.value) === '');
  })
function onlySpaces(str) {
  if (str.trim().length == 0){
    return true
  }
    return false
}
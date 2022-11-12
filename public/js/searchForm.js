var searchValue =  document.getElementById("searchInput");
var searchButton =  document.getElementById("searchSubmit");
var searchForm = document.getElementById("searchForm");
if(searchValue.value == ""){
    searchButton.disabled = true;
}
searchValue.addEventListener("input", function(){
  console.log(onlySpaces(this.value));
    searchButton.disabled = (onlySpaces(this.value));
  })
searchButton.addEventListener("click",function(){
  searchForm.submit();
})
function onlySpaces(str) {
  if (str.trim().length == 0){
    return true
  }
    return false
}
//to show and hide the meta form
var metaForm = document.getElementById("metaFormBox");
metaForm.style.display ="none";
var metaFormShowBtn = document.getElementById("showMeta");
metaFormShowBtn.cilckStatus = 0;
var hiddenForm = document.getElementById("hidden-form-option");
hiddenForm.display = "none"
var hiddenInput = document.getElementById("hidden-input");
metaFormShowBtn.addEventListener("click", function (e) {
  e.preventDefault();
  if (this.cilckStatus == 0) {
    metaForm.style.display = "block";
    this.innerHTML = "Unset meta data";
    this.cilckStatus = 1;
    hiddenInput.value ="yes"
  }
  else if(this.cilckStatus == 1){
    metaForm.style.display ="none";
    this.innerHTML = "Set meta data";
    this.cilckStatus = 0;
    hiddenInput.value = "no";
  }
});

//getting data for options of different input
var exposureOptions =[];
var categoryOptions = ['Wildlife', 'Astrophotography' , 'Macro' , 'Landscape' , 'Portraits' , 'Wedding' , 'Fashain' , 'Street' , 'Travel' , 'Product' , 'Food' , 'Ariel' , 'Abstract' , 'Black and White'];
var isoOptions = [25,50,200,400,800,1600,3200,6400,12800,51200,102400,204800,409600,819200,1638400,3276800];
var apertureOptions = [45,32,22,16,11,8,5.6,4,2.8,2,1.4,1];
var shutterSpeedOptions=['1/8000','1/4000','1/2000','1/1000','1/500','1/250','1/125','1/60',
'1/30','1/15','1/8','1/4','1/2','1','2','4','8','15','30','60']

//addingdata in exposureOption
function addDataInExpsoure(start,end){
  let x = start;
  let count= end-start+1;
  for(i=0;i<count;i++){
    exposureOptions[i] = start+i;
  }
}
addDataInExpsoure(-19,10)
console.log(exposureOptions)

//function for inserting option in respective id of select
function addOption(option,idOfSelectTag){
  let selection = document.getElementById(idOfSelectTag);
  let optionElement = document.createElement("option");
  optionElement.value = option;
  optionElement.innerHTML = option;
  selection.appendChild(optionElement);
}

//function for adding each data in option array to option element
function setOption(optionArray,idOfSelectTag){
  for(option of optionArray){
    addOption(option,idOfSelectTag);
    // console.log(option)
  }
}



//adding option of category
setOption(categoryOptions,'select-category')
setOption(exposureOptions,'select-exposure')
setOption(shutterSpeedOptions,'select-shutter-speed')
setOption(apertureOptions,'select-aperture')
setOption(isoOptions,'select-iso')

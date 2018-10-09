// JavaScript Document
function grow(el) {
  var el = document.getElementById("box");
    if(el) {
        el.style.height = "400px";
        el.style.width = "400px";
    }
}
function blue() {
  document.getElementById("box").style.backgroundColor = "blue";
}
function fade() {
  document.getElementById("box").style.opacity = "0.5";
}

function reset() {
  document.getElementById("box").style.height = "150px";
  document.getElementById("box").style.width = "150px";  
  document.getElementById("box").style.opacity = "1";  
  document.getElementById("box").style.backgroundColor = "orange";

}
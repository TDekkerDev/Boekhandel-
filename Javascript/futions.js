
setInterval(function(){
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
    document.getElementById("text").innerHTML = this.responseText;
    }
    xmlhttp.open("GET", "UserOnderwater.php");
    xmlhttp.send();
}, 5000);


setInterval(function(){
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
    document.getElementById("text1").innerHTML = this.responseText;
    }
    xmlhttp.open("GET", "AdminOnderwater.php");
    xmlhttp.send();
}, 5000);


// var input = document.getElementById("myInput");
// input.addEventListener("keypress", function(event) {
//   if (event.key === "Enter") {
//     event.preventDefault();
//     document.getElementById("myBtn").click();
//   }
// });
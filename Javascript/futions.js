setInterval(function(){
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
    document.getElementById("text").innerHTML = this.responseText;
    }
    xmlhttp.open("GET", "UserOnderwater.php");
    xmlhttp.send();
}, 5000);


let list = document.getElementsByClassName("text1")

setInterval(function(){
for( let i=0; i < list.length; i++) {
    loadChat(list[i].dataset.id)
}
}, 5000);

function loadChat(chatId) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
        document.getElementById("chat" + chatId).innerHTML = this.responseText;
        }
        xmlhttp.open("GET", "AdminOnderwater.php?chatid=" + chatId);
        xmlhttp.send();
    
}


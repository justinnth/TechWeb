$(document).ready(init());

function init() {
    $("#cliquable").click(function(){
        modification();
    });
}

function modification(){
    $("#modifiable").load("exo1.html");
}
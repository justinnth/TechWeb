$(document).ready(init());

function init() {
    //alert($("html").html());
    //$("body").html("<p>Bonjour</p>");
    $("ul li ul").hide();
    $("ul li").hover(function () {
        $("ul", this).slideDown();
    },function () {
        $("ul", this).slideUp();
    });
}


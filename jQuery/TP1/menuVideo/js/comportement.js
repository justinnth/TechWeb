$(document).ready(init());

function init() {
    var lesA = $("li a.over-video");

    lesA.mouseenter(function () {
        $("img", this).hide();
        $(this).addClass("affiche");
        $(this).next().animate({ left: 400 }, 1000);
    });

    lesA.mouseleave(function () {
        $("img", this).show();
        $(this).removeClass("affiche");
        $(this).next().animate({ left: -400 }, 1000);
    });
}
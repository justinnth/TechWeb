$(document).ready(init());

function init() {
    var lesLi = $("ul li");

    lesLi.mouseenter(function () {
        $("a", this).addClass('voyante');
        $(this).next().find('a').addClass('intermediaire');
        $(this).prev().find('a').addClass('intermediaire');
    });

    lesLi.mouseleave(function () {
        $("a", this).removeClass('voyante');
        $(this).next().find('a').removeClass('intermediaire');
        $(this).prev().find('a').removeClass('intermediaire');
    })
}
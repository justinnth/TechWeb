$(document).ready(function () {
    var lesMiniatures = $("div#galerie ul#galerie_mini li a");
    var divPhotos = $("div#photo");

    lesMiniatures.mouseenter(function init() {
        var srcImg = $(this).attr('href');
        var altImg = $("img", this).attr('alt');
        var h2Txt = $(this).attr('title');

        $("h2", divPhotos).html(h2Txt);
        $("img", divPhotos).attr('src', srcImg);
        $("img", divPhotos).attr('alt', altImg);
    })
});
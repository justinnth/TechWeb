$(document).ready(init());

function init() {
    /**
     * fatNav
     */
    $.fatNav();

    /**
     * fullPage.js
     */
    $("#fullpage").fullpage({
        //Navigation
        anchors: ['1', '2', '3', '4','5'],
        navigation: true,
        navigationPosition: 'right',
        navigationTooltips: ['Article 1', 'Article 2', 'Article 3', 'Article 4','Article 5'],

        //Design
        verticalCentered: false,
        sectionsColor : ['#ccc', '#a9a7ff','#a1cc7f', '#ff645f','#c161ff']
    });

    /**
     * Galerie d'images : unitegallery
     */
    $('#gallery').unitegallery();

    /**
     * Google Maps API
     */
    map = new GMaps({
        div: '#map',
        lat: 46.1620346,
        lng: -1.2463008,
        zoom: 12
    });
    map.addMarker({
        lat: 46.1476498,
        lng: -1.1571302,
        title: 'Université de La Rochelle',
        infoWindow: {
            content: '<p>Université de La Rochelle</p>'
        }
    });

    /**
     * drawsvg.js
     */
    var mySVG = $('#Calque_1').drawsvg();
    mySVG.drawsvg('animate');
}
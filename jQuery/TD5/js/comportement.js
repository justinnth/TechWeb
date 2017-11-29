var map;

$(document).ready(init());

function init(){
    //Création de carte de Bordeaux
    map = new GMaps({
        div: '#carte',
        lat: 44.8367819,
        lng: -0.5762712,
        zoom: 12
    });

    var urlBordeaux = "http://odata.bordeaux.fr/v1/databordeaux/parcjardin/?format=json"
    envoiAjax(urlBordeaux, "bordeaux").done(traitemenJardin);

    var urlFlickr = "https://api.flickr.com/services/feeds/photos_public.gne? tags=larochelle&tagmode=any&format=json&jsoncallback=?"
    envoiAjax(urlFlickr, "image").done(traitemenFlickr);
}

function envoiAjax(url, classe){
    return $.ajax({
        url: url,
        type: "GET",
        dataType: "JSONP",
        beforeSend: showLoadingImgFn(classe)
    }).always(function(){
        //Suppression du gif animé
        $("div."+classe+" img").remove();
    }).fail(function(){
        alert("Echec");
    });
}

function traitemenJardin(data){
    var ul = $("div.bordeaux ul");

    $.each(data.d, function(i){
        var li = $("<li/>").attr("data-id", data.d[i].cle).text(data.d[i].nom_espace_entretien).appendTo(ul);
        map.addMarker({
            lat: data.d[i].y_lat,
            lng: data.d[i].x_long,
            title: data.d[i].nom_espace_entretien,
            mouseover: function(e){
                $("ul").find('[data-id='+data.d[i].cle+"]").toggleClass('rouge');
            },
            mouseout: function(e){
                $("ul").find('[data-id='+data.d[i].cle+"]").toggleClass('rouge');
            }
        });
    });
}

function traitemenFlickr(data){
    var div = $("div.image");
    
    $.each(data.items, function(i){
        var img = $("<img/>").attr('src', data.items[i].media.m).appendTo(div);
    });

    $(".owl-carousel").owlCarousel();
}

function showLoadingImgFn(param){
    var div = $("div."+param);

    var img = $("<img/>").attr('src', 'img/ajax-loader.gif').appendTo(div);
}
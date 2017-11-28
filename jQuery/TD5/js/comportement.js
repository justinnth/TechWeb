$(document).ready(init());

function init(){
    envoiAjax("http://odata.bordeaux.fr/v1/databordeaux/parcjardin/?format=json", "bordeaux");

    envoiAjax("https://api.flickr.com/services/feeds/photos_public.gne? tags=larochelle&tagmode=any&format=json&jsoncallback=?", "image");
}

function envoiAjax(url, classe){
    return $.ajax({
        url: url,
        type: "GET",
        dataType: "JSONP",
        beforeSend: showLoadingImgFn
    }).always(function(){
        //Suppression du gif animé
    }).fail(function(){
        alert("Fail");
    }).done(function(data){
        switch(classe){
            case "bordeaux":
                var ul = $("h2."+classe).next();
            
                var map = new GMaps({
                    div: '#carte',
                    lat: 44.8367819,
                    lng: -0.5762712,
                    zoom: 12
                });
            
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
                break;
            case 'image' :
                var div = $("div."+classe);

                $.each(data.items, function(i){
                    var img = $("<img/>").attr('src', data.items[i].media.m).appendTo(div);
                });

                div.slick({
                    dots: true,
                    infinite: true,
                    fade: true,
                    speed: 500,
                    cssEase: 'linear'
                });
                break;
        }
    });
}

function showLoadingImgFn(){}
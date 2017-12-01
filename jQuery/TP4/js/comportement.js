$(document).ready(init());

function init(){
    var urlParis = "https://opendata.paris.fr/api/records/1.0/search/?dataset=liste-des-cafes-a-un-euro&facet=arrondissement";
    envoiAjax(urlParis, "listeCafes").done(traitementParis);
}

function envoiAjax(url, id){
    return $.ajax({
        url: url,
        type: "GET",
        dataType: "JSONP",
        beforeSend: showLoadingImgFn(id)
    }).always(function(){
        //Suppression du gif animé
        $("#"+id+" img").remove();
    }).fail(function(){
        alert("Echec");
    });
}

function traitementParis(data){
    var main = $("main#listeCafes");
    var aside = $("aside#detailsCafe");
    var section = $("section#autresCafes");

    var ul = $("<ul/>").appendTo(main);

    $.each(data.records, function(i,e){
        var li = $("<li/>").attr('data-arrondissement',e.fields.arrondissement).text(e.fields.nom_du_cafe).appendTo(ul);
        li.mouseover(function(){
            var arrondissement = $("<p/>").text("Arrondissement : "+e.fields.arrondissement).appendTo(aside);
            var nom = $("<p/>").text("Nom : "+e.fields.nom_du_cafe).appendTo(aside);
            var adresse = $("<p/>").text("Adresse : "+e.fields.adresse).appendTo(aside);
            var prix = $("<p/>").text("Prix : "+e.fields.prix_comptoir +"€").appendTo(aside);
        });
        li.mouseout(function(){
            aside.find("p").remove();
        });
    });
}

function showLoadingImgFn(id){
    var div = $("#"+id);
    
    var img = $("<img/>").attr('src', 'img/ajax-loader.gif').appendTo(div);
}
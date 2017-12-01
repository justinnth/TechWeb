$(document).ready(init())

function init(){
    var url = "https://opendata.paris.fr/api/records/1.0/search/?dataset=les-titres-les-plus-pretes&rows=5&sort=prets&facet=auteur&refine.type_de_document=Bande+dessin%C3%A9e+adulte";

    envoiAjax(url, "bestBD").done(traitementBD);

    $("#submit").click(traitementForm);
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

function showLoadingImgFn(id){
    var div = $("#"+id);   
    var img = $("<img/>").attr('src', 'img/ajax-loader.gif').appendTo(div);
}

function traitementBD(data){
    var section = $("section#bestBD");

    var ul = $("<ul/>").appendTo(section);

    $.each(data.records, function(i,e){
        var li = $("<li/>").appendTo(ul);
        var titre = $("<p/>").text("Titre : "+e.fields.titre).appendTo(li);
        var auteur = $("<p/>").text("Auteur : "+e.fields.auteur).appendTo(li);
        var prets = $("<p/>").text("Nombre de prets : "+e.fields.prets).appendTo(li);
    })
}

function traitementForm(evt){
    evt.preventDefault();

    console.log('salut');
}
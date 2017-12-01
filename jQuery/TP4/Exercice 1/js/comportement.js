$(document).ready(init());

function init(){
    var urlParis = "https://opendata.paris.fr/api/records/1.0/search/?dataset=liste-des-cafes-a-un-euro&rows=181&facet=arrondissement";
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

    var ul = $("<ul/>").appendTo(main);

    $.each(data.records, function(i,e){
        var li = $("<li/>").attr('data-arrondissement',e.fields.arrondissement).text(e.fields.nom_du_cafe).appendTo(ul);
        li.click(clickLi);
    });
}

function showLoadingImgFn(id){
    var div = $("#"+id);   
    var img = $("<img/>").attr('src', 'img/ajax-loader.gif').appendTo(div);
}

function clickLi(){
    var nomCafe = $(this).text();
    nomCafe = encodeURIComponent(nomCafe);

    var url = "https://opendata.paris.fr/api/records/1.0/search/?dataset=liste-des-cafes-a-un-euro&facet=arrondissement&refine.nom_du_cafe="+nomCafe;
    envoiAjax(url, "detailsCafe").done(traitementClickLi);

    var arrondissement = $(this).attr("data-arrondissement");

    var url = "https://opendata.paris.fr/api/records/1.0/search/?dataset=liste-des-cafes-a-un-euro&rows=181&facet=arrondissement&refine.arrondissement="+arrondissement;
    envoiAjax(url, "autresCafes").done(traitementAutres);
}

function traitementClickLi(data){
    var aside = $("aside#detailsCafe");

    aside.find("p").remove();

    var arrondissement = $("<p/>").text("Arrondissement : "+data.records[0].fields.arrondissement).appendTo(aside);
    var nom = $("<p/>").text("Nom : "+data.records[0].fields.nom_du_cafe).appendTo(aside);
    var adresse = $("<p/>").text("Adresse : "+data.records[0].fields.adresse).appendTo(aside);
    var prix = $("<p/>").text("Prix : "+data.records[0].fields.prix_comptoir +"€").appendTo(aside);
}

function traitementAutres(data){
    var section = $("section#autresCafes");

    section.find("p").remove();
    section.find("h4").remove();
    section.find("ul").remove();

    var arrondissement = $("<p/>").text("Arrondissement : "+data.parameters.refine.arrondissement).appendTo(section);
    var nbCafes = $("<p/>").text("Nombre de cafés : "+data.nhits).appendTo(section);

    var h2 = $("<h4/>").text("Liste des cafés de cet arrondissement :").appendTo(section);
    var ul = $("<ul/>").appendTo(section);
    $.each(data.records, function(i,e){
        var li = $("<li/>").attr('data-arrondissement',e.fields.arrondissement).text(e.fields.nom_du_cafe).appendTo(ul);
    });
}
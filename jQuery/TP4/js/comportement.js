$(document).ready(init());

function init(){
    envoiAjax("https://opendata.paris.fr/api/records/1.0/search/?dataset=liste-des-cafes-a-un-euro&facet=arrondissement");
}

function envoiAjax(url){
    return $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        beforeSend: showLoadingImgFn
    }).fail(function(){
        alert('Fail');
    }).done(function(data){
        var main = $("main#listeCafes");
        var aside = $("aside#detailsCafe");
        var section = $("section#autresCafes");

        var ul = $("<ul/>").appendTo(main);

        $.each(data.records, function(i){
            var li = $("<li/>").attr('data-arrondissement',data.records[i].fields.arrondissement).text(data.records[i].fields.nom_du_cafe).appendTo(ul);
            li.mouseover(function(){
                var arrondissement = $("<p/>").text("Arrondissement : "+data.records[i].fields.arrondissement).appendTo(aside);
                var nom = $("<p/>").text("Nom : "+data.records[i].fields.nom_du_cafe).appendTo(aside);
                var adresse = $("<p/>").text("Adresse : "+data.records[i].fields.adresse).appendTo(aside);
                var prix = $("<p/>").text("Prix : "+data.records[i].fields.prix_comptoir +"€").appendTo(aside);
            });
            li.mouseout(function(){
                aside.find("p").remove();
            });
        })
    });
}

function showLoadingImgFn(){}
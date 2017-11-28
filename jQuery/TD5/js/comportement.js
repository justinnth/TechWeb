$(document).ready(init());

function init(){
    envoiAjax("http://odata.bordeaux.fr/v1/databordeaux/parcjardin/?format=json", "bordeaux");
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
        var ul = $("h2."+classe).next();
        $.each(data.d, function(i){
            var li = $("<li/>").attr("data-id", data.d[i].cle).text(data.d[i].nom_espace_entretien).appendTo(ul);
        });
    });
}

function showLoadingImgFn(){}
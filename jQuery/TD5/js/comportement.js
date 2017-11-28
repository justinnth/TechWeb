$(document).ready(init());

function init(){
    console.log("Hello");
}

function envoiAjax(url, classe){
    return $.ajax({
        url: url,
        type: "GET",
        dataType: "JSONP",
        beforeSend: showLoadingImgFn
    }).always(function(){
        console.log("Always");
        //Suppression du gif animé
    }).fail(function(){
        alert("Fail");
    })
}
$(document).ready(init());

function init(){
    $.fn.menu = function(options){
        return this.each(function(){
            var defauts = {
                "vitesseSlideUp":"slow",
                "vitesseSlideDown":"fast",
                "nameSousListe":"sousListe",
                "callback":null,
                "couleurDeTexte":"black",
                "couleurDeFond":"#FD6C9E"
            }; // Paramètres par défauts

            var param = $.extend(defauts,options);  // Fusionne les paramètres par défaut avec les paramètres mis en options
            if (param.callback)
                param.callback();

            $('.'+param.nameSousListe).hide();     // Cache toutes les sous-listes

            $(this).css('color',param.couleurDeTexte);
            $(this).css('background-color',param.couleurDeFond);

            $(this).find('a').mouseover(function(){
                $(this).parent().siblings().find('.'+param.nameSousListe+':visible').slideUp(param.vitesseSlideUp);
                $(this).parent().find('ul').slideDown(param.vitesseSlideDown);
            });
        })
    };

    $('.menu').menu({
        "callback":function(){
            console.log("Vous êtes dans la fonction de callback");
        },
        "couleurDeTexte":"red"
    });
}
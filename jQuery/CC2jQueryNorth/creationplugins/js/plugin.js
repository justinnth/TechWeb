$.fn.monPlugin = function(options){
    var defauts = {
        "widthAside":400,
        "heightAside":300,
        "backgroundColor": '#abc'
    }; // Paramètres par défaut

    var param = $.extend(defauts, options);

    return this.each(function(){
      /**
       * On cache les images
       */
      var imgLi = $(this).find('li').find('img');
      imgLi.hide();

      /**
       * Création et placement de l'aside
       */
      var aside = $("<aside/>");
      aside.css({
        "width": param.widthAside,
        "height": param.heightAside,
        "background-color": param.backgroundColor
      });

      $(this).after(aside);

      /**
       * Survol d'un titre
       */
       var titre = $(this).find('li h3');
       titre.mouseover(traitementSurvol);
       titre.mouseout(traitementSortie);
    });
}

function traitementSurvol() {
  var img = $(this).next();
  var src = img.attr('src');

  var aside = $("aside");

  img = $("<img/>").attr('src', src);
  img.appendTo(aside);

  aside.find('img').show();
}

function traitementSortie() {
  var aside = $("aside");
  aside.empty();
}

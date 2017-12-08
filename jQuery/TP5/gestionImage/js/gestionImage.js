$.fn.gestionImage = function(options){
    var defauts = {
        "nb":4,
        "backgroundColor":"#000",
        "width":100,
        "height":100,
        "padding":10,
        "zoomWidth":400,
        "zoomHeight":400
    }; // Paramètres par défaut
        
    var param = $.extend(defauts, options);

    return this.each(function(){
        /**
         * Création et placement des div zoom et poubelle
         */
        var divZoom = $("<div id='zoom'/>").css({
            "width":param.zoomWidth,
            "height":param.zoomHeight
        });
        $(this).after(divZoom);
        
        var divPoubelle = $("<div id='poubelle'/>");
        divZoom.after(divPoubelle);
        
        /**
         * Mise en place du css et du design du plugin
         */
        $(this).css({
            "background-color":param.backgroundColor,
            "width":param.nb*(param.width+param.padding*2),
            "height":param.nb*(param.height+param.padding*2)
        });

        var li = $(this).find('li');

        li.css({
            "padding":param.padding,
            "width":param.width,
            "height":param.height
        });

        /**
         * Gestion drag & drop
         */
        li.draggable({
            revert: true
        });
        li.droppable({
            drop: echangeImage
        });
        divPoubelle.droppable({
            accept:li,
            drop: supprimerImage
        });
        divZoom.droppable({
            drop: agrandirImage
        });
    });
}

function supprimerImage(event, ui){
    $(ui.draggable).remove();
}

function agrandirImage(event, ui){
    $(this).empty();

    var url = $(ui.draggable).find('img').attr('src');

    var newUrl = url.replace(/100/gi, "/400");

    var img = $("<img/>").attr('src',newUrl).appendTo($(this));
}

function echangeImage(event, ui){
    var imgDrag = $(ui.draggable).find('img');
    var imgDrop = $(this).find('img');

    var oldSrc = imgDrag.attr('src');
    imgDrag.attr('src', imgDrop.attr('src'));
    imgDrop.attr('src',oldSrc);
}
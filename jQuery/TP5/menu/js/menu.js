$.fn.menu = function(options){
    var defauts = {
        "tailleClose":"75px",
        "tailleOpen":"230px",
        "tempsAnimation":300
    }; // Paramètres par défaut
        
    var param = $.extend(defauts, options);

    return this.each(function(){
        var menu = $(this);

        if(isOpen()){
            menu.removeClass('open');
            menu.addClass('close');
        }

        var bouton = $("li.bouton");
        bouton.click(function(){
            if(isOpen()){
                menu.animate({width: param.tailleClose}, param.tempsAnimation);
                menu.removeClass('open');
                menu.addClass('close');
            }
            else{
                menu.animate({width: param.tailleOpen}, param.tempsAnimation);
                menu.removeClass('close');
                menu.addClass('open');
            }
        });
    });
}

function isOpen(){
    var bool = false;
    var menu = $("nav#slide-menu");
    var classe = menu.attr('class');
    if(classe == 'open')
        bool = true;
    return bool;
}

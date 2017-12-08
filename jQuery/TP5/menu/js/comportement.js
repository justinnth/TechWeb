$(document).ready(init());

function init(){

    var menu = $("nav#slide-menu");
    menu.menu(); // Plugin
    
    /*if(isOpen()){
        menu.removeClass('open');
        menu.addClass('close');
    }

    var li = $("li.bouton");
    li.click(ouvertureMenu);*/
}

function isOpen(){
    var bool = false;
    var menu = $("nav#slide-menu");
    var classe = menu.attr('class');
    if(classe == 'open')
        bool = true;
    return bool;
}

function ouvertureMenu(){
    var menu = $("nav#slide-menu");
    if(isOpen()){
        menu.animate({width: "75px"}, 300);
        menu.removeClass('open');
        menu.addClass('close');
    }
    else{
        menu.animate({width: "230px"}, 300);
        menu.removeClass('close');
        menu.addClass('open');
    }
}
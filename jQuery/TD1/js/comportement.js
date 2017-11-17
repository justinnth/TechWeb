$(document).ready(function init(){
    /**
     * Sélection d'éléments de la page web et utilisation de méthodes
     */
    exo1();

    /**
     * Gestion d'évènement et sélection
     */
    exo2();

    /**
     * Gestion d'évènement et manipulation du DOM
     */
    exo3();
});

function exo1(){
    //1_1
    $("#select1 span").addClass('relief');

    //1_2
    $('#select2 span.option').hide('slow');
}

function exo2(){
    //2_1
    $("#ex1_1").click(function(){
        $("#ex1_1 li:first").hide();
    });
    $("#Reaff1").click(function(){
        $("#ex1_1 li:first").show();
    });

    //2_2
    $("#ex1_2 li").click(function(){
        $(this).hide();
    });
    $("#Reaff2").click(function(){
        $("#ex1_2 li").show();
    });

    //2_3
    $("#ex1_3 li").click(function(){
        var maClasse = $(this).attr('class');
        $("#ex1_3 li."+maClasse).hide();
    });
    $("#Reaff3").click(function(){
        $("#ex1_3 li").show();
    });

    //2_4
    $("#ex1_4 li").click(function(){
        var maClasse = $(this).attr('class');
        $("#ex1_4 li."+maClasse).addClass('relief');
    });
    $("#Reaff4").click(function(){
        $("#ex1_4 li").removeClass('relief');
    });
}

function exo3(){
    //3_1
    $("#ulEx1").click(function(){
        var monLi = $("#ulEx1").children().first();
        $("#ulEx1").append(monLi);
    });

    //3_2
    $("#ulEx2 li").click(function(){
        $("#ulEx2").append(this);
    });

    //3_3
    $("#olEx3 li").click(function(){
        $(this).prev().before(this);
    });

    //3_4
    
}
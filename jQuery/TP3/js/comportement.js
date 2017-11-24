$(document).ready(init());

function init(){
    $("#changer").click(function(){
        changerTelephone2()
    });
}

function changerTelephone2(){
    $.getJSON(
        "trouverUnTelephone.php",
        function traitement(data){
            $("h1#modele").text(data.Nom);
            $("p#article").text(data.Commentaire);
            $("img#imgPhone").attr('src', 'Photos/'+data.Photo);
        }
    );
}

function changerTelephone1(){
    $.get(
        "num.php",
        function traiterAjax(data){
            var numero = data;
            $.get(
                "nom.php",{
                    n: numero
                },
                function affichageNom(data){
                    $("h1#modele").text(data);
                }
            );
            $.get(
                "commentaire.php",{
                    n: numero
                },
                function affichageComm(data){
                    $("p#article").text(data);
                }
            );
            $.get(
                "photo.php",{
                    n: numero
                },
                function affichagePhoto(data){
                    $("img#imgPhone").attr('src', 'Photos/'+data);
                }
            );
        }
    );
}
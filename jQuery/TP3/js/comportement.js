$(document).ready(init());

function init(){
    $("#changer").click(
        function(){
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
            /*$.ajax({
                url: "traitement.php",
                type: "GET",
                error: function(){
                    alert("Erreur aie aie aie");
                },
                success: function(data){
                    $("#article").text(data);
                }
            });*/
        }
    );
}
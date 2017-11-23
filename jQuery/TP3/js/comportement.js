$(document).ready(init());

function init(){
    console.log("Salut");

    $("#changer").click(
        function(){
            $.ajax({
                url: "traitement.php",
                type: "GET",
                error: function(){
                    alert("Erreur aie aie aie");
                },
                success: function(data){
                    $("#article").text(data);
                }
            });
        }
    );
}
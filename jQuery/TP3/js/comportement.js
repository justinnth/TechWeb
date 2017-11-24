$(document).ready(init());

function init(){
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
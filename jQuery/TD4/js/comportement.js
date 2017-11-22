$(document).ready(init());

function init() {
    /**
     * Test 1
     */
    $("#cliquable").click(function(){
        $("#modifiable").load("exo1.html");
    });

    /**
     * Test 2
     */
    $("#cliquable").click(function(){
        $.get("exo2.php", {
            prenom: "Justin",
            nom: "North"
        }, function(data){
            alert(data);
            $("#modifiable").text(data);
        })
    });

    /**
     * Test 3
     */
    
}
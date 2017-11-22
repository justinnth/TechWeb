$(document).ready(init());

function init() {
    /**
     * Test 1
    $("#cliquable").click(function(){
        $("#modifiable").load("exo1.html");
    });

    /**
     * Test 2
    $("#cliquable").click(function(){
        $.get("exo2.php", {
            prenom: "Justin",
            nom: "North"
        }, function(data){
            alert(data);
            $("#modifiable").text(data);
        });
    });

    /**
     * Test 3
    $("#cliquable").click(function(){
        $.ajax({
            url: "exo2.php",
            type: "GET",
            data:{
                prenom: "Justin",
                nom: "North"
            },
            error: function(){
                alert("Erreur aie aie aie");
            },
            success: function(data){
                alert(data);
                $("#modifiable").text(data);
            }
        });
    });

    /**
     * Test 4
     */
    $("#cliquable").click(function(){
        $.ajax({
            url: "playlist.xml",
            type: "GET",
            dataType: 'xml',
            timeout: 1000,
            error: function(){
                alert("Erreur aie aie aie");
            },
            success: function(xml){
                var donnees = "<table><tr><th>Location</th><th>Title</th><th>Creator</th></tr>";
                $(xml).find('track').each(function(){
                    var location = $(this).find('location').text();
                    var title = $(this).find('title').text();
                    var creator = $(this).find('creator').text();
                    donnees += "<tr><td>"+location+"</td><td>"+title+"</td><td>"+creator+"</td></tr>";
                });
                donnees += "</table>";
                $("#modifiable").html(donnees);
            }
        });
    });

    /**
     * Test 5
     */
    

}
$(function(){
    
    exo1();
    exo2();
    exo3();
    
    
    function exo1() {
        
        $("#ex1 p:nth-child(3)").text("CC2 Web 2"); //ajout du texte sur l'enfant
        $("#ex1 p:nth-child(3)").addClass("important"); //ajout de la classe
        
        $(".more").click(function() { //création de fonction pour le click
            
             $(".more").after("<section><p>Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim</p></section>"); //paragraphe crée après la classe more
            
        });

    };
    
    
    function exo2() {
        
        $(".listePrenom li").append("<span class='un'>"+1+"</span>"); //ajout du span 1 avec append
        $(".listePrenom li").append("<span class='deux'>"+2+"</span>"); // ajout du span 2
        
        $(".un").click(function() { //création de fonction pour le click
            
             $("li").appendTo(".liste1"); //mise en place dans la liste1
            
        });
        
         $(".deux").click(function() { //création de fonction pour le click
            
             $("li").appendTo(".liste2"); //mise en place dans la liste1
            
        });      
    
    };
    
    
    function exo3() {
        
        /*$( "#ex3 li" ).mouseenter(function() {
            $("data-img").attr("src","images/image1.jpg");
        });*/
        
        
    };
    
    
    
    function exo4() {
        
        //creation ajax
        $.ajax({
            url: '../donnees/donnees.php', //on prend les données
            type: 'get',
            
            success: function(data){
			 data.forEach(function(data){ //on crée le tableau
				var ligne = $("<tr></tr>");
				ligne.append($("<td>" + $retour + "</td>"));
				$("body").append(ligne);
			})
		}
	});
        
        
        
            
        
    };
    
    
});
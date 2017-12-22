$(document).ready(init());

function init() {
  exo1();
  exo2();
}

/**
 * Exercice 1
 */
function exo1() {
  var liste = $("section#ex1 ul");
  var li = $("<li/>").text("jQuery").appendTo(liste);
  li.css('background-color', 'grey');
}

/**
 * Exercice 2
 */
function exo2() {
  $("button.valide").click(actionClick);
}

function actionClick() {
  var listeSportifs = $("ul.sportif li");
  var listeGolf = $("ul.listeGolf");
  var listeAutre = $("ul.listeAutre");

  listeSportifs.each(function(){
    var li;
    if ($(this).attr('class') == 'golf') {
      li = $("<li/>").text($(this).text()).addClass($(this).attr('class')).appendTo(listeGolf);
    }
    else {
      li = $("<li/>").text($(this).text()).addClass($(this).attr('class')).appendTo(listeAutre);
    }
  })
}

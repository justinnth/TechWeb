$(document).ready(init());

function init() {
  exo1();
}

/**
 * Exercice 1
 */
function exo1() {
  var liste = $("section#ex1 ul");
  var li = $("<li/>").text("jQuery").appendTo(liste);
  li.css('background-color', 'grey');
}

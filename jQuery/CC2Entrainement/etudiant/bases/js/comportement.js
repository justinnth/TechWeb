$(document).ready(init());

function init() {
  exo1();
  exo2();
}

/**
 * Exercice 1
 */
function exo1() {
  var p = $("section#ex1 p:eq(1)").text('CC2 Web 2').addClass('important');

  var more = $("section#ex1 p:eq(2)");
  more.click(clickMore);
}

function clickMore() {
  var section = $("<section/>");
  var p = $("<p/>").text("lorem ipsum").appendTo(section);

  $(this).after(section);
}

/**
 * Exercice 2
 */
 function exo2() {
   
 }

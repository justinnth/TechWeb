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
  var li = $("section#ex2 ul.listePrenom li");
  li.each(function(){
    var texte = $(this).text();
    var span1 = $("<span/>").addClass("un").text("1").appendTo($(this));
    var span2 = $("<span/>").addClass("deux").text("2").appendTo($(this));
    span1.click({text: texte}, ajoutListe1);
    span2.click({text: texte}, ajoutListe2);
  });
}

function ajoutListe1(e) {
  var li = $("<li/>").text(e.data.text);
  var liste1 = $("section#ex2 ul.liste1");
  li.appendTo(liste1);
}

function ajoutListe2(e) {
  var li = $("<li/>").text(e.data.text);
  var liste2 = $("section#ex2 ul.liste2");
  li.appendTo(liste2);
}

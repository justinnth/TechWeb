$(document).ready(init());

function init() {
  exo1();
  exo2();
  exo3();
  exo4();
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

/**
 * Exercice 3
 */
function exo3(){
  var li = $("section#ex3 ul li");
  var aside = $("section#ex3 aside");
  li.each(function(){
    $(this).mouseover({param: aside}, survolLi);
    $(this).mouseout({param: aside}, viderAside);
  });
}

function survolLi(e) {
  var imgSrc = $(this).attr("data-img");
  var img = $("<img/>").attr('src','images/'+imgSrc).appendTo(e.data.param);
}

function viderAside(e) {
  e.data.param.empty();
}

/**
 * Exercice 4
 */
function exo4() {
  var url = "donnees/donnees.php";
  envoiAjax(url).done(traitementAjax);
}

function envoiAjax(url){
  return $.ajax({
      url: url,
      type: "post",
      data: {
        angou: 2016
      },
      dataType: "JSON"
  }).fail(function(){
      alert("Echec");
  });
}

function traitementAjax(data) {
  var section = $("section#ex4");
  var h3 = $("<h3/>").text(data.festival + " " + data.annee).appendTo(section);
  var tableau = $("<table/>").attr("style", "border: 1px").appendTo(section);
  $.each(data.prix, function(key, value) {
    var tr = $("<tr/>").appendTo(tableau);
    var nom = $("<td/>").text(value.nom).appendTo(tr);
    var auteur = $("<td/>").text(value.auteur).appendTo(tr);
    var prix = $("<td/>").text(value.prix).appendTo(tr);
  })
}

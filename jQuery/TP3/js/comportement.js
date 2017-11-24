$(document).ready(init());

function init(){
    $("#changer").click(changerTelephone2);
}

function changerTelephone2(){
    $.getJSON("trouverUnTelephone.php",traitement);
}

function changerTelephone1(){
    $.get("num.php",traiterAjax);
}

function affichageNom(data){
    $("h1#modele").text(data);
}

function affichageComm(data){
    $("p#article").text(data);
}

function affichagePhoto(data){
    $("img#imgPhone").attr('src', 'Photos/'+data);
}

function traiterAjax(data){
    var numero = data;
    $.get("nom.php",{n: numero},affichageNom    );
    $.get("commentaire.php",{n: numero},affichageComm);
    $.get("photo.php",{n: numero},affichagePhoto);
}

function traitement(data){
    $("h1#modele").text(data.Nom);
    $("p#article").text(data.Commentaire);
    $("img#imgPhone").attr('src', 'Photos/'+data.Photo);
}
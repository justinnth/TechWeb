$(document).ready(init());

function init(){
  var map = L.map('map').setView([51.505, -0.09], 13);
  L.tileLayer(
    'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
    {attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'}
  ).addTo(map);

  //on prend les données de l'open data
  var url = "https://opendata.paris.fr/api/records/1.0/search/?dataset=arbresremarquablesparis2011&facet=genre&facet=espece&rows=201";
  envoiAjax(url).done(traitementArbres);
}

function envoiAjax(url){
  return $.ajax({
    url: url,
    dataType: 'jsonp',
  });
}

function traitementArbre(data){
  
}

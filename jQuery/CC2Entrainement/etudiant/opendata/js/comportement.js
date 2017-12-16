var map;

$(document).ready(init());

function init(){
  map = L.map('map').setView([48.856, 2.352], 12);
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

function traitementArbres(data){
  var nbArbres = data.nhits;
  console.log(nbArbres);
  var strong = $("p.nbArbres strong");
  strong.text(nbArbres);
  console.log("Espece : " +data.records[0].fields.espece);
  console.log("Hauteur : " +data.records[0].fields.hauteurenm + " mètres");
  $.each(data.records, function(key, value) {
    if (value.fields.hauteurenm < 25) {
      L.marker(value.fields.geom_x_y).addTo(map).bindPopup('<h3>'+ value.fields.espece +'</h3><p>'+ value.fields.genre +'</p><p>'+ value.fields.adresse +'</p>')
    }
    else {
      var pentaVertMarker = L.ExtraMarkers.icon({
        icon: 'fa-tree',
        markerColor: 'green',
        shape: 'penta',
        prefix: 'fa'
      });

      L.marker(value.fields.geom_x_y, {icon : pentaVertMarker}).addTo(map).bindPopup('<h3>'+ value.fields.espece +'</h3><p>'+ value.fields.genre +'</p><p>'+ value.fields.adresse +'</p>');
    }
  });
}

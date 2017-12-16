<!DOCTYPE html>
<html>
<head>
	<title>openData</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
	<link rel="stylesheet" href="Leaflet.ExtraMarkers/dist/css/leaflet.extra-markers.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
	<style>
	#map{
		width:800px;
		height:600px;
	}

	body{
		background-color: #111;
		color:white;
	}
	</style>
</head>

<body>
	<h2>Les arbres remarquables de la ville de Paris</h2>

	<p class="nbArbres">Nombre d'arbres : <strong></strong></p>
	<section id="map"></section>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="Leaflet.ExtraMarkers/dist/js/leaflet.extra-markers.min.js" charset="utf-8"></script>
	<script src="js/comportement.js" type="text/javascript"></script>
</body>
</html>

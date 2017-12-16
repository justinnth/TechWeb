<!DOCTYPE html>
<html>
<head>
	<title>openData</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
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
	<script src="js/comportement.js" type="text/javascript"></script>
</body>
</html>

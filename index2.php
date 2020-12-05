<!DOCTYPE html>
<html>
<body>
<h1>Sitio Web 001</h1>

<?php
	$url = 'https://spreadsheets.google.com/feeds/cells/1yf26lspGU0zf-SDoe5VeoYG4Rg-xZeKsi6Vr_7hPJb8/1/public/full?alt=json';
	$file = file_get_contents($url);
	$produtosDeInformatica = json_decode($file);
	$productos = $produtosDeInformatica->{'feed'}->{'entry'};

	$prodAsStrings = Array();
	foreach ($productos as $prod) {
	array_push($prodAsStrings, $prod->{'gs$cell'}->{'$t'});
	}

	$produtosObjetos = Array();
	for ($i = 0; $i < sizeof($prodAsStrings); $i = $i + 5) {
	$nombre = $prodAsStrings[$i];
	$categoria = $prodAsStrings[$i + 1];
	$descripcion = $prodAsStrings[$i + 2];
	$imagen = $prodAsStrings[$i + 3];
	$precio = $prodAsStrings[$i + 4];

	$item = Array();

	array_push($item, $nombre);
	array_push($item, $categoria);
	array_push($item, $descripcion);
	array_push($item, $imagen);
	array_push($item, $precio);

	array_push($produtosObjetos, $item);
	}
?>

</body>
</html>


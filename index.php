<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$ggi_locations = $json->result->parameters->ggi_locations;

	switch ($ggi_locations) {
		case 'bella vista':
			$speech = "Hola, aquí te envío un listado de opciones en Bella Vista https://www.gogetit.com.pa/bella-vista-bella-vista/apartamentos-en-venta-b686";
			break;

		case 'obarrio':
			$speech = "Listo, estas propiedades en Obarrio te pueden interesar https://www.gogetit.com.pa/bienes-raices-panama/obarrio-area-metropolitana/apartamentos-en-venta-z616";
			break;

		case 'san francisco':
			$speech = "Tienes suerte, mira estas opciones en San Francisco que encontramos para ti https://www.gogetit.com.pa/bienes-raices-panama/san-francisco-panama/apartamentos-en-venta-z12";
			break;
			
		case 'costa del este':
			$speech = "Yai, mira los apartamentos que encontré en Costa del Este para ti https://www.gogetit.com.pa/bienes-raices-panama/costa-del-este-area-metropolitana/apartamentos-en-venta-z26";
			break;
		
		default:
			$speech = "Lo siento. No encuentro la zona que estás buscando.";
			break;
	}

	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>

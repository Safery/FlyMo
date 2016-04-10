<?php
	// CHECK API REQUEST LIMIT
	$myfile = fopen("counter.php", "r") or die();
	$get_num = fgets($myfile);
	if (intval($get_num) >= 300){
		echo "Cannot compute any more API request. Limit reached.";
	}
	else {
		fclose($myfile);
		$myfile = fopen("counter.php", "w+") or die();
		$txt = intval($get_num) + 1;
		fwrite($myfile, $txt);
		fclose($myfile);
		call_request();
	}
function call_request(){
//	$depart_date = $_GET['depart_date'];
//	$return_date = $_GET['return_date'];
//	$from_location = $_GET['from_location'];
//	$to_location = $_GET['to_location'];
//
//
//	$data = array ("request" => array(
	//			"passengers" => array( 
	//					'adultCount' => 1,
	//					'infantInLapCount' => 0,
	//					'infantInSeatCount' => 0,
	//					'childCount' => 0,
	//					'seniorCount' => 0,

	//						),
	//					"slice" => array( 
	//							array(
	//								'origin' => $from_location,
	//								'destination' => $to_location,
	//								'date' => $depart_date),
	//							),
	//								'solutions' => "1",
	//								'refundable' => false
	//							),                   
	//			 );

	//$data_string = json_encode($data);
	//$ch = curl_init('https://www.googleapis.com/qpxExpress/v1/trips/search?key=AIzaSyCOAqQXp7aon97LGWmgcf1xjlrhjxfKP6Y');
	//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
	//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));                                                                                                                   

	//$json = curl_exec($ch);
	//curl_close($ch);

	$json = json_decode(file_get_contents('results_2.json'), true);

	//$slices = array(array('origin' => $from_location, 'destination' => $to_location, 'date' => $depart_date));
	$slices = array(array('origin' => 'YYZ', 'destination' => 'DAC', 'date' => '2015-04-15'));
	$result = 0;
	//$resultAsArray = json_decode($json, true);

	$resultAsArray = $json;
	$trips = array_filter($resultAsArray['trips']['tripOption'], function($kind) {
			if (!isset($kind['kind'])) {
				return false;
			}
			if ($kind['kind'] == "qpxexpress#tripOption") {
				return true;
			}
			return false;
		});
	$result = 0;
	$return_array = array();
	$return_array['route'] = array(); // create array for the route;
	// Result for Search 0
	foreach ($trips as $trip) {
			//echo "------- FROM LOCATION ---------\n";
			//echo "<br>";
			//echo "Flight Cost: " . $trip['saleTotal'] . "\n";
			//echo "<br>";
			$return_array['price'] = substr($trip['saleTotal'], 3); // Insert price into array.
			foreach ($trip['slice'] as $index => $slice) {
				if ($result == 1){
					//echo ">>>>> NEW PLANE <<<<<<";
					//echo "<br>";
					//echo "Flight Cost: " . $trip['saleTotal'] . "\n";
					//echo "<br>";
					$result = 0;
				}
				if ($result == 0){
					//echo "Location: " . $slices[$index]['origin'] . " TO " . $slices[$index]['destination'] . "\n";
					$return_array['location'] = $slices[$index]['origin'] . " TO " . $slices[$index]['destination']; // Insert from to destination.
					//echo "<br>";
					foreach ($slice['segment'] as $segment) {
						foreach ($segment['leg'] as $leg) {
							//print "FROM " . $leg['origin'] . " to " . $leg['destination'] . " (" . $leg['departureTime'] . "/" . $leg['arrivalTime'] . ")" . "\n";
							array_push($return_array['route'], $leg['origin'] . " to " . $leg['destination'] . " (" . $leg['departureTime'] . "/" . $leg['arrivalTime'] . ")");
							//echo "<br>";

						}
					}
					$result = 1;
				}
			}
	}

	echo json_encode($return_array);
}


?>
